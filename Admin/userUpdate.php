<?php
    include "../Config/dbconnection.php";

    $id = $_GET['id'];

    $deletequery = "UPDATE FROM users WHERE Id=$id";

    $query = mysqli_query($conn, $deletequery);

    if($query){
        ?>
        <script>
            alert("Update successfully");
        </script>
        <?php
    }else{
        ?>
        <script>
            alert("Not updated");
        </script>
        <?php
    }
 
    header('location: user.php');
?>