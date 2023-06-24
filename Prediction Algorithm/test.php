<?
  include 'predict.php';
?>
<!DOCTYPE html>
<html>
<head>
  <title>Breast Cancer Prediction</title>
</head>
<body>
  <h1>Breast Cancer Prediction</h1>
  
  <form id="predictionForm">
    <label for="radiusMean">Radius Mean:</label>
    <input type="number" id="radiusMean" name="radiusMean"><br>

    <label for="textureMean">Texture Mean:</label>
    <input type="number" id="textureMean" name="textureMean"><br>

    <label for="perimeterMean">Perimeter Mean:</label>
    <input type="number" id="perimeterMean" name="perimeterMean"><br>

    <label for="areaMean">Area Mean:</label>
    <input type="number" id="areaMean" name="areaMean"><br>

    <label for="smoothnessMean">Smoothness Mean:</label>
    <input type="number" id="smoothnessMean" name="smoothnessMean"> <br>

    <label for="compactnessMean">Compactness Mean:</label>
    <input type="number" id="compactnessMean" name="compactnessMean"><br>

    <label for="concavityMean">Concavity Mean:</label>
    <input type="number" id="concavityMean" name="concavityMean"><br>

    <label for="concaveMean">Concavepoints Mean:</label>
    <input type="number" id="concaveMean" name="concaveMean"><br>

    <label for="symmetryMean">Symmetry Mean:</label>
    <input type="number" id="symmetryMean" name="symmetryMean"><br>

    <label for="fractalDimensionMean">Fractal Dimension Mean:</label>
    <input type="number" id="fractalDimensionMean" name="fractalDimensionMean"><br>

    <label for="radiusSe">Radius SE:</label>
    <input type="number" id="radiusSe" name="radiusSe"><br>

    <label for="textureSe">Texture SE:</label>
    <input type="number" id="textureSe" name="textureSe"><br>
    
    <label for="perimeterMean">Perimeter SE:</label>
    <input type="number" id="perimeterMean" name="perimeterMean"><br>

    <label for="areaSe">Area SE:</label>
    <input type="number" id="areaSe" name="areaSe"><br>

    <label for="smoothnessSe">Smoothness SE:</label>
    <input type="number" id="smoothnessSe" name="smoothnessSe"><br>

    <label for="compactSe">Compactness SE:</label>
    <input type="number" id="compactSe" name="compactSe"><br>

    <label for="concavitySe">Concavity SE:</label>
    <input type="number" id="concavitySe" name="concavitySe"><br>

    <label for="concaveSe">Concave Points SE:</label>
    <input type="number" id="concaveSe" name="concaveSe"><br>

    <label for="SymmetrySe">Symmetry SE:</label>
    <input type="number" id="SymmetrySe" name="SymmetrySe"><br>

    <label for="fractalDimensionSe">Fractal Dimension SE:</label>
    <input type="number" id="fractalDimensionSe" name="fractalDimensionSe"><br>

    <label for="radiusWorst">Radius Worst:</label>
    <input type="number" id="radiusWorst" name="radiusWorst"><br>

    <label for="textureWorst">Texture Worst:</label>
    <input type="number" id="textureWorst" name="textureWorst"><br>
    
    <label for="perimeterWorst">Perimeter Worst:</label>
    <input type="number" id="perimeterWorst" name="perimeterWorst"><br>

    <label for="areaWorst">Area Worst:</label>
    <input type="number" id="areaWorst" name="areaWorst"><br>
  
    <label for="smoothnessWorst">Smoothness Worst:</label>
    <input type="number" id="smoothnessWorst" name="smoothnessWorst"><br>

    <label for="compactWorst">Compactness Worst:</label>
    <input type="number" id="compactWorst" name="compactWorst"><br>

    <label for="concavityWorst">Concavity Worst:</label>
    <input type="number" id="concavityWorst" name="concavityWorst"><br>

    <label for="concaveWorst">Concave Points Worst:</label>
    <input type="number" id="concaveWorst" name="concaveWorst"><br>

    <label for="symmetryWorst">Symmetry Worst:</label>
    <input type="number" id="symmetryWorst" name="symmetryWorst"><br>

    <label for="fractalDimensionWorst">Fractal Dimension Worst:</label>
    <input type="number" id="fractalDimensionWorst" name="fractalDimensionWorst"><br>

    <!-- <button type="button" onclick="predictCancer()">Predict</button> -->

    <input type="submit" value="Predict">
  </form>

  <div id="result"></div>

  <script>
    // function predictCancer() {
    //   const radiusMean = parseFloat(document.getElementById("radiusMean").value);
    //   const textureMean = parseFloat(document.getElementById("textureMean").value);
    //   const perimeterMean = parseFloat(document.getElementById("perimeterMean").value);
    //   const areaMean = parseFloat(document.getElementById("areaMean").value);
    //   const smoothnessMean = parseFloat(document.getElementById("smoothnessMean").value);
    //   const compactnessMean = parseFloat(document.getElementById("compactnessMean").value);
    //   const concavityMean = parseFloat(document.getElementById("concavityMean").value);
    //   const concaveMean = parseFloat(document.getElementById("concaveMean").value);
    //   const symmetryMean = parseFloat(document.getElementById("symmetryMean").value);
    //   const fractalDimensionMean = parseFloat(document.getElementById("fractalDimensionMean").value);
    //   const radiusSe = parseFloat(document.getElementById("radiusSe").value);
    //   const textureSe = parseFloat(document.getElementById("textureSe").value);
    //   const perimeterSe = parseFloat(document.getElementById("perimeterSe").value);
    //   const areaSe = parseFloat(document.getElementById("areaSe").value);
    //   const smoothnessSe = parseFloat(document.getElementById("smoothnessSe").value);
    //   const compactSe = parseFloat(document.getElementById("compactSe").value);
    //   const concavitySe = parseFloat(document.getElementById("concavitySe").value);
    //   const concaveSe = parseFloat(document.getElementById("concaveSe").value);
    //   const symmetrySe = parseFloat(document.getElementById("symmetrySe").value);
    //   const fractalDimensionSe = parseFloat(document.getElementById("fractalDimensionSe").value);
    //   const radiusWorst = parseFloat(document.getElementById("radiusWorst").value);
    //   const textureWorst = parseFloat(document.getElementById("textureWorst").value);
    //   const perimeterWorst = parseFloat(document.getElementById("perimeterWorst").value);
    //   const areaWorst = parseFloat(document.getElementById("areaWorst").value);
    //   const smoothnessWorst = parseFloat(document.getElementById("smoothnessWorst").value);
    //   const compactWorst = parseFloat(document.getElementById("compactWorst").value);
    //   const concavityWorst = parseFloat(document.getElementById("concavityWorst").value);
    //   const concaveWorst = parseFloat(document.getElementById("concaveWorst").value);
    //   const symmetryWorst = parseFloat(document.getElementById("symmetryWorst").value);
    //   const fractalDimensionWorst = parseFloat(document.getElementById("fractalDimensionWorst").value);

    //   const testData = [radiusMean, textureMean, perimeterMean, areaMean, smoothnessMean, compactnessMean, concavityMean,
    //   concaveMean, symmetryMean, fractalDimensionMean, radiusSe, textureSe, perimeterSe, areaSe, smoothnessSe, compactSe,
    //   concavitySe, concaveSe, symmetrySe, fractalDimensionSe, radiusWorst, textureWorst, perimeterWorst, areaWorst, smoothnessWorst,
    //   compactWorst, concavityWorst, concaveWorst, symmetryWorst, fractalDimensionWorst];

    //   // Send the data to PHP using AJAX
    //   const xhr = new XMLHttpRequest();
    //   xhr.open("POST", "predict.php", true);
    //   xhr.setRequestHeader("Content-Type", "application/json");
    //   xhr.onreadystatechange = function() {
    //     if (xhr.readyState === 4 && xhr.status === 200) {
    //       const resultDiv = document.getElementById("result");
    //       resultDiv.innerHTML = "Prediction: " + xhr.responseText;
    //     }
    //   };
    //   xhr.send(JSON.stringify(testData));
    // }


    document.querySelector('#predictionForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent form submission

    // Get the form data
    var formData = new FormData(this);

    // Send AJAX request to the PHP script
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'predict.php', true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            // Display the prediction result
            document.getElementById('result').textContent = 'Prediction: ' + xhr.responseText;
        }
    };
    xhr.send(formData);
});
  </script>
</body>
</html>