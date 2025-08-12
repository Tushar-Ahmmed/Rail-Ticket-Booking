<?php
session_start();
$showLogout = false;
if(!isset($_SESSION['userLoggedin']) || $_SESSION['userLoggedin'] != true){
  header("location: login.php");
  $showLogout = false;

}
else{
  $showLogout = true;

}
?>

<?php
include 'partials/connection.php';
$ok2 = 0;
$done = false;
$result = null;
 $ok = 1;
if(isset($_POST['entry_submit'])){
  $from = $_POST['from'];
  $trname = $_POST['tr-name'];
  $to = $_POST['to'];
  $seats = $_POST['seats'];
  $date = $_POST['date'];

  $sql = "INSERT INTO `books`( `trname`, `st_from`, `st_to`, `seats`, `b_date`) VALUES ('$trname','$from ','$to','$seats','$date')";
  $result = mysqli_query($conn, $sql);
  if($result){
    $ok = 2;
  }else {
    $ok = 3;
  }  
}


if(isset($_POST['Print'])){
  $date = '2022-09-07';
  $sql = "SELECT * FROM `books` WHERE b_date = '$date'";
  $result = mysqli_query($conn, $sql);
  if($result){
    $done = true;
  }
}
if(isset($_POST['serial_submit'])){
  $si = $_POST['serial'];
  $sql = "DELETE FROM `books` WHERE serial= '$si' ";
  $result = mysqli_query($conn, $sql);
}
if(isset($_POST['seetrain_submit'])){
  global $day;
  $day = $_POST['day'];
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>welcome </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="asset/css/mainintf3.css">
    
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <img src="asset/images/logo.png" alt="logo">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-wraper collapse navbar-collapse item-center" id="navbarNavAltMarkup">
          <div class="navbar-nav navbar-wraper-text">
            <a class="nav-item nav-link active" href="index.php">Home</a>
            <a class="nav-item nav-link" href="#">About</a>
            <a class="nav-item nav-link" href="#">Contact Us</a>
              <a class="nav-item nav-link" href="logout.php">Log Out</a>
          </div>
        </div>
      </nav>

<!-- Show logout code -->

<div class="container">
  <div class="row">
    <div class="col-xl-6">
      <div class="buy">
        <h1>Buy Tickets</h1>
        <form action="" method="post">
          <label for="tr_name">Train Name</label>
          <select id="tr_name" name="tr-name">
            <option value="silicity">silicity</option>
            <option value="padma">padma</option>
            <option value="meghna">meghna</option>
            <option value="jamuna">jamuna</option>
          </select> <br><br>
          <label for="from">From</label>
          <select id="from" name="from">
            <option value="Dhaka">Dhaka</option>
            <option value="Sirajganj">Sirajganj</option>
            <option value="Rajshahi">Rajshahi</option>
            <option value="Pabna">Pabna</option>
          </select> <br><br>
          <label for="to">To</label>
          <select id="to" name="to">
            <option value="Dhaka">Dhaka</option>
            <option value="Sirajganj">Sirajganj</option>
            <option value="Rajshahi">Rajshahi</option>
            <option value="Pabna">Pabna</option>
          </select> <br><br>
          <label for="seats">Total Seats</label>
          <select class="selection" id="seats" name="seats">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
          </select> <br><br>
          <label for="date">Journey Date</label>
          <input type="date" name="date" id="date">
          <input type="submit" name="entry_submit" value="Buy">
        </form>
        <div class="display">

          <?php
                if($ok==2){
                  echo '<div id="boxdiv" class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>Congratulations!</strong> Your Ticket is confirmed.
                  <button type="button" id="cross" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>';
                }
                if($ok==3){
                  echo '<div id="boxdiv2" class="alert alert-warning alert-dismissible fade show" role="alert">
                  <strong>OPPS!</strong> Your Ticket is not confirmed.
                  <button type="button" id="cross2" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>';
                }
              ?>
        </div>
      </div>

    </div>
    <div class="col-xl-6">
      <div class="buy cancel">
        <h1>Cancle Tickets</h1>
        <div class="submit_container" id="show">
          <form action="" method="post">
            <input type="submit" value="Click Here for cancel" name="Print">
          </form>
        </div>

        <div class="showResult fs">
          <?php
                 if($done==true){
                   echo '<table width=300 border=1 cellspacing=4>';
                   echo '<tr>';
                   echo '<td>';
                   echo 'serial';
                   echo '</td>';
                   echo '<td>';
                   echo 'trname';
                   echo '</td>';
                   echo '<td>';
                   echo 'seats';
                   echo '</td>';
                   echo '<td>';
                   echo 'B_date';
                   echo '</td>';
                   echo '</tr>';
                   while($row = mysqli_fetch_assoc($result)){
                    echo '<tr>';
                    echo '<td>';
                    echo $row['serial'];
                    echo '</td>';
                    echo '<td>';
                    echo $row['trname'];
                    echo '</td>';
                    echo '<td>';
                    echo $row['seats'];
                    echo '</td>';
                    echo '<td>';
                    echo $row['b_date'];
                    echo '</td>';
                    echo '</tr>';
                   }
                   echo '</table>';
                   $done = false;
                }
                  
                 ?>
        </div>

        <div class="seiralContainer">
          <form action="" method="post">
            <label for="serial">Enter serial for delete</label><br>
            <input type="number" name="serial" id="serial"><br><br>
            <input type="submit" value="Confirm" name="serial_submit">
          </form>
        </div>


        <div class="display">
          <?php
                if($ok2==2){
                  echo '<div id="boxdiv" class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>Ticket Cancelled!</strong>
                  <button type="button" id="cross" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>';
                }
                if($ok2==3){
                  echo '<div id="boxdiv2" class="alert alert-warning alert-dismissible fade show" role="alert">
                  <strong>OPPS! not cancelled</strong>
                  <button type="button" id="cross2" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>';
                }
              ?>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="col-xl-6">
  <div class="buy seetrains">
    <h1>See Todays Train</h1>
    <div class="see_form_container">
      <form action="" method="post">
        <label for="day">Select Day</label><br>
        <select name="day" id="day">
          <option value="satyrday">Saturday</option>
          <option value="sunday">Sunday</option>
          <option value="monday">Monday</option>
          <option value="tuesday">Tuesday</option>
          <option value="wednesday">Wednesday</option>
          <option value="thusday">Thusday</option>
          <option value="friday">friday</option>
        </select>
        <input type="submit" value="OK" name="seetrain_submit">
      </form>
    </div>
    <div class="seeresult">
      <?php
        echo $day;
      ?>
    </div>
  </div>
</div>
<div class="col-xl-6">
  <h1>see available ticket for</h1>
</div>
</div>
</div>
      
      <script src="asset/js/alerts.js"></script>
      <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    
    
</body>

</html>