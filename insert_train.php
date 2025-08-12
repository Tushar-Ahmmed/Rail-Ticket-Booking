<?php
require "partials/connectNewDb.php";

$tr_id = $_POST['tr_id'];
$tr_name = $_POST['tr_name'];
$catagory = $_POST['catagory'];
$off_day = $_POST['off_day'];
$up_down = $_POST['up_down'];
$acb = $_POST['acb'];
$acs = $_POST['acs'];
$snigdha = $_POST['snigdha'];
$s_chair = $_POST['s_chair'];
$deperture = $_POST['deperture'];
$Destination = $_POST['destination'];

$sql = "INSERT INTO `trains`(`tr_number`, `tr_name`, `tr_catagory`, `offday`, `up_down`) VALUES ('$tr_id','$tr_name','$catagory','$off_day','$up_down')";
$result = mysqli_query($conn, $sql);

$sql2 = "INSERT INTO `seats`(`tr_number`, `AC_Barth`, `AC_S`, `Snigdha`, `S_chair`) VALUES ('$tr_id','$acb','$acs','$snigdha ','$s_chair')";
$result2 = mysqli_query($conn, $sql2);

$sql3 = "INSERT INTO `route`(`tr_number`, `dep_station`, `destination`) VALUES ('$tr_id','$deperture','$Destination')";
$result3 = mysqli_query($conn, $sql3);

session_start();
$_SESSION['add_train'] = true;
header("location: add_trains.php");

?>