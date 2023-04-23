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
			<form action="">
				<div class="input-box">
				    <input class="in-text" type="text" name="gmail" required="required" placeholder="Enter Email" autocomplete="off" />
					<input class="in-text" type="text" name="user-name" required="required" placeholder="Enter Username" autocomplete="off" />
					<!-- <input class="in-text" type="password" name="" required="required" placeholder="Enter the password" /> -->

					<input class="in-text" type="password" placeholder="Password" id="password" autocomplete="off" />

					<input class="in-text" type="password" placeholder="Re-enter Password" id="re-password" autocomplete="off" />
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
