 <?php
$permission = false;
session_start();
if(!isset($_SESSION['adminLoggedin'])){
    header("location: login.php");
    exit;
}
else{
  include 'partials/connectNewDb.php';
  $query = "SELECT DISTINCT trains.tr_name, trains.up_down, route.dep_station,route.destination FROM trains,route WHERE trains.tr_number = route.tr_number";
  $result_route = mysqli_query($conn, $query);
}

?> 





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Route</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="asset/css/add_trainscss1.css">
    <link rel="stylesheet" href="asset/css/adminBodycss.css">

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
                <?php

                echo '<table class="table">
                    <thead>
                    <tr>
                      <th scope="col">Train Name</th>
                      <th scope="col">Deparature</th>
                      <th scope="col">Destinatioin</th>
                      <th scope="col">Up_Down</th>
                    </tr>
                  </thead>
                  <tbody>';
                  while($row = mysqli_fetch_array($result_route)){
                      echo'<tr>
                        <th scope="row">'.$row['tr_name'].'</th>
                        <td>'.$row['dep_station'].'</td>
                        <td>'.$row['destination'].'</td>
                        <td>'.$row['up_down'].'</td>
                      </tr>';
                  }

                    echo '</tbody>
                    </table>';
                ?>
                    
            </div>
            <div class="col-xl-2 col-md-2"></div>
        </div>
    </div>

    <div class="container">
        <div class="row my-5">
            <div class="col-xl-2 col-md-2"></div>
                <div class="col-xl-8 col-md-8 highlight">
                    <form action="modifyRoutephp.php" method="post">
                        <fieldset>
                            <legend>Change Route</legend>
                            <div class="mb-3">
                                <label for="tr_name" class="form-label">Select Train</label>
                                <select id="tr_name" name="tr_name" class="form-select" required>
                                    <?php
                                        $query_station  = "SELECT DISTINCT tr_number, tr_name,up_down FROM `trains`;";
                                        $result_station = mysqli_query($conn,$query_station);
                                        $num = mysqli_num_rows($result_station);

                                        if($num>0){
                                            while($stations = mysqli_fetch_array($result_station)){
                                                $tr_id = $stations["tr_number"];
                                                echo '<option value="'; echo "$tr_id"; echo '">'.$stations["tr_name"].'</option>';
                                            }
                                        }
                                    ?>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="up_down" class="form-label">Up or Down</label>
                                <select id="up_down" name="up_down" class="form-select" required>
                                    <option value="up">up</option>
                                    <option value="down">down</option>
                                </select>
                            </div>
    
                            <div class="mb-3">
                                <label for="departure" class="form-label">Select Deparature Station</label>
                                <select id="departure" name="departure" class="form-select" required>
                                    <?php
                                        $query_station  = "SELECT DISTINCT st_id, st_name FROM `all_station`";
                                        $result_station = mysqli_query($conn,$query_station);
                                        $num = mysqli_num_rows($result_station);

                                        if($num>0){
                                            while($stations = mysqli_fetch_array($result_station)){
                                                $st_id = $stations["st_name"];
                                                echo '<option id="tushar" value="'; echo "$st_id"; echo '">'.$stations["st_name"].'</option>';
                                            }
                                        }
                                    ?>
                                </select>
                            </div>
                            
                            <div class="mb-3">
                                <label for="destination" class="form-label">Select Destination Station</label>
                                <select id="destination" name="destination" class="form-select" required>
                                    <?php
                                        $query_station  = "SELECT DISTINCT st_id, st_name FROM `all_station`";
                                        $result_station = mysqli_query($conn,$query_station);
                                        $num = mysqli_num_rows($result_station);

                                        if($num>0){
                                            while($stations = mysqli_fetch_array($result_station)){
                                                $st_id = $stations["st_name"];
                                                echo '<option id="tushar" value="'; echo "$st_id"; echo '">'.$stations["st_name"].'</option>';
                                            }
                                        }
                                    ?>
                                </select>
                            </div>

                                <div class="mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="" required>
                                        <label class="form-check-label" for="">
                                            Check This
                                        </label>
                                    </div>
                                </div>
                                <input type="submit" name="change_route_submit" class="btn btn-primary" id="" value="Confirm">
                        </fieldset>
                    </form>
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