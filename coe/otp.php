

<?php
session_start();
if($_SESSION['gmail']==""){
	header("Location: signup.php");
	exit();
}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<title>OTP Verification</title>
		<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;900&amp;display=swap" />
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
		<style>
			  * {
			  box-sizing: border-box;
			  margin: 0;
			  padding: 0;
			  font-family: 'Poppins', sans-serif;
			}

			html,
			body {
			  height: 100%;
			  display: grid;
			  place-items: center;
			  background-color: #00162E;
			}

			.container {
			  width: 400px;
			  padding: 20px 50px 50px 50px;
			  background-color: #012F47;
			  border-radius: 25px;
			  
			}
			
			h3.title {
			  font-size: 28px;
			  font-weight: 700;
			  color: white;
			  margin-bottom: 25px;
			}

			p.sub-title {
			  color: #B5BAB8;
			  font-size: 14px;
			  margin-bottom: 25px;
			}

			p span.mail {
			  display: block;
			  color: #85FFC7;
			  font-weight: 600;
			}

			.wrapper {
			  width: 100%;
			  display: grid;
			  grid-template-columns: repeat(4, 1fr);
			  justify-items: space-between;
			}

			.wrapper input.field {
			  width: 50px;
			  line-height: 75px;
			  font-size: 32px;
			  border: none;
			  background-color: #194359;
			  border-radius: 5px;
			  text-align: center;
			  text-transform: uppercase;
			  color: white;
			  margin-bottom: 25px;
			}

			.wrapper input.field:focus {
			  outline: none;
			}

			button.resend {
			  background-color: transparent;
			  border: none;
			  font-weight: 600;
			  color: #66A499;
			  cursor: pointer;
			}

			button.resend i {
			  margin-left: 5px;
			}
			.logo-image 
			{
				display: block;
			  margin: 0 auto;
				
			}
		</style>
	</head>
	<body>
		<!-- partial:index.partial.html -->
		<div class="container">
			<img class="logo-image" src="images/logo.png" alt="" width="170px" />
			<h3 class="title">OTP Verification</h3>
			<p class="sub-title">
				Enter the OTP you received to
				<span class="mail">dummy@gmail.com</span>
			</p>
			<form method="POST" >
			<div class="wrapper">
				<input type="text" name="dig1" class="field 1" maxlength="1" />
				<input type="text" name="dig2" class="field 2" maxlength="1" />
				<input type="text" name="dig3" class="field 3" maxlength="1" />
				<input type="text" name="dig4" class="field 4" maxlength="1" />
			</div>
		</form>
			<button  class="resend" onclick="resendOTP()">
				Resend OTP
				<i class="fa fa-caret-right"></i>
			</button>
		</div>
		<!-- partial -->
		<script>
		

		function resendOTP() {
    // Make an AJAX call to the PHP script
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            alert(this.responseText);
        }
    };
    xhttp.open("GET", "sendotp.php", true);
    xhttp.send();
}


			  const form = document.querySelector("form");
const inputFields = document.querySelectorAll("input.field");
const submitButton = document.querySelector("button[type='submit']");

inputFields.forEach((field) => {
  field.addEventListener("input", handleInput);
});

function handleInput(e) {
  let inputField = e.target;
  if (inputField.value.length >= 1) {
    let allFieldsFilled = true;
    inputFields.forEach((field) => {
      if (field.value.length < 1) {
        allFieldsFilled = false;
      }
    });
    if (allFieldsFilled) {
      const formData = new FormData(form);
      const xhr = new XMLHttpRequest();
      xhr.open('POST', 'backend/otp_verify.php');
	  xhr.onload = function() {
  if (xhr.status === 200) {
    const responseText = xhr.responseText.replace(/^Connected successfully/, '');
    const response = JSON.parse(responseText);
    if (response.success) {
		
      alert('OTP verification successful!');
      window.location.href = 'login.php';
    } else {
      alert(response.message);
    }
  } else {
	
    alert('Server error. Please try again.');
  }
};

      xhr.send(formData);
    } else {
      let nextField = inputField.nextElementSibling;
      if (nextField) {
        nextField.focus();
      }
    }
  }
}








		</script>
	</body>
</html>
