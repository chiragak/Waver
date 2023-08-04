<?php
session_start();
include('backend/config.php');
require 'PHPMailer-6.6.3/src/PHPMailer.php';
require 'PHPMailer-6.6.3/src/SMTP.php';
require 'PHPMailer-6.6.3/src/Exception.php';

// Generate a random OTP
$gmail = $_SESSION['gmail'];
$username = $_SESSION['username'];
$password = $_SESSION['password'];
$otp = rand(1000, 9999);
$email_id = $_SESSION['gmail'];
// Send the OTP before storing/updating in the database


use PHPMailer\PHPMailer\PHPMailer;
// Store the OTP in the database
if (sendOTP($email_id, $otp)) {
  // Store the OTP in the database
  $sql = "SELECT email FROM otp WHERE email = '$email_id'";
  $result = mysqli_query($conn, $sql);
  $count = mysqli_num_rows($result);

  $sqlc = "INSERT INTO signup (mail, name, password) VALUES ('$gmail', '$username', '$password')";
  mysqli_query($conn, $sqlc);
  if ($count == 1) {
      $sql = "UPDATE otp SET otp = '$otp' WHERE email = '$email_id'";
      mysqli_query($conn, $sql);
  } else {
      $sql = "INSERT INTO otp (email, otp) VALUES ('$email_id', '$otp')";
      $res = mysqli_query($conn, $sql);
  }

  // Redirect to otp.php
  header("Location: otp.php");
  exit();
} else {
  // Redirect to signup.php with an error alert
  echo '<script>alert("OTP sending failed. Please try again."); window.location.href = "signup.php";</script>';
  exit();
}

// Rest of your code for sending the OTP via email


// Function to send OTP via email
function sendOTP($email, $otp) {
    // Create a new PHPMailer object
 
   
    try {
      $mail = new PHPMailer(true);
        // Configure SMTP settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'chiragajekar@gmail.com';
        $mail->Password = 'eyagqalhnatyvhbi';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // Set email message and recipient
        $mail->setFrom('chiragajekar@gmail.com', 'Shamanth S Shetty');
        $mail->addAddress($email);
        $mail->Subject = 'Hey! welcome to COE ! Your OTP is';
        $mail->Body = $otp;
        $mail->SMTPDebug = 2;
        $mail->Debugoutput = 'html';
        
        // Send the email
        $mail->send();
        return true; // OTP sent successfully
    } catch (Exception $e) {
        return false; // OTP sending failed
    }
}

// Return a response indicating success or failure

?>
