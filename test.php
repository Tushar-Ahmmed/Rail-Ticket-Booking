<?php
$ok = 0;
$result =null;
if(isset($_POST['cd_submit'])){
  include 'partials/connection.php';
  $date = '2022-09-07';
  $sql = "SELECT * FROM `books` WHERE b_date = '$date'";
  $result = mysqli_query($conn, $sql);
}

if(isset($_POST['cancel_ticket'])){
  include 'partials/connection.php';
  $si = $_POST['serial'];
  $sql = "DELETE FROM `books` WHERE `books`.`serial` =  $si";
  $result = mysqli_query($conn, $sql);
  if($result){
    $ok = 2;
  }
  else{
    $ok = 3;
  }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
  welcome 
    </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

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
            <a class="nav-item nav-link active" href="#">Home</a>
            <a class="nav-item nav-link" href="#">About</a>
            <a class="nav-item nav-link" href="#">Contact Us</a>
            <a class="nav-item nav-link active" href="#">Log Out</a>
          </div>
        </div>
      </nav>

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
                  <input type="submit" name="submit" value="Buy">
              </form>
              <div class="display">
              </div>
            </div>

          </div>
          <div class="col-xl-6">
            <div class="buy cancel">
              <h1>Cancle Tickets</h1>
              <div class="submit_container">
                <form action="" method="post">
                  <input type="submit" name="cd_submit" value="Click for Cancel ticket">
                </form>
              </div>
              <!-- <div class="c_form-container">
                
              </div> -->
              <div class="showResult fs">
                  <?php
                     if($result){
                      $num = mysqli_num_rows($result);
                      if($num > 0){
                        echo '<table border="1" cellspacing="2">';
                        echo '<tr>';
                        echo '<td> Serial  </td>';
                        echo '<td> TR NAme  </td>';
                        echo '<td> B_date  </td>';
                        echo '</tr>';
                        while($row = mysqli_fetch_assoc($result)){
                          echo '<tr>';
                          echo '<td>'.$row['serial'].'</td>';
                          echo '<td>'.$row['trname'].'</td>';
                          echo '<td>'.$row['b_date'].'</td>';
                          echo "</tr>";
                        }
                        echo '</table>';
                      }
                    }
                  ?>
              </div>
              <div class="selct">
                <form action="" method="post">
                  <label for="serial">Enter the srial of cancelling ticket</label><br>
                  <input type="number" name="serial" id="serial">
                  <input type="submit" name="cancel_ticket" value="Cancel">
                </form>
              </div>
              <div class="display">

              <?php
                if($ok==2){
                  echo '<div id="boxdiv" class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>Ticket Cancelled!</strong>
                  <button type="button" id="cross" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>';
                }
                if($ok==3){
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
        <div class="row">
          <div class="col-xl-6"><h1>See Todays Train</h1></div>
          <div class="col-xl-6"><h1>see available ticket for</h1></div>
        </div>
      </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="asset/js/alert.js"></script>
    
</body>

</html>