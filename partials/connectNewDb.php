<?php
$conn = mySqli_connect('localhost','root','','trainproject');
if(!$conn){
    die("connection failed: ".mySqli_connect_error());
    exit;
}
?>