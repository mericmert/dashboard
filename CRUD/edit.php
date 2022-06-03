<?php
session_start();
include dirname(__FILE__) . "/../database/connection.php";
if(isset($_POST['submit'])){	
    $fullname = $_POST["fullname"];
    $age = $_POST["age"];
    $salary = $_POST["salary"];
    $dayoff = $_POST["dayoff"];
    $contract_time = $_POST["contract_time"];
    $id = $_SESSION["id"];
    echo "UPDATE employees SET fullname='$fullname',age='$age',salary='$salary', dayoff_count='$dayoff', contract_time = '$contract_time' WHERE id=$id";
	if (!mysqli_query($dbconnect, "UPDATE employees SET fullname='$fullname',age='$age',salary='$salary', dayoff_count='$dayoff', contract_time = '$contract_time' WHERE id=$id")) {
        echo("Error description: " . mysqli_error($dbconnect));
      }
    else{
        header("Location: /employees");
    }
}
?>