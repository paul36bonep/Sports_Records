<?php
include "DBconnection.php";

if($_SERVER['REQUEST_METHOD'] == "POST"){

if (!isset($_POST["Tname"], $_POST["Pname"],$_POST["IGN"], $_POST["Age"],$_POST["position"])) {
    echo "All fields are required.";
    exit;
}

$name = $_POST["Pname"];
$team = $_POST["Tname"];
$IGN = $_POST["IGN"];
$Age = $_POST["Age"];
$Position = $_POST["position"];

if (empty($name) || empty($team)|| empty($IGN)|| empty($Age)|| empty($Position)) {
    echo "All fields are required.";
    exit;
}

$sql_check = "SELECT * FROM player WHERE ign = '$IGN'";

if(mysqli_query($conn,$sql_check)->num_rows >= 1){
    echo "In game name is already Taken";
    echo "<br><a href='NewPlayer.php'>To Player Registration</a>";
    exit;

}

$sql = "INSERT INTO player VALUES('','$team','$name','$Age','$IGN','$Position','','','')";

if(mysqli_query($conn, $sql)){
    echo "User Successfully added to the database."; 

} else{
    echo "ERROR: Hush! Sorry $sql. "
            . mysqli_error($conn);
}
 
$conn -> close();

}

header("Location:Players.php");
die();

?>
