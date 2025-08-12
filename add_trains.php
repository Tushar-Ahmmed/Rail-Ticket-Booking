
<?php
require "partials/connectNewDb.php";
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
    <title>Add New Trains</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="asset/css/add_trainscss1.css">
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

    <div class="alert">
        <?php
            if(isset($_SESSION['add_train'])){
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                 Successfully added trains!!!!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
              unset($_SESSION['add_train']);
            }
        ?>
    </div>


    <div class="container">
        <div class="row">
            <div class="col-xl-2 col-md-2"></div>
            <div class="col-xl-8 col-md-8">
                <form action="insert_train.php" method="post">
                    <fieldset>
                        <legend>Add New Trains</legend>

                        <div class="mb-3">
                            <label for="tr_id" class="form-label">Train's ID</label>
                            <input type="number" id="tr_id" name="tr_id" class="form-control" placeholder="788"
                                required>
                        </div>

                        <div class="mb-3">
                            <label for="tr_name" class="form-label">Train's Name</label>
                            <input type="text" id="tr_name" name="tr_name" class="form-control" placeholder="@express"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="catagory" class="form-label">Train Catagory</label>
                            <select id="catagory" name="catagory" class="form-select" required>
                                <option>Inter City</option>
                                <option>Local Mail</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="off_day" class="form-label">Off Day</label>
                            <select id="off_day" name="off_day" class="form-select" required>
                                <option>Sunday</option>
                                <option>Monday</option>
                                <option>Tuesday</option>
                                <option>Wednesday</option>
                                <option>Thursday</option>
                                <option>Friday</option>
                                <option>Saturday</option>
                            </select>
                        </div>
                        <div class="mb-3">

                            <div class="mb-3">
                                <label for="up_down" class="form-label">Up or Down</label>
                                <select id="up_down" name="up_down" class="form-select" required>
                                    <option>up</option>
                                    <option>down</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="acb" class="form-label">Number of AC Barth Seats</label>
                                <input type="number" id="acb" name="acb" class="form-control" placeholder="" required>
                            </div>
                            <div class="mb-3">
                                <label for="acs" class="form-label">Number of AC S_Chair Seats</label>
                                <input type="number" id="acs" name="acs" class="form-control" placeholder="" required>
                            </div>
                            <div class="mb-3">
                                <label for="snigdha" class="form-label">Number of Snigdha Seats</label>
                                <input type="number" id="snigdha" name="snigdha" class="form-control" placeholder=""
                                    required>
                            </div>
                            <div class="mb-3">
                                <label for="s_chair" class="form-label">Number of Shovon Chair Seats</label>
                                <input type="number" id="s_chair" name="s_chair" class="form-control" placeholder=""
                                    required>
                            </div>


                            <div class="mb-3">
                                <label for="deperture" class="form-label">Select Deparature Station</label>
                                <select id="deperture" name="deperture" class="form-select" required>
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
                            <input type="submit" name="details_submit" class="btn btn-primary" id="" value="Submit">
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
        
</body>

</html>