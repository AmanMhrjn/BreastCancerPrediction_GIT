<?php
include 'Config/dbconnection.php';
session_start();
if (!isset($_SESSION['id'])) {
    header("location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>BCP || History</title>
    <link rel="stylesheet" href="../CSS/style.css">
    <script src="https://kit.fontawesome.com/7d37335a3d.js" crossorigin="anonymous"></script>
</head>

<body>
    <nav>
        <div class="logoname">Breast Cancer Prediction</div>
        <ul>
            <li>
                <a href="index.php">Home</a>
            </li>
            <li>
                <a href="predict.php">Predict</a>
            </li>
            <?php if ($_SESSION['id']) { ?>
                <li>
                    <a href="userHistory.php" class="active">History</a>
                    <a href="logout.php" >Logout</a>
                </li>
            <?php } else { ?>
                <li>
                    <a href="login.php">Login</a>
                </li>
            <?php } ?>
        </ul>
    </nav>
    <div class="admincontainer">
        <div class="sidebarRight">
            <div class="userdetails">
                <?php
                $selectquery = "SELECT * FROM history where userID =" . $_SESSION['id'];
                // echo $selectquery;
                // $selectquery = "SELECT * FROM history inner join users on users.id = history.userID";
                $query = mysqli_query($conn, $selectquery);

                $num = mysqli_num_rows($query);
                // echo $num;
                if (mysqli_num_rows($query) == 0) {
                    echo "No data Found";
                } else {
                ?>
                    <table border="1" style="width: 100%; text-align: center;">
                        <thead style="background-color: black; color: white;">
                            <tr>
                            <th>patient Id</th>
                            <th>diagnosis</th>
                            <th>radius_mean</th>
                            <th>texture_mean</th>
                            <th>perimeter_mean</th>
                            <th>area_mean</th>
                            <th>smoothness_mean</th>
                            <th>compactness_mean</th>
                            <th>concavity_mean</th>
                            <th>concave_points_mean</th>
                            <th>symmetry_mean</th>
                            <th>fractal_dimension_mean</th>
                            <th>radius_se</th>
                            <th>texture_se</th>
                            <th>perimeter_se</th>
                            <th>area_se</th>
                            <th>smoothness_se</th>
                            <th>compactness_se</th>
                            <th>concavity_se</th>
                            <th>concave_points_se</th>
                            <th>symmetry_se</th>
                            <th>fractal_dimension_se</th>
                            <th>radius_worst</th>
                            <th>texture_worst</th>
                            <th>perimeter_worst</th>
                            <th>area_worst</th>
                            <th>smoothness_worst</th>
                            <th>compactness_worst</th>
                            <th>concavity_worst</th>
                            <th>concave_points_worst</th>
                            <th>symmetry_worst</th>
                            <th>fractal_dimension_worst</th>
                            <th colspan="2">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($result = mysqli_fetch_array($query)) {
                                // print_r($result)
                            ?>
                                <tr>
                                    <!-- database header name -->
                                    <td><?php echo $result['id'] ?></td>
                                    <td><?php echo $result[''] ?></td>
                                    <td><?php echo $result['id'] ?></td>
                                    <td><?php echo $result['diagnosis'] ?></td>
                                    
                                    <td><a href="historydelete.php?id=<?php echo $result['id'] ?>" title="delete"><i class="fa fa-trash"></i></a></td>
                                </tr>
                        <?php
                            }
                        
                        ?>
                        </tbody>
                    </table>
                    <?php } ?>
            </div>
        </div>
    </div>
    <?php
    if (isset($_POST['logout'])) {
        session_destroy();
        header("location: adminlogin.php");
    }
    ?>
</body>

</html>