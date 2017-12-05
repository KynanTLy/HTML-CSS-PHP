<!-- Add Doctype -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/ DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<!-- Start head -->
	<head>
		<!-- Meta Data -->
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

		<!-- Title of HTML page -->
		<title>Cost Calculator</title>

		<!-- Start style sheet for results -->
		<style type="text/css" media="screen">
			.number { font-weight: bold; }
		</style>


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

			//Retrieve variable from post
			$price = $_POST['price'];
			$quantity = $_POST['quantity'];
			$discount = $_POST['discount'];
			$tax = $_POST['tax'];
			$shipping = $_POST['shipping'];
			$payments = $_POST['payments'];

			//Do the calculation needed
			$total = ($price * $quantity) + $shipping - $discount;

			//Apply tax
			$taxrate = ($tax/100) + 1;
			$total = $total * $taxrate;

			//Calculate monthly payment
			$monthly = round ($total / $payments, 2);

			//Print results 
			print "
			<p>You have selected to purchase:<br /> <span class=\"number\">$quantity </span> widget(s) at <br />$<span class=\"number\">$price </span> price each plus a <br /> $<span class=\"number\">$shipping </span> shipping cost and a <br /> <span class=\"number\">$tax</span> percent tax rate.<br /> After your $<span class=\"number\"> $discount</span> discount, the total cost is $<span class=\"number\">$total </span>.<br /> Divided over <span class=\"number\"> $payments</span> monthly payments, that would be $<span class=\"number\">$monthly</span> each.</p>";
		//End PHP Script
		?>
	<!-- End body -->
	</body>
<!-- End HTML -->
</html>