<?php

	// Global variables
	$pipeline;
	$DATABASE;

	// Init database
	function init_database(){
		global $pipeline, $DATABASE;

		// Init Variables
		$USER = "root";
		$PASSWORD = "123456a";
		$DATABASE = "testdb";


		// Connect to the database
		$pipeline = mysqli_connect('localhost', $USER, $PASSWORD, $DATABASE) or die("Not connected.");

		
		// Check to see if database is connected
		if(!$pipeline){

			echo "Database Connection Failed";
			exit;

		}//end if check pipeline


	}//end init_database

	// Close the database
	function close_database(){

		global $pipeline;

		mysqli_close($pipeline);

	}//end close_database

	// Return the list of games in database
	function get_game_list(){
		global $pipeline, $DATABASE;

		// Init database
		init_database();
		
		// Query for game names
		$query = "SELECT id, name FROM game";

		// Run the query
		$cloud = mysqli_query($pipeline, $query);

		// Create option in selector with the results
		while($row = mysqli_fetch_assoc($cloud)){

			echo "<option value=" . $row['id'] . ">" . $row['name'] . "</option>";
		
		}//end while loop

		// Close database
		close_database();
	}//end get_game_list

	// Add a new game
	function insert_game($game, $name){
		
		global $pipeline, $DATABASE;

		// Init database
		init_database();

		// Prepare SQL for insert
		$insert = "INSERT INTO game (name, platform) VALUES ('$game', '$name')";

		
		// Execute Query
		$cloud = mysqli_query($pipeline, $insert);
		
		// Check to see if it works
		if (mysqli_affected_rows($pipeline) == 1) {
				
			// Close database
			close_database();

			// Return error
			return '<h1 class="page-title"> Thank you the new game addition!</h1>';
			
		} else {

			// Close database
			close_database();

			// Return error message
			return '<p class="error">Could not add this game because:<br/>' . mysql_error($dbc) . '</p>';

		}//end database check	
	}//end insert_game

	// Insert new review
	function insert_database($game, $relate_sad, $relate_lost, $relate_family, $relate_anxiety, $relate_confidence, $relate_stress){
		
		global $pipeline, $DATABASE;

		// Init database
		init_database();

		// Prepare SQL for insert
		$insert = "INSERT INTO review ( game_id, relate_sad, relate_lost, relate_family, relate_anxiety, relate_confidence, relate_stress) VALUES ( $game, $relate_sad, $relate_lost, $relate_family, $relate_anxiety, $relate_confidence, $relate_stress)";	

		// Execute Query
		$cloud = mysqli_query($pipeline, $insert);
		
		// Check to see if it works
		if (mysqli_affected_rows($pipeline) == 1) {
				
			// Close database
			close_database();

			// Return error
			return '<h1 class="page-title"> Thank you for your review!</h1>';
			
		} else {

			// Close database
			close_database();

			// Return error message
			return '<p class="error">Could not store the review because:<br/>' . mysql_error($dbc) . '</p>';

		}//end database check
	}//end insert_database

	// Create random colours for the graphs based on how many games there are
	function random_colour_generator(){
		global $pipeline, $DATABASE;

		// Init database
		init_database();

		// Query for game names
		$query = "SELECT COUNT(DISTINCT id) FROM game";

		// Run query
		$cloud = mysqli_query($pipeline, $query);

		// Save the result
		$row = mysqli_fetch_assoc($cloud);
		
		// Init colours
		$colours = '';

		// Generate amount of colours based on number of games
		for ($i = 0; $i < $row['COUNT(DISTINCT id)']; $i++){
			$colours = $colours . ",#" . substr(md5(rand()), 0, 6);
		}//end for loop

		// Remove comma at the end
		$colours = ltrim($colours,',');
		
		// Close database
		close_database();

		return $colours;

	}//end random_colour_generator

	// Return the amount of games are in each platform
	function get_num_platform(){
		global $pipeline, $DATABASE;

		// Init database
		init_database();
		
		// Query for game names
		$query = "SELECT platform, count(*) FROM game GROUP BY platform";

		// Run query
		$cloud = mysqli_query($pipeline, $query);

		// Set up JSON chart object
		$arrData = array(
            "chart" => array(
              "caption" => "Amount of Games Listed in each Platform",
              "paletteColors" => "#0075c2",
              "bgColor" => "#ffffff",
              "borderAlpha"=> "20",
              "canvasBorderAlpha"=> "0",
              "usePlotGradientColor"=> "0",
              "plotBorderAlpha"=> "10",
              "showValues" => "1",
              "yAxisValueDecimals" => "0",
            )
        );

        // Init data section of JSON
		$arrData["data"] = array();

		// Save the result into the data
        while($row = mysqli_fetch_array($cloud)) {

	        array_push($arrData["data"], array(
	            "label" => $row["platform"],
	            "value" => $row["count(*)"]
	            )
	        );

        }//end while
        
        // Close database
        close_database();

        // encode the array into a JSON and return it
 		return json_encode($arrData);

	}//end get_num_platform

	// Return the amount of review there are in each game
	function get_num_review(){
		global $pipeline, $DATABASE;

		// Init database
		init_database();
		
		// Query for game names
		$query = "SELECT DISTINCT g.name, count(*) FROM game g, review r WHERE r.game_id = g.id GROUP BY g.name";

		// Run query
		$cloud = mysqli_query($pipeline, $query);

		// Create the colours we are going to need
		$colours = random_colour_generator();  

		// creating an associative array to store the chart attributes    
		$arrData = array(
			"chart" => array(
				"caption" => "Amount of Reviews of Each Game",
				"captionFontSize" => "24",
				"paletteColors" => "$colours",
				"theme" => "ocean",
				"baseFont" => "Quicksand, sans-serif",
				"showPercentValues" => "1",
				"showLegend" => "1",
				"subcaptionFontSize" => "14",
				"subcaptionFontBold" => "0",
				"useDataPlotColorForLabels" => "1"
			)
		);

		// Init data for JSON
		$arrData["data"] = array();

		// Assign results into the data section
		while ($row = mysqli_fetch_array($cloud)) {

			array_push($arrData["data"], array(
			"label" => $row['name'],
			"value" => $row['count(*)']
			));
		}//end while
 
		// Close database
		close_database();

		// Return the array as a JSON
 		return json_encode($arrData);

	}//end get_num_review

	// Calculate average score of each game
	function get_highest_avg_category(){
		global $pipeline, $DATABASE;

		// Init database
		init_database();
		
		// Query for game names
		$query = "SELECT g.name,  AVG(relate_sad), AVG(relate_lost), AVG(relate_family), AVG(relate_anxiety), AVG(relate_confidence), AVG(relate_stress) FROM game g, review r WHERE r.game_id = g.id GROUP BY g.name";

		// Run the query
		$cloud = mysqli_query($pipeline, $query);
		
		// Create hte colours we are going to need
		$colours = random_colour_generator();  

		// creating an associative array to store the chart attributes    
		$arrData = array(
			"chart" => array(
				"caption" => "Average Score In Each Category",
				"captionFontSize" => "24",
				"xAxisName" => "Category",
				"yAxisName" => "Score",
				"numberSuffix" => " Out of 5",
				"paletteColors"=> "$colours",
				"theme" => "ocean",
				"baseFont" => "Quicksand, sans-serif",
				"showLegend" => "1",
				"subcaptionFontSize" => "14",
				"yAxisMaxValue"=> "2",
				"yAxisMinValue"=> "-2",

			)
		);

		// Create the category
		$category = array("Help Sad", "Help Lost", "Help Family", "Help Anxiety", "Help Confidence", "Help Stress");

		// Make categories into their array
		$categoryList = array();	

		// Assigning the categories into their own array
		foreach ($category as $value){
			array_push($categoryList, array(
				"label" => "$value"
			));
		}//end foreach

		// Format the categories into the format the JSON (graph) wants
		$arrData["categories"]=array(array("category"=>$categoryList));

		// Init dataset
		$arrData["dataset"] = array();

		// Array to hold each individual data for each game
		$collectedArray = array();

		// Holds all the game names
		$gameName=array();

		// For each result for each game record the average score
		while ($row = mysqli_fetch_array($cloud)) {

			// Create a section for the name
			array_push($gameName, $row['name']);
			$dataseries = array();

			// Store all the averages for each section into an array
			array_push($dataseries, array(
				"value" => $row['AVG(relate_sad)'],
				"errorvalue" => 0
			));
			array_push($dataseries, array(
				"value" => $row['AVG(relate_lost)'],
				"errorvalue" => 0
			));
			array_push($dataseries, array(
				"value" => $row['AVG(relate_family)'],
				"errorvalue" => 0
			));
			array_push($dataseries, array(
				"value" => $row['AVG(relate_anxiety)'],
				"errorvalue" => 0
			));
			array_push($dataseries, array(
				"value" => $row['AVG(relate_confidence)'],
				"errorvalue" => 0
			));
			array_push($dataseries, array(
				"value" => $row['AVG(relate_stress)'],
				"errorvalue" => 0
			));

			// Store the array of data on a game into the list
			array_push($collectedArray, $dataseries);

		}//end while

		// Preparing the JSON dataset for the graph
		for ($i = 0; $i < count($gameName); $i++){

			array_push($arrData["dataset"], array("seriesname" => $gameName[$i], "data" => $collectedArray[$i]));
		}//end for loop

		// Close database
		close_database();

		// Return the formated JSON       
      	return json_encode($arrData);


	}//end get_highest_avg_category


?>