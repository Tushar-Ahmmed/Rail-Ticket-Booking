







<?php
session_start();
if(!isset($_SESSION['userLoggedin'])){
    header("location: login.php");
    exit;
}
else{
        include 'partials/connectNewDb.php';
  
        $date = $_POST['date'];
        $from = $_POST['departure'];
        $to = $_POST['destination'];
        $timestamp = strtotime($date);
        $day = date('l', $timestamp);
        // session use kore variable par korar chesta
        $_SESSION['journey_date'] = $date;
        $_SESSION['st_st_id'] = $from;
        $_SESSION['end_st_id'] = $to;


        $query = "SELECT trains.tr_name, trains.tr_number FROM trains WHERE tr_number in ((SELECT stations.tr_number FROM stations WHERE stations.st_id = $from) 
        intersect
        (SELECT stations.tr_number FROM stations WHERE stations.st_id =  $to))AND trains.offday != '$day'";

        $result = mysqli_query($conn, $query); 
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Next ticket</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="asset/css/add_trainscss1.css">
    <link rel="stylesheet" href="./asset/css/userbodycss.css">

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

    <div class="container">
        <div class="row">
            <div class="col-xl-2 col-md-2"></div>
            <div class="col-xl-8 col-md-8 highlight-tbl">
                <div class="take_center">
                    <form action="confirm.php" method="post">
                        <fieldset>
                            <legend>Select Journey Details</legend>
                            <div class="mb-3">
                                <label for="tr_number" class="form-label">Select Train</label>
                                <select id="tr_number" name="tr_number" class="form-select" required>
                                    <?php
                                        while($data = mysqli_fetch_array($result)){

                                            echo '<option value="'.$data['tr_number'].'">'.$data['tr_name'].'</option>';
                                        }
                                    
                                    ?>
                                    
                                </select>
                            </div>
    
                            <div class="mb-3">
                                <label for="seats" class="form-label">Number of Seats</label>
                                <select id="seats" name="seats" class="form-select" required>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                </select>
                            </div>
                            <div class="mb-3">
    
                                <div class="mb-3">
                                    <label for="class" class="form-label">Seat Type</label>
                                    <select id="class" name="class" class="form-select" required>
                                        <option>AC_Barth</option>
                                        <option>AC_S</option>
                                        <option>Snigdha</option>
                                        <option>S_chair</option>
                                    </select>
                                </div>
                                <input type="submit" name="ticket_submit" class="btn btn-primary" id="" value="Submit">
                        </fieldset>
                    </form>
                </div>
            </div>
            <div class="col-xl-2 col-md-2"></div>
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