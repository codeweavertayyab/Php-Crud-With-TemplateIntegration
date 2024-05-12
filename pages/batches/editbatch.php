<?php
include ("../default/header.php");
require ("../../connection/config.php");
$selectedid = $_GET['id'];
echo "<script>console.log($selectedid)</script>";
$selectdata = "SELECT * FROM `tbl_batch` WHERE batch_id=$selectedid";
$res = mysqli_query($conn, $selectdata);
foreach ($res as $data) {
    $selectedbatchname = $data['batch_name'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    .form-control {
        border: 2px solid black;
        border-radius: 50px;
    }
</style>
<?php
if (isset($_POST['btnbatch'])) {
    $batchname = $_POST['batchname'];
    $updatequery = "UPDATE `tbl_batch` SET `batch_name`='$batchname' WHERE batch_id=$selectedid";
    $finalres = mysqli_query($conn, $updatequery);
    if ($finalres) {
        echo "<script>alert('Batch with id = $selectedid Updated In Database');console.log('Batch with id = $selectedid Updated In Database'); window.location.href='viewbatch.php'</script>;";

    } else {
        echo "<script>alert('Error');console.log('Error'); window.location.href='viewbatch.php'</script>;";

    }
}
?>

<body>

    <div class="container">
        <h1 class="display-1 fw-bold text-primary">EDIT BATCH</h1>
        <form action="" method="POST">
            <input class="form-control px-3" type="text" placeholder="Enter Batch Name" name="batchname"
                value="<?php echo $selectedbatchname ?>">
            <button class="btn btn-primary mt-3" name="btnbatch">Update Batch</button>
        </form>
    </div>
</body>

</html>

<?php
include ("../default/footer.php");
?>