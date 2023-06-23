<?php
    $serverName = "localhost";
    $username = "root";
    $password = "aman";
    $databaseName = "breastcancer_db";
    
    $conn = mysqli_connect("localhost", "root", "aman", "breastcancer_db");

    if ($conn->error) {
        die("Error occurred" . $conn->error);
    }
    // $conn -> error;
?>