<?php
$query_1 = mysqli_query($dbconnect, "SELECT COUNT(age) as 'age-count' FROM employees WHERE age BETWEEN 15 AND 25")
        or die(mysqli_error($dbconnect));
    $row_selection_1 = mysqli_fetch_assoc($query_1);
    $count_1 = $row_selection_1['age-count'];
    
    $query_2 = mysqli_query($dbconnect, "SELECT COUNT(age) as 'age-count' FROM employees WHERE age BETWEEN 26 AND 35")
        or die(mysqli_error($dbconnect));
    $row_selection_2 = mysqli_fetch_assoc($query_2);
    $count_2 = $row_selection_2['age-count'];
    
    $query_3 = mysqli_query($dbconnect, "SELECT COUNT(age) as 'age-count' FROM employees WHERE age BETWEEN 36 AND 45")
        or die(mysqli_error($dbconnect));
    $row_selection_3 = mysqli_fetch_assoc($query_3);
    $count_3 = $row_selection_3['age-count'];
    
    $query_4 = mysqli_query($dbconnect, "SELECT COUNT(age) as 'age-count' FROM employees WHERE age BETWEEN 46 AND 50")
        or die(mysqli_error($dbconnect));
    $row_selection_4 = mysqli_fetch_assoc($query_4);
    $count_4 = $row_selection_4['age-count'];
    
    $query_5 = mysqli_query($dbconnect, "SELECT COUNT(age) as 'age-count' FROM employees WHERE age > 45")
        or die(mysqli_error($dbconnect));
    $row_selection_5= mysqli_fetch_assoc($query_5);
    $count_5 = $row_selection_5['age-count'];
    $data_bar = array($count_1,$count_2,$count_3,$count_4,$count_5);
    //SELECT column_name(s)
    //FROM table_name
    //WHERE column_name BETWEEN value1 AND value2;
    ?>