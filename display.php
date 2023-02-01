<?php
session_start();
$gmail=$_SESSION['sesname'];
$page= $_SESSION['page'];
   if($gmail==''){
       header("location: loginpage.php");
        exit();
   }
      
//Include medoo which is being utilized for interacting with the database
require 'Medoo.php';

//Now use Medoo's namespace
use Medoo\Medoo;

//Finally make a connection to our database and store it in our $database variable.
//Modify these settings to match your own configuration.
$database = new Medoo([
    'database_type' => 'mysql',
    'database_name' => 'attendancesystem',
    'server'        => 'localhost',
    'username'      => 'root',
    'password'      => 'raspberrypi'
]);



//Grab all the users from our database
$users = $database->select("attendance", [
   'id',
   'user_id',
   'clock_in',
   'clock_out',
   'total_time_daily',
   'name'
]);

$users1 = $database->select("users", [
    'id',
    'name',
]);


?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Attendance System</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <script src="js/bootstrap.min.js"></script>
    </head>
    <body>

    <nav class="navbar navbar-dark bg-dark">
        <a class="navbar-brand" href="<?php echo $page ?>">Attendance System</a>
      
    </nav>
    <div class="container">
        <div class="row">
            <h2>Users</h2>
        </div>
        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                   
                    <th scope="col">name</th>
                    <th scope="col">clock_in</th>
                    <th scope="col">clock_out</th>
                     <th scope="col">total_time_daily</th>
                </tr>
            </thead>
            <tbody>
                <?php
                //Loop through and list all the information of each user including their RFID UID
                
                foreach($users as $user) {		
					
					
								
                    echo '<tr>';
					echo '<td scope="row">' . $user['id'] . '</td>';
                   
                    echo '<td scope="row">' .$user['name']. '</td>';
                    echo '<td>' . $user['clock_in'] . '</td>';
                    echo '<td>' . $user['clock_out'] . '</td>';
                     echo '<td>' . $user['total_time_daily'] . '</td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
</html>
