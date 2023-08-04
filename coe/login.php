<?php
session_start();
include('backend/config.php');

if($_SERVER["REQUEST_METHOD"] == "POST") {
	
    $gmail = mysqli_real_escape_string($conn,$_POST['name']);
    $password = mysqli_real_escape_string($conn,$_POST['password']);
    
    $sql = "SELECT name,mail,password FROM signup WHERE (name = '$gmail' or mail='$gmail') and password = '$password'";
      
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $count = mysqli_num_rows($result);
    
    // If result matched $gmail and $password, table row must be 1 row
    if($count == 1) {
        $gmail = $row['gmail'];
        $_SESSION['sesname'] = $gmail;
        echo "<script type='text/javascript'>alert('Login success');</script>";
        header("Location: index.php");
        exit();
    } else {
        $message = "Invalid credentials";
        header("Location: login.php?msg=invalid");
        exit();
    }
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
			document.getElementById('pass-icon').src='images/pass-hide.png';
			a=0;
			}
			else
			{
			document.getElementById('password').type='text';
			document.getElementById('pass-icon').src='images/pass-show.png';
			a=1;
			}
			}






			function getCookie(name) {
			  var nameEQ = name + "=";
			  var ca = document.cookie.split(';');
			  for (var i = 0; i < ca.length; i++) {
			    var c = ca[i];
			    while (c.charAt(0) == ' ') c = c.substring(1, c.length);
			    if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
			  }
			  return null;
			}

			// check if the cookie exists and log the user in automatically if it does
			var storedUsername = getCookie("username");
			var storedPassword = getCookie("password");

			if (storedUsername && storedPassword) {
			  usernameInput.value = storedUsername;
			  passwordInput.value = storedPassword;
			  login();
			}

			function setCookie(name, value, days) {
			  var expires = "";
			  if (days) {
			    var date = new Date();
			    date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
			    expires = "; expires=" + date.toUTCString();
			  }
			  document.cookie = name + "=" + (value || "")  + expires + "; path=/";
			}

			// set the cookie when the user logs in with "Remember Me" checkbox checked
			if (rememberMeCheckbox.checked) {
			  setCookie("username", username, 30); // expires in 30 days
			  setCookie("password", password, 30);
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

			                margin-top: 20px;
			                position: absolute;
			                color: white;
			                right: 0%;
			                color: #85FFC7;
			                text-decoration: none;


			            }

			            .bottom{
			                width: 400px;
			                position: absolute;
			                margin-top: 125px;;

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
			    top: 267px;
			    right: 350px;
			    width: 24px;
			    cursor: pointer;
			}
		</style>
	</head>
	<body>
		<div class="login-box">
			<h1>Log in</h1>
			<p>Welcome Back! Login to Continue</p>
			<form action="login.php" method="POST">
				<div class="input-box">
					<input class="in-text" type="text" name="name" required="required" placeholder="Enter Username" />
					<!-- <input class="in-text" type="password" name="" required="required" placeholder="Enter the password" /> -->

					<input class="in-text" type="password" placeholder="Password" name="password" id="password" />
					<img src="images/pass-hide.png" width="40px" onclick="pass()" class="pass-icon" id="pass-icon" />

					<div class="bottom">
						<label class="check"> <input id="remember-check" type="checkbox" name="remember" /> Remember me </label>

						<!-- <label for="remember-me">Remember Me:</label>
  <input type="checkbox" id="remember-me" name="remember-me"> -->
						<a href="https://www.google.com/">Forgot password ?</a>
					</div>
				</div>
				<button class="submit">LOG IN</button>
				
<?php

if(isset($_GET['msg'])&& $_GET['msg'] == "invalid") {
    $error_message = "Invalid login credentials. Please try again.";
    echo "<p id='error-msg'>$error_message</p>";
	
}
?>
			</form>
			
		</div>
		
		<script>
		// Wait for 3 seconds and then hide the error message
		setTimeout(function() {
			document.getElementById('error-msg').style.display = 'none';
		}, 3000);
		</script>
	</body>

</html>

