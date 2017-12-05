<?php


	// Require the sqlManager
	include "./sqlManger.php";

	function insert_database($game, $relate_sad, $relate_lost, $relate_family, $relate_anxiety, $relate_confidence, $relate_stress, $note){

		// Init database
		init_database();

		// Prepare SQL for insert
		$insert = "INSERT INTO review VALUES ($game, $relate_sad, $relate_lost, $relate_family, $relate_anxiety, $relate_confidence, relate_stress,'$note')";	

		// Run the query
		$cloud = mysqli_query($insert, $pipeline);

		if (mysqli_affected_rows($pipeline) == 1) {
			
			// Close database
			close_database();

			// Return errpr
			return '<p>Thank you for your review!</p>';
		
		} else {

			// Close database
			close_database();

			// Return error message
			return '<p class="error">Could not store the quote because:<br/>' . mysql_error($dbc) . '</p>';
		}//end database check
	}//end insert_database

	function check_input($game, $relate_sad, $relate_lost, $relate_family, $relate_anxiety, $relate_confidence, $relate_stress, $note){
			// Successful Registration Variable
			$sucess = TRUE;

			// Validate colour
			if ($game === '') {
				
				return '<p class="error">You must choose a game.</p>';
				
				$sucess = FALSE;
			}//end validate colour


			// Validate terms
			if ( $relate_sad === NULL or $relate_lost === NULL or $relate_family === NULL or $relate_anxiety === NULL or $relate_confidence === NULL or $relate_stress === NULL) {
				
				return '<p class="error">You must accept the terms.</p>';
				
				$sucess = FALSE;
			}//end validate terms


			// Successful Registration
			if ($sucess) {

				return "<p> DID IT! </p>";
				// On suscess insert to database
				#insert_database($game, $relate_sad, $relate_lost, $relate_family, $relate_anxiety, $relate_confidence, $relate_stress, $note);

			}//end Successful Registration


	}//end check_input



	// Prepare SQL for insert
	//$insert = "INSERT INTO review VALUES ($game, $relate_sad, $relate_lost, $relate_family, $relate_anxiety, $relate_confidence, relate_stress,'$note')";

	// Insert the SQL
	//$cloud = mysqli_query($query, $pipeline);

	//INSERT INTO `review` VALUES (1,1,1,3,1,3,2,2,2,2,NULL),(2,2,2,3,1,3,5,5,2,2,NULL);

?>