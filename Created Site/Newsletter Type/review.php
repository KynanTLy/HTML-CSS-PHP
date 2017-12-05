<?php

	// If there is a POST handle it
	if ($_SERVER['REQUEST_METHOD'] == 'POST')
	{ // Handle the form.
		

	}	
	// Require the sqlManager
	include "./sqlManger.php";

	// Save the data into their own variables
	$game = $_POST["Game_Listed"];
	$relate_sad = $_POST["relate_sad"];
	$relate_lost = $_POST["relate_lost"];
	$relate_family = $_POST["relate_family"];
	$relate_anxiety = $_POST["relate_anxiety"];
	$relate_confidence = $_POST["relate_confidence"];
	$relate_stress = $_POST["relate_stress"];
	$note = addslashes($_POST["note"]);
	$submit = $_POST["submit"];

	// Prepare SQL for insert
	$insert = "INSERT INTO 'review' VALUES ('$game', '$relate_sad', '$relate_lost', '$relate_family', '$relate_anxiety', '$relate_confidence', 'relate_stress','$note')";

	// Insert the SQL
	$cloud = mysqli_query($query, $pipeline);

INSERT INTO `review` VALUES (1,1,1,3,1,3,2,2,2,2,NULL),(2,2,2,3,1,3,5,5,2,2,NULL);

?>