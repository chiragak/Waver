<?php 
session_start();
$gmail=$_SESSION['sesname'];

   if($gmail==''){
       header("location: loginpage.php");
        exit();
   }
      
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Attendance System</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <script src="js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <style>
            background-color:black
        </style>
    </head>
    <body>

    <nav class="navbar navbar-dark bg-dark">
        <a class="navbar-brand" href="index.php">Attendance System</a>
        <ul class="nav nav-pills">
            <li class="nav-item">
                <a href="logout.php" class="nav-link active">Logout</a>
            </li>
            
            <li class="nav-item">
                <a href="users.php" class="nav-link active">View Users</a>
            </li>
             <li class="nav-item">
                <a href="display.php" class="nav-link active">Diaplay All</a>
            </li>
        </ul>
    </nav>
    <?php
         
    if(!empty($_GET['message'])) {
    $message = $_GET['message'];
    ?>
    
<div style="width:200px ;float:right;" class="alert alert-success" id="success-alert" >
  
  <strong>Login sucessfull</strong> 
</div>

<?php
}
?>
    <div class="container">

        <div class="col-md-6 order-md-1 text-center text-md-left pr-md-5">
            <h1 class="mb-3">Welcome,</h1>
            <p class="lead">
                To your <a href="https://pimylifeup.com">Pi My Life Up</a> RFID Attendance System Dashboard.
            </p>
            <div class="row mx-n2">
                <div class="col-md px-2">
                    <a href="users.php" class="btn btn-lg btn-outline-secondary w-100 mb-3">Users</a>
                </div>
                <div class="col-md px-2">
                    <a href="attendance.php" class="btn btn-lg btn-outline-secondary w-100 mb-3" >Attendance</a>
                </div>
            </div>
        </div>
    </div>
    
    <script>
    
 $(document).ready(function() {
  $("#success-alert").hide();
  function showalert(){
  
    $("#success-alert").fadeTo(2000, 500).slideUp(500, function() {
      $("#success-alert").slideUp(500);
    });
  }
  showalert();
});



</script>
    
    </body>
</html>
