







<?php
    include 'partials/connectNewDb.php';
    $tr_name = $_POST['tr_name'];
    $up_down = $_POST['up_down'];
    $offday = $_POST['offday'];

    $query_offday = "UPDATE `trains` SET `offday`='$offday'WHERE tr_name = '$tr_name' AND up_down = '$up_down'";
    $result_offday = mysqli_query($conn, $query_offday);

    if($result_offday){
        header("location: modifyOffday.php");
    }
    else{
        header("location: error.php");
    }

?>