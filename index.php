<?php
  include 'Config/dbconnection.php';
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>BCP || Home</title>
    <link rel="stylesheet" href="/CSS/style.css" />
  </head>
  <body>
    <nav>
      <div class="logoname">Breast Cancer Prediction</div>
      <ul>
        <li>
          <a href="index.php" class="active">Home</a>
        </li>
        <li>
          <a href="predict.php">Predict</a>
        </li>
        <?php
        if (isset($_SESSION['username'])) {
            // User is logged in, so show the "Logout" button
            echo '<li><a href="logout.php">Logout</a></li>';
        } else {
            // User is not logged in, so show the "Login" button
            echo '<li><a href="login.php">Login</a></li>';
        }
        ?>
      </ul>
    </nav>
    <div class="maincontainer">
      <div class="webIntro">
        <p>
          <b>Breast Cancer</b> is a disease in which cells in the breast grow out of
          control. It can occur in either one or both the breasts in both female
          and male population. <br>
          Typically, its incidence is seen in women but
          rarely it also found in men. Most females around the words will
          develop <b>Breast Cancer</b> at some point in their lives.
        </p>
      </div>
      <div class="webImg">
        <img src="/Image/Breastcancer2.png" class="breastcancerimg" width="55%" height="80%" />
      </div>
    </div>

    <footer>
        <p>Copyright &copy; 2020 | All Rights Reserved by Breast Cancer Prediction</p>
    </footer>

  </body>
</html>
