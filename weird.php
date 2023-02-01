<?php
session_start();

$servername='localhost';
$username='root';
$password='raspberrypi';
$dbname = "attendancesystem";
$conn=mysqli_connect($servername,$username,$password,"$dbname");
if(!$conn){
 die('Could not Connect My Sql:' .mysql_error());
}
$email_id=$_POST['gmail'];
echo $email_id;
if(isset($email_id))
{
    echo 'IAM IN';
    $result = mysqli_query($conn,"SELECT * FROM login where gmail='" . $_POST['gmail'] . "'");
    $count  = mysqli_num_rows($result);
	if($count>0) {
		echo 'exist';
		// generate OTP
		      $otp = rand(100000,999999);
              echo $otp;
				$to = $email_id;
                $subject = "OTP verification";
                $txt = "Your OTP is :  $otp";
                $headers = "From: password@studentstutorial.com" . "\r\n" .
                "CC: somebodyelse@example.com";
                mail($to,$subject,$txt,$headers);
			}
				else{
					echo 'invalid GMAIL';
        }
}
?>
<?php
session_start();
$success = "";
$error_message = "";
$conn = mysqli_connect("localhost","root","raspberrypi","attendancesystem");
if(!empty($_POST["gmail"])) {
	$result = mysqli_query($conn,"SELECT * FROM login WHERE gmail='" . $_POST["gmail"] . "'");
	$count  = mysqli_num_rows($result);
	if($count>0) {
		echo 'exist';
		// generate OTP
		$otp = rand(100000,999999);
		// Send OTP
		require_once("mail_function.php");
		$mail_status = sendOTP($_POST["gmail"],$otp);
		
		if($mail_status == 1) {
			echo ' exist';
			$result = mysqli_query($conn,"INSERT INTO otp_expiry(otp,is_expired,create_at) VALUES ('" . $otp . "', 0, '" . date("Y-m-d H:i:s"). "')");
			$current_id = mysqli_insert_id($conn);
			if(!empty($current_id)) {
				$success=1;
				echo 'exist';
			}
		}
	} else {
		$error_message = "Email not exists!";
		echo 'doesnot exist';
	}
}
if(!empty($_POST["submit_otp"])) {
	$result = mysqli_query($conn,"SELECT * FROM otp_expiry WHERE otp='" . $_POST["otp"] . "' AND is_expired!=1 AND NOW() <= DATE_ADD(create_at, INTERVAL 24 HOUR)");
	$count  = mysqli_num_rows($result);
	if(!empty($count)) {
		$result = mysqli_query($conn,"UPDATE otp_expiry SET is_expired = 1 WHERE otp = '" . $_POST["otp"] . "'");
		$success = 2;	
	} else {
		$success =1;
		$error_message = "Invalid OTP!";
		echo 'invalid';
	}	
}
?>






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
echo $email_id;
if(isset($email_id))
{

    echo 'IAM IN';
    $result = mysqli_query($conn,"SELECT * FROM login where gmail='" . $_POST['gmail'] . "'");
    $count  = mysqli_num_rows($result);
	
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
        $this->sender = "shamanthshetty51@gmail.com"; 

        /**
         *  YOUR PASSWORD 
         *  ************
         */               
        $this->password = "Shamanth@2002";  

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
        $mail->SMTPDebug = 4;
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
          exit;  
        }
        echo "FAILED TO SEND MAIL";
        // return false;

    }
    public function getVerificationCode()
    {
        return (int) substr(number_format(time() * rand(), 0, '', ''), 0, 6);
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
$vc=new VerificationCode('chiragak.is20@sahyadri.edu.in'); 
$vc->sendMail(); // MAIL SENT SUCCESSFULLY

?>
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
echo $email_id;
if(isset($email_id))
{

    echo 'IAM IN';
    $result = mysqli_query($conn,"SELECT * FROM login where gmail='" . $_POST['gmail'] . "'");
    $count  = mysqli_num_rows($result);
	 if(!$count){ 
	     
	     header("Location: /website-as/forgotpage.php");
           exit();
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
        $this->password = "lbhrzwykdzzbbyrl";  

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
         header("Location: /website-as/passwordreset.php");
         exit();
        
        }
        echo "FAILED TO SEND MAIL";
        // return false;

    }
    public function getVerificationCode()
    {
        return (int) substr(number_format(time() * rand(), 0, '', ''), 0, 6);
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
header("Location: /website-as/passwordreset.php");
exit();

?>

