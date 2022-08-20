<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<script src="https://kit.fontawesome.com/c587fc1763.js" crossorigin="anonymous"></script>
	<title>Buyer Registration portal</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../portal_files/bootstrap.min.css">
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
		<img src="../Images/Website/customer_log_1.png" class="img-fluid" style="min-height:100%;" />
		</div>
		<div class="col-md-6 bg-white p-5">
			<h4 class="pb-3">Buyer Registration</h4>
			<div class="form-style">
							<form name="my-form" action="BuyerRegistration.php" method="post">
								<div class="form-group pb-3">
									<input type="text" id="full_name" class="form-control" name="name" placeholder="Enter Your Name" required>
								</div>
								<div class="form-group pb-3">
									<input type="text" id="phone_number" class="form-control" name="phonenumber" placeholder="Phone Number" required>
								</div>
								<div class="form-group pb-3">
									<input type="email" id="email_address" class="form-control" name="mail" placeholder="E-Mail ID" required>
								</div>
								<div class="form-group pb-3">
									<textarea type="text" id="present_address" class="form-control" rows="4" name="address" placeholder="Address" required></textarea>
								</div>
								<div class="form-group pb-3">
									<input type="text" id="campany_name" class="form-control" name="company_name" placeholder="Company name" required>
								</div>
								<div class="form-group pb-3">
									<input type="text" id="lisence" class="form-control" name="license" placeholder="license" required>
								</div>
								<div class="form-group pb-3">
									<input type="text" id="account1" class="form-control" name="account" placeholder="Bank Account number" required>
								</div>
								<div class="form-group pb-3">
									<input type="text" id="account2" class="form-control" name="pan" placeholder="Pan number" required>
								</div>
								<div class="form-group pb-3">
									<input type="text" id="user_name" class="form-control" name="username" placeholder="Username" required>
								</div>
								<div class="form-group pb-3">
									<input id="p1" class="form-control" type="password" name="password" placeholder="Password" required>
								</div>
								<div class="form-group pb-3">
									<input id="p2" class="form-control" type="password" name="confirmpassword" placeholder="Confirm Password" required>
								</div>
								<div class="pb-2">
									<button type="submit" class="btn btn-dark w-100 font-weight-bold mt-2" style="background-color:#292b2c;color:goldenrod"   name="register" value="Register">
										Register
									</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
<?php

include("../Includes/db.php");

if (isset($_POST['register'])) {

	$name = mysqli_real_escape_string($con, $_POST['name']);
	$phonenumber = mysqli_real_escape_string($con, $_POST['phonenumber']);
	$address = mysqli_real_escape_string($con, $_POST['address']);
	$company_name = mysqli_real_escape_string($con, $_POST['company_name']);
	$license = mysqli_real_escape_string($con, $_POST['license']);
	$account = mysqli_real_escape_string($con, $_POST['account']);
	$pan = mysqli_real_escape_string($con, $_POST['pan']);
	$mail = mysqli_real_escape_string($con, $_POST['mail']);
	$username = mysqli_real_escape_string($con, $_POST['username']);
	$password = mysqli_real_escape_string($con, $_POST['password']);
	$confirmpassword = mysqli_real_escape_string($con, $_POST['confirmpassword']);

	if (strcmp($password, $confirmpassword) == 0) {

		$query = "insert into buyerregistration (buyer_name,buyer_phone,buyer_addr,buyer_comp,
		buyer_license,buyer_bank,buyer_pan,buyer_mail,buyer_username,buyer_password) 
		values ('$name','$phonenumber','$address','$company_name','$license','$account','$pan',
		'$mail','$username','$password')";

		$run_register_query = mysqli_query($con, $query);
		echo "<script>alert('SucessFully Inserted');</script>";
		echo "<script>window.open('BuyerLogin.php','_self')</script>";
	} else if (strcmp($password, $confirmpassword) != 0) {
		echo "<script>
			alert('Password and Confirm Password Should be same');
		</script>";
	}
}
?>