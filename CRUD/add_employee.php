
<?php
    include dirname(__FILE__) . "/../database/connection.php";
    $fullname=$_POST['fullname'];
    $age=$_POST['age'];
    $salary=$_POST['salary'];
    $dayoff=$_POST['dayoff'];
    $contract_time=$_POST['contract_time'];
    try{
        $query = "INSERT INTO employees(fullname, age, salary, dayoff_count, contract_time)
            VALUES ('$fullname', '$age', '$salary','$dayoff','$contract_time')";
        if (!mysqli_query($dbconnect, $query)) {
            die('An error occurred when submitting your review.');
        }
    }
    catch(Exception $e) {
        echo $e;
    }
    
?>