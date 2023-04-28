<?php
session_start();
// Replace the database credentials with your own
include('config.php');
// Get the entered OTP from the form
$entered_otp = $_POST['dig1'] . $_POST['dig2'] . $_POST['dig3'] . $_POST['dig4'];
// Get the email from the form
$email = $_SESSION['gmail'];
// Replace with your own code to get the email from the form
// Prepare and execute the SQL query to fetch the OTP for the given email
$sql = "SELECT * FROM otp WHERE email = '$email' ";
$result = $conn->query($sql);

// Check if there is a row with the given email in the table
if ($result->num_rows > 0) {
  // Get the OTP from the first row of the result
  $sql = "update otp set status='verified' WHERE email = '$email'";
  $conn->query($sql);
  $row = $result->fetch_assoc();
  $db_otp = $row["otp"];
  // Compare the entered OTP with the OTP from the database
  if($entered_otp == $db_otp) {
    $response = array('success' => true, 'message' => 'OTP verification successful!');
} else {
    $response = array('success' => false, 'message' => 'Invalid OTP. Please try again.');
}
} else {
  // There is no row with the given email in the table
  $response = array("success" => false, "message" => "Invalid email. Please try again.");
}
// Close the database connection
$conn->close();
echo json_encode($response);
?>
