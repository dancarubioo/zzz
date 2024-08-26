<?php
$dbHost = "localhost";
$dbUser = "root";
$dbPass = "";
$dbName = "user";
$data = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);
if(!$data){
    die("something went wrong");
}
?>