<?php
    $hostname = "eu-cdbr-west-02.cleardb.net";
    $username =  "b5316bec4f3150";
    $password = "fa509c1f";
    $db = "heroku_8a9fd1da9e974b1";

    $dbconnect = mysqli_connect($hostname,$username,$password,$db);
    if($dbconnect->connect_error){
        die("Database connection Failed: ". $dbconnect.connect_error);
    }
    $_SESSION["dbconnect"] = $dbconnect;
?>