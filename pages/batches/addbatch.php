<?php
include ("../default/header.php");
require("../../connection/config.php");
if(isset($_POST['btnbatch'])){
    $batchname = $_POST['batchname'];
    $query = "INSERT INTO `tbl_batch`(`batch_name`) VALUES ('$batchname')";
    $res = mysqli_query($conn, $query);
    if($res){
    echo "<script>alert('Batch $batchname Added To Database');console.log('Batch $batchname Added To Database'); window.location.href='viewbatch.php'</script>;";

    }
    else{
    echo "<script>alert('Batch Error');console.log('Batch Error')</script>;";
        
    }
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
    .form-control{
        border: 2px solid black;
        border-radius: 50px;
    }
</style>

<body>
    <div class="container">
        <h1 class="display-1">ADD BATCH</h1>
        <form action="" method="POST">
            <input class="form-control px-3" type="text" placeholder="Enter Batch Name" name="batchname">
            <button class="btn btn-primary mt-3" name="btnbatch">Add Batch</button>
        </form>
    </div>
</body>

</html>
<?php
include ("../default/footer.php");
?>