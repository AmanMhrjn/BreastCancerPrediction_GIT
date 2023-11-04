<?php
include 'Config/dbconnection.php';
include 'logistic-regression.php';

session_start();

if (!isset($_SESSION['id'])) {
  header("Location:login.php");
}

// if($_POST) {

// }
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
        <a href="index.php">Home</a>
      </li>
      <li>
        <a href="predict.php" class="active">Predict</a>
      </li>
      <?php if ($_SESSION['id']) { ?>
        <li>
          <a href="history.php">History</a>
          <a href="logout.php" >Logout</a>
        </li>
      <?php } else { ?>
        <li>
          <a href="login.php">Login</a>
        </li>
      <?php } ?>
    </ul>
  </nav>
  <div class="maincontainerprediction">
    <div class="predictionBox">
      <div class="predictionHeader">
        <p>Prediction</p>
      </div>
      <form action="logistic-regression.php" method="post" id="predict_form" onsubmit="return validateForm()">
        <div class="grid-container">


          <div>
            <label for="radiusMean">Radius Mean:</label> <br>
            <input type="number" step="0.0001" min="1.981" max="38.11" placeholder="Range from 1.981 - 38.11"
              id="radiusMean" name="radiusMean"> <!-- oninput="validateInput(this)" -->

          </div>
          <div>
            <label for="textureMean">Texture Mean:</label><br>
            <input type="number" step="0.001" min="4.71" max="49.28" placeholder="Range from 4.71 - 49.28"
              id="textureMean" name="textureMean"><br> <!-- oninput="validateInput(this)" -->

          </div>
          <div>
            <label for="perimeterMean">Perimeter Mean:</label><br>
            <input type="number" step="0.001" min="43.79" max="188.5" placeholder="Range from 43.79 - 188.5"
              id="perimeterMean" name="perimeterMean"> <!-- oninput="validateInput(this)" -->

          </div>
          <div>
            <label for="areaMean">Area Mean:</label><br>
            <input type="number" step="0.001" min="123.5" max="2510" placeholder="Range from 123.5 - 2510" id="areaMean"
              name="areaMean"><br> <!-- oninput="validateInput(this)" -->

          </div>
          <div>
            <label for="smoothnessMean">Smoothness Mean:</label><br>
            <input type="number" step="0.00001" min="0.05253" max="0.1644" placeholder="Range from 0.05253 - 0.1644"
              id="smoothnessMean" name="smoothnessMean"> <!-- oninput="validateInput(this)" -->
          </div>
          <div>
            <label for="compactnessMean">Compactness Mean:</label><br>
            <input type="number" step="0.000001" min="0.01928" max="0.3454" placeholder="Range from 0.01928 - 0.3454"
              id="compactnessMean" name="compactnessMean"><br> <!-- oninput="validateInput(this)" -->

          </div>
          <div> <label for="concavityMean">Concavity Mean:</label><br>
            <input type="number" step="0.00001" min="0" max="0.4218" placeholder="Range from 0 - 0.4218"
              id="concavityMean" name="concavityMean"> <!-- oninput="validateInput(this)" -->
          </div>
          <div>

            <label for="concaveMean">Concavepoints Mean:</label><br>
            <input type="number" step="0.00001" min="0" max="0.2022" placeholder="Range from 0 - 0.2022"
              id="concaveMean" name="concaveMean"><br> <!-- oninput="validateInput(this)" -->

          </div>
          <div>
            <label for="symmetryMean">Symmetry Mean:</label><br>
            <input type="number" step="0.0001" min="0.106" max="0.304" placeholder="Range from 0.106 - 0.304"
              id="symmetryMean" name="symmetryMean"> <!-- oninput="validateInput(this)" -->

          </div>
          <div>
            <label for="fractalDimensionMean">Fractal Dimension Mean:</label><br>
            <input type="number" step="0.0000001" min="0.051096" max="1.09754"
              placeholder="Range from 0.51096 - 1.09754" id="fractalDimensionMean" name="fractalDimensionMean"><br>
            <!-- oninput="validateInput(this)" -->

          </div>
          <div>
            <label for="radiusSe">Radius SE:</label><br>
            <input type="number" step="0.000001" min="0.1105" max="5.973" placeholder="Range from 0.1105 - 5.973"
              id="radiusSe" name="radiusSe"> <!-- oninput="validateInput(this)" -->

          </div>
          <div>
            <label for="textureSe">Texture SE:</label><br>
            <input type="number" step="0.00001" min="0.5390" max="5.895" placeholder="Range from 0.5390 - 5.895"
              id="textureSe" name="textureSe"><br> <!-- oninput="validateInput(this)" -->

          </div>
          <div>
            <label for="perimeterSe">Perimeter SE:</label><br>
            <input type="number" step="0.0001" min="0.747" max="23.98" placeholder="Range from 0.747 - 23.98"
              id="perimeterSe" name="perimeterSe"> <!-- oninput="validateInput(this)" -->

          </div>
          <div>
            <label for="areaSe">Area SE:</label><br>
            <input type="number" step="0.0001" id="areaSe" min="5.802" placeholder="Range from 5.802 - 552.2"
              max="552.2" name="areaSe"><br> <!-- oninput="validateInput(this)" -->

          </div>
          <div>
            <label for="smoothnessSe">Smoothness SE:</label><br>
            <input type="number" step="0.000001" min="0.00161" max="0.03123" placeholder="Range from 0.00161 - 0.03123"
              id="smoothnessSe" name="smoothnessSe"> <!-- oninput="validateInput(this)" -->

          </div>
          <div>
            <label for="compactSe">Compactness SE:</label><br>
            <input type="number" step="0.000001" min="0.00125" max="0.1364" placeholder="Range from 0.00125 - 0.1364"
              id="compactSe" name="compactSe"><br> <!-- oninput="validateInput(this)" -->
          </div>
          <div>
            <label for="concavitySe">Concavity SE:</label><br>
            <input type="number" step="0.00001" min="0" max="0.406" placeholder="Range from 0 - 0.406" id="concavitySe"
              name="concavitySe"> <!-- oninput="validateInput(this)" -->
          </div>
          <div>
            <label for="concaveSe">Concave Points SE:</label><br>
            <input type="number" step="0.000001" min="0" max="0.05289" placeholder="Range from 0 - 0.05289"
              id="concaveSe" name="concaveSe"><br> <!-- oninput="validateInput(this)" -->
          </div>
          <div>
            <label for="SymmetrySe">Symmetry SE:</label><br>
            <input type="number" step="0.000001" min="0.00688" max="0.07905" placeholder="Range from 0.00688 - 0.07905"
              id="SymmetrySe" name="SymmetrySe"> <!-- oninput="validateInput(this)" -->
          </div>
          <div>
            <label for="fractalDimensionSe">Fractal Dimension SE:</label><br>
            <input type="number" step="0.000001" min="0.00079" max="0.02994" placeholder="Range from 0.00079 - 0.02994"
              id="fractalDimensionSe" name="fractalDimensionSe"><br> <!-- oninput="validateInput(this)" -->
          </div>
          <div>
            <label for="radiusWorst">Radius Worst:</label><br>
            <input type="number" step="0.001" min="7.83" max="47.04" placeholder="Range from 7.83 - 47.04"
              id="radiusWorst" name="radiusWorst"> <!-- oninput="validateInput(this)" -->
          </div>
          <div>
            <label for="textureWorst">Texture Worst:</label><br>
            <input type="number" step="0.01" min="8.02" max="50.54" placeholder="Range from 8.02 - 50.54"
              id="textureWorst" name="textureWorst"><br> <!-- oninput="validateInput(this)" -->
          </div>
          <div>
            <label for="perimeterWorst">Perimeter Worst:</label><br>
            <input type="number" step="0.01" min="45.41" max="261.2" placeholder="Range from 45.41 - 261.2"
              id="perimeterWorst" name="perimeterWorst"> <!-- oninput="validateInput(this)" -->
          </div>
          <div>
            <label for="areaWorst">Area Worst:</label><br>
            <input type="number" step="0.01" min="175.41" max="4264" placeholder="Range from 175.41 - 4264"
              id="areaWorst" name="areaWorst"><br> <!-- oninput="validateInput(this)" -->
          </div>
          <div>
            <label for="smoothnessWorst">Smoothness Worst:</label><br>
            <input type="number" step="0.000001" max="0.2326" mih="0.06017" placeholder="Range from 0.06017 - 0.2326"
              id="smoothnessWorst" name="smoothnessWorst"> <!-- oninput="validateInput(this)" -->
          </div>
          <div>
            <label for="compactWorst">Compactness Worst:</label><br>
            <input type="number" step="0.00001" min="0.02700" max="1.058" placeholder="Range from 0.02700 - 1.058"
              id="compactWorst" name="compactWorst"><br> <!-- oninput="validateInput(this)" -->
          </div>
          <div>
            <label for="concavityWorst">Concavity Worst:</label><br>
            <input type="number" step="0.00001" min="0" max="1.262" placeholder="Range from 0 - 1.262"
              id="concavityWorst" name="concavityWorst"> <!-- oninput="validateInput(this)" -->
          </div>
          <div>
            <label for="concaveWorst">Concave Points Worst:</label><br>
            <input type="number" step="0.000001" min="0" max="0.301" placeholder="Range from 0 - 0.301"
              id="concaveWorst" name="concaveWorst"><br> <!-- oninput="validateInput(this)" -->
          </div>
          <div>
            <label for="symmetryWorst">Symmetry Worst:</label><br>
            <input type="number" step="0.00001" min="0.1555" max="0.6648" placeholder="Range from 0.1555 - 0.6648"
              id="symmetryWorst" name="symmetryWorst"> <!-- oninput="validateInput(this)" -->
          </div>
          <div>
            <label for="fractalDimensionWorst">Fractal Dimension Worst:</label><br>
            <input type="number" step="0.000001" min="0.05404" max="0.2085" placeholder="Range from 0.05404 - 0.2085"
              id="fractalDimensionWorst" name="fractalDimensionWorst"><br> <!-- oninput="validateInput(this)" -->
            <!-- onchange="checkRange();" -->
          </div>
        </div>
        <input type="submit" class="predictbtn" value="Predict">

      </form>
    </div>
  </div>
  <footer>
    <p>Copyright &copy; 2020 | All Rights Reserved by Breast Cancer Prediction</p>
  </footer>
</body>

</html>