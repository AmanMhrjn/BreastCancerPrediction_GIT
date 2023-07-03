<?php
    include "../Config/dbconnection.php";

    if(isset($_POST['submit'])){
        $full_name = $_POST['addfullname'];
        $user_name = $_POST['addusername'];
        $user_adrs = $_POST['addaddress'];
        $user_age = $_POST['addage'];
        $user_gender = $_POST['addgender'];
        $user_email = $_POST['addeamil'];
        $user_psw= $_POST['addpsw'];

        // $sql = "SELECT * FROM users WHERE username='$username' AND password='$password' ";
            $result = mysqli_query($conn, $sql);
            echo $conn -> error;
            if ($result->num_rows == 0) {
                $sql = "INSERT INTO users (fullname,username, address, age, gender, email, password) VALUES ('$fullname','$username', '$address', '$age', '$gender', '$email', '$password')";
                $result = mysqli_query($conn, $sql);
                
                if ($result) {
                    echo "<script>alert('User Registration Completed.')</script>";
                    header("Location: login.php");
                } else {
                    echo "<script>alert('Something Wrong Went.')</script>";
                }
            } else {
                echo "<script>alert('Email Already Exists.')</script>";
            }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin BCP || Add user</title>
    <link rel="stylesheet" href="../CSS/admin.css">
</head>
<body>
<nav>
        <div class="logoname">Breast Cancer Prediction</div>                    
    </nav>
    <div class="useradmincontainer">
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
        <div class="addUsr">
            <form method="POST">
                <h1>Add User</h1>
                <label for="fullname">Full Name:</label> <br>
                <input type="text" name="addfullname" id="addfullname"> <br>
                <label for="username">Username:</label> <br>
                <input type="text" name="addusername" id="addusername"> <br>
                <label for="address">Address:</label> <br>
                <input type="text" name="addaddress" id="addaddress"> <br>
                <label for="age">Age:</label> <br>
                <input type="text" name="addage" id="addage"> <br>
                <label for="gender">Gender:</label> <br>
                <input type="text" name="addgender" id="addgender"> <br>
                <label for="email">Email:</label> <br>
                <input type="text" name="addeamil" id="addemail"> <br>
                <label for="password">Password:</label> <br>
                <input type="password" name="addpsw" id="addpsw"> <br>

                <div class="buttons">
                    <div class="userbtn">
                        <input type="submit" name="submit" value="Add"> 
                    </div>
                    <div class="userbtn">
                        <a href="user.php">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>