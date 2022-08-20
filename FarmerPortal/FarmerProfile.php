<?php
 include("../Includes/db.php");
 session_start();
 $sessphonenumber = $_SESSION['phonenumber'];
 $sql = "select * from farmerregistration where farmer_phone = '$sessphonenumber' ";
 $run_query = mysqli_query($con, $sql);
 while ($row = mysqli_fetch_array($run_query)) {
     $name = $row['farmer_name'];
     $phone = $row['farmer_phone'];
     $address = $row['farmer_address'];
     $pan = $row['farmer_pan'];
     $bank = $row['farmer_bank'];
     $state = $row['farmer_state'];
     $district = $row['farmer_district'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
   <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">-->
    <title>Farmer Profile</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

     <link rel="stylesheet" href="../portal_files/bootstrap.min.css">
     <script src="../portal_files/jquery.min.js.download"></script>
     <script src="../portal_files/popper.min.js.download"></script>
     <script src="../portal_files/bootstrap.min.js.download"></script>

    <style>
	body{
		margin: 0;
		padding: 0;
		background: url(../Images/Website/bg1.jpg);
		background-repeat:no-repeat;
		text-align: center;
		background-size:100% 100%;
		background-attachment: fixed;
		font-family: sans-serif;
		}
	.login-box{
		width: 550px;
		height: 250x;
		background: rgba(0, 0, 0, 0.5);
		color: #fff;
		top: 50%;
		left: 50%;
		position: absolute;
		transform: translate(-50%,-50%);
		box-sizing: border-box;
		padding: 70px 30px;
	}
	.avatar{
		width: 100px;
		height: 100px;
		border-radius: 50%;
		position: absolute;
		top: -50px;
		left: calc(50% - 50px);
	}
	h1{
		margin: 0;
		padding: 0 0 20px;
		text-align: center;
		font-size: 22px;
	}
	.login-box p{
		margin: 0;
		padding: 0;
		font-weight: bold;
	}
	.login-box input{
		width: 100%;
		margin-bottom: 20px;
	}
	.login-box input[type="text"], textarea
	{
		border: none;
		border-bottom: 1px solid #fff;
		background: transparent;
		outline: none;
		height: 40px;
		color: #fff;
		font-size: 16px;
	}
	.login-box input[type="submit"]
	{
		border: none;
		outline: none;
		height: 40px;
		background: #1c8adb;
		color: #fff;
		font-size: 18px;
		border-radius: 20px;
	}
	.login-box input[type="submit"]:hover
	{
		cursor: pointer;
		background: #39dc79;
		color: #000;
	}
	.login-box a{
		text-decoration: none;
		font-size: 14px;
		color: #fff;
	}
	.login-box a:hover
	{
		color: #39dc79;
	}
	</style>
		
	<body>	
	<div class="login-box">
    <img src="../Images/Website/img.jpg" class="avatar">
	<table align="center">
                <tr colspan=2>
                    <h1> FARMER'S PROFILE</h1>
                </tr>
                <tr align="center">
                    <td><label><b>Name :</b></label></td>
                    <td>
                        <!--<textarea rows="2" column="10" disabled> <?php echo $name ?> </textarea> -->
                        <input type="text" readonly class="form-control-plaintext border border-dark" id="staticEmail" value="<?php echo $name?>">
                    <br>
					</td>
                </tr>
                <tr align="center">
                    <td><label><b>Phone Number :</b></label></td>
                    <td><textarea rows="2" column="10" disabled> <?php echo $phone ?> </textarea><br></td>
                </tr>
                <tr align="center">
                    <td><label><b>Address :</b></label></td>
                    <td><textarea rows="3" column="56" disabled> <?php echo $address ?> </textarea><br></td>
                </tr>

                <tr align="center">
                    <td><label><b>State :</b></label></td>
                    <td><textarea rows="3" column="56" disabled> <?php echo $state ?> </textarea><br></td>
                </tr>
                <tr align="center">
                    <td><label><b>District :</b></label></td>
                    <td><textarea rows="3" column="56" disabled> <?php echo $district ?> </textarea><br></td>
                </tr>

                <tr align="center">
                    <td><label><b>Pan Number :</b></label></td>
                    <td><textarea rows="2" column="10" disabled> <?php echo $pan ?> </textarea><br></td>
                </tr>
                <tr align="center">
                    <td><label><b>Account Number :</b></label></td>
                    <td><textarea rows="2" column="10" disabled> <?php echo $bank ?> </textarea><br></td>
                </tr>

                <td colspan=2><a href="EditProfile.php"><input type="submit" name="editProf" value="Edit Profile"></td>
				
                </tr>
            </table>
			<a href="FarmerHomepage.php"><input type="submit" name="backeditProf" value="Back">
        </div>

	</body>

</html>