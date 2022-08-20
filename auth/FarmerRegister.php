<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/c587fc1763.js" crossorigin="anonymous"></script>
    <title>Farmer Registration Portal</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../portal_files/bootstrap.min.css">
    <script>
        function state()
		{
            var a = document.getElementById('states').value;
            if (a === 'ANDHRA PRADESH')
                var array = ['Alluri Sitharama Raju','Anakapalli','Anantapur','Annamayya','Bapatla','Chittoor','Dr. B.R.Ambedkar Konaseema','East Godavari','Eluru','Guntur','Kakinada','Krishna','Kurnool','Nandyal','NTR','Palnadu','Parvathipuram Manyam','Prakasam','Sri Potti Sriramulu Nellore','Sri Sathya Sai','Srikakulam','Tirupati','Visakhapatnam','Vizianagaram','West Godavari','YSR'];
            else if (a === 'TELANGANA')
                var array = ['Adilabad','Bhadradri','Hanamkonda', 'Hyderabad','Jagitial','Jangaon','Jayashankar','Jogulamba','Kamareddy', 'Karimnagar','Khammam','Kumuram Bheem','Mahabubabad', 'Mahabubnagar','Mancherial','Medak','Medchal–Malkajgiri','Mulugu','Nagarkurnool','Nalgonda','Narayanpet','Nirmal','Nizamabad','Peddapalli','Rajanna Sircilla','Rangareddi','Sangareddy','Siddipet','Suryapet','Vikarabad','Wanaparthy','Warangal', 'Yadadri'];
            var string = "";
            for (let i = 0; i < array.length; i++) {
                string = string + "<option>" + array[i] + "</option>";

            }
            string = "<select nmae = 'lol'>" + string + "</select>"
            document.getElementById('district').innerHTML = string;
        }
    </script>
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
			<img src="../Images/Website/farm_log.png" class="img-fluid" style="min-height:100%;" />
		</div>
		<div class="col-md-6 bg-white p-5">
			<h4 class="pb-3">Farmer Registration</h4>
			<div class="form-style">
				<form action="FarmerRegister.php" method="post">
								<div class="form-group pb-3">
										<input type="text" id="full_name" class="form-control" name="name" placeholder="Enter Your Name" required>
								</div>
								<div class="form-group pb-3">
									<input type="text" id="phone_number" class="form-control" name="phonenumber" placeholder="Phone Number" required>
								</div>
								<div class="form-group pb-3">
										<textarea type="text" id="present_address" class="form-control" rows="4" name="address" placeholder="Address" required></textarea>
								</div>
								<div class="form-group pb-3">
                                        <select name="statevalue" id="states" onchange="state()" class="form-control">
                                            <option value="0">--Select State--</option>
                                            <option value="ANDHRA PRADESH">ANDHRA PRADESH</option>
                                            <option value="TELANGANA">TELANGANA</option>
                                        </select>
                                </div>
                                <div class="form-group pb-3">
                                        <select name="district" id="district" class="form-control">
                                            <option>Select District</option>
                                        </select>
                                </div>
                                <div class="form-group pb-3">
										<input type="text" id="account2" class="form-control" name="pan" placeholder="Pan number" required>
									</div>
								<div class="form-group pb-3">
										<input type="text" id="account1" class="form-control" name="account" placeholder="Bank Account number" required>
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
	</main>
   
</body>

</html>


<?php

include("../Includes/db.php");

$ciphering = "AES-128-CTR";
$iv_length = openssl_cipher_iv_length($ciphering);
$options = 0;
$encryption_iv = '2345678910111211';
$encryption_key = "DE";

if (isset($_POST['register'])) {
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $phonenumber = mysqli_real_escape_string($con, $_POST['phonenumber']);
    $address = mysqli_real_escape_string($con, $_POST['address']);
    $account = mysqli_real_escape_string($con, $_POST['account']);
    $pan = mysqli_real_escape_string($con, $_POST['pan']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $confirmpassword = mysqli_real_escape_string($con, $_POST['confirmpassword']);
    $district = mysqli_real_escape_string($con, $_POST['district']);
    $state = mysqli_real_escape_string($con, $_POST['statevalue']);

    if (strcmp($password, $confirmpassword) == 0) {

        $query = "insert into farmerregistration (farmer_name,farmer_phone,
                farmer_address, farmer_state, farmer_district,
                farmer_pan,farmer_bank,farmer_password) 
                values ('$name','$phonenumber','$address',
                '$state','$district','$pan','$account',
                '$password')";

        $run_register_query = mysqli_query($con, $query);
        echo "<script>console.log('SucessFully Inserted');</script>";
        echo "<script>window.open('FarmerLogin.php','_self')</script>";
    } else if (strcmp($password, $confirmpassword) != 0) {
        echo "<script>
				alert('Password and Confirm Password Should be same');
			</script>";
    }
}

?>