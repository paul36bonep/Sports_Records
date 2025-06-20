<?php

$conn = new mysqli("localhost", "root", "", "sportrecords");

if($conn ->connect_error){
    die("Connection failed".$conn -> connect_error);
}

?>