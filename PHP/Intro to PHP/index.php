<!DOCTYPE html>
<!-- Set the language to english -->
<html lang=en>

<head>
	<meta charset=utf-8>
	<!-- Set the tab name -->
	<title>This is the intro to creating a webpage</title>

  <link rel="stylesheet" type="text/css" href="style.css">

</head>

<!-- Learning PHP -->
<body>

<h1> Printing something </h1>

<?php
	echo "Hello World!\n";
	echo date('l j F Y g:i:s');
	print "Goodbye";

	print "<span style=\"font-weight:bold;\">Hello, world!</span>"; 

	//tems within single quotation marks are treated literally; items within double quotation marks are extrapolated.

	// Single or double quotation marks won't matter here:
	$first_name = 'Larry';
	$last_name = "Ullman";

	// Single or double quotation marks DOES matter here:
	$name1 = '$first_name $last_name';
	$name2 = "$first_name $last_name";

	// Single or double quotation marks DOES matter here:
	print "<h1>Double Quotes</h1><p>name1 is $name1 <br /> name2 is $name2</p>";
	print '<h1>Single Quotes</h1><p>name1 is $name1 <br /> name2 is $name2</p>';

	//define a constant to hello
	define('SOMEVARIABLE', "Hello");

?>

</body>



<!-- End of the webpage -->
</html>
