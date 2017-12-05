<!-- Add Doctype -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/ DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<!-- Start head -->
	<head>
		<!-- Meta Data -->
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

		<!-- Set Title -->
		<title>Registration</title>

		<!-- Set style -->
		<style type="text/css" media="screen"> .error { color: red; } </style>


	<!-- End Head -->
	</head>
	<!-- Start body -->
	<body>

		<!-- Set header for the page -->
		<h1>Registration Results</h1>
		<!-- Start PHP Script -->
		<?php 
			// Error Reporting
			error_reporting (E_ALL | E_STRICT);

			// Display any errors
			ini_set ('display_errors', 1);

			// Successful Registration Variable
			$sucess = TRUE;

			// Valdiate email
			if (empty($_POST['email'])) {

				// Print error
				print '<p class="error">Please enter your email address.</p>';

				// Registration is not successful
				$sucess = FALSE;

			}//end email validation

			// Valdiate password exist
			if (empty($_POST['password']) or  empty($_POST['confirm'])) {

				// Print error
				print '<p class="error">One or more of the passwords were not entered.</p>';

				// Registration is not successful
				$sucess = FALSE;

			// Check to see if password match
			} else if ($_POST['password'] != $_POST['confirm']) {

				print '<p class="error">Your confirmed password does not match the original password.</p>';

				$sucess = FALSE;
			}//end password match


			// Validate the birth year:
			try {

				// Try to convert the string to a date
    			$date = new DateTime($_POST["date"]);

    			$current_date = new DateTime();

    			// Check to see if the date exist already
    			if ($date > $current_date){

    				print '<p class="error">Please enter a valid date</p>';
    			}//end if check date

			} catch (Exception $e) {
    		
				print '<p class="error">Please enter a valid date in the format YYYY-MM-DD </p>';

				$sucess = FALSE;

			}//end Date try catch

			// Validate colour
			if ($_POST['color'] === '') {
				
				print '<p class="error">You must choose a colour.</p>';
				
				$sucess = FALSE;
			}//end validate colour


			// Validate terms
			if (!isset($_POST['terms']) AND ($_POST['terms'] == 'Yes')) {
				
				print '<p class="error">You must accept the terms.</p>';
				
				$sucess = FALSE;
			}//end validate terms


			// Successful Registration
			if ($sucess) {

				print '<p>You have been successfully registered (but not really).</p>';

			}//end Successful Registration

		//End PHP Script
		?>
	<!-- End body -->
	</body>
<!-- End HTML -->
</html>