<?php
    session_start();
    if(!isset($_SESSION['userLoggedin'])){
        header("location: login.php");
        exit;
    }
    else{
        include 'partials/connectNewDb.php';
        $Journey_date = $_SESSION['journey_date'];
        $start = $_SESSION['st_st_id'];
        $end =  $_SESSION['end_st_id'];
        $user_id = $_SESSION['user_id'];


        $tr_number = $_POST['tr_number'];
        $seats = $_POST['seats'];
        $class = $_POST['class'];
        $query = "INSERT INTO `tickets`( `user_id`, `tr_number`, `seat_type`, `seat_number`, `journey_date`, `st_st_id`, `end_st_id`) VALUES 
        ($user_id, $tr_number,'$class', $seats,'$Journey_date', $start, $end)";

        unset($_SESSION['journey_date']);
        unset($_SESSION['st_st_id']);
        unset($_SESSION['end_st_id']);

        $result = mysqli_query($conn, $query);
        if($result){
            setcookie('isbuy',true,time()+60,"/");
            header("location: userinterface.php");
        }
        else{
            echo "<h3>Opps Sorry</h3>";
        }
    }
?>