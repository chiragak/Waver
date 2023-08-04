<!DOCTYPE html>
<html lang="en">
<<<<<<< HEAD
	<head>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
		<meta charset="UTF-8" />
		<title>CoE Digital Forensics Intelligence and Cybersecurity</title>
		<link rel="stylesheet" href="assets/css/style.css" />
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
						<img style="float:left ;margin-top: 0%;width: 67px;" src="images/Logo.png" id="Logo" />
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
=======
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"> -->
    <title>CoE Digital Forensics Intelligence & Cyber Security</title>
    <style>
        
        .logo-title{
            float: left;
            font-size: 14px;
            margin-top: 0%; 
            line-height: 2;
            margin-left: 3px;
}


.logo img {
  float: left;
  margin-top: 1%;
  width: 67px;

}

.main_list {
  display: inline-block;
  margin-right: 20px;
}

.navlinks {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
}

.navlinks a {
  display: block;
  color: #333;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}


/* Importing the font 'Quicksand' from Google Fonts API */
@import url('https://fonts.googleapis.com/css?family=Quicksand:400,500,700');
html,body {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: "Quicksand", sans-serif;
    font-size: 62.5%;
    font-size: 10px;
}
.nav {
    width: 100%;
    height: 65px;
    position: fixed;
    line-height: 40px;
    text-align: center;
    font-family: 'Tinos', serif;
}

.nav div.logo {
    float: left;
    width: auto;
    height: auto;
    padding-left: 3rem;
}

.nav div.logo a {
    text-decoration: none;
    color: #fff;
    font-size: 2.5rem;
}

.nav div.logo a:hover {
    color: #00E676;
}

.nav div.main_list {
    height: 65px;
    float: right;
}

.nav div.main_list ul {
    width: 100%;
    height: 65px;
    display: flex;
    list-style: none;
    margin: 0;
    padding: 0;
}

.nav div.main_list ul li {
    width: auto;
    height: 65px;
    padding: 0;
    
    /* padding-right: 3rem; */
}

.nav div.main_list ul li a {
    text-decoration: none;
    color: #fff;
    /* line-height: 65px; */
    font-size: 2.4rem;
    
}


.nav div.main_list ul li a:hover {
    color: #00E676;
}


/* Home section */

.home {
    width: 100%;
    height: 100vh;
    background-color: #00162e;
    background-position: center top;
	background-size:cover;
}

.navTrigger {
    display: none;
}

.nav {
    padding-top: 20px;
    padding-bottom: 20px;
    -webkit-transition: all 0.4s ease;
    transition: all 0.4s ease;

}


.affix {
    padding: 0;
    background-color: #022651;
}
.myH2 {
	text-align:center;
	font-size: 4rem;
}
.myP {
	text-align: justify;
	padding-left:15%;
	padding-right:15%;
	font-size: 20px;
}
.logo-title{
    animation: fadeIn 3.5s;
  }
  @keyframes fadeIn {
    from {
      opacity: 0;
    }
    to {
      opacity: 1;
}
}



footer {
  text-align: center;
  padding: 20px 0;
  background-color: #022651;
  color: #fff;
}

.copyright {
  font-size: 14px;
}

    </style>
</head>
<body>
    <?php
    include 'includes/header.php';
    ?>
<section class="home">
    </section>
    <section class="home">
    </section>
>>>>>>> dead02df270b42fdc8e6bbb2e81f544ec2ce4729


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