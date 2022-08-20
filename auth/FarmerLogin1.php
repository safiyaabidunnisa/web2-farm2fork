<!DOCTYPE html>
<html>

	<head>
		<title>Farmer Login portal</title>
	</head>
	<body>
	<main class="my-form">
		<div class="cotainer">
			<div class="row justify-content-center">
				<div class="col-md-8">
					<div class="card " >
						<div class="card-header text-left" style="background-color:#292b2c">
							<h4  style="font-style:bold;color:goldenrod;text-align:left">Login</h4>
						</div>
						<div class="card-body border border-dark">
							<form name="my-form" action="FarmerLogin.php" method="post">

								<div class="form-group row">
									<label for="phone_number" class="col-md-4 col-form-label text-md-right"><i class="fas fa-phone-alt mr-2"></i><b>Phone Number</b></label>
									<div class="col-md-6">
										<input type="text" id="phone_number" class="form-control border border-dark" name="phonenumber" placeholder="Phone Number" required>
									</div>
								</div>

								<div class="form-group row">
									<label for="p1" class="col-md-4 col-form-label text-md-right"><i class="fas fa-lock mr-2"></i><b>Password</b></label>
									<div class="col-md-6">
										<input id="p1" class="form-control border border-dark" type="password" name="password" placeholder="Password" required>
									</div>
								</div>

								<div class="col-md-6 offset-md-4">
									<button type="submit" class="btn btn-primary text-left border border-dark" style="background-color:#292b2c;color:goldenrod" name="login" value="Login">
										Login
									</button>
								</div>
								<br>
								<div class="col-md-6 offset-md-4">
									<label id="forgotPassword"  class="text-left"><a id='link' style="" href="FarmerForgotPassword.php"><b style="color:black ;text-align:left"> Forgot your password </b></a></label>
									<br>
									<label id="account" class="text-left"><a id='link' href="FarmerRegister.php"><b style="color:black"> Create New Account</b></a></label>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>
	
</body>

</html>