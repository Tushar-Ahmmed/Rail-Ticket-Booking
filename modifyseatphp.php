<?php
include 'partials/connectNewDb.php';
$alert = false;
$tr_id = $_POST['tr_id'];
$acb = $_POST['acb'];
$acs = $_POST['acs'];
$snigdha = $_POST['snigdha'];
$s_chair = $_POST['s_chair'];
$view = true;
$query_update = "UPDATE `seats` SET `AC_Barth`='$acb',`AC_S`='$acs',`Snigdha`='$snigdha',`S_chair`='$s_chair' WHERE tr_number = '$tr_id'";
$result_update = mysqli_query($conn,$query_update);
if($result_update){
    global $alert;
    $alert = true;
}
header("location: modifySeats.php");
?>