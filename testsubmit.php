<?php
  include 'partials/connection.php';
  $from = $_POST['from'];
  $trname = $_POST['tr-name'];
  $to = $_POST['to'];
  $seats = $_POST['seats'];
  $date = $_POST['date'];
//   $date = '2010-01-12';
  $sql = "INSERT INTO `books`( `trname`, `st_from`, `st_to`, `seats`, `b_date`) VALUES ('$trname','$from ','$to','$seats','$date')";
  $result = mysqli_query($conn, $sql);
  echo $result;
  if($result){
    echo '<h1>Inserted</h1>';
  }else echo '<h1>Not Inserted</h1>';
?>