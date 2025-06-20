<?php
    include "DBconnection.php";

    if(isset($_GET['id'])){
        $id = $_GET['id'];

        $sql = "DELETE FROM team WHERE team_id = $id";
        $result = mysqli_query($conn,$sql);

        $conn->close();
        header("location:Teams.php");
    }
?>