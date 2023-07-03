<?php
// Load the dataset from a CSV file
$dataset = [];
if (($handle = fopen('breast-cancer.csv', 'r')) !== false) {
    while (($data = fgetcsv($handle, 1000, ',')) !== false) {
        $dataset[] = $data;
    }
    fclose($handle);
}

// Remove the header row from the dataset
$header = array_shift($dataset);

// Convert the dataset to numerical values
$dataset = array_map(function ($row) {
    return array_map('floatval', $row);
}, $dataset);

// Separate the features (input) and labels (output)
$features = array_map(function ($row) {
    return array_slice($row, 1); // Exclude the first column (ID)
}, $dataset);

$labels = array_column($dataset, 1); // Extract the second column (diagnosis)

// Perform feature normalization
function normalize($data)
{
    $min = min($data);
    $max = max($data);
    return array_map(function ($value) use ($min, $max) {
        return ($value - $min) / ($max - $min);
    }, $data);
}

$features = array_map('normalize', array_map('array_values', array_map('array_filter', array_map('normalize', array_map('array_values', $features)))));

// Split the dataset into training and testing sets
$splitRatio = 0.7; // 70% for training, 30% for testing
$splitIndex = (int)(count($dataset) * $splitRatio);
$trainFeatures = array_slice($features, 0, $splitIndex);
$trainLabels = array_slice($labels, 0, $splitIndex);
$testFeatures = array_slice($features, $splitIndex);
$testLabels = array_slice($labels, $splitIndex);

// Logistic regression training
function sigmoid($x)
{
    return 1 / (1 + exp(-$x));
}

function trainLogisticRegression($features, $labels, $learningRate, $numIterations)
{
    $numSamples = count($features);
    $numFeatures = count($features[0]);

    $weights = array_fill(0, $numFeatures, 0);
    $bias = 0;

    for ($i = 0; $i < $numIterations; $i++) {
        $predictedLabels = [];
        $errors = [];

        // Make predictions and calculate errors
        for ($j = 0; $j < $numSamples; $j++) {
            $predictedLabel = predict($features[$j], $weights, $bias);
            $predictedLabels[] = $predictedLabel;
            $error = $labels[$j] - $predictedLabel;
            $errors[] = $error;
        }

        // Update weights and bias
        for ($k = 0; $k < $numFeatures; $k++) {
            $gradient = 0;
            for ($j = 0; $j < $numSamples; $j++) {
                $gradient += $errors[$j] * $features[$j][$k];
            }
            $weights[$k] += $learningRate * ($gradient / $numSamples);
        }

        $biasGradient = array_sum($errors) / $numSamples;
        $bias += $learningRate * $biasGradient;
    }

    return ['weights' => $weights, 'bias' => $bias];
}

function predict($features, $weights, $bias)
{
    $logit = $bias;
    for ($i = 0; $i < count($features); $i++) {
        $logit += $features[$i] * $weights[$i];
    }
    $prediction = sigmoid($logit);
    return ($prediction >= 0.5) ? 'Malignant' : 'Benign';
}

$learningRate = 0.01;
$numIterations = 1000;

$model = trainLogisticRegression($trainFeatures, $trainLabels, $learningRate, $numIterations);
$weights = $model['weights'];
$bias = $model['bias'];

// Logistic regression testing and prediction
$predictions = [];

$numTestSamples = count($testFeatures);
for ($i = 0; $i < $numTestSamples; $i++) {
    $predictedLabel = predict($testFeatures[$i], $weights, $bias);
    $predictions[] = $predictedLabel;
}

// Display the predictions
foreach ($predictions as $prediction) {
    echo $prediction . "<br>";
}
?>
