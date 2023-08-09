<?php
  include 'Config/dbconnection.php';

  session_start();

    if (isset($_SESSION['username'])) {
        header("Location:login.php");
        exit();
    }
    
    if ($_POST){
      $radius_mean = $_POST['radiusMean'];
      $texture_mean = $_POST['textureMean'];
      $perimeter_mean = $_POST['perimeterMean'];
      $area_mean = $_POST['areaMean'];
      $smoothness_mean = $_POST['smoothnessMean'];
      $compactness_mean = $_POST['compactnessMean'];
      $concavity_mean = $_POST['concavityMean'];
      $concave_points_mean = $_POST['concaveMean'];
      $symmetry_mean = $_POST['symmetryMean'];
      $fractal_dimension_mean = $_POST['fractalDimensionMean'];
      $radius_se = $_POST['radiusSe'];
      $texture_se = $_POST['textureSe'];
      $perimeter_se = $_POST['perimeterSe'];
      $area_se = $_POST['areaSe'];
      $smoothness_se = $_POST['smoothnessSe'];
      $compactness_se = $_POST['compactSe'];
      $concavity_se = $_POST['concavitySe'];
      $concave_points_se = $_POST['concaveSe'];
      $symmetry_se = $_POST['SymmetrySe'];
      $fractal_dimension_se = $_POST['fractalDimensionSe'];
      $radius_worst = $_POST['radiusWorst'];
      $texture_worst = $_POST['textureWorst'];
      $perimeter_worst = $_POST['perimeterWorst'];
      $area_worst = $_POST['areaWorst'];
      $smoothness_worst = $_POST['smoothnessWorst'];
      $compactness_worst = $_POST['compactWorst'];
      $concavity_worst = $_POST['concavityWorst'];
      $concave_points_worst = $_POST['concaveWorst'];
      $symmetry_worst = $_POST['symmetryWorst'];
      $fractal_dimension_worst = $_POST['fractalDimensionWorst'];
      // $diagnosis = $_POST[''];
     
      
          // $sql = "SELECT * FROM history WHERE username='$username' AND password='$password' ";
          // $result = mysqli_query($conn, $sql);
          // echo $conn -> error;
          if ($result->num_rows == 0) {
              $sql = "INSERT INTO history(radius_mean, texture_mean, perimeter_mean, area_mean, 
              smoothness_mean, compactness_mean, concavity_mean, concave points_mean, symmetry_mean, fractal_dimension_mean, radius_se, texture_se, perimeter_se, area_se, 
              smoothness_se, compactness_se, concavity_se, concave points_se, symmetry_se, fractal_dimension_se, radius_worst, texture_worst, perimeter_worst, area_worst, smoothness_worst, compactness_worst, 
              concavity_worst, concave points_worst, symmetry_worst, fractal_dimension_worst
              ) VALUES ('$radius_mean', '$texture_mean', '$perimeter_mean', '$area_mean', '$smoothness_mean',  '$compactness_mean', '$concavity_mean', '$concave_points_mean', '$symmetry_mean', '$fractal_dimension_mean',
              '$radius_se', '$texture_se', '$perimeter_se', '$area_se', '$smoothness_se','$compactness_se', '$concavity_se', '$concave_points_se', '$symmetry_se', '$fractal_dimension_se','$radius_worst', '$texture_worst', '$perimeter_worst', '$area_worst', '$smoothness_worst',
              '$compactness_worst', '$concavity_worst', '$concave_points_worst', '$symmetry_worst', '$fractal_dimension_worst')";
              $result = mysqli_query($conn, $sql);
              
          //     if ($result) {
          //         echo "<script>alert('User Registration Completed.')</script>";
          //         header("Location: login.php");
          //     } else {
          //         echo "<script>alert('Something Wrong Went.')</script>";
          //     }
          // else {
          //     echo "<script>alert('Email Already Exists.')</script>";
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
        <form action="logistic-regression.php" method="post" id="predict_form" >
          
          <label for="radiusMean">Radius Mean:</label> <br>
          <input type="text" step="any" id="radiusMean" name="radiusMean"><br>

          <label for="textureMean">Texture Mean:</label><br>
          <input type="text" id="textureMean" name="textureMean"><br>

          <label for="perimeterMean">Perimeter Mean:</label><br>
          <input type="text" id="perimeterMean" name="perimeterMean"><br>

          <label for="areaMean">Area Mean:</label><br>
          <input type="text" id="areaMean" name="areaMean"><br>

          <label for="smoothnessMean">Smoothness Mean:</label><br>
          <input type="text" id="smoothnessMean" name="smoothnessMean"> <br>

          <label for="compactnessMean">Compactness Mean:</label><br>
          <input type="text" id="compactnessMean" name="compactnessMean"><br>

          <label for="concavityMean">Concavity Mean:</label><br>
          <input type="text" id="concavityMean" name="concavityMean"><br>

          <label for="concaveMean">Concavepoints Mean:</label><br>
          <input type="text" id="concaveMean" name="concaveMean"><br>

          <label for="symmetryMean">Symmetry Mean:</label><br>
          <input type="text" id="symmetryMean" name="symmetryMean"><br>

          <label for="fractalDimensionMean">Fractal Dimension Mean:</label><br>
          <input type="text" id="fractalDimensionMean" name="fractalDimensionMean"><br>

          <label for="radiusSe">Radius SE:</label><br>
          <input type="text" id="radiusSe" name="radiusSe"><br>

          <label for="textureSe">Texture SE:</label><br>
          <input type="text" id="textureSe" name="textureSe"><br>
          
          <label for="perimeterSe">Perimeter SE:</label><br>
          <input type="text" id="perimeterSe" name="perimeterSe"><br>

          <label for="areaSe">Area SE:</label><br>
          <input type="text" id="areaSe" name="areaSe"><br>

          <label for="smoothnessSe">Smoothness SE:</label><br>
          <input type="text" id="smoothnessSe" name="smoothnessSe"><br>

          <label for="compactSe">Compactness SE:</label><br>
          <input type="text" id="compactSe" name="compactSe"><br>

          <label for="concavitySe">Concavity SE:</label><br>
          <input type="text" id="concavitySe" name="concavitySe"><br>

          <label for="concaveSe">Concave Points SE:</label><br>
          <input type="text" id="concaveSe" name="concaveSe"><br>

          <label for="SymmetrySe">Symmetry SE:</label><br>
          <input type="text" id="SymmetrySe" name="SymmetrySe"><br>

          <label for="fractalDimensionSe">Fractal Dimension SE:</label><br>
          <input type="text" id="fractalDimensionSe" name="fractalDimensionSe"><br>

          <label for="radiusWorst">Radius Worst:</label><br>
          <input type="text" id="radiusWorst" name="radiusWorst"><br>

          <label for="textureWorst">Texture Worst:</label><br>
          <input type="text" id="textureWorst" name="textureWorst"><br>
          
          <label for="perimeterWorst">Perimeter Worst:</label><br>
          <input type="text" id="perimeterWorst" name="perimeterWorst"><br>

          <label for="areaWorst">Area Worst:</label><br>
          <input type="text" id="areaWorst" name="areaWorst"><br>
        
          <label for="smoothnessWorst">Smoothness Worst:</label><br>
          <input type="text" id="smoothnessWorst" name="smoothnessWorst"><br>

          <label for="compactWorst">Compactness Worst:</label><br>
          <input type="text" id="compactWorst" name="compactWorst"><br>

          <label for="concavityWorst">Concavity Worst:</label><br>
          <input type="text" id="concavityWorst" name="concavityWorst"><br>

          <label for="concaveWorst">Concave Points Worst:</label><br>
          <input type="text" id="concaveWorst" name="concaveWorst"><br>

          <label for="symmetryWorst">Symmetry Worst:</label><br>
          <input type="text" id="symmetryWorst" name="symmetryWorst"><br>

          <label for="fractalDimensionWorst">Fractal Dimension Worst:</label><br>
          <input type="text" id="fractalDimensionWorst" name="fractalDimensionWorst"><br>

          <input type="submit" class="predictbtn" value="Predict"> 
        </form>
      </div>
    </div>
    <footer>
      <p>Copyright &copy; 2020 | All Rights Reserved by Breast Cancer Prediction</p>
  </footer>
  </body>
</html>