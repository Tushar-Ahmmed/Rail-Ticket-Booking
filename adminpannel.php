<?php
session_start();
if(!isset($_SESSION['adminLoggedin'])){
    header("location: login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin UI</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    <link rel="stylesheet" href="asset/css/admincss3.css">
    <link rel="stylesheet" href="asset/css/admin_breakpoint.css">
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
    <div class="profile d-flex">

    <?php
    include 'partials/connectNewDb.php';
    $user_id = $_SESSION['user_id'];
    $query = "SELECT * FROM `admin` WHERE user_id = '$user_id' ";
    $result_query = mysqli_query($conn,$query);
    $data = mysqli_fetch_assoc($result_query);
    ?>


        <div class="admin-info">
            <img src="asset/images/profile.png" alt="Profile">
            <div class="name">
                <P><?php echo($data['user_name']) ?></P>
            </div>
        </div>
        <div class="others">
            <div class="designation">
                <p>Designation: <?php echo($data['designation']) ?></p>
            </div>
            <div class="salary">
                <p>Salary: <?php echo($data['salary']) ?></p>
            </div>
            <div class="Address">
                <p>Address: <?php echo($data['address']) ?></p>
            </div>
            <div class="doj">
                <p>Joining Date: <?php echo($data['jod']) ?></p>
            </div>
        </div>
    </div>
    <div class="content-middle align-items-center d-flex">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-xl-4 col-md-4 col-sm-4">
                    <div class="option-container">
                        <button class="button"><a href="add_trains.php">Add New Trains</a></button>
                    </div>
                </div>
                <div class="col-lg-4 col-xl-4 col-md-4 col-sm-4">
                    <div class="option-container">
                        <button class="button"><a href="remove_trains.php">Remove Trains</a></button>
                    </div>
                </div>
                <div class="col-lg-4 col-xl-4 col-md-4 col-sm-4">
                    <div class="option-container">
                        <button class="button"><a href="modifySeats.php">Modify Seats</a></button>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-xl-4 col-md-4 col-sm-4">
                    <div class="option-container">
                        <button class="button"><a href="modifyRoute.php">modify Route</a></button>
                    </div>
                </div>
                <div class="col-lg-4 col-xl-4 col-md-4 col-sm-4">
                    <div class="option-container">
                        <button class="button"><a href="modifyOffday.php">Modify Offday</a></button>
                    </div>
                </div>
                <div class="col-lg-4 col-xl-4 col-md-4 col-sm-4">
                    <div class="option-container">
                        <button class="button"><a href="removeUser.php">Remove Users</a></button>
                    </div>
                </div>
            </div>
        </div>
    </div>  

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>