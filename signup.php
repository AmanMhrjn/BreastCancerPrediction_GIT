<?php
    include 'Config/dbconnection.php';

    if (isset($_SESSION['username'])) {
        header("Location: login.php");
    }

    if($_POST){
        $fullname = $_POST['fullname'];
        $username = $_POST['username'];
        $address = $_POST['address'];
        $age = $_POST['age'];
        $gender = $_POST['gender'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        
            $sql = "SELECT * FROM users WHERE username='$username' AND password='$password' ";
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
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>BCP || Signup</title>
    <link rel="stylesheet" href="/CSS/style.css" />

    <script src="/JS/script.js"></script>
  </head>
  <body>
    <nav>
      <div class="logoname">Breast Cancer Prediction</div>
      <ul>
        <li>
          <a href="index.php" >Home</a>
        </li>
        <li>
          <a href="predict.php">Predict</a>
        </li>
        <li>
          <a href="login.php" class="active">Login</a>
        </li>
      </ul>
    </nav>
    <div class="maincontainersignup">
      <div class="signupBox">
        <div class="signupHeader">
          <p>Signup</p>
        </div>
        <form id="signUp_form" method="POST" onsubmit="event.preventDefault(); validateSignup()">
          <label for="fullname">Full Name:</label> <br>
          <input placeholder="Enter fullname" class="input" id="full-name" name="fullname" type="text" > <br>
          <div class="error" id="fullname-error"></div>

          <label for="username">Username:</label> <br> 
          <input placeholder="Enter username" class="input" id="user-name" name="username" type="text" >  <br>
          <div class="error" id="username-error"></div>
          
          <label for="address">Address:</label> <br> 
          <input placeholder="Enter address" class="input" id="address" name="address" type="text" >  <br>
          <div class="error" id="address-error"></div>

          <label for="age">Age:</label> <br> 
          <input placeholder="Enter your age" class="input" id="age" name="age" type="number" >  <br>
          <div class="error" id="age-error"></div>

          <label for="gender">Gender:</label> <br> 
          <input placeholder="Enter your gender Male or Female" id="gender" class="input" name="gender" type="text" >  <br>
          <div class="error" id="gender-error"></div>

          <label for="email">email:</label> <br> 
          <input placeholder="Enter password" class="input" id="email" name="email" type="email" >  <br>
          <div class="error" id="email-error"></div>

          <label for="password">Password:</label> <br> 
          <input placeholder="Enter password" class="input" id="password" name="password" type="password" >  <br>
          <div class="error" id="password-error"></div>
          
          <p class="loginmsg">
            Already have an account? <a href="login.php" class="loginlink">Login</a>
          </p>

          <input type="submit" class="signupbtn" value="Signup">
          <!-- <button class="signupbtn" name="submit">Signup</button> -->
        </form>
      </div>
    </div>
    <footer>
        <p>Copyright &copy; 2020 | All Rights Reserved by Breast Cancer Prediction</p>
    </footer>
  </body>
</html>
