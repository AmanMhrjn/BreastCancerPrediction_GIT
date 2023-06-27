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
            <h1>Admin history

            </h1>
        </div>
    </div>
  </body>
</html>
