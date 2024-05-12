<?php
require ("../../connection/config.php");

if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    $query = "DELETE FROM tbl_std WHERE std_id='$id'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "<script>alert('Student with id = $id deleted from database'); window.location.href='viewstudent.php'</script>";
    } else {
        echo "<script>alert('Error: " . mysqli_error($conn) . "'); window.location.href='viewstudent.php'</script>";
    }
} else {
    echo "<script>alert('Student ID not provided'); window.location.href='viewstudent.php'</script>";
}
?>