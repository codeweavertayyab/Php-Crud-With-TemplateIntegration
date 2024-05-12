<?php
require("../../connection/config.php");
$id = $_GET['id'];
$query = "DELETE FROM `tbl_batch` WHERE batch_id=$id";
$result = mysqli_query($conn, $query);
if($result){
    echo "<script>alert('Batch with id = $id Deleted From Database');console.log('Batch with id = $id Deleted From Database'); window.location.href='viewbatch.php'</script>;";

}
else{
    echo "<script>alert('Batch with id = $id Not Deleted Error 404');console.log('Batch with id = $id Not Deleted Error 404'); window.location.href='viewbatch.php'</script>;";
}

?>