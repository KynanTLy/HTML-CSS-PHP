<!-- Include graph scripts -->
<script type="text/javascript" src="./fusionChart/fusioncharts-suite-xt/js/fusioncharts.js"></script>
<script type="text/javascript" src="./fusionChart/fusioncharts-suite-xt/js/fusioncharts.charts.js"></script>
<script type="text/javascript" src="./fusionChart/fusioncharts-suite-xt/js/themes/fusioncharts.theme.ocean.js"></script>

<!-- Include library -->
<?php
        //include library
        include "./review.php";
        include("./fusionChart/php-wrapper/fusioncharts.php");

?>
<!-- End include -->

<!DOCTYPE html>
<!-- Start HTML page -->
<html>
  <!-- Start head of HTML-->
  <head>
    <!-- Set meta data for the HTML page -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    
    <!-- Set meta data description -->
    <meta name="description" content="How did video games help you grow?">
    <meta name="author" content="Kynan Ly">
    
    <!-- Set title for HTML page -->
    <title>Games and I | About</title>
    <!-- Link style sheet -->
    <link rel="stylesheet" href="./css/style.css">
  <!-- End head of HTML -->  
  </head>

  <!-- Start body of HTML -->
  <body>
    <!-- Set header for body -->
    <header>
      <!-- Container -->
      <div class="container">

        <!-- Branding -->
        <div id="branding">
          <!-- Set main header for the body -->
          <h1> <span class="highlight">Games and You</span> What does it mean to you?</h21
        <!-- End Branding div -->
        </div>
        
        <!-- Start navigation link -->
        <nav>
          <!-- Start list of links -->
          <ul>
            <!-- Links to different pages -->
            <li><a href="index.html">Home</a></li>
            <li><a href="reviewPage.php">Review</a></li>
            <li class="current"><a href="dataVis.php">Data</a></li>

          <!-- End list of links -->
          </ul>
        <!-- End nav -->
        </nav>
      <!-- End Container -->
      </div>

    <!-- End header for body -->
    </header>

    <!-- Start section called main -->
    <section class="main">
      <!-- Start container class -->
      <div class="container">
        <!-- Start article called main-col -->
        <article id="main-col">
          <!-- Set header for article page-title-->
          <h1 class="page-title">Data Visualization</h1>
            <!-- Start the list -->
            <ul id="dataVis">
              <!-- 1st Element -->
              <li>
                <!--First Graph -->
                <h3>How many reviews there are per game</h3>
                
                <!-- Start PHP script -->
                <p>
                    <?php
                    
                    // Call function to get data in JSON for graph
                    $reviewAmountJSON = get_num_review();

                    // Create the Doughnut Graph
                    $doughnutChart = new FusionCharts("Doughnut2D", "ReviewAmount" , "100%", "450", "review-doughnut", "json", $reviewAmountJSON);

                    // Render it
                    $doughnutChart->render();

                    ?>
                    <!-- End PHP Script -->

                    <!-- Display the graph -->
                    <div id="review-doughnut"></div>

                </p>
              <!-- End 1st Graph -->    
              </li>
              <!-- Start 2nd Graph -->
              <li>
                <!-- 2nd Graph -->
                <h3>Visualizing Each Game Average Score</h3>
                <!-- Start PHP Script -->
                <p>
                     <?php

                        // Call function to get data in JSON for graph
                        $AVGScoreJSON = get_highest_avg_category();

                        // Create Errorbar graph
                        $barChart = new FusionCharts("errorbar2d", "OverallStat" , "100%", "450", "overall-scores", "json", $AVGScoreJSON);
                        
                        // Render Errorbar graph
                        $barChart->render();

                    ?>
                    <!-- End PHP Script -->

                    <!-- Display the graph -->
                    <div id="overall-scores"></div>
                </p>


              <!-- End 2nd Graph -->
              </li>
              <!-- Start 3rd Graph -->
              <li>
                <!-- 3rd Graph -->
                <h3>Amount of Games in Each Platform</h3>
                
                <!-- Start PHP Script -->
                <p>
                     <?php

                        // Call function to get data in JSON for graph
                        $gamePlatformJSON = get_num_platform();
                       
                        // Create column graph
                        $columnChart = new FusionCharts("column2D", "gameplatform" , "100%", "450", "game-platform", "json", $gamePlatformJSON);
                       
                        // Render column graph
                        $columnChart->render();

                    ?>
                    <!-- End PHP Script -->

                    <!-- Render Graph -->
                    <div id="game-platform"></div>


                </p>
              <!-- End of 3rd graph -->
              </li>
            <!-- End list -->
            </ul>
        <!-- End article in body -->
        </article>

        <!-- Start aside for contact inforamtion -->
        <aside id="sidebar">
          <!-- Start class dark -->
          <div class="dark">

                <!-- Start PHP Script -->
                <?php
        
                    // Check to see if there was a request with POST
                    if ($_SERVER['REQUEST_METHOD'] == 'POST'){

                        // Save the data into their own variables
                        $game = addslashes($_POST["gamename"]);
                        $platform = addslashes($_POST["platform"]);
                        $submit = $_POST["submit"];

                        // Call a function to handle the variables
                        echo check_add($game , $platform);
                        
                    }//end if

                // End PHP script
                ?>
           
          <!--End dark div -->
          </div>
        <!-- End aside -->
        </aside>
      <!-- End container div -->
      </div>
    <!-- End main section -->
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