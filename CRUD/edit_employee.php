
<?php
session_start();
include dirname(__FILE__) . "/../database/connection.php";
if (isset($_POST['submit'])) {
		$id = $_GET["id"];
        $update = true;
		$record = mysqli_query($dbconnect, "SELECT * FROM employees WHERE id=$id");
		if (count(array($record)) == 1 ) {
			$n = mysqli_fetch_array($record);
			$fullname = $n['fullname'];
            $age = $n['age'];
			$salary = $n['salary'];
			$dayoff = $n['dayoff_count'];
			$contract_time = $n['contract_time'];
            
            $_SESSION["id"] = $id;
            $_SESSION["fullname"] = $fullname;
            $_SESSION["age"] = $age;
            $_SESSION["salary"] = $salary;
            $_SESSION["dayoff"] = $dayoff;
            $_SESSION["contract_time"] = $contract_time;
            $_SESSION["isUpdate"] = $update;
		}
}

header("Location: /edit" );

?>
