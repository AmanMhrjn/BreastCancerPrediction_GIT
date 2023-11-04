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
    <title>BCP || ADMIN Dashboard</title>
    <link rel="stylesheet" href="../CSS/admin.css">
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
        <div class="dashboardsidebarRight">
            <div class="mainCard">
                <div class="innerCard">
                    <!-- <div > -->
                        <div class="cardText">Users</div>
                            <?php
                                $conn = mysqli_connect("localhost", "root", "aman", "breastcancer_db");

                                $query = "select * from users";
                                $query_run = mysqli_query($conn, $query);
                                
                                $row = mysqli_num_rows($query_run);
                                
                                echo '<div class="cardNumber">'.$row.'</div>';

                                // if($user_total = mysqli_num_rows($dash_user_query_run)){
                                //     echo '<div class="cardNumber">'.$user_total.'</div>';
                                // }
                                // else{
                                //     echo 'No data';
                                // }
                            ?>
                    
                        <div class="cardBottom">
                            <a href="user.php">User details</a>
                        </div>
                    <!-- </div> -->
                </div>
            </div>
            
            <div class="mainCard">
                <div class="innerCard">
                    <!-- <div > -->
                        <div class="cardText">History</div>
                        <?php
                                $conn = mysqli_connect("localhost", "root", "aman", "breastcancer_db");

                                $query = "select * from history";
                                $query_run = mysqli_query($conn, $query);
                                
                                $row = mysqli_num_rows($query_run);
                                
                                echo '<div class="cardNumber">'.$row.'</div>';

                                // <div class="cardNumber">7</div>

                                // if($user_total = mysqli_num_rows($dash_user_query_run)){
                                //     echo '<div class="cardNumber">'.$user_total.'</div>';
                                // }
                                // else{
                                //     echo 'No data';
                                // }
                            ?>
                        <div class="cardBottom">
                            <a href="history.php">History details</a>
                        </div>
                    <!-- </div> -->
                </div>
            </div>

        </div>
    </div>
  </body>
</html>
