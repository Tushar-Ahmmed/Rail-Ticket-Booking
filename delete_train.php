<?php

include 'partials/connectNewDb.php';
$tr_id = $_POST['tr_id'];
$query1= "DELETE FROM `trains` WHERE tr_number = '$tr_id' ";
$result = mysqli_query($conn,$query1);

session_start();
$_SESSION['alert_remove'] = true;
header("location: remove_trains.php");
?>