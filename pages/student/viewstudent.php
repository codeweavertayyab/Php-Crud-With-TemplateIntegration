<?php
include ("../default/header.php");
require ("../../connection/config.php");
$query = "SELECT * FROM tbl_std s INNER JOIN tbl_batch b ON s.std_batch = b.batch_id";
$result = mysqli_query($conn, $query);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
    <style>
        .table{
            color: black;
        }
    </style>

<body>
    <a href="addstudent.php" class="btn btn-primary">ADD STUDENT</a>
    <table class="table table-hover">
        <thead class="bg-primary text-light">
            <tr>
                <th>Student Id</th>
                <th>Student Name</th>
                <th>Student Email</th>
                <th>Student Age</th>
                <th>Student Batch</th>
                <th>Student Gender</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($result as $item) {

                ?>
                <tr>
                    <td><?php echo $item['std_id'] ?></td>
                    <td><?php echo $item['std_name'] ?></td>
                    <td><?php echo $item['std_email'] ?></td>
                    <td><?php echo $item['std_age'] ?></td>
                    <td><?php echo $item['batch_name'] ?></td>
                    <td><?php echo $item['std_gender'] ?></td>
                    <td>
                        <a href="editstudent.php?id=<?php echo $item['std_id']?>" class="btn btn-warning">Edit</a>
                        <a href="deletestudent.php?id=<?php echo $item['std_id']?>" class="btn btn-danger">Delete</a>

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