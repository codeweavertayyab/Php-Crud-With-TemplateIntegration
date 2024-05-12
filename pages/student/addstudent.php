<?php
include ("../default/header.php");
require ("../../connection/config.php");
if (isset($_POST['btnaddstd'])) {
    $stdname = $_POST['stdname'];
    $stdemail = $_POST['stdemail'];
    $stdage = $_POST['stdage'];
    $stdbatch = $_POST['stdbatch'];
    $stdpass = $_POST['stdpass'];
    $stdgender = $_POST['stdgender'];
    $query = "INSERT INTO `tbl_std`(`std_name`, `std_email`, `std_age`, `std_batch`, `std_pass`, `std_gender`) VALUES ('$stdname','$stdemail','$stdage','$stdbatch','$stdpass','$stdgender')";
    $res = mysqli_query($conn, $query);
    if ($res) {
        echo "<script>alert('Student $stdname Added To Database');console.log('Student $stdname Added To Database'); window.location.href='viewstudent.php'</script>;";

    } else {
        echo "<script>alert('Student Error');console.log('Student Error')</script>;";

    }
}
$querybatch = "SELECT * FROM `tbl_batch`";
$result = mysqli_query($conn, $querybatch);
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
        color: black !important;
    }

    .form-control:focus {
        border: 2px solid black;
        border-radius: 50px;
        color: black !important;
    }

    .form-select {
        border: 2px solid black;
        border-radius: 50px;
        color: black !important;
    }

    .form-select:focus {
        border: 2px solid black;
        border-radius: 50px;
        color: black !important;
    }

    label {
        color: black;
        font-weight: normal;
    }

    .form-check-input {
        border: 1px solid black !important;
    }
</style>

<body>
    <div class="container">
        <h1 class="display-2 fw-bold text-primary">
            ADD STUDENT DETAILS
        </h1>
        <form action="" method="POST">
            <div class="row mb-3">
                <div class="col-6">
                    <label for="stdname">Student Name:</label>
                    <input type="text" class="form-control px-4" placeholder="Enter Name" name="stdname">
                </div>
                <div class="col-6">
                    <label for="stdemail">Student Email:</label>
                    <input type="email" class="form-control px-4" placeholder="abc@gmail.com" name="stdemail">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-6">
                    <label for="stdage">Student Age:</label>
                    <input type="number" class="form-control px-4" placeholder="Enter Age" name="stdage">
                </div>
                <div class="col-6">
                    <label for="stdbatch">Select Student Batch:</label>
                    <select class="form-select px-4" aria-label="Default select example" name="stdbatch">
                        <option selected>-- select --</option>
                        <?php
                        foreach ($result as $item) {

                            ?>
                            <option value="<?php echo $item['batch_id']?>"><?php echo $item['batch_name']?></option>
                            
                        <?php
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <label for="stdname">Student Password:</label>
                    <input type="password" class="form-control px-4" placeholder="Enter Password" name="stdpass">
                </div>
                <div class="col-6 mt-2">
                    <label for="stdname">Student Gender:</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="stdgender" id="flexRadioDefault1" value="male">
                        <label class="form-check-label me-5" for="flexRadioDefault1">
                            Male
                        </label>
                        <input class="form-check-input" type="radio" name="stdgender" id="flexRadioDefault1" value="female">
                        <label class="form-check-label" for="flexRadioDefault1">
                            Female
                        </label>
                    </div>
                </div>
            </div>
            <button class="btn btn-primary mt-4 w-100" name="btnaddstd">Add Student</button>
        </form>
    </div>
</body>

</html>

<?php
include ("../default/footer.php");
?>