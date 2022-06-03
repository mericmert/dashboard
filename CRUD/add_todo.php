<?php
    include dirname(__FILE__) . "/../database/connection.php";
    $task=$_POST['task'];
	$sql = "INSERT INTO tasks(task) 
	    VALUES ('$task')";
	if (!mysqli_query($dbconnect, $sql)) {
		die("Error!");
	} 
    
?>