
<?php
//email_verify.php
$servername='localhost';
$username='root';
$password='raspberrypi';
$dbname = "attendancesystem";
$table="login";
$conn=mysqli_connect($servername,$username,$password,"$dbname");
$name=$_POST['name'];
$pass=$_POST['pass'];
echo $name;
if(!$conn){
 die('Could not Connect My Sql:' .mysql_error());
}
$mail=$_POST['email'];
$otp=$_POST['submit-otp'];
$sql = "SELECT user_otp, email FROM otp WHERE user_otp = '$otp' and email = '$mail'";
$result = mysqli_query($conn,$sql);
$count  = mysqli_num_rows($result);
if(!empty($count)) {
		$test=mysqli_query($conn,"UPDATE  otp  SET user_email_status ='verified' WHERE user_otp  =' $otp'");  
		 if($test)
     {
	  $sql = "INSERT INTO $table (name,gmail,password) VALUES ('$name', '$mail', '$pass')";
	  mysqli_query($conn, $sql);
	    header("Location:loginpage.php?acountsucess=sucess");
         exit();
      
	 } 
 }
else {
		$error_message = "Invalid OTP!";
          header("Location:loginpage.php?mess=invalidotp");
        exit();
		echo $error_message ;
	}	
?>

