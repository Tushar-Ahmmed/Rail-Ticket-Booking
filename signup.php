
<?php
$showAlert = false;
session_start();
if(isset($_SESSION['userLoggedin']) || isset($_SESSION['adminLoggedin'])){
	header("location: logout.php");
	exit;
}


if(isset($_POST['submit'])){
	include 'partials/connectNewDb.php';
	$user_id = $_POST['user_id'];
	$user_name = $_POST['user_name'];
	$gender = $_POST['gender'];
	$city = $_POST['city'];
	$phone = $_POST['phone_number'];
	$password = $_POST['u_password'];
	$confirm_password = $_POST['confirm_password'];

	if($confirm_password == $password) {
		$sql = "INSERT INTO `users`(`user_id`, `user_name`, `gender`, `city`, `phone_number`, `u_password`) VALUES ('$user_id','$user_name','$gender','$city','$phone','$password')";
		$result = mysqli_query($conn, $sql);
		if($result){
			$showAlert = true;
		}
	}
	else{
		echo("Passwornde Not matched");
	}

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
<title>SignUp</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<link rel="stylesheet" href="asset/css/signup1.css">
</head>
<body>
	<?php
		if($showAlert){
			echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
			<strong>Signup successful!</strong>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>';
		  $showAlert = false;
		}
		
	?>
	
    <div class="logo">
        <img src="asset/images/logo.png" alt="logo">
    </div>
<div class="signup-form">
    <form action="signup.php" method="post">
		<h2>Sign Up</h2>
		<p class="sub-txt">Please fill in this form to create an account!</p>
		<hr>

        <div class="form-group">
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text">
						<i class="fa-solid fa-keyboard"></i>
					</span>                    
				</div>
                <input type="number" class="form-control" name="user_id" placeholder="User Id (integer number 3 to 8 digit)" required="required">
			</div>
        </div>

        <div class="form-group">
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text">
						<i class="fa-solid fa-file-signature"></i>
					</span>                    
				</div>
                <input type="text" class="form-control" name="user_name" placeholder="Full Name" required="required">
			</div>
        </div>

		<!-- GEnder will check lettert -->
        <div class="form-group">
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text">
							<i class="fa-solid fa-keyboard"></i>
					</span>                    
				</div>
                
                	<select id="off_day" name="gender" class="form-control" required>
                        <option>M</option>
                    	<option>F</option>
                	 </select>
			</div>
        </div>

        <div class="form-group">
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text">
						<i class="fa-sharp fa-solid fa-city"></i>
					</span>                    
				</div>
				<input type="text" class="form-control" name="city" placeholder="City" required="required">
			</div>
        </div>
		<div class="form-group">
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text">
						<i class="fa fa-solid fa-square-phone-flip"></i>
					</span>                    
				</div>
				<input type="text" class="form-control" name="phone_number" placeholder="Phone Number" required="required">
			</div>
        </div>
		<div class="form-group">
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text">
						<i class="fa fa-lock"></i>
						<i class="fa fa-check"></i>
					</span>                    
				</div>
				<input type="password" class="form-control" name="u_password" placeholder="Password" required="required">
			</div>
        </div>
		<div class="form-group">
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text">
						<i class="fa fa-lock"></i>
						<i class="fa fa-check"></i>
					</span>                    
				</div>
				<input type="text" class="form-control" name="confirm_password" placeholder="Confirm Password" required="required">
			</div>
        </div>
        <div class="form-group">
			<label class="form-check-label"><input type="checkbox" required="required"> I accept the <a href="#">Terms of Use</a> &amp; <a href="#">Privacy Policy</a></label>
		</div>
		<div class="form-group">
			<input id="s_button" type="submit" name="submit"  value="Sign Up">
            <!-- <button type="submit" class="btn-lg btn-bg" >Sign Up</button> -->
        </div>
    </form>
	<div class="text-center">Already have an account? <a href="login.php">Login here</a></div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://kit.fontawesome.com/66db48583f.js" crossorigin="anonymous"></script>
</body>
</html>