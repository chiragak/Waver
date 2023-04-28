<?php
session_start();
include('backend/config.php');
echo "hi";
// Generate a random OTP
$otp = rand(1000, 9999);
$email_id=$_SESSION["gmail"];
// Store the OTP in the database
$sql = "SELECT  email FROM otp WHERE email= '$email_id'";
$result = mysqli_query($conn,$sql);
$count = mysqli_num_rows($result);
if($count == 1) {
    $sql = "update  otp set otp='$otp 'where email='$email_id'";
    mysqli_query($conn, $sql);
 }else{
  
        $sql = "INSERT INTO otp (email, otp) VALUES ('$email_id', '$otp')";
        $res=mysqli_query($conn, $sql);
   
   
 }

	

// Send the OTP to the user (e.g. via email, SMS, etc.)
// ...

// Return a response indicating success or failure
echo "otp sent";
header("Location: otp.php");
    exit();
?>