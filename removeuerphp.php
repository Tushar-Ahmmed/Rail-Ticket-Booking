<?php
session_start();
if(!isset($_SESSION['adminLoggedin'])){
    header("location: index.php");
    exit;
}
include 'partials/connectNewDb.php';
$id = $_POST['user_id'];

$sql = "DELETE FROM `users` WHERE user_id = '$id'";
$result = mysqli_query($conn, $sql);
if($result){
    header("loation: removeUser.php");
}
?>