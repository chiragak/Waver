

<!DOCTYPE html>
<html lang="en">
<head>
	<style>
    body {
        color: #999;
		background: #f5f5f5;
		font-family: 'Varela Round', sans-serif;
	}
	.form-control {
		box-shadow: none;
		border-color: #ddd;
	}
	.form-control:focus {
		border-color: #4aba70; 
	}
	.login-form {
        width: 350px;
		margin: 0 auto;
		padding: 30px 0;
	}
    .login-form form {
        color: #434343;
		border-radius: 1px;
    	margin-bottom: 15px;
        background: #fff;
		border: 1px solid #f3f3f3;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;
	}
	.login-form h4 {
		text-align: center;
		font-size: 22px;
        margin-bottom: 20px;
	}
    .login-form .avatar {
        color: #fff;
		margin: 0 auto 30px;
        text-align: center;
		width: 100px;
		height: 100px;
		border-radius: 50%;
		z-index: 9;
		background: #4aba70;
		padding: 15px;
		box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.1);
	}
    .login-form .avatar i {
        font-size: 62px;
    }
    .login-form .form-group {
        margin-bottom: 20px;
    }
	.login-form .form-control, .login-form .btn {
		min-height: 40px;
		border-radius: 2px; 
        transition: all 0.5s;
	}
	.login-form .close {
        position: absolute;
		top: 15px;
		right: 15px;
	}
	.login-form .btn {
		background: #4aba70;
		border: none;
		line-height: normal;
	}
	.login-form .btn:hover, .login-form .btn:focus {
		background: #42ae68;
	}
    .login-form .checkbox-inline {
        float: left;
    }
    .login-form input[type="checkbox"] {
        margin-top: 2px;
    }
    .login-form .forgot-link {
        float: right;
    }
    .login-form .small {
        font-size: 13px;
    }
    .login-form a {
        color: #4aba70;
    }</style>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Forgot Password</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 </head>
<body>
<!--  Request me for a signup form or any type of help  -->
<div class="login-form">    
    <form  name="form1" method="post">
	   
		<div class="avatar"><i class="material-icons">&#xE7FF;</i></div>
		<div class="form-group">
            <input type="gmail" class="form-control" name="gmail" placeholder="Enter gmail" required="required">
	    <input type="submit" onclick="otp()" class="btn btn-primary  btn-s" value="Submit">  
	    
                </div>
	
	</form>
		
	    </div>
	
   
</body>
</html> 
<script>    
function otp(){
<?php 
 
// Import PHPMailer classes into the global namespace 



$servername='localhost';
$username='root';
$password='raspberrypi';
$dbname = "attendancesystem";
$conn=mysqli_connect($servername,$username,$password,"$dbname");
if(!$conn){
 die('Could not Connect My Sql:' .mysql_error());
}
$email_id=$_POST['gmail'];

if(isset($email_id))
{

    echo 'IAM IN';
    $result = mysqli_query($conn,"SELECT * FROM login where gmail='" . $_POST['gmail'] . "'");
    $count  = mysqli_num_rows($result);
	 if(!$count){ 
	    
	     
           exit();
	 }else{
         mysqli_query($conn,"INSERT INTO otp (email) VALUES ('$email_id')");
	 }
}
	        
use PHPMailer\PHPMailer\PHPMailer;

require 'PHPMailer-6.6.3/src/Exception.php';
require 'PHPMailer-6.6.3/src/PHPMailer.php';
require 'PHPMailer-6.6.3/src/SMTP.php';

class VerificationCode
{
    public $smtpHost;
    public $smtpPort;
    public $sender;
    public $password;
    public $receiver;
    public $code;

    public function __construct($receiver)
    {
        /**
         * Your email id  
         * For example : johndoe@gmail.com
         * contact@johndoe.com
         * 
         */
        $this->sender = "chiragajekar@gmail.com"; 

        /**
         *  YOUR PASSWORD 
         *  ************
         */               
        $this->password = "fdphwzfmharlzqhd";  

        /**
         * Receiver email
         * For example : johndoe@gmail.com
         */     
        $this->receiver = $receiver;  

        /**
         * YOUR SMTP HOST NAME 
         * For example : smtp.gmail.com 
         * OR mail.youwebsite.com
         */     
        $this->smtpHost="smtp.gmail.com  ";        
        
        /**
         * SMTP port number
         * For example :587
         */
        $this->smtpPort = 587;

    }
    public function sendMail(){
        $mail = new PHPMailer();
        $mail->IsSMTP();
        $mail->SMTPAuth = true;
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );
        //$mail->SMTPDebug = 4;
        $mail->Host = $this->smtpHost;   
        $mail->Port = $this->smtpPort;    
        $mail->IsHTML(true);
        $mail->Username = $this->sender;
        $mail->Password = $this->password;
        $mail->Body=$this->getHTMLMessage();
        $mail->Subject = "Your verification code is {$this->code}";
        $mail->SetFrom($this->sender,"Verification Codes");
        $mail->AddAddress($this->receiver);
        if($mail->send()){
          echo "MAIL SENT SUCCESSFULLY";
          // return true;
	  $rec=$this->receiver;
         header("Location: /website-as/passwordreset.php?user=".$rec);
         exit();
        
        }
        echo "FAILED TO SEND MAIL";
        // return false;

    }
   
    public function getVerificationCode()
    {
    $servername='localhost';
    $username='root';
    $password='raspberrypi';
    $dbname = "attendancesystem";
    $conn=mysqli_connect($servername,$username,$password,"$dbname");
    if(!$conn){
 die('Could not Connect My Sql:' .mysql_error());
}
    $email_id=$_POST['gmail'];
        $otpn=(int) substr(number_format(time() * rand(), 0, '', ''), 0, 6);	
	$sql =mysqli_query( $conn,"UPDATE otp SET user_otp= $otpn WHERE email ='$email_id'"); 
	if($sql)
	{
	return $otpn;
   }
   else{
	    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
   }
 
	
    }

    public function getHTMLMessage(){
        $this->code=$this->getVerificationCode();   
        $htmlMessage=<<<MSG
        <!DOCTYPE html>
        <html>
         <body>
            <h1>Your verification code is {$this->code}</h1>
            <p>Use this code to verify your account.</p>
         </body>
        </html>        
MSG;
    return $htmlMessage;
    }

}


// pass your recipient's email
$vc=new VerificationCode($email_id); 
$vc->sendMail(); // MAIL SENT SUCCESSFULLY



?>
}
alert("Valid email address!");
         document.form1.gmail.focus();
 </script>  

  
  
