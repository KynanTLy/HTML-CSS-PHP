<!DOCTYPE html>
<html>
  <!-- Start of the head of the HTML -->
  <head>
    <!-- Set the meta data for the HTML -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <!-- Description about the page -->
    <meta name="description" content="Gathering how video games been a postive on you">
    <meta name="author" content="Kynan Ly">

    <!-- Title for the HTML page -->
    <title>The Goal</title>

    <!-- Link the style sheets -->
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/font-awesome.min.css">
  <!-- End head of the HTML-->
  </head>

  <!-- Body of the HTML page -->
  <body>
    <!-- Header of the body -->
    <header>
      <!-- Container div for body -->
      <div class="container">
        <!-- branding header -->
        <div id="branding">
          <!-- Header for branding id -->
          <h1><span class="highlight">Games and You</span> What does it mean to you?</h1>
        <!-- End branding div -->
        </div>

        <!-- Navigation Bar -->
        <nav>
          <!-- List of the navigation list -->
          <ul>
            <!-- List of links -->
            <li> <a href="index.html">Home</a></li>
            <li class="current"><a href="reviewPage.php">Review</a></li>
            <li><a href="dataVis.php">Data</a></li>
          <!-- End of navigation list -->
          </ul>
        <!-- End navigation -->
        </nav>
      <!-- End container div -->
      </div>
    <!-- End header of the body -->
    </header>

    <!-- Start section called main -->
    <section class="main">
      <!-- Start main container -->
      <div class="container">
        <!-- Create article with id main-col -->
        <article id="main-col">
          <!-- Create header for article -->
          <h1 class="page-title">
            Tell Us About A Game
          </h1>
          <!-- Information about the review page -->
          <p>
            There are many games out there and each person has their own favourite game or ones that mean the most to them. So tell us about your game to help build this collection!
          </p>
          <!-- End of the first paragraph of page-title -->

          <!-- Secondary paragraph -->
          <p class="dark">
          </p>

          	<!-- Start PHP Script for result message -->
          	<?php
	
				//include library
				include "./review.php";

				// Check to see if there was a request with POST
				if ($_SERVER['REQUEST_METHOD'] == 'POST'){

					// Save the data into their own variables

					$game = $_POST["Game_Listed"];
					$overall = $_POST['overall'];
					$relate_sad = $_POST["relate_sad"];
					$relate_lost = $_POST["relate_lost"];
					$relate_family = $_POST["relate_family"];
					$relate_anxiety = $_POST["relate_anxiety"];
					$relate_confidence = $_POST["relate_confidence"];
					$relate_stress = $_POST["relate_stress"];
					$note = addslashes($_POST["note"]);
					$submit = $_POST["submit"];

					// Call function to handle the variables
					echo check_input($game, $overall, $relate_sad, $relate_lost, $relate_family, $relate_anxiety, $relate_confidence, $relate_stress, $note);
					
					}//end if

			// End PHP script
			?>


          <!-- End of 2nd paragraph of page-title -->

        <!-- End article -->
        </article>

        <!-- Start of aside (it defines content aside from the content it is placed in) -->
        <aside id="sidebar">
          <!-- Set the div to dark -->
          <div class="dark">
            <!-- Header for the div in sidebar -->
            <h3>Feel Safe Telling Us!</h3>
            <!-- body for div of sidebar -->
            <p>This is an anonymous review! Therefore feel free to tell us what you honesstly feel about each game. No one will know what you rated or wrote as a note.  
            <!-- End of paragraph of div of sidebar -->
            </p>
          <!-- End the div in sidebar-->
          </div>
        <!-- End aside sidebar -->  
        </aside>
      <!-- End main container -->
      </div>

    <!-- End section main -->
    </section>

    <!-- Start footer -->
    <footer>
      <p>Kynan Ly</p>
    <!-- End footer -->
    </footer>

  <!-- End body of HTML -->
  </body>
<!-- End HTML -->
</html>