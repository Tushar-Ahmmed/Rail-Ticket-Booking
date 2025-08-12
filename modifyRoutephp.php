




<?php
    include 'partials/connectNewDb.php';
    $tr_id = $_POST['tr_name'];
    $up_down = $_POST['up_down'];
    $deparature = $_POST['departure'];
    $destination = $_POST['destination'];   

    $query_update_route = "UPDATE `route` SET `dep_station`='$deparature',`destination`='$destination' WHERE tr_number = '$tr_id'";
    $result_update = mysqli_query($conn, $query_update_route);
    
    if($result_update){
        header("location: modifyRoute.php");
    }else{
        echo "Something went wrong";
    }
    
?>