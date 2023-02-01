
<?php

//Block 1
$user = "root"; //Enter the user name
$password = "raspberrypi"; //Enter the password
$host = "localhost"; //Enter the host
$dbase = "attendancesystem"; //Enter the database
$table = "login"; //Enter the table name
//Block 2
$name = $_POST['name'];
$gmail= $_POST['email'];
$passwrd= $_POST['password'];
if($name ==NULL || $passwrd==NULL){
        echo 'no data';
        header("Location:loginpage.php");
        exit();
}
//Block 3
$conn = mysqli_connect($host , $user ,$password,$dbase);
if (!$conn)
{
    echo "not connected";
    die('Could not connect:' .mysql_error());
    
}

      $sql = "SELECT  gmail FROM login WHERE gmail= '$gmail'";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
    if($count == 1) {
		 $message = "this user already exist use another gmail";
        echo "<script type='text/javascript'>alert('$message');</script>";
         header("location: loginpage.php");
         exit();
      }else{
		  
		  
      


//Block 5
$sql = "INSERT INTO $table (name,gmail,password) VALUES ('$name', '$gmail', '$passwrd')";

if (mysqli_query($conn, $sql))
{
    echo "New record created successfully";
    
    header("Location: /website-as/loginpage.php");
    exit();

}
else
{
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
}
mysql_close($conn);

//Block 6


//Block 7



?>
