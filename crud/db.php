<?php

$host   ="localhost";
$user   ="root";
$pass   ="root";
$db_name="courseDB";

$connection = mysqli_connect($host, $user, $pass, $db_name);

if (mysqli_connect_errno()){
    die("Database connection failed: " . mysqli_connect_error() . " (" .mysqli_connect_errno() . ")");
}else{
   // echo "Connection succeed";
}

mysqli_query($connection, "SET NAMES utf8");
?>