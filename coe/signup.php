
<?php
session_start();
include('backend/config.php');

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $gmail = mysqli_real_escape_string($conn,$_POST['gmail']);
    $username = mysqli_real_escape_string($conn,$_POST['user-name']);
    $password = mysqli_real_escape_string($conn,$_POST['password']);
    $repassword = mysqli_real_escape_string($conn,$_POST['re-password']);
    session_id($_POST['gmail']);
    $_SESSION['gmail'] = $_POST['gmail'];
    // Check if the password and confirm password match
    if($password != $repassword) {
        echo "<script>alert('Passwords do not match.');</script>";
        header("refresh:0;url=signup.php");
        exit();
    }
    // Check if the user already exists in the database
    $sql = "SELECT * FROM signup WHERE gmail='$gmail'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0) {
        echo "<script>alert('User already exists.');</script>";
        header("refresh:0;url=signup.php");
        exit();
    }
    // Generate a random OTP
    
   
    // Insert the user details into the database
    $sql = "INSERT INTO signup (gmail, name, password) VALUES ('$gmail', '$username', '$password')";
    mysqli_query($conn, $sql);

    // Insert the OTP into the database
    include "backend/sendotp.php";
	
    
}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
		<title>Login</title>
		<style></style>
		<script>

			var a;
			function pass()
			{
			if(a==1)
			{
			document.getElementById('password').type='password';
			document.getElementById('re-password').type='password';
			document.getElementById('pass-icon').src='images/pass-hide.png';
			a=0;
			}
			else
			{
			document.getElementById('password').type='text';
			document.getElementById('re-password').type='text';
			document.getElementById('pass-icon').src='images/pass-show.png';
			a=1;
			}
			}
		</script>

		<style>
						        body
						        {
						            background-color:#00162E;
						        }
						        .login-box {
						  display: flex;
						  background-color: #012F47;
						  width: 80vw;
						  /* height: 75vh; */
			        height: auto;
			        padding-top: 4%;;
			        padding-bottom: 5%;
						  border-radius: 30px;
						  position: absolute;
						  top: 50%;
						  left: 50%;
						  transform: translate(-50%, -50%);
						  color: white;
						  text-align: center;
						  justify-content: center ;
						}
						.login-box h1
						{
						    margin: 1% 0% 1% 0%;
						    position: absolute;
						}
						.login-box p
						{
						    margin: 7% 0% 0% 0%;
			                position: absolute;
			                /* background-color: yellow; */

						}
			            .input-box
			            {
			                margin-top: 30%;
			                display: flex;
			                flex-direction: column;
			                /* border:none; */
			            }
			           .in-text
			           {
			            width: 400px;
			            height: 40px;
			            border-radius: 15px;
			            margin:12px 0px;
			            background-color: #194359;
			            border: none;
			            color: #fff;
			            padding-left: 10px;
			            padding-right: 10px;
			            /* position: absolute; */
			           }
						/* #remember-check
			            {
			                display: flex;
			  align-items: center;
			  margin-left: 10px;
			  text-align: left 20px;

			            }     */
			            label.check{
			                display: flex;
			  align-items: center;
			  margin-left: 6px;
			  text-align: left 20px;
			  margin-top: 20px;
			position: absolute;


			            }
			            .bottom a{

			                margin-top: 270px;
			                position: absolute;
			                color: white;
			                right: 0%;
			                color: #85FFC7;
			                text-decoration: none;


			            }

			            .bottom{
			                width: 400px;
			                position: absolute;
			                margin-top: 1px;;

			            }
			.submit
			{
			    width: 400px;
			    height: 40px;
			    /* position: absolute; */
			    /* margin-top: 150px; */
			    background-color: #66A499;
			    color: white;
			    margin-top: 50px;
			    border-radius: 15px;
			    border: none;
			    font-size: large;

			}
			.pass-icon
			{
			    position: absolute;
			    top: 332px;
			    right: 350px;
			    width: 24px;
			    cursor: pointer;
			}
		</style>
	</head>
	<body>
		<div class="login-box">
			<h1>Sign up</h1>
			<p>Welcome Back! Login to Continue</p>
			<form action="signup.php" method="POST">
				<div class="input-box">
				    <input class="in-text" type="text" name="gmail" required="required" placeholder="Enter Email" autocomplete="off" />
					<input class="in-text" type="text" name="user-name" required="required" placeholder="Enter Username" autocomplete="off" />
					<!-- <input class="in-text" type="password" name="" required="required" placeholder="Enter the password" /> -->

					<input class="in-text" type="password" name="password"placeholder="Password" id="password" autocomplete="off" />

					<input class="in-text" type="password"name="re-password" placeholder="Re-enter Password" id="re-password" autocomplete="off" />
					<img src="images/pass-hide.png" width="40px" onclick="pass()" class="pass-icon" id="pass-icon" />

					<div class="bottom">
						<!-- <label for="remember-me">Remember Me:</label>
  <input type="checkbox" id="remember-me" name="remember-me"> -->
						<a href="login.php">Already have an account ? </a>
					</div>
				</div>
				<button class="submit">SIGN UP</button>
			</form>
		</div>
	</body>
</html>
