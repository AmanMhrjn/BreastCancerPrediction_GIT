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
                    <a href="logout.php" class="active">Logout</a>
                </li>
            <?php } else { ?>
                <li>
                    <a href="login.php" class="active">Login</a>
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
                                <th>Id</th>
                                <th>Diagnosis</th>
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
                                    <td><?php echo $result['diagnosis'] ?></td>
                                    <td><a href="userUpdate.php?id=<?php echo $result['id'] ?>" title="update"><i class="fa fa-edit"></i></a></td>
                                    <td><a href="userDelete.php?id=<?php echo $result['id'] ?>" title="delete"><i class="fa fa-trash"></i></a></td>
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