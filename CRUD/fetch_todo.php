<?php
    include dirname(__FILE__) . "/../database/connection.php";
    $query = mysqli_query($dbconnect, "SELECT * FROM tasks")
        or die(mysqli_error($dbconnect));
    while($row = mysqli_fetch_array($query)){
        echo 
        "<tr>
            <td>{$row["task"]}</td>
        </tr>\n";
    }
?>