<?php


echo "=====Pangram=====\n";

// Load the file into a variable
$pangram_array = file('http://hucodev.srv.ualberta.ca/hquamen/courses/huco520/resources/pangrams.txt' );

// Iterate through each line in the file
foreach ($pangram_array as $element){

	// Create an alphabet array
	$alphabet = range('a', 'z');

	// Tokenize the sentence as well as apply some cleaning (to lower case and trim)	
	$letter = str_split(trim(strtolower($element)));

	// Iterate through each letter
	foreach ($letter as $letter){
		// Check to see if letter is in $alphabet
		if (is_numeric(array_search($letter, $alphabet) )){
			// Remove that letter from the list
			unset($alphabet[array_search($letter, $alphabet)]);
		
		}//end if 
	}//end foreach

	// If alphabet is empty => it has all the letters
	if (empty($alphabet)){
		$element = trim($element);
		echo "$element is a Pangram \n";
	
	// It did not use all the letters
	} else {
		$element = trim($element);
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