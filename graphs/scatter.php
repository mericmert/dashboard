
<?php
$salary_query = mysqli_query($dbconnect, "SELECT salary FROM employees")
    or die(mysqli_error($dbconnect));
$salary_array = array();
while($row = mysqli_fetch_array($salary_query)){
    array_push($salary_array,$row["salary"]);
}
$contract_query =  mysqli_query($dbconnect, "SELECT contract_time FROM employees")
    or die(mysqli_error($dbconnect));
$contract_array = array();
while($row = mysqli_fetch_array($contract_query)){
    array_push($contract_array,$row["contract_time"]);
}
$scatter_data = array();
for($i = 0; $i < sizeof($salary_array); $i++){
    $temp_array = array();
    array_push($temp_array, $contract_array[$i], $salary_array[$i]);
    array_push($scatter_data, $temp_array);
}
?>