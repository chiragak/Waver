<?php
    $servername = "localhost";
    $username = "root";
    $password = "raspberrypi";
    $databaseName = "attendancesystem";

    $conn = mysqli_connect($servername, $username, $password, $databaseName);
   session_start();
    
    $un = $_POST['name'];
    $pw = $_POST['password'];
    
      $sql = "SELECT name,password FROM login WHERE name = '$un' and password = '$pw'";
      
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
      if($count == 1) {
		 $fetch= mysqli_query($conn,"SELECT gmail FROM login WHERE name = '$un' and password = '$pw'");
		 $row= mysqli_fetch_array($fetch,MYSQLI_ASSOC);
		 $gmail=$row['gmail'];
		 $fetch= mysqli_query($conn,"SELECT access FROM users WHERE  user_email = '$gmail'");
		 $row= mysqli_fetch_array($fetch,MYSQLI_ASSOC);
		 $access=$row['access'];
         $_SESSION['sesname']=$gmail;
          if( $access=='admin'){
		 $_SESSION['page']='index.php';
         header("location: index.php?message=success");
         exit();
	     }else if($access=='user'){
			   $_SESSION['page']='userindex.php';
			  header("location:userindex.php?message=success");
			  exit();
		 }else{
			  $_SESSION['page']='userindex.php';
			  header("location:allusers/index.html");
			  exit();
		 }
      }else {
		  
        $message = "No";
        echo "<script type='text/javascript'>alert('$message');</script>";
          header("Location: loginpage.php?msge=wrong");
          exit();
      }



    ?>
