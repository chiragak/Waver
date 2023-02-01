
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Radius - Signin/Signup</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/CSS/style.css">
</head>

<body>
    <div class="container" id="container">
        <div class="form-container sign-up-container">
              <form action="signupotp.php" method="post">
                <h1>Create Account</h1>
                <div class="social-container">
                    <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                    <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
                </div>
                <span>or use your email for registration</span>
                <input type="text" name="name" placeholder="Name" />
                <input type="email"  name="email" placeholder="Email" />
                <input type="password" name="password" placeholder="Password" />
                <button>Sign Up</button>
                              

            </form>
        </div>
        <div class="form-container sign-in-container">
            <form action="signin.php" method="post">
                <h1>Sign in</h1>
                <div class="social-container">
                    <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                    <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
                </div>
                <span>or use your account</span>
                <input type="text" name="name" placeholder="Username" />
                <input type="password" name="password" placeholder="Password" />
                <a href="forgotpage.php">Forgot your password?</a>
                <button>Sign In</button>
                 <?php
                                    if(!empty($_GET['msge'])) {
                                        echo "<p>Username and Password does'nt match </p>";
                                        }
                                        
                                ?>  
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Welcome Back!</h1>
                    <p>To keep connected with us please login with your personal info</p>
                    <button class="ghost" id="signIn">Sign In</button>
                   
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Hello, Friend!</h1>
                    <p>Enter your personal details and start journey with us</p>
                    <button class="ghost" id="signUp">Sign Up</button>
                    <?php
                                    if(!empty($_GET['userexist'])) {
                                        $message = $_GET['userexist'];
                                        echo "<p style='background-color:red;'>this username already exist </p>";
                                        }
                                        
                                ?>  
                    
                    <?php
                                    if(!empty($_GET['message'])) {
                                        $message = $_GET['message'];
                                        echo "<script type='text/javascript'>alert('this user already exist use another gmail');</script>";
                                        }
                                        
                                ?>
                    <?php
                        if(!empty($_GET['mess'])) {
                            echo "<script type='text/javascript'>alert('invalid otp resubmit the details');</script>";
                        }
                                        
                                ?>
                                <?php
                        if(!empty($_GET['acountsucess'])) {
                            echo "<script type='text/javascript'>alert('Account creation success please login');</script>";
                        }
                                        
                                ?>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/JS/main.js"></script>
</body>

</html>
 
