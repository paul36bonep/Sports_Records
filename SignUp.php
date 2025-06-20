<?php
include "DBconnection.php";

if($_SERVER['REQUEST_METHOD'] == "POST"){

if (!isset($_POST["username"], $_POST["password"], $_POST["email"])) {
    echo "All fields are required.";
    echo "<a href='SignUp.html'>To Sign Up</a>";
    exit;
}

$username = $_POST["username"];
$password = $_POST["password"];
$email = $_POST["email"];

if (empty($username) || empty($password) || empty($email)) {
    echo "All fields are required.";
    echo "<a href='SignUp.html'>To Sign Up</a>";
    exit;
}

$sql_check = "SELECT * FROM admin WHERE username = '$username'";
$result = mysqli_query($conn,$sql_check);

if($result ->num_rows >= 1){
    echo "Username taken";
    echo "<a href='SignUp.html'>To Sign Up</a>";
    exit;
}

$sql = "INSERT INTO admin VALUES('','$username','$password', '$email')";

if(mysqli_query($conn, $sql)){
    echo "User Successfully added to the database."; 

} else{
    echo "ERROR: Hush! Sorry $sql. "
            . mysqli_error($conn);
}
 
$conn -> close();

}else{

    echo "Not today";
}
header("Location:login.html");
die();

?>
