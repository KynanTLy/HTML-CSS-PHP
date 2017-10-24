<!-- Add Doctype -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/ DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<!-- Start head -->
	<head>
		<!-- Meta Data -->
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

		<!-- Title of HTML page -->
		<title>Your Feedback</title>
	<!-- End Head -->
	</head>
	<!-- Start body -->
	<body>
		<!-- Start PHP Script -->
		<?php 
			//Error Reporting
			error_reporting (E_ALL | E_STRICT);

			//Display any errors
			ini_set ('display_errors', 1);

			//This handles the information given back from feedback
			//title, name, email, response, comments, and submit in $_POST

			//Grab all the information from feedback
			$title = $_POST['title'];
			$name = $_POST['name'];
			$response = $_POST['response'];
			//Stripslashes is Magic Quotes (escapes single/double quotation mark found in submitted form data)
			$comments = stripslashes($_POST['comments']);
			$email = $_POST['email'];
			$submit = $_POST['submit'];

			//Print recevied Data
			print "<p>Thank you, $title $name, for your comments.</p><p>You stated that you found this example to be '$response' and added:<br />$comments</p>";

		//End PHP Script
		?>
	<!-- End body -->
	</body>
<!-- End HTML -->
</html>