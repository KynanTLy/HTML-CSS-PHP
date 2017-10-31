<?php

/////////////////////////////////////////////////////////////////////////////////
//		Code for Exercise 1 follows
/////////////////////////////////////////////////////////////////////////////////
echo "\n\n-------------------  Exercise 1 ----------------------------\n\n";
echo "N! Problem\n";

// Ask for input
$line = readline("Please enter a number: \n");

// Calculates N!
function nFactorio($number) {
	
	// Check to see if it is less than 0
	if ($number < 0) {
		return NULL;

	// Check for 0 condition
	} else if($number == 0) {
		return 1;

	// Calculates N!
	} else {
		$total = 1;

		for($i = $number; $i > 0; $i--){
			$total = $total * $i;
		}//end for loop

		return $total;
	}// end if statement

}// end nFactorio

$result = nFactorio($line);

// Check for null 
if ($result == NULL){
	echo "Your number has to be greater than 0";
} else {
	echo "$line! results = $result";
}//end if statement


/////////////////////////////////////////////////////////////////////////////////
//		Code for Exercise 2 follows
/////////////////////////////////////////////////////////////////////////////////
echo "\n\n-------------------  Exercise 2 ----------------------------\n\n";
echo "Dozens of Donuts \n";

// Take in inpit
$line = readline("Please enter a number: \n");

// Calcualte amount of donuts
function calculateDonuts($number){

	// Check the less than zero condition
	if ($number < 0) {
		return NULL;
	// Calculate the amount of dozens and remainder
	} else {
		$dozen = floor($number / 12);
		$remainder = $number % 12;
		
		// Return the 2 values
		return array($dozen, $remainder);
	}// end if statement

}// end calculateDonuts

$result = calculateDonuts($line);

// Check null condition
if($result == NULL){
	echo "Your number has to be greater than 0";
} else {
	
	// Determine if there exist a dozen
	if ($result[0] == 0){
		$dozenDonuts = "";
	} else {
		$dozenDonuts = "$result[0] dozen and ";
	}// end if dozen

	// Determine if we need to pural donut
	if ($result[1] == 0 || $result[1] == 1){
		$singleDonuts = "$result[1] donut";
	} else {
		$singleDonuts = "$result[1] donuts";
	}// end if pural
	
	// Formate the string 
	$formatedString = sprintf("You have %s%s.",$dozenDonuts,$singleDonuts);

	echo "$formatedString";

}//end if statement


/////////////////////////////////////////////////////////////////////////////////
//		Code for Exercise 3 follows
/////////////////////////////////////////////////////////////////////////////////
echo "\n\n-------------------  Exercise 3 ----------------------------\n\n";

echo "Fibonacci Sequence \n";

// Take in inpit
$line = readline("Please enter a number: \n");

function fib($number){
	// Base case 0
	if ($number == 0){
		return 0;
	// Base case 1
	} else if ($number == 1){
		return 1;
	// Recursive function
	} else { 
		return fib($number - 1) + fib($number - 2);
	}// end if statement

}// end fib

$result = fib($line -1);

// Format string
$formatedString =  sprintf("The %uth Fibonacci number is %u.",$line,$result);

echo "$formatedString";



/////////////////////////////////////////////////////////////////////////////////
//		Code for Exercise 4 follows
/////////////////////////////////////////////////////////////////////////////////
echo "\n\n-------------------  Exercise 4 ----------------------------\n\n";

echo "You've Got Mail\n";

// Take in input
$email = readline("Please enter an email to send to: \n");
$topic = readline("Please enter email topic: \n");
$message = readline("Please enter a message to send: \n");

// Save if the message was sent or not into a variable
//$validate = mail($email, $topic, $message);

// Check to see if the message was sent
if ($validate){
	echo "Your message was sent";
} else {
	echo "Your message did not send";
}// end if 


/////////////////////////////////////////////////////////////////////////////////
//		Code for Exercise 5 follows
/////////////////////////////////////////////////////////////////////////////////
echo "\n\n-------------------  Exercise 5 ----------------------------\n\n";

echo "Palindromic Square Numbers\n";

// Calculates palindrome of even digit numbers
function Palindromic(){
	$looking = true;
	$number = 100;
	while($looking){
		if ((log($number, 10) + 1) % 2 != 0){
			$number = $number * 10;
		} else {
			$square = $number ** 2;
			if (strrev((string)$square) == (string)$square){
				return array($number, $square);
			} else {
				$number++;
			}//end inner if for square
		}//end if statement
	}//end while loop
}//end Palindromic

$result = Palindromic();

// Format string
$formatedString =  sprintf("The 1st even number of digit palindrome is %u with %u",$result[0],$result[1]);

echo "$formatedString";


/////////////////////////////////////////////////////////////////////////////////
//		Code for Exercise 6 follows
/////////////////////////////////////////////////////////////////////////////////
echo "\n\n-------------------  Exercise 6 ----------------------------\n\n";

echo "Ping-Pong Balls and Thermodynamics\n";

// Take in inpit
$line = readline("Please enter the number of tries: \n");

// Runs a single ping pong equalization
function pingPongSingle(){
	// Create an empty array of pingPong
	$pingPong = array();

	// Set the inital values for urns and count
	$urn1 = 75;
	$urn2 = 25;
	$count = 0;
	
	// Fill the array with the correct ratios
	for ($k = 0; $k < 75; $k++){
		$pingPong[$k] = "urn1";
	}//end for loop
	for ($k = 75; $k < 100; $k++){
		$pingPong[$k] = "urn2";
	}//end for loop

	// Loops until both urns matches
	while ($urn1 != $urn2){
		$swap = rand(0,99);
		// Swap if it was urn1
		if($pingPong[$swap] == "urn1"){
			$pingPong[$swap] = "urn2";
			$urn1--;
			$urn2++;
			$count++;
		// Swap if urn2
		} else {
			$pingPong[$swap] = "urn1";
			$urn1++;
			$urn2--;
			$count++;
		}//end if statement
	}//end while loop

	// Return the result
	return $count;
}//end pingPongSingle

// Calculates the number of pingPong required to equalize
function pingPongMulti($number){
	// Set the inital variable
	$average = 0;
	$max = 0;
	$min = 0;
	$results = array();

	// Iterate the amount of times declared
	for ($i = 0; $i < $number; $i++){
		// Save the result into array
		array_push($results, pingPongSingle());
	}

	// Calculate the stats
	$max = max($results);
	$min = min($results);
	$average = array_sum($results) / count($results);

	// Return results
	return array($average, $max, $min);

}//end pingPong

$result = pingPongMulti($line);

// Format string
$formatedString =  sprintf("The average is %u, the max is %u, and the min is %u",$result[0],$result[1], $result[2]);

echo "$formatedString";

/////////////////////////////////////////////////////////////////////////////////
//		Code for Exercise 7 follows
/////////////////////////////////////////////////////////////////////////////////
echo "\n\n-------------------  Exercise 7 ----------------------------\n\n";

echo "Expand the Palindrome Script\n";

// Load the content from the URL
$pal_array = file( 'http://hucodev.srv.ualberta.ca/hquamen/courses/huco520/resources/palindromes.txt' );

// Check for palindrome
function palindrome($array){

	// Holds all the palindrome
	$results = array();

	// Iterate through each line in the text
	foreach($array as $element){
		// Tokenize the line
		$tok = explode(" ", $element);
		
		// Iterate through all the tokens
		foreach ($tok as $tok){
			$tok = strtolower(trim($tok));
			// Check for palindrome
			if ($tok == strrev($tok)){
				// If there is one add it to list
				array_push($results, $tok);
			}//end if statement
		}//end foreach word
	}//end for each line

	// Print each palindrome if I want to

	//foreach ($results as $results){
	//	echo "{$results}\n";
	//}

	return count($results);
}

$result = palindrome($pal_array);

echo "There are $result padindome in the file";

/////////////////////////////////////////////////////////////////////////////////
//		Code for Exercise 8 follows
/////////////////////////////////////////////////////////////////////////////////
echo "\n\n-------------------  Exercise 8 ----------------------------\n\n";







/////////////////////////////////////////////////////////////////////////////////
//		Code for Exercise 9 follows
/////////////////////////////////////////////////////////////////////////////////
echo "\n\n-------------------  Exercise 9 ----------------------------\n\n";







/////////////////////////////////////////////////////////////////////////////////
//		Code for Exercise 10 follows
/////////////////////////////////////////////////////////////////////////////////
echo "\n\n-------------------  Exercise 10 ----------------------------\n\n";







?>