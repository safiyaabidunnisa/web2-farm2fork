<?php
include("../Includes/db.php");
//session_start();
include("../Functions/functions.php");
?>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Farmer Login portal</title>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css">
		<style>
		body {
			background: #c9ccd1;
		}
		.form-style input {
			border: 0;
			height: 50px;
			border-radius: 0;
			border-bottom: 1px solid #ebebeb;
		}
		.form-style input:focus {
			border-bottom: 1px solid #007bff;
			box-shadow: none;
			outline: 0;
			background-color: #ebebeb;
		}
		.sideline {
			display: flex;
			width: 100%;
			justify-content: center;
			align-items: center;
			text-align: center;
			color: #ccc;
		}
		button {
			height: 50px;
		}
		.sideline:before,
		.sideline:after {
			content: "";
			border-top: 1px solid #ebebeb;
			margin: 0 20px 0 0;
			flex: 1 0 20px;
		}

		.sideline:after {
			margin: 0 0 0 20px;
		}
		</style>
	</head>
	<body>
		<div class="container">
		<div class="row m-5 no-gutters shadow-lg">
		<div class="col-md-6 d-none d-md-block">
			<img src="../Images/Website/farm_bg_img1.png" class="img-fluid" style="min-height:100%;" />
		</div>
		<div class="col-md-6 bg-white p-5">
			<h4 class="pb-3">Farmer login</h4>
			<div class="form-style">
				<form action="FarmerLogin.php" method="post">
					<div class="form-group pb-3">
						<input type="text" id="phone_number" name="phonenumber" placeholder="Phone Number" class="form-control" aria-describedby="emailHelp" required>
					</div>
					<div class="form-group pb-3">
						<input type="password" name="password" placeholder="Password" class="form-control" id="p1" required>
					</div>
					<div class="d-flex align-items-center justify-content-between">
						<!--<div class="d-flex align-items-center"><input name="" type="checkbox" value="" /> <span class="pl-2 font-weight-bold">Remember Me</span></div>-->
						<div><a href="FarmerForgotPassword.php">Forget Password?</a></div>
          </div>
          <div class="pb-2">
            <button type="submit" class="btn btn-dark w-100 font-weight-bold mt-2" name="login" value="Login">Login</button>
          </div>
        </form>
        <div class="sideline">OR</div>
        <div>
          <a id='link' href="FarmerRegister.php"><button type="submit" class="btn btn-primary w-100 font-weight-bold mt-2" ><i class="fa fa-facebook" aria-hidden="true"></i> Create New Account</button></a>
        </div>
      </div>

    </div>
  </div>
</div>
</body>
</html>
<?php
if (isset($_POST['login'])) {

	$phonenumber = mysqli_real_escape_string($con, $_POST['phonenumber']);
	$password = mysqli_real_escape_string($con, $_POST['password']);

	$query = "select * from farmerregistration where farmer_phone = '$phonenumber' and farmer_password = '$password'";
	echo $query;
	$run_query = mysqli_query($con, $query);
	$count_rows = mysqli_num_rows($run_query);
	if ($count_rows == 0) {
		echo "<script>alert('Please Enter Valid Details');</script>";
		echo "<script>window.open('FarmerLogin.php','_self')</script>";
	}
	while ($row = mysqli_fetch_array($run_query)) {
		$id = $row['farmer_id'];
	}

	$_SESSION['phonenumber'] = $phonenumber;
	echo "<script>window.open('../FarmerPortal/farmerHomepage.php','_self')</script>";
}

?>