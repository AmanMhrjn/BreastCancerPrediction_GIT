<?php
    session_start();
    if(!isset($_SESSION['login'])){
        header("location: adminlogin.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>BCP || ADMIN History</title>
    <link rel="stylesheet" href="../CSS/admin.css">
    <script src="https://kit.fontawesome.com/7d37335a3d.js" crossorigin="anonymous"></script>
  </head>
  <body>
    <nav>
        <div class="logoname">Breast Cancer Prediction</div>                    
    </nav>
    <div class="admincontainer">
        <div class="sidebarLeft">
        <h2>Administrator</h2>
            <ul>
                <li>
                    <a href="dashboard.php">Dashboard</a>
                </li>
            </ul>
            <ul>
                <li>
                    <a href="user.php">Users</a>
                </li>
            </ul>
            <ul>
                <li>
                    <a href="history.php">History</a>
                </li>
            </ul>
            <ul>
                <li>
                    <a href="logout.php">Logout</a>
                </li>
            </ul>
        </div>
        <div class="sidebarRight">

            <div class="historydetails">
            <div class="outer-wrapper">
            <div class="table-wrapper">
                <table border="1" style="width: 200%; text-align: center;">
                    <thead style="background-color: black; color: white;">
                        <tr>
                            <!-- <th>Id</th> -->
                            <th>User Id</th>
                            <th>Username</th>
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
                            include "../Config/dbconnection.php";

                            // $selectquery = "SELECT * FROM history";
                            $selectquery = "SELECT * FROM history inner join users on users.id = history.userID";

                            $query = mysqli_query($conn,  $selectquery);

                            $num = mysqli_num_rows($query);

                            while($result = mysqli_fetch_array($query)){
                        ?>
                            <tr>
                                <!-- <?php print_r($result) ?> -->
                                <!-- database header name -->
                                <td><?php echo $result['id']?></td> 
                                <td><?php echo $result['username']?></td> 
                                <td>
                                    <?php if($result['diagnosis'] == 0){
                                        echo 'Benign';
                                    }else{
                                        echo 'Malignant';
                                    }

                                    ?>
                                </td>
                                <td><?php echo $result['radius_mean']?></td>
                                <td><?php echo $result['texture_mean']?></td>
                                <td><?php echo $result['perimeter_mean']?></td>
                                <td><?php echo $result['area_mean']?></td>
                                <td><?php echo $result['smoothness_mean']?></td>
                                <td><?php echo $result['compactness_mean']?></td>
                                <td><?php echo $result['concavity_mean']?></td>
                                <td><?php echo $result['concave_points_mean']?></td>
                                <td><?php echo $result['symmetry_mean']?></td>
                                <td><?php echo $result['fractal_dimension_mean']?></td>
                                <td><?php echo $result['radius_se']?></td>
                                <td><?php echo $result['texture_se']?></td>
                                <td><?php echo $result['perimeter_se']?></td>
                                <td><?php echo $result['area_se']?></td>
                                <td><?php echo $result['smoothness_se']?></td>
                                <td><?php echo $result['compactness_se']?></td>
                                <td><?php echo $result['concavity_se']?></td>
                                <td><?php echo $result['concave_points_se']?></td>
                                <td><?php echo $result['symmetry_se']?></td>
                                <td><?php echo $result['fractal_dimension_se']?></td>
                                <td><?php echo $result['radius_worst']?></td>
                                <td><?php echo $result['texture_worst']?></td>
                                <td><?php echo $result['perimeter_worst']?></td>
                                <td><?php echo $result['area_worst']?></td>
                                <td><?php echo $result['smoothness_worst']?></td>
                                <td><?php echo $result['compactness_worst']?></td>
                                <td><?php echo $result['concavity_worst']?></td>
                                <td><?php echo $result['concave_points_worst']?></td>
                                <td><?php echo $result['symmetry_worst']?></td>
                                <td><?php echo $result['fractal_dimension_worst']?></td>
                                <td><a href="historyDelete.php?id=<?php echo $result['id']?>" title="delete"><i class="fa fa-trash"></i></a></td>
                            </tr>
                            
                        <?php
                            }
                        ?>
                        <tr>
                    </tbody>
                </table>
            </div>
            </div>
            </div>
            
        </div>
    </div>
    <?php
            if(isset($_POST['logout'])){
                 session_destroy();
                 header("location: adminlogin.php");
            }
        ?>
  </body>
</html>
