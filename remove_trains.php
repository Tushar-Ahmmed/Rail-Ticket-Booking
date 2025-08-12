<?php
$permission = false;
session_start();
if(!isset($_SESSION['adminLoggedin'])){
    header("location: login.php");
    exit;
}
else{
  include 'partials/connectNewDb.php';
  $query = "SELECT * FROM `trains`";
  $result_delete = mysqli_query($conn, $query);
}

?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Remove Trains</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="asset/css/add_trainscss1.css">
    <link rel="stylesheet" href="asset/css/removetrainscss.css">
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
        if(isset($_SESSION['alert_remove'])){
          echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
          Successfully Removed
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';

        unset($_SESSION['alert_remove']);
        }
      ?>
    </div>



  <?php
    global $permission;
    if($permission == true){
      echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
      deletion Successfull
       <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
     </div>';
     $permission = false;
    }
  ?>
    <?php
      echo '<div class="container">
      <div class="row my-5">
          <div class="col-xl-2 col-md-2"></div>
          <div class="col-xl-8 col-md-8 highlight-tbl">
              <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">Train Number</th>
                      <th scope="col">Name</th>
                      <th scope="col">Catagory</th>
                      <th scope="col">Off day</th>
                      <th scope="col">Up/Down</th>
                    </tr><br>
                  </thead>
                  <tbody>';
                  global $result_delete;
                  while($row = mysqli_fetch_assoc($result_delete)){
                    echo '<tr>';
                    echo '<th scope="row">'.$row["tr_number"].'</th>';
                    echo '<td>'.$row["tr_name"].'</td>';
                    echo '<td>'.$row["tr_catagory"].'</td>';
                    echo '<td>'.$row["offday"].'</td>';
                    echo '<td>'.$row["up_down"].'</td>';
                    echo '</tr>';}
                 echo '</tbody>
                </table>
          </div>
          <div class="col-xl-2 col-md-2"></div>
      </div>
  </div>';               
    ?>
    
    <div class="container">
        <div class="row">
            <div class="col-xl-2 col-md-2"></div>
            <div class="col-xl-8 col-md-8">
                <form action="delete_train.php" method="post">
                    <fieldset>
                        <legend>Remove Trains</legend>

                        <div class="mb-3">
                            <label for="tr_id" class="form-label">Train's ID</label>
                            <input type="number" id="tr_id" name="tr_id" class="form-control" placeholder="7888"
                                required>
                        </div>
                            <input type="submit" name="details_submit" class="btn btn-primary" id="" value="Remove">
                    </fieldset>
                </form>
            </div>
            <div class="col-xl-2 col-md-2"></div>
        </div>
    </div>


    <!-- <div class="container">
        <div class="row">
            <div class="col-xl-2 col-md-2"></div>
            <div class="col-xl-8 col-md-2">
                
            </div>
            <div class="col-xl-2 col-md-2"></div>
        </div>
    </div> -->



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