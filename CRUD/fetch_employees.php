<?php
    include dirname(__FILE__) . "/../database/connection.php";
    $query = mysqli_query($dbconnect, "SELECT * FROM employees")
        or die(mysqli_error($dbconnect));
    while($row = mysqli_fetch_array($query)){
        echo "<tr>
            <td>{$row["fullname"]}</td>
            <td>{$row["age"]}</td>
            <td>{$row["salary"]} TL</td>
            <td>{$row["dayoff_count"]} day</td>
            <td>{$row["contract_time"]} years</td>
            <td><form id='edit' method='POST' action='../CRUD/edit_employee.php?id={$row["id"]}'><button type='submit' name='submit' id='edit-employee'><i class='edit icon large'></button></form></td>
            <td><button class='delete-button' id='{$row["id"]}'><i class='trash alternate icon large'></i></button></td>
        </tr>\n";
    }

?>

