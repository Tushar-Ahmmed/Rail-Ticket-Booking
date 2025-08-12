



 <?php

$permission = false;
session_start();
if(!isset($_SESSION['userLoggedin'])){
    header("location: login.php");
    exit;
}
include 'partials/connectNewDb.php';
?> 

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Interface</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="asset/css/add_trainscss1.css">
    <link rel="stylesheet" href="./asset/css/userinterfacecss.css">

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <!-- <a class="navbar-brand" href="#">Navbar</a> -->
        <img src="asset/images/logo.png" alt="logo">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse nav-btn-center" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item active">
              <a class="nav-link" href="index.php">&nbsp Home &nbsp</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="logout.php">Sign Out</a>
            </li>
          </ul>
        </div>
    </nav>

    <div class="middle">
      <div class="container container-flex">
        <div class="row">
            <div class="col-2"></div>
            
            <div class="col-4">
              <div class="card" style="width: 100%;">
                <a href="buytickets.php"><img src="asset/images/BUY Tickt.png" class="card-img-top" alt="buy"></a>
              </div>
            </div>
            
            <div class="col-4">
              <div class="card" style="width: 100%;">
                <a href="cancelticket.php"><img src="asset/images/cancel ticket.png" class="card-img-top" alt="buy"></a>
              </div>
            </div>
            <div class="col-2"></div>
        </div>
        <div class="row my-5">
          <div class="col-2"></div>
          
          <div class="col-4">
            <?php
            if(isset($_COOKIE['isbuy'])){
              echo '<div class="card" style="width: 100%;">
              <h4>
                You have brought tickets.
              </h4>
            </div>
          </div>';
            }
            ?>
          <div class="col-2"></div>
      </div>
      </div>
    </div>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
        crossorigin="anonymous"></script>
        <script src="./asset/js/routejs.js"></script>
</body>

</html>