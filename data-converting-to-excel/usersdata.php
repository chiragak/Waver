<?php
// Create a database connection
$servername='localhost';
$username='root';
$password='raspberrypi';
$dbname = "attendancesystem";
$conn=mysqli_connect($servername,$username,$password,"$dbname");
if(!$conn){
 if(!$conn){
 die('Could not Connect My Sql:' .mysql_error());
}
}
 else{
	 echo "hi";
 }
?>
