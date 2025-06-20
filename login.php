<?php
include "DBconnection.php";

if($_SERVER['REQUEST_METHOD'] == "POST"){

    if (!isset($_POST["username"], $_POST["password"])) {
        echo "All fields are required.";

        echo "<script> alert('All fields are require');
              window.location.href='login.html';
              </script>";
    }
    
    $username = $_POST["username"];
    $password = $_POST["password"];
    
    if (empty($username) || empty($password)) {
        echo "All fields are required.";
        echo "<script> alert('All fields are require');
              window.location.href='login.html';
              </script>";
    }
    
    $sql = "SELECT * FROM admin WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if($result ->num_rows > 0) {
        echo "Logged In Successfully"; 
        header("location:index.html");
    
    } else{
        echo "Invalid Password or Username";
        echo "<a href='login.html'>To Log In</a>";
    }
     
    $conn -> close();
    
    }

?>