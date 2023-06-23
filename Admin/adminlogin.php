<?php
  include "../Config/dbconnection.php";

  if($_POST){
    
    $username = $_POST['username'];
    $password = $_POST['password'];
   
    $query = "SELECT * FROM adminuser WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $query);
  
    
    if(mysqli_num_rows($result)==1){
        session_start();
        $_SESSION['login']=true;
        
        header("location: dashboard.php");
        
 
    }else{
        echo"<script>alert('Incorrect Password')</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>BCP || ADMIN Login</title>
    <link rel="stylesheet" href="../CSS/admin.css">
  </head>
  <body>
    <nav>
        <div class="logoname">Breast Cancer Prediction</div>                    
    </nav>
    <div class="admincontainerlogin">
      <form action="" method="POST">
          <h2>Admin Login</h2>
          <div class="inputBox">
              <input type="text" name="username" id="username" class="admin-usr" placeholder="Admin username"><br>
          </div>
          <div class="inputBox">
          
              <input type="password" name="password" id="password" class="aadmin-psw" placeholder="Admin password"><br>
          </div>


          <input type="submit" name="Adminlogin" class="admin-logn" id="submit" value="Login">
      </form>
    </div>
  </body>
</html> 
