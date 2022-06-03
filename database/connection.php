<?php
    $hostname = "localhost";
    $username =  "root";
    $password = "meroero2323";
    $db = "main";

    $dbconnect = mysqli_connect($hostname,$username,$password,$db);
    if($dbconnect->connect_error){
        die("Database connection Failed: ". $dbconnect.connect_error);
    }
    $_SESSION["dbconnect"] = $dbconnect;
?>