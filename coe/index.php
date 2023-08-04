<!DOCTYPE html>
<html lang="en">
	<head>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
		<meta charset="UTF-8" />
		<title>CoE Digital Forensics Intelligence and Cybersecurity</title>
		<link rel="stylesheet" href="./style.css" />
		<style>
			.logo
			{

				height: 67px;
				width: 67px;
				margin-left: 2%;
			       margin-top: 0.2%;

			}
		</style>
		<script>
			window.onscroll = function() {
			  growShrinkLogo()
			};

			function growShrinkLogo() {
			  var Logo = document.getElementById("Logo")
			  if (document.body.scrollTop > 5 || document.documentElement.scrollTop > 5) {
			    Logo.style.width = '67px';
			  } else {
			    Logo.style.width = '67px';
			  }
			}
		</script>
	</head>
	<body>
		<!-- partial:index.partial.html -->
		<nav class="nav">
			<div class="container">
				<div class="logo">
					<a href="#">
						<img style="float:left ;margin-top: 0%;width: 67px;" src="Logo.png" id="Logo" />
						<h1 class="logo-title" style="float: left;font-size: 14px;margin-top: 0%; line-height: 1.6;margin-left: 3px;">
							CoE Digital Forensics <br />
							Intelligence & Cyber Security-SCEM
						</h1>
					</a>
					<!--  -->
				</div>
				<div id="mainListDiv" class="main_list" style="margin-right: 15%;">
					<ul style="font-family: 'Tinos', serif;" class="navlinks">
						<li><a href="#">Home</a></li>
						<li><a href="#">About</a></li>
						<li><a href="#">Skills Hub</a></li>
						<li><a href="#">Resources Hub</a></li>
						<li><a href="#">Contact</a></li>
						<li>
							<a href="#"><i class="fa fa-fw fa-user"></i> Login</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <script>
        $(window).scroll(function() {
            if ($(document).scrollTop() > 50) {
                $('.nav').addClass('affix');
                console.log("OK");
            } else {
                $('.nav').removeClass('affix');
            }
        });
    </script>

<?php
    include 'includes/footer.php';
?>



    
</body>
</html>