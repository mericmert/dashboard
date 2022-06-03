
<?php
    include dirname(__FILE__) . "/../database/connection.php";
    $id = $_POST['id'];
    $sql = "DELETE FROM employees WHERE id=$id";

    if (!mysqli_query($dbconnect, $sql)) {
        echo "Error deleting record: " . mysqli_error($dbconnect);
    }
?>

