<?php
  include 'Config/dbconnection.php';

  session_start();

    if (isset($_SESSION['username'])) {
        header("Location:login.php");
        exit();
    }
    
    if ($_POST) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $result = mysqli_query($conn, $sql);
        echo $conn -> error;

        if ($result->num_rows != 0) {
            $user = mysqli_fetch_assoc($result);
            $_SESSION['id'] = $user['Id'];
    
            header("Location: predict.php");
        } else {
            echo "<script>alert('Username or Password is Wrong.')</script>";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>BCP || Prediction</title>
    <link rel="stylesheet" href="/CSS/style.css" />

    <script src="/JS/script.js"></script>
  </head>
  <body>
    <nav>
      <div class="logoname">Breast Cancer Prediction</div>
      <ul>
        <li>
          <a href="index.php" >Home</a>
        </li>
        <li>
          <a href="predict.php" class="active" >Predict</a>
        </li>
        <?php if(!isset($_SESSION['id'])){
?>
                    <li><a href="login.php">Login</a></li><?php
                }else{?>
                    <li><a href="logout.php">Logout</a></li><?php
                }
                ?>
      </ul>
    </nav>
    <div class="maincontainerprediction">
      <div class="predictionBox">
        <div class="predictionHeader">
          <p>Prediction</p>
        </div>
        <form action="#" method="post" id="predict_form" >
        <label for="texture-mean">Texture Mean:</label> <br />
        <input type="number" id="texture-mean" name="" placeholder="Value : 9.71-39.28"/><br />
      
        <label for="area-mean">Area Mean:</label><br />
        <input type="number" id="area-mean" name="" placeholder="Value : 143.50-2501.00"/><br />
      
        <label for="concavity-mean">Concavity Mean:</label><br />
        <input type="number" id="concavity-mean" name="" placeholder="Value : 0.00-0.43" /><br />
      
        <label for="area-se">Area SE:</label><br />
        <input type="number" id="area-se" name="" placeholder="Value : 6.80-542.20"/><br />
      
        <label for="concavity-se">Concavity SE:</label><br />
        <input type="number" id="concavity-se" name="" placeholder="Value : 0.00-0.40"/><br />
      
        <label for="fractal-dimension-se">Fractal Dimension SE:</label><br />
        <input type="number" id="fractal-dimension-se" name="" placeholder="Value : 0.00-0.03" /><br />
      
        <label for="smoothness-worst">Smoothness Worst:</label><br />
        <input type="number" id="smoothness-worst" name="" placeholder="Value : 0.07-0.22"/><br />
      
        <label for="concavity-worst">Concavity Worst:</label><br />
        <input type="number" id="concavity-worst" name="" placeholder="Value : 0.00-1.25"/><br />
      
        <label for="symmetry-worst">Symmetry Worst:</label><br />
        <input type="number" id="symmetry-worst" name="" placeholder="Value : 0.16-0.66"/><br />
      
        <label for="fractal-dimension-worst">Fractal Dimension Worst:</label><br />
        <input type="number" id="fractal-dimension-worst" name="" placeholder="Value : 0.06-0.21"/><br />

        <input type="submit" class="predictbtn" value="Predict"> 
          <!-- <button class="loginbtn" >Login</button> -->
        </form>
      </div>
    </div>
    <footer>
      <p>Copyright &copy; 2020 | All Rights Reserved by Breast Cancer Prediction</p>
  </footer>
  </body>
</html>