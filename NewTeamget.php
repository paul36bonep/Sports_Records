<?php
include "DBconnection.php";

if($_SERVER['REQUEST_METHOD'] == "POST"){

if (!isset($_POST["Tname"], $_POST["date"])) {
    echo "All fields are required.";
    exit;
}

$teamname = $_POST["Tname"];
$date = $_POST["date"];

if (empty($teamname) || empty($date)) {
    echo "All fields are required.";
    exit;
}

$sql_check = "SELECT * FROM team WHERE team_name = '$teamname'";
$result = mysqli_query($conn,$sql_check);

if($result->num_rows >= 1){
    echo "Team name is already Taken";
    echo "<br><a href='NewTeam.php'>To Team Registration</a>";
    exit;
}

$sql = "INSERT INTO team VALUES('','$teamname','$date','','','','','','')";

if(mysqli_query($conn, $sql)){
    echo "User Successfully added to the database."; 

} else{
    echo "ERROR: Hush! Sorry $sql. "
            . mysqli_error($conn);
}
 
$conn -> close();

}

header("Location:Teams.php");
die();

?>
