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
    <title>BCP || ADMIN User</title>
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
            <div>
                <a href="addUser.php" class="useradd">Add Users</a>
            </div>
            <div class="userdetails">
                <table border="1" style="width: 200%; text-align: center;">
                    <thead style="background-color: black; color: white;">
                        <tr>
                            <th>Id</th>
                            <th>Full Name</th>
                            <th>Username</th>
                            <th>Address</th>
                            <th>Age</th>
                            <th>Gender</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th colspan="2">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            include "../Config/dbconnection.php";

                            $selectquery = "SELECT * FROM users";

                            $query = mysqli_query($conn,  $selectquery);

                            $num = mysqli_num_rows($query);

                            while($result = mysqli_fetch_array($query)){
                        ?>
                            <tr>
                                <!-- database header name -->
                                <td><?php echo $result['id']?></td> 
                                <td><?php echo $result['fullname']?></td>
                                <td><?php echo $result['username']?></td>
                                <td><?php echo $result['address']?></td>
                                <td><?php echo $result['age']?></td>
                                <td><?php echo $result['gender']?></td>
                                <td><?php echo $result['email']?></td>
                                <td><?php echo $result['password']?></td>
                                <td><a href="userUpdate.php?id=<?php echo $result['id']?>" title="update"><i class="fa fa-edit"></i></a></td>
                                        <td><a href="userDelete.php?id=<?php echo $result['id']?>" title="delete"><i class="fa fa-trash"></i></a></td>
                            </tr>
                        <?php
                            }
                        ?>
                    </tbody>
                </table>
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
