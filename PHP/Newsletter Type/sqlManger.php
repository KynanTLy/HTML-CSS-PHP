<?php

// Init Variables
$USER = "";
$PASSWORD = "";
$DATABASE = "";
$pipeline;

// Init database
function init_database(){
	// Connect to the database
	$pipeline = mysql_connect('localhost', $USER, $PASSWORD, $DATABASE);

	if(!$pipeline){
		echo "Database Connection Failed";
		exit;
	}//end if check pipeline

}//end init_database

// Close the database
function close_database(){
	mysql_close($dbc);
}//end close_database


/*


// Store the result of the query
$cloud = mysql_query($pipeline, $query);

// Iterate through the result
while( $row = mysql_fetch_assoc($cloud)){
	echo '<li>' . $row['last'] . "</li>\n";

}
*/
?>