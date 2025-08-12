<?php
global $t_cookie;
require 'cookie.php';
if(isset($_COOKIE['my_cookie'])){
    $t_cookie = true;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">

    <link rel="stylesheet" href="asset/css/style.css">

    <link rel="stylesheet" href="asset/css/responsive.css">
</head>
<body style="background:url('bg.jpg'); background-size: cover; background-position: center;">

<div class="cookie_alert">
</div>
     
 <div class="container nav-container">
    <div class="row">
        <div class="col-12 col-lg-8 col-md-6 col-sm-4 img-sm">
            <div class="logo">
                <img src="asset/images/logo.png" alt="">
            </div>
        </div>
        <div class="col-12 col-lg-4 col-md-6 col-sm-8">
            <div class="sign img-sm">
                <button class="btn2"><a href="signup.php" style="color:white; text-decoration: none;">Sign Up</a> </button>
                <button class="btn2"><a href="login.php" style="color:white; text-decoration: none;">login</a></button>
            </div>
        </div>
    </div>
 </div>

 <div class="blank"></div>

 <div class="container">
    <div class="row">
        <div class="col-lg-3 col-xl-3 col-md-2 col-sm-2"></div>
        <div class="col-lg-6 col-xl-6 col-md-8 col-sm-8">
            <div class="card" style="width: 100%; margin-top: 20px;">
                <div class="card-body">
                  <h2 class="card-title">Welcome to E-Ticketing</h2>
                  <h6 class="card-subtitle mb-2">Buy Your Online Ticket</h6>
                  <p class="card-text">Buy tickets from this website without facing any problm. Easy <span style="color: rgba(24, 12, 8, 0.772);">&</span> Time saver</p>
                  
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-xl-3 col-md-2 col-sm-2"></div>
    </div>
 </div>

 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
 <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>