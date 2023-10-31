<?php
class LogisticRegression
{
    private $weights;
    private $learningRate;
    private $numIterations;

    public function __construct($learningRate = 0.01, $numIterations = 1000)
    {
        $this->learningRate = $learningRate; 
        $this->numIterations = $numIterations;
    }

    private function sigmoid($z)
    {
        return 1 / (1 + exp(-$z)); 
    }

    private function gradientDescent($X, $y)
    {
        $numSamples = count($X);
        $numFeatures = count($X[0]);
        $this->weights = array_fill(0, $numFeatures, 0);

        for ($i = 0; $i < $this->numIterations; $i++) { 
            $predicted = array_fill(0, $numSamples, 0);

            for ($j = 0; $j < $numSamples; $j++) {
                $z = 0;

                for ($k = 0; $k < $numFeatures; $k++) {
                    $z += $this->weights[$k] * $X[$j][$k];
                }

                $predicted[$j] = $this->sigmoid($z);
                $error = $predicted[$j] - $y[$j];

                for ($k = 0; $k < $numFeatures; $k++) {
                    $this->weights[$k] -= $this->learningRate * $error * $X[$j][$k];
                }
            }
        }
    }

    public function train($X, $y)
    {
        
        $numSamples = count($X); 
        $X = array_map(function ($row) {
            array_unshift($row, 1);
            return $row;
        }, $X);

        $y = array_map(function ($val) {
            return (int) ($val === 1);
        }, $y);

        $this->gradientDescent($X, $y);
    }

    public function predict($X)
    {
        $numSamples = count($X);
        $X = array_map(function ($row) {
            array_unshift($row, 1);
            return $row;
        }, $X);

        $predictions = array_fill(0, $numSamples, 0);

        for ($i = 0; $i < $numSamples; $i++) {
            $z = 0;

            for ($j = 0; $j < count($X[$i]); $j++) {
                $z += $this->weights[$j] * $X[$i][$j];
            }

            $predictions[$i] = $this->sigmoid($z) >= 0.5 ? 1 : 0;
        }

        return $predictions; //.$x
    }
}


$X = [
    [17.99, 10.38, 122.8, 1001, 0.1184, 0.2776, 0.3001, 0.1471, 0.2419, 0.07871, 1.095, 0.9053, 8.589, 153.4, 0.006399, 0.04904, 0.05373, 0.01587, 0.03003, 0.006193, 25.38, 17.33, 184.6, 2019, 0.1622, 0.6656, 0.7119, 0.2654, 0.4601, 0.1189],
    [20.57, 17.77, 132.9, 1326, 0.08474, 0.07864, 0.0869, 0.07017, 0.1812, 0.05667, 0.5435, 0.7339, 3.398, 74.08, 0.005225, 0.01308, 0.0186, 0.0134, 0.01389, 0.003532, 24.99, 23.41, 158.8, 1956, 0.1238, 0.1866, 0.2416, 0.186, 0.275, 0.08902],
    [19.69, 21.25, 130, 1203, 0.1096, 0.1599, 0.1974, 0.1279, 0.2069, 0.05999, 0.7456, 0.7869, 4.585, 94.03, 0.00615, 0.04006, 0.03832, 0.02058, 0.0225, 0.004571, 23.57, 25.53, 152.5, 1709, 0.1444, 0.4245, 0.4504, 0.243, 0.3613, 0.08758],
    [11.42, 20.38, 77.58, 386.1, 0.1425, 0.2839, 0.2414, 0.1052, 0.2597, 0.09744, 0.4956, 1.156, 3.445, 27.23, 0.00911, 0.07458, 0.05661, 0.01867, 0.05963, 0.009208, 14.91, 26.5, 98.87, 567.7, 0.2098, 0.8663, 0.6869, 0.2575, 0.6638, 0.173],
    [20.29, 14.34, 135.1, 1297, 0.1003, 0.1328, 0.198, 0.1043, 0.1809, 0.05883, 0.7572, 0.7813, 5.438, 94.44, 0.01149, 0.02461, 0.05688, 0.01885, 0.01756, 0.005115, 22.54, 16.67, 152.2, 1575, 0.1374, 0.205, 0.4, 0.1625, 0.2364, 0.07678],
    [12.45, 15.7, 82.57, 477.1, 0.1278, 0.17, 0.1578, 0.08089, 0.2087, 0.07613, 0.3345, 0.8902, 2.217, 27.19, 0.00751, 0.03345, 0.03672, 0.01137, 0.02165, 0.005082, 15.47, 23.75, 103.4, 741.6, 0.1791, 0.5249, 0.5355, 0.1741, 0.3985, 0.1244],
    [18.25, 19.98, 119.6, 1040, 0.09463, 0.109, 0.1127, 0.074, 0.1794, 0.05742, 0.4467, 0.7732, 3.18, 53.91, 0.004314, 0.01382, 0.02254, 0.01039, 0.01369, 0.002179, 22.88, 27.66, 153.2, 1606, 0.1442, 0.2576, 0.3784, 0.1932, 0.3063, 0.08368],
    [13.08, 15.71, 85.63, 520, 0.1075, 0.127, 0.04568, 0.0311, 0.1967, 0.06811, 0.1852, 0.7477, 1.383, 14.67, 0.004097, 0.01898, 0.01698, 0.00649, 0.01678, 0.002425, 14.5, 20.49, 96.09, 630.5, 0.1312, 0.2776, 0.189, 0.07283, 0.3184, 0.08183],
    [9.504, 12.44, 60.34, 273.9, 0.1024, 0.06492, 0.02956, 0.02076, 0.1815, 0.06905, 0.2773, 0.9768, 1.909, 15.7, 0.009606, 0.01432, 0.01985, 0.01421, 0.02027, 0.002968, 10.23, 15.66, 65.13, 314.9, 0.1324, 0.1148, 0.08867, 0.06227, 0.245, 0.07773],
    [15.34, 14.26, 102.5, 704.4, 0.1073, 0.2135, 0.2077, 0.09756, 0.2521, 0.07032, 0.4388, 0.7096, 3.384, 44.91, 0.006789, 0.05328, 0.06446, 0.02252, 0.03672, 0.004394, 18.07, 19.08, 125.1, 980.9, 0.139, 0.5954, 0.6305, 0.2393, 0.4667, 0.09946],
    [13.03, 18.42, 82.61, 523.8, 0.08983, 0.03766, 0.02562, 0.02923, 0.1467, 0.05863, 0.1839, 2.342, 1.17, 14.16, 0.004352, 0.004899, 0.01343, 0.01164, 0.02671, 0.001777, 13.3, 22.81, 84.46, 545.9, 0.09701, 0.04619, 0.04833, 0.05013, 0.1987, 0.06169],
    [17.95, 20.01, 114.2, 982, 0.08402, 0.06722, 0.07293, 0.05596, 0.2129, 0.05025, 0.5506, 1.214, 3.357, 54.04, 0.004024, 0.008422, 0.02291, 0.009863, 0.05014, 0.001902, 20.58, 27.83, 129.2, 1261, 0.1072, 0.1202, 0.2249, 0.1185, 0.4882, 0.06111],
    [15.78, 22.91, 105.7, 782.6, 0.1155, 0.1752, 0.2133, 0.09479, 0.2096, 0.07331, 0.552, 1.072, 3.598, 58.63, 0.008699, 0.03976, 0.0595, 0.0139, 0.01495, 0.005984, 20.19, 30.5, 130.3, 1272, 0.1855, 0.4925, 0.7356, 0.2034, 0.3274, 0.1252],
    [14.87, 16.67, 98.64, 682.5, 0.1162, 0.1649, 0.169, 0.08923, 0.2157, 0.06768, 0.4266, 0.9489, 2.989, 41.18, 0.006985, 0.02563, 0.03011, 0.01271, 0.01602, 0.003884, 18.81, 27.37, 127.1, 1095, 0.1878, 0.448, 0.4704, 0.2027, 0.3585, 0.1065]
];
$y = [1, 1, 1, 1, 1, 1, 1, 0, 0, 1, 0, 1, 1, 1];

$logisticRegression = new LogisticRegression();
$logisticRegression->train($X, $y);

// $newX = [[13.03, 18.42, 82.61, 523.8, 0.08983, 0.03766 , 0.02562, 0.02923, 0.1467, 0.05863, 0.1839, 2.342, 1.17, 14.16, 0.004352, 0.004899, 0.01343, 0.01164, 0.02671, 0.001777, 13.3, 22.81, 84.46, 545.9, 0.09701, 0.04619, 0.04833, 0.05013, 0.1987, 0.06169]];
// $newX = [[17.47, 24.68, 116.1, 984.6, 0.1049, 0.1603, 0.2159, 0.1043, 0.1538, 0.06365, 1.088, 1.41, 7.337, 122.3, 0.006174, 0.03634, 0.04644, 0.01569, 0.01145, 0.00512, 23.14, 32.33, 155.3, 1660, 0.1376, 0.383, 0.489, 0.1721, 0.216, 0.093]];
$newX = [];
$sub_arr = [];
if ($_POST) {
    foreach ($_POST as $key => $value) {
        $test_val = floatval($value);
        array_push($sub_arr, $test_val);
    }
    array_push($newX, $sub_arr);

 
    $predictions = $logisticRegression->predict($newX);

    // Calculate accuracy
    $accuracy = calculateAccuracy($predictions, $y);

    // echo '<script>';
    // echo 'if (' . $predictions[0] . ' === 1) {';
    // echo 'alert("This patient has Malignant");';
    // echo '} else {';
    // echo 'alert("This patient has Benign");';
    // echo '}';
    // echo 'window.history.back();'; 
    // echo '</script>';

    
    echo '<script>';
    echo 'if (' . $predictions[0] . ' === 1) {';
    echo 'alert("This patient has Malignant. Accuracy: ' . $accuracy . '%");';
    echo '} else {';
    echo 'alert("This patient has Benign. Accuracy: ' . $accuracy . '%");';
    echo '}';
    echo '</script>';

    include "./Config/dbconnection.php";
    $radius_mean = $_GET['radiusMean'];
    $texture_mean = $_GET['textureMean'];
    $perimeter_mean = $_GET['perimeterMean'];
    $area_mean = $_GET['areaMean'];
    $smoothness_mean = $_GET['smoothnessMean'];
    $compactness_mean = $_GET['compactnessMean'];
    $concavity_mean = $_GET['concavityMean'];
    $concave_points_mean = $_GET['concaveMean'];
    $symmetry_mean = $_GET['symmetryMean'];
    $fractal_dimension_mean = $_GET['fractalDimensionMean'];
    $radius_se = $_GET['radiusSe'];
    $texture_se = $_GET['textureSe'];
    $perimeter_se = $_GET['perimeterSe'];
    $area_se = $_GET['areaSe'];
    $smoothness_se = $_GET['smoothnessSe'];
    $compactness_se = $_GET['compactSe'];
    $concavity_se = $_GET['concavitySe'];
    $concave_points_se = $_GET['concaveSe'];
    $symmetry_se = $_GET['SymmetrySe'];
    $fractal_dimension_se = $_GET['fractalDimensionSe'];
    $radius_worst = $_GET['radiusWorst'];
    $texture_worst = $_GET['textureWorst'];
    $perimeter_worst = $_GET['perimeterWorst'];
    $area_worst = $_GET['areaWorst'];
    $smoothness_worst = $_GET['smoothnessWorst'];
    $compactness_worst = $_GET['compactWorst'];
    $concavity_worst = $_GET['concavityWorst'];
    $concave_points_worst = $_GET['concaveWorst'];
    $symmetry_worst = $_GET['symmetryWorst'];
    $fractal_dimension_worst = $_GET['fractalDimensionWorst'];
  
      $sql = "INSERT INTO history(radius_mean, texture_mean, perimeter_mean, area_mean, 
                smoothness_mean, compactness_mean, concavity_mean, concave_points_mean, symmetry_mean, fractal_dimension_mean, radius_se, texture_se, perimeter_se, area_se, 
                smoothness_se, compactness_se, concavity_se, concave_points_se, symmetry_se, fractal_dimension_se, radius_worst, texture_worst, perimeter_worst, area_worst, 
                smoothness_worst, compactness_worst, concavity_worst, concave_points_worst, symmetry_worst, fractal_dimension_worst, diagnosis
                ) VALUES (".$radius_mean.", ".$texture_mean.", ".$perimeter_mean.", ".$area_mean.", ".$smoothness_mean.", ".$compactness_mean.", ".$concavity_mean.", ".$concave_points_mean.", 
                ".$symmetry_mean.", ".$fractal_dimension_mean.",
                ".$radius_se.", ".$texture_se.", ".$perimeter_se.", ".$area_se.", ".$smoothness_se.",".$compactness_se.", ".$concavity_se.", ".$concave_points_se.", ".$symmetry_se.", 
                ".$fractal_dimension_se.",".$radius_worst.", ".$texture_worst.", ".$perimeter_worst.", ".$area_worst.", ".$smoothness_worst.",
                ".$compactness_worst.", ".$concavity_worst.", ".$concave_points_worst.", ".$symmetry_worst.", ".$fractal_dimension_worst.",".$predictions[0].")";
      $result = mysqli_query($conn, $sql);

      if ($result) {
        // Insertion was successful
        echo "Prediction result inserted into history table.";
    } else {
        // Insertion failed
        echo "Error inserting prediction result: " . mysqli_error($conn);
    }
    
}

// function calculateAccuracy($predictions, $actual)
// {
//     $correct = 0;
//     $total = count($actual);

//     for ($i = 0; $i < $total; $i++) {
//         if ($predictions[$i] == $actual[$i]) {
//             $correct++;
//         }
//     }

//     return ($correct / $total) * 100;
// }
?>