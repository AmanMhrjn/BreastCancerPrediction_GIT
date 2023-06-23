<?php
    include "../Config/dbconnection.php";

    $id = $_GET['id'];

    $deletequery = "DELETE FROM users WHERE Id=$id";

    $query = mysqli_query($conn, $deletequery);

    if($query){
        ?>
        <script>
            alert("Deleted successfully");
        </script>
        <?php
    }else{
        ?>
        <script>
            alert("Not deleted");
        </script>
        <?php
    }
 
    header('location: user.php');
?>