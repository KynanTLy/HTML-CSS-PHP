<?php


echo "=====Pangram=====\n";

// Load the file into a variable
$pangram_array = file( 'http://hucodev.srv.ualberta.ca/hquamen/courses/huco520/resources/pangrams.txt' );

// Iterate through each line in the file
foreach ($pangram_array as $element){

	// Create an alphabet array
	$alphabet = range('a', 'z');

	// Tokenize the sentence as well as apply some cleaning (to lower case and trim)	
	$token = str_split(trim(strtolower($element)));

	// Iterate through each letter
	foreach ($token as $token){
		// Check to see if letter is in $alphabet
		if (is_numeric(array_search($token, $alphabet) )){
			// Remove that letter from the list
			unset($alphabet[array_search($token, $alphabet)]);
		
		}//end if 
	}//end foreach

	// If alphabet is empty => it has all the letters
	if (empty($alphabet)){
		echo "$element is a Pangram \n";
	
	// It did not use all the letters
	} else {

		echo "$element is NOT a Pangram \n";
		echo "It is missing ";

		// Print remaining letters
		foreach($alphabet as $letter){
			echo "$letter ";
		}//end for loop
		echo "\n"; 
	}//end if 

	echo "\n";
}//end for each 


?>