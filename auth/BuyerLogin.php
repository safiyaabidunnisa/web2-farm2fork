<?php
session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Buyer login portal</title>
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
					<img src="../Images/Website/buyer_log2_1.png" class="img-fluid" style="min-height:100%;" />
				</div>
                <div class="col-md-6 bg-white p-5">
					<h4 class="pb-3">Buyer login</h4>
					<div class="form-style">
					<form action="BuyerLogin.php" method="post">
					<div class="form-group pb-3">
                        <input type="text" id="phone_number" class="form-control" name="phonenumber" placeholder="Phone Number" required>
                    </div>
					<div class="form-group pb-3">
                        <input id="p1" class="form-control" type="password" name="password" placeholder="Password" required>
                    </div>
					<div class="d-flex align-items-center justify-content-between">
                    <div><a href="BuyerForgotPassword.php">Forget Password?</a></div>
					</div>
					<div class="pb-2">
					<button type="submit" class="btn btn-dark w-100 font-weight-bold mt-2" name="login" value="Login">Login</button>
					</div>
				</form>
			<div class="sideline">OR</div>
			<div>
			<a id='link' href="BuyerRegistration.php"><button type="submit" class="btn btn-primary w-100 font-weight-bold mt-2" ><i class="fa fa-facebook" aria-hidden="true"></i> Create New Account</button></a>
			</div>
			</div>						
			</div>
			</div>
		</div>
	</body>

</html>

<?php
include("../Includes/db.php");

if (isset($_POST['login'])) {

    $phonenumber = mysqli_real_escape_string($con, $_POST['phonenumber']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    $query = "select * from buyerregistration where buyer_phone = '$phonenumber' and buyer_password = '$password'";
    $run_query = mysqli_query($con, $query);
    $count_rows = mysqli_num_rows($run_query);
    if ($count_rows == 0) {
        echo "<script>alert('Please Enter Valid Details');</script>";
        echo "<script>window.open('BuyerLogin.php','_self')</script>";
    }
    while ($row = mysqli_fetch_array($run_query)) {
        $id = $row['buyer_id'];
    }

    $_SESSION['phonenumber'] = $phonenumber;
    echo "<script>window.open('../BuyerPortal2/bhome.php','_self')</script>";
}
?>