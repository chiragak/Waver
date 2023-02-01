<?php
// Create a database connection
$servername='localhost';
$username='root';
$password='raspberrypi';
$dbname = "attendancesystem";
$conn=mysqli_connect($servername,$username,$password,$dbname);
if(!$conn){
 die('Could not Connect My Sql:' .mysql_error());
}
 $query =mysqli_query($conn,"SELECT * FROM users into outfile 
 '/tmp/users.csv' fields terminated by ',' lines terminated by '\n'");
?>
