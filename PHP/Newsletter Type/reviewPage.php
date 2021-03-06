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

          	<!-- Start the form -->
			<form action="reviewPageResult.php" method="post">
				
				<!-- Start selector for game name -->
				<label class="statement">Choose a Game From Our List</label>

					<!-- Start PHP Script-->
					<?php

						// Include needed libraries
						include "./sqlManger.php";

						// Start the selector
						echo "<select name=Game_Listed class=statement>";

						// Print out the different options
						get_game_list();

						// End selectpr
						echo "</select>";
					?>
					<!-- End PHP Script -->

				<!-- Start first question for review -->
				<label class="statement">Did this game help you overcome a sad time in your life?</label>
					
					<!-- Set the list of options for 1st question -->
					<ul class='likert'>
						<li>
							<input type="radio" name="relate_sad" value="2">
							<label>Strongly agree</label>
						</li>
						<li>
							<input type="radio" name="relate_sad" value="1">
							<label>Agree</label>
						</li>
						<li>
						<input type="radio" name="relate_sad" value="0">
							<label>Neutral</label>
						</li>
						<li>
							<input type="radio" name="relate_sad" value="-1">
							<label>Disagree</label>
						</li>
						<li>
							<input type="radio" name="relate_sad" value="-2">
							<label>Strongly disagree</label>
						</li>
					</ul>	
					<!-- End list 1st question -->


				<!-- Start second question for review -->
				<label class="statement">Did this game help you overcome a time of lost in your life?</label>
					
					<!-- Set the list of for 2nd question -->
					<ul class='likert'>
						<li>
							<input type="radio" name="relate_lost" value="2">
							<label>Strongly agree</label>
						</li>
						<li>
							<input type="radio" name="relate_lost" value="1">
							<label>Agree</label>
						</li>
						<li>
						<input type="radio" name="relate_lost" value="0">
							<label>Neutral</label>
						</li>
						<li>
							<input type="radio" name="relate_lost" value="-1">
							<label>Disagree</label>
						</li>
						<li>
							<input type="radio" name="relate_lost" value="-2">
							<label>Strongly disagree</label>
						</li>
					</ul>
					<!-- End list 2nd question -->		

				<!-- Start third question for review -->
				<label class="statement">Did this game help you get through family issues?</label>
					
					<!-- Set the list of for 3rd question -->
					<ul class='likert'>
						<li>
							<input type="radio" name="relate_family" value="2">
							<label>Strongly agree</label>
						</li>
						<li>
							<input type="radio" name="relate_family" value="1">
							<label>Agree</label>
						</li>
						<li>
						<input type="radio" name="relate_family" value="0">
							<label>Neutral</label>
						</li>
						<li>
							<input type="radio" name="relate_family" value="-1">
							<label>Disagree</label>
						</li>
						<li>
							<input type="radio" name="relate_family" value="-2">
							<label>Strongly disagree</label>
						</li>
					</ul>
					<!-- End list 3rd question -->

				<!-- Start fouth question for review -->
				<label class="statement">Did this game help manage anxiety?</label>
					
					<!-- Set the list of for 4th question -->
					<ul class='likert'>
						<li>
							<input type="radio" name="relate_anxiety" value="2">
							<label>Strongly agree</label>
						</li>
						<li>
							<input type="radio" name="relate_anxiety" value="1">
							<label>Agree</label>
						</li>
						<li>
						<input type="radio" name="relate_anxiety" value="0">
							<label>Neutral</label>
						</li>
						<li>
							<input type="radio" name="relate_anxiety" value="-1">
							<label>Disagree</label>
						</li>
						<li>
							<input type="radio" name="relate_anxiety" value="-2">
							<label>Strongly disagree</label>
						</li>
					</ul>
					<!-- End list 4th question -->
					
				<!-- Start fifth question for review -->
				<label class="statement">Did this game help you gain confidence in yourself?</label>
					
					<!-- Set the list of for 5th question -->
					<ul class='likert'>
						<li>
							<input type="radio" name="relate_confidence" value="2">
							<label>Strongly agree</label>
						</li>
						<li>
							<input type="radio" name="relate_confidence" value="1">
							<label>Agree</label>
						</li>
						<li>
						<input type="radio" name="relate_confidence" value="0">
							<label>Neutral</label>
						</li>
						<li>
							<input type="radio" name="relate_confidence" value="-1">
							<label>Disagree</label>
						</li>
						<li>
							<input type="radio" name="relate_confidence" value="-2">
							<label>Strongly disagree</label>
						</li>
					</ul>
					<!-- End list 5th question -->		

				<!-- Start sixth question for review -->
				<label class="statement">Did this game help you relieve stress?</label>
					
					<!-- Set the list of for 6th question -->
					<ul class='likert'>
						<li>
							<input type="radio" name="relate_stress" value="2">
							<label>Strongly agree</label>
						</li>
						<li>
							<input type="radio" name="relate_stress" value="1">
							<label>Agree</label>
						</li>
						<li>
						<input type="radio" name="relate_stress" value="0">
							<label>Neutral</label>
						</li>
						<li>
							<input type="radio" name="relate_stress" value="-1">
							<label>Disagree</label>
						</li>
						<li>
							<input type="radio" name="relate_stress" value="-2">
							<label>Strongly disagree</label>
						</li>
					</ul>
					<!-- End list 6th question -->	

				<!-- Add a submit button -->
				<input type="submit" name="submit" value="Submit your review" />

			<!-- End Form -->
			</form>


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