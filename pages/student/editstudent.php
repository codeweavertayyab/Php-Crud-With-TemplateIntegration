<?php
include ("../default/header.php");
require ("../../connection/config.php");
//editwork
$selectedid = $_GET['id'];
$selectdata = "SELECT * FROM `tbl_std` WHERE std_id=$selectedid";
$res = mysqli_query($conn, $selectdata);
foreach ($res as $data) {
    $selstdname = $data['std_name'];
    $selstdemail = $data['std_email'];
    $selstdage = $data['std_age'];
    $selstdbatchid = $data['std_batch'];
    $selstdpass = $data['std_pass'];
    $selstdgender = $data['std_gender'];
}

$batchquery = "SELECT * FROM `tbl_batch` WHERE batch_id=$selstdbatchid";
$batchres = mysqli_query($conn, $batchquery);
foreach ($batchres as $batchdata) {
    $batchnamee = $batchdata['batch_name'];
}
;


$querybatch = "SELECT * FROM `tbl_batch`";
$result = mysqli_query($conn, $querybatch);
//editworkend



if (isset($_POST['btnaddstd'])) {
    $stdname = $_POST['stdname'];
    $stdemail = $_POST['stdemail'];
    $stdage = $_POST['stdage'];
    $stdbatch = $_POST['stdbatch'];
    $stdpass = $_POST['stdpass'];
    $stdgender = $_POST['stdgender'];
    $updatequery = "UPDATE `tbl_std` SET `std_name`='$stdname',`std_email`='$stdemail',`std_age`='$stdage',`std_batch`='$stdbatch',`std_pass`='$stdpass',`std_gender`='$stdgender' WHERE std_id=$selectedid";
    $updateres = mysqli_query($conn, $updatequery);
    if ($updateres) {
        echo "<script>alert('Student $stdname Updated Succesfully To Database');console.log('Student $stdname Updated Succesfully To Database'); window.location.href='viewstudent.php'</script>;";

    } else {
        echo "<script>alert('Student Error');console.log('Student Error')</script>;";

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
            EDIT STUDENT DETAILS
        </h1>
        <form action="" method="POST">
            <div class="row mb-3">
                <div class="col-6">
                    <label for="stdname">Student Name:</label>
                    <input type="text" class="form-control px-4" placeholder="Enter Name" name="stdname"
                        value="<?php echo $selstdname ?>">
                </div>
                <div class="col-6">
                    <label for="stdemail">Student Email:</label>
                    <input type="email" class="form-control px-4" placeholder="abc@gmail.com" name="stdemail"
                        value="<?php echo $selstdemail ?>">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-6">
                    <label for="stdage">Student Age:</label>
                    <input type="number" class="form-control px-4" placeholder="Enter Age" name="stdage"
                        value="<?php echo $selstdage ?>">
                </div>
                <div class="col-6">
                    <label for="stdbatch">Select Student Batch:</label>
                    <select class="form-select px-4" aria-label="Default select example" name="stdbatch">
                        <option value="<?php echo $selstdbatchid?>" selected><?php echo $batchnamee ?></option>
                        <?php
                        foreach ($result as $item) {

                            ?>
                            <option value="<?php echo $item['batch_id'] ?>"><?php echo $item['batch_name'] ?></option>

                            <?php
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <label for="stdname">Student Password:</label>
                    <input type="password" class="form-control px-4" placeholder="Enter Password" name="stdpass"
                        value="<?php echo $selstdpass ?>">
                </div>
                <div class="col-6 mt-2">
                    <label for="stdname">Student Gender:</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="stdgender" id="flexRadioDefault1"
                            value="male" <?php
                            if ($selstdgender == "male") {
                                echo "checked";
                            }
                            ?>>
                        <label class="form-check-label me-5" for="flexRadioDefault1">
                            Male
                        </label>
                        <input class="form-check-input" type="radio" name="stdgender" id="flexRadioDefault1"
                            value="female" <?php
                            if ($selstdgender == "female") {
                                echo "checked";
                            }
                            ?>>
                        <label class="form-check-label" for="flexRadioDefault1">
                            Female
                        </label>
                    </div>
                </div>
            </div>
            <button class="btn btn-primary mt-4 w-100" name="btnaddstd">Update Student</button>
        </form>
    </div>
</body>

</html>

<?php
include ("../default/footer.php");
?>