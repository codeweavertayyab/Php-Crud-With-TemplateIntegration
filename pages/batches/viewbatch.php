<?php
include ("../default/header.php");
require("../../connection/config.php");
$query = "SELECT * FROM `tbl_batch`";
$result = mysqli_query($conn, $query);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
</head>
<body>
    <a href="addbatch.php" class="btn btn-primary">ADD BATCH</a>
    <table class="table">
        <thead class="bg-primary text-light">
            <tr>
                <th>Batch Id</th>
                <th>Batch Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            foreach ($result as $item) {
            
            ?>
            <tr>
                <td><?php echo $item['batch_id']?></td>
                <td><?php echo $item['batch_name']?></td>
                <td>
                    <a href="editbatch.php?id=<?php echo $item['batch_id']?>" class="btn btn-warning">Edit</a>
                    <a href="deletebatch.php?id=<?php echo $item['batch_id']?>" class="btn btn-danger">Delete</a>

                </td>
            </tr>
            <?php 
            }
            ?>
        </tbody>
    </table>
</body>
</html>
<?php
include ("../default/footer.php");
?>