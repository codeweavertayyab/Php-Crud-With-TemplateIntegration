<?php 
$conn = mysqli_connect("localhost","root","","sms");
if ($conn) {
    echo "<script>console.log('Database Connected')</script>";
}
else{
    echo "<script>console.log('Database Connection Error')</script>";

}
?>