<?php



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
$users = $database->select("users", [
   'id',
   'name',
   'rfid_uid',
   'created'
]);


<?php



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
$users = $database->select("users", [
   'id',
   'name',
   'rfid_uid',
   'created'
]);

echo " connect to datbase" ;

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
        body {
  

    <nav class="navbar navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Attendance System</a>
        <ul class="nav nav-pills">
            <li class="nav-item">
                <a href="attendance.php" class="nav-link">View Attendance</a>
            </li>
            <li class="nav-item">
                <a href="users.php" class="nav-link active">View Users</a>
            </li>
        </ul>
    </nav>
    
    <div class="container">
        <div class="row">
        
            <div class="col-lg-5">
            
            <h1> Add form here</h1>
            </div>
             <div class="col-lg-7">
             
             
              <div class="container">
        <div class="row">
            <div class="col">
            <h2>Users</h2><hr/>
                
        </div>
        </div>
        
        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">RFID UID</th>
                    <th scope="col">created</th>
                </tr>
            </thead>
            <tbody>
                <?php
                //Loop through and list all the information of each user including their RFID UID
                foreach($users as $user) {
                    echo '<tr>';
                    echo '<td scope="row">' . $user['id'] . '</td>';
                    echo '<td>' . $user['name'] . '</td>';
                    echo '<td>' . $user['rfid_uid'] . '</td>';
                     echo '<td>' . $user['created'] . '</td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
        </div>
    </div>
             
             
             
             </div>
        </div>
    
    
    </div>
    
   
</html>

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
        <a class="navbar-brand" href="#">Attendance System</a>
        <ul class="nav nav-pills">
            <li class="nav-item">
                <a href="attendance.php" class="nav-link">View Attendance</a>
            </li>
            <li class="nav-item">
                <a href="users.php" class="nav-link active">View Users</a>
            </li>
        </ul>
    </nav>
    <div class="container">
        <div class="row">
            <h2>Users</h2>
        </div>
        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">RFID UID</th>
                    <th scope="col">created</th>
                </tr>
            </thead>
            <tbody>
                <?php
                //Loop through and list all the information of each user including their RFID UID
                foreach($users as $user) {
                    echo '<tr>';
                    echo '<td scope="row">' . $user['id'] . '</td>';
                    echo '<td>' . $user['name'] . '</td>';
                    echo '<td>' . $user['rfid_uid'] . '</td>';
                     echo '<td>' . $user['created'] . '</td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
</html>
