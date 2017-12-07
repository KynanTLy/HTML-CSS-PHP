<?php


	// Require the sqlManager
	include_once "./sqlManger.php";

	function check_input($game, $relate_sad, $relate_lost, $relate_family, $relate_anxiety, $relate_confidence, $relate_stress){
			// Successful Registration Variable
			$sucess = TRUE;

			// Validate colour
			if ($game === '') {
				
				return '<h1 class="page-title"> Please choose a game</h1>';
				
				$sucess = FALSE;
			}//end validate colour


			// Validate terms
			if ( $relate_sad === NULL or $relate_lost === NULL or $relate_family === NULL or $relate_anxiety === NULL or $relate_confidence === NULL or $relate_stress === NULL) {
				
				return '<h1 class="page-title">You have left one of the boxes unchecked</h1>';
				
				$sucess = FALSE;
			}//end validate terms


			// Successful insert
			if ($sucess) {

				// On suscess insert to database
				return insert_database($game, $relate_sad, $relate_lost, $relate_family, $relate_anxiety, $relate_confidence, $relate_stress);


			}//end Successful Registration


	}//end check_input

	function check_add($name, $platform){
			// Successful Registration Variable
			
			$sucess = TRUE;

			// Validate colour
			if ($name === '') {
				
				return '<h1 class="page-title"> Please give a game name</h1>';
				
				$sucess = FALSE;
			}//end validate colour


			// Validate terms
			if ($platform == "") {
				
				return '<h1 class="page-title">You did not choose a platform</h1>';
				
				$sucess = FALSE;
			}//end validate terms

			
			// Successful insert
			if ($sucess) {

				// On suscess insert to database
				return insert_game($name, $platform);


			}//end Successful Registration

	}//end checkadd

?>