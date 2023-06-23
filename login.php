<?php
  include 'Config/dbconnection.php';

  session_start();

    if (isset($_SESSION['username'])) {
        header("Location: index.php");
    }
    
    if ($_POST) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $result = mysqli_query($conn, $sql);
        echo $conn -> error;

        if ($result->num_rows != 0) {
            $user = mysqli_fetch_assoc($result);
            $_SESSION['id'] = $user['Id'];
            header("Location: predict.php");
        } else {
            echo "<script>alert('Username or Password is Wrong.')</script>";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>BCP || Login</title>
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
    <div class="maincontainer">
      <div class="loginBox">
        <div class="loginHeader">
          <p>Login</p>
        </div>
        <form action="#" method="post" id="login_form" onsubmit="event.preventDefault(); validateLogin()">
          <label for="username">Username:</label> <br>
          <input placeholder="Enter username" class="input" name="username" id="user-name" type="text"> <br>
          <div class="error" id="username-error"></div>

          <label for="password">Password:</label> <br>
          <input placeholder="Enter password" class="input" name="password" id="pass" type="password"> <br>
          <div class="error" id="password-error"></div>

          <p class="signupmsg">
            Don't have an account? <a href="signup.php" class="signuupLink">Signup</a>
          </p>

          <input type="submit" class="loginbtn" value="Login"> 
          <!-- <button class="loginbtn" >Login</button> -->
        </form>
      </div>
    </div>
    <footer>
      <p>Copyright &copy; 2020 | All Rights Reserved by Breast Cancer Prediction</p>
  </footer>
  </body>
</html>
