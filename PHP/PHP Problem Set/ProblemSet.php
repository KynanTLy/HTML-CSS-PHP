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

$result = fib($line);

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

	// Loop through each number 
	while($looking){
		// Check if the number is a even digit
		if ((log($number, 10) + 1) % 2 != 0){
			//If odd number digit * 10 to the next dec place
			$number = $number * 10;
		} else {
			// Square the number
			$square = $number ** 2;

			// Check for Palindrome
			if (strrev((string)$square) == (string)$square){
				// Return number that make Palindrome
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


		// Clean the sentence 
		$tok = strtolower(trim($element));

		// Remove non-letters
		$tok = preg_replace("/[^a-zA-Z0-9]/", "", $tok);
		
		// Match to see if it is palindrome

		if ($tok == strrev($tok)){
				// If there is one add it to list
				array_push($results,$element);
		}//end if statement

	}//end for each line


	// Print each palindrome if I want to

	foreach ($results as $element){
		echo "{$element}\n";
	}

	return count($results);
}

$result = palindrome($pal_array);

echo "There are $result padindome in the file";

/////////////////////////////////////////////////////////////////////////////////
//		Code for Exercise 8 follows
/////////////////////////////////////////////////////////////////////////////////
echo "\n\n-------------------  Exercise 8 ----------------------------\n\n";

echo "Devise an Algorithm \n";

// Take in inpit
$line = readline("Please enter a card: \n");

// Conducts binary search on the array to find the card
function binarySearch($card, $cards_played){

	// Init min, max, middle index as well as count
	$minIndex = 0;
	$maxIndex = count($cards_played)-1;
	$middleIndex = ceil(($maxIndex + $minIndex) / 2);
	$count = 0;

	// If the card is out of bound of the highest card or lowest clearly not in list
	if ($card < $cards_played[0] or $card > $cards_played[count($cards_played)-1]){
		// exit
		return NULL;
	} else {

		// Iterate through array using a middle point as point of comparasion
		while(true and $minIndex <= $maxIndex ){

			// If we found the card we are done
			if ($cards_played[$middleIndex] == $card){
				return $count;
			}// end if



			// If greater move minIndex up and recalculate middle
			if ($card < $cards_played[$middleIndex]){
				$count++;
				$maxIndex = $middleIndex - 1;
				$middleIndex = ceil(($maxIndex + $minIndex) / 2);

			// If smaller move maxIndex down adn recalculate middle
			} else {
				$count++;
				$minIndex = $middleIndex + 1;
				$middleIndex = ceil(($maxIndex + $minIndex) / 2);
			}//end if statement

		}//end while loop
		return NULL;

	}//end outer if statement

}//end binary search

// Find the card by looking through each element starting from first
function bruteForce($card, $cards_played){
	$count = 1;

	// Iterate through each element in the list
	foreach ($cards_played as $element){
		
		// If we found the card return
		if($element == $card){
			return $count;
		} else {
			$count++;
		}// end if statement
	}//end for loop

	// We did not find the card
	return NULL;
}//end bruteForce

// Check both method of search
function Devise($card){

	// Init card array
	$cards_played = array('C10', 'C2', 'C4', 'C5', 'C6', 'C8', 'CA', 'CQ',
'D10', 'D2', 'D5', 'D6', 'D7', 'D8', 'D9', 'DA', 'DJ', 'H10', 'H2', 'H3', 'H4',
'H8', 'H9', 'HA', 'HK', 'S10', 'S3', 'S5', 'S7', 'S8', 'S9', 'SK');

	// Call both searches
	$binarySearch = binarySearch($card, $cards_played);
	$bruteForce = bruteForce($card, $cards_played);

	// If one of them is NULL clearly we did not find it 
	if ($binarySearch === NULL or $bruteForce === NULL){
		return NULL;
	} else {
		return array($binarySearch, $bruteForce);
	}// end if statement
}//end devise


$result = Devise($line);

// Print the result based on the answer
if ($result === NULL){
	echo "Sorry that card does not exist";
} else {
	echo "A bruce force method took $result[1] and binary search took $result[0] to find the card $line";
}//end if


/////////////////////////////////////////////////////////////////////////////////
//		Code for Exercise 9 follows
/////////////////////////////////////////////////////////////////////////////////
echo "\n\n-------------------  Exercise 9 ----------------------------\n\n";


echo "The Monte Carlo Gas Station \n";

// Does the gas station simulation
function gasStation(){
	// Init starting values

	// Constants
	$wait = 8;
	$prob = 0.1;
	$day = 480;

	// Start day at 1 minute
	$start = 1;

	// For first customer case
	$first = true;

	// Is the station in use
	$inUse = true;

	// Counts the amount of time a person is at the station
	$currentUserWait = 0;

	// Stats
	$amountCustomer = 0;
	$customerWait = array();
	$finished = 0;

	// Simulates the day
	while ($start <= $day){
		
		// See if there is a new customer
		$chance = probCustomer($prob);

		// First customer base case
		if($first){
			$currentUserWait = 8;
			$amountCustomer++;
			$first = false;
			$inUse = true;
		}//end if

		// There is a new customer and no one is waiting
		if ($chance and $currentUserWait == 0 ){
			$currentUserWait = 8;
			$amountCustomer++;
			$inUse = true;
			array_push($customerWait, 0);

		// There is a new customer but there is someone is there
		} else if($chance and $currentUserWait != 0) {

			// Add the wait time to the array
			array_push($customerWait, calculateWait($customerWait, $currentUserWait, $finished));
			$amountCustomer++;
		}//end if

		// Ensure that we don't go below zero. aka. no one is there
		if($currentUserWait > 0){
			$currentUserWait--;
		}//end if

		// Customer is done using the gas station
		if($currentUserWait == 0 and $inUse){
			$inUse = false;
			$finished++;

			// If there is someone waiting start that person's use
			if($finished <= count($customerWait)){
				$currentUserWait = 8;
				$inUse = true;
			}//end inner if
			
		}//end outer if

		// Increment time
		$start++;

	}//end while
	// Return all the wait time
	return array($customerWait, $amountCustomer);

}//end gasStation

// Calculates how much waiting a person needs to do
function calculateWait($waitList, $currentTime, $finish){
	$waitTime = ((count($waitList) - $finish) * 8) + $currentTime; 
	return $waitTime;
}//end calculateWait

// Runs the random numbers for customer
function probCustomer($percent){
	$success =  mt_rand() / mt_getrandmax();
	if ($success <= 0.1){
		return true;
	} else {
		return false;
	}//end if 

}//end probCustomer

$result = gasStation();

// Format string
$average = array_sum($result[0]) / count($result[0]);
$formatedString =  sprintf("The average wait time is %u with %u amount of customer ",$average,$result[1]);

echo "$formatedString";

/////////////////////////////////////////////////////////////////////////////////
//		Code for Exercise 10 follows
/////////////////////////////////////////////////////////////////////////////////
echo "\n\n-------------------  Exercise 10 ----------------------------\n\n";







?>