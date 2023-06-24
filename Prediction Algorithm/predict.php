<?php

// Function to train the logistic regression model
function trainModel($data, $labels, $learningRate, $numEpochs) {
    // Initialize weights
    $numFeatures = count($data[0]);
    $weights = array_fill(0, $numFeatures, 0);

    // Perform gradient descent
    for ($epoch = 0; $epoch < $numEpochs; $epoch++) {
        $gradient = array_fill(0, $numFeatures, 0);

        // Calculate gradient for each data point
        for ($i = 0; $i < count($data); $i++) {
            $prediction = predictSample($data[$i], $weights);
            $error = $labels[$i] - $prediction;

            // Update gradient
            for ($j = 0; $j < $numFeatures; $j++) {
                $gradient[$j] += $error * $data[$i][$j];
            }
        }

        // Update weights using gradient descent
        for ($j = 0; $j < $numFeatures; $j++) {
            $weights[$j] += $learningRate * $gradient[$j];
        }
    }

    return $weights;
}

// Function to predict the outcome for a single sample
function predictSample($sample, $weights) {
    $prediction = 0;
    $numFeatures = count($sample);

    // Calculate weighted sum
    for ($i = 0; $i < $numFeatures; $i++) {
        $prediction += $sample[$i] * $weights[$i];
    }

    // Apply sigmoid function
    $prediction = 1 / (1 + exp(-$prediction));

    return $prediction;
}

// Collect user input from the form
$textureMean = $_POST['textureMean'];
$radiusMean = $_POST['radiusMean'];
$perimeterMean = $_POST['perimeterMean'];
$areaMean = $_POST['areaMean'];
$smoothnessMean = $_POST['smoothnessMean'];
$compactnessMean = $_POST['compactnessMean'];
$concavityMean = $_POST['concavityMean'];
$concaveMean = $_POST['concaveMean'];
$symmetryMean = $_POST['symmetryMean'];
$fractalDimensionMean = $_POST['fractalDimensionMean'];

$textureSe = $_POST['textureSe'];
$radiusSe = $_POST['radiusSe'];
$perimeterSe = $_POST['perimeterSe'];
$areaSe = $_POST['areaSe'];
$smoothnessSe = $_POST['smoothnessSe'];
$compactnessSe = $_POST['compactnessSe'];
$concavitySe = $_POST['concavitySe'];
$concaveSe = $_POST['concaveSe'];
$symmetrySe = $_POST['symmetrySe'];
$fractalDimensionSe = $_POST['fractalDimensionSe'];

$textureWorst = $_POST['textureWorst'];
$radiusWorst = $_POST['radiusWorst'];
$perimeterWorst = $_POST['perimeterWorst'];
$areaWorst = $_POST['areaWorst'];
$smoothnessWorst = $_POST['smoothnessWorst'];
$compactnessWorst = $_POST['compactnessWorst'];
$concavityWorst = $_POST['concavityWorst'];
$concaveWorst = $_POST['concaveWorst'];
$symmetryWorst = $_POST['symmetryWorst'];
$fractalDimensionWorst = $_POST['fractalDimensionWorst'];

// Load the dataset from a file
$filename = 'breast-cancer.csv'; // Replace with the actual filename and path
$dataset = [];
$labels = [];

if (($handle = fopen($filename, 'r')) !== false) {
    while (($data = fgetcsv($handle, 1000, ',')) !== false) {
        $dataset[] = array_slice($data, 0, count($data) - 1); // Exclude the label from the dataset
        $labels[] = end($data); // Get the label from the last column
    }
    fclose($handle);
} else {
    die('Error: Unable to open the dataset file.');
}


// Normalize the dataset
function normalize($data) {
  $normalizedData = [];
    $numFeatures = count($data[0]);

    for ($i = 0; $i < $numFeatures; $i++) {
        $column = array_column($data, $i);
        $min = min($column);
        $max = max($column);

        foreach ($data as $j => $row) {
          $value = $row[$i];
          if (!is_numeric($value)) {
              $value = 0.0;
          } else {
              $value = floatval($value);
          }
          $normalizedData[$j][$i] = ($value - $min) / ($max - $min);
      }
  }

  return $normalizedData;
}

// Normalize the dataset
$normalizedDataset = normalize($dataset);

// Set the learning rate and number of epochs for training
$learningRate = 0.1;
$numEpochs = 1000;

// Train the logistic regression model
$weights = trainModel($normalizedDataset, $labels, $learningRate, $numEpochs);

// Perform prediction on the user input
$sample = [$textureMean, $areaMean, $concavityMean];
$normalizedSample = normalize([$sample])[0];
$prediction = predictSample($normalizedSample, $weights);

// Return the prediction as response
$response = $prediction > 0.5 ? 'Malignant' : 'Benign';
echo $response;


?>