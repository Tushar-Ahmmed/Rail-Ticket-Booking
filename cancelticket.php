
 <?php
$alert = false;
session_start();
 if(isset($_SESSION['userLoggedin'])){
    include 'partials/connectNewDb.php';
 }

 else{
    header("location: login.php");
    exit;
 }
 if(isset($_POST['cancel_submit'])){
    $id = $_POST['user_id'];
    $sql = "DELETE FROM `tickets` WHERE ticket_id = '$id'";
    $result = mysqli_query($conn, $sql);
    if($result){
        $alert = true;
    }
 }

?> 


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Remove User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="asset/css/add_trainscss1.css">
    <link rel="stylesheet" href="asset/css/userbodycss.css">
    <link rel="stylesheet" href="asset/css/removeusercss.css">

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
    <?php
    if($alert == true){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
         Ticket Cancelled!!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
      $alert = false;
    }
    ?>
    <div class="container">
        <div class="row">
            <div class="col-xl-2 col-md-2"></div>
            <div class="col-xl-8 col-md-8 highlight-tbl">
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">Ticket ID</th>
                        <th scope="col">Seats</th>
                        <th scope="col">Seat Type</th>
                        <th scope="col">Journey Date</th>
                        <th scope="col">User ID</th>
                        <th scope="col">Train Number</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php
                            $us_id = $_SESSION['user_id'];
                            $query = "SELECT * FROM `tickets` WHERE user_id = $us_id";
                            $result = mysqli_query($conn, $query);
                            $num = mysqli_num_rows($result);
                            if($num>0){
                                while($data = mysqli_fetch_array($result)){
                                    $Ticket_id = $data['ticket_id'];
                                    $Seats= $data['seat_number'];
                                    $Seat_Type = $data['seat_type'];
                                    $Journey_date = $data['journey_date'];
                                    $User_id = $data['user_id'];
                                    $tr_number= $data['tr_number'];
                                    echo '<tr>
                                    <th scope="row">'.$Ticket_id.'</th>
                                    <td>'.$Seats.'</td>
                                    <td>'.$Seat_Type.'</td>
                                    <td>'.$Journey_date.'</td>
                                    <td>'.$User_id.'</td>
                                    <td>'.$tr_number.'</td>
                                  </tr>';
                                }
                            }
                        ?>
                      
                      
                    </tbody>
                  </table>
            </div>
            <div class="col-xl-2 col-md-2"></div>
        </div>
    </div>

    <div class="container">
        <div class="row my-5">
            <div class="col-xl-2 col-md-2"></div>
                <div class="col-xl-8 col-md-8 highlight">
                    <form action="" method="post">
                        <fieldset>
                            <legend>Delete User</legend>
    
                                <div class="mb-3">
                                    <label for="user_id" class="form-label">Select User ID</label>
                                    <select id="user_id" name="user_id" class="form-select" required>

                                    <?php
                                            $us_id = $_SESSION['user_id'];
                                            $query = "SELECT * FROM `tickets` WHERE user_id = $us_id";
                                            $result = mysqli_query($conn, $query);
                                            $num = mysqli_num_rows($result);
                                            if($num>0){
                                                while($data = mysqli_fetch_array($result)){
                                                    $id = $data['ticket_id'];
                                                    echo '<option value="'.$id.'">'.$id.'</option>';
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
                                <input type="submit" name="cancel_submit" class="btn btn-primary" id="removebtn" value="Remove">
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