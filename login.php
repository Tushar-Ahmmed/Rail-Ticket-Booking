
<?php
$login = false;
if(isset($_POST['submit'])){
	
	include 'partials/connectNewDb.php';

	$userid = $_POST['userid'];
	$password = $_POST['password'];



	$sql1 = "SELECT * FROM `users` WHERE `user_id` = '$userid' AND `u_password`= $password";
	$result1 = mysqli_query($conn, $sql1);
	$num1 = mysqli_num_rows($result1);

	$sql2 = "SELECT * FROM `admin` WHERE `user_id` = '$userid' AND `u_password`= $password";
	$result2 = mysqli_query($conn, $sql2);

	$num2 = mysqli_num_rows($result2);

	if($num1 == 1){
		$login = true;
		session_start();
		$_SESSION['userLoggedin'] = true;
		$_SESSION['user_id'] = $userid;
		header("location: userinterface.php");

	}
	
	if($num2 == 1){
		$login = true;
		session_start();
		$_SESSION['adminLoggedin'] = true;
		$_SESSION['user_id'] = $userid;
		header("location: adminpannel.php");

	}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
<title>Login</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<link rel="stylesheet" href="asset/css/signup1.css">
</head>
<body>
	<?php
		if($login){
			echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
			<strong>Success!!!</strong>  You can login now!!!
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>';
		}
	?>
	
    <div class="logo">
        <img src="asset/images/logo.png" alt="logo">
    </div>
<div class="signup-form">
    <form action="login.php" method="post">
		<h2>Login</h2>
		<p class="sub-txt">Please provide the credientials</p>
		<hr>

        <div class="form-group">
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text">
						<i class="fa fa-solid fa-square-phone-flip"></i>
					</span>                    
				</div>
                <input type="number" class="form-control" name="userid" placeholder="User ID" required="required">
			</div>
        </div>
       
		<div class="form-group">
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text">
						<i class="fa fa-lock"></i>
					</span>                    
				</div>
				<input type="password" class="form-control" name="password" placeholder="Password" required="required">
			</div>
        </div>
		
        
		<div class="form-group">
			<input id="s_button" type="submit" name="submit"  value="Login">
        </div>
    </form>
	<div class="text-center">Do not have account? <a href="signup.php">Sign Up here</a></div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://kit.fontawesome.com/66db48583f.js" crossorigin="anonymous"></script>
</body>
</html>