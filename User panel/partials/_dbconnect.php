<?php
$server = "localhost";

$email = "root";
$password = "";
$database = "dbname";

$conn = mysqli_connect($server,$email, $password,$database);
if(!$conn){
    die("Error" . mysqli_connect_errno());
}
?>