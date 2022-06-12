<?php
//Include medoo which is being utilized for interacting with the database
require 'Medoo.php';
//Now use Medoo's namespace
use Medoo\Medoo;
//Finally make a connection to our database and store it in our $database variable.
//Modify these settings to match your own configuration.
$database = new Medoo(['database_type' => 'mysql', 'database_name' => 'attendancesystem', 'server' => 'localhost', 'username' => 'root', 'password' => 'raspberrypi']);
//Grab all the users from our database
$users = $database->select("users", ['id', 'name', 'rfid_uid', 'user_email', 'created']);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Attendance System</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/bootstrap.min.css">

<style>


.container#blur.active
{
    filter: blur(20px);
    pointer-events: none;
    user-select: none;
}
.body
{
    position: relative;
    max-width: 800px;
    

}
.h2
{
    font-weight: 600;
    margin-bottom: 10px;
    color: #3333;

}
#popup
{
    position: fixed;
    top: 40%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 600px;
    padding: 50px;
    box-shadow: 0 5px 30px rgba(0, 0, 0, .30);
    background-color: #fff;
    visibility: hidden;
    opacity: 0;
    transition: 0.5s;
    
}
#popup.active
{
    visibility: visible;
    opacity: 1;
    transition: 0.5s;
    top: 50%;
    

}

button {
  margin: 20px;
}
.custom-btn {
  width: 130px;
  height: 40px;
  color: #fff;
  border-radius: 5px;
  padding: 10px 25px;
  font-family: 'Lato', sans-serif;
  font-weight: 500;
  background: transparent;
  cursor: pointer;
  transition: all 0.3s ease;
  position: relative;
  display: inline-block;
   box-shadow:inset 2px 2px 2px 0px rgba(255, 255, 255, 0.666),
   7px 7px 20px 0px rgba(0,0,0,.1),
   4px 4px 5px 0px rgba(0,0,0,.1);
  outline: none;
}

.btn-1 {
  background: rgb(6,14,131);
  background: linear-gradient(0deg, rgba(6,14,131,1) 0%, rgba(12,25,180,1) 100%);
  border: none;
}
.btn-1:hover {
   background: rgb(0,3,255);
background: linear-gradient(0deg, rgba(0,3,255,1) 0%, rgba(2,126,251,1) 100%);
}

.nav-link:hover{
   background: rgb(0,3,255);
background: linear-gradient(0deg, rgba(0,3,255,1) 0%, rgba(2,126,251,1) 100%);}

container.mt-3{
    margin-top:90%;
}

</style>
    </head>
    <body style="background-color: #fcedfa;">
       
       <!--  header start-->
       
  <header>

    <nav class="navbar" style="background-color:#3C3F58">
          <div class="container">
    <a href="#" class="navbar-brand">
      <!-- Logo Image -->
      <img src="https://user-images.githubusercontent.com/70628014/172147864-479bfb31-260e-4709-b63c-08bda0b2369f.gif" width="100" alt="" class="d-inline-block align-middle mr-2">

    </a>
       <!-- <a class="" href="#" >Attendance System</a> -->
        <ul class="nav nav-pills" style="margin-right: 3%;">
            <li class="nav-item">
                <a href="attendance.php" class="nav-link" style="background-color:#4f94cd; color:white; padding-left: 20px;">View Attendance</a>
            </li> &nbsp;&nbsp;
            <li class="nav-item">
                <a href="users.php" class="nav-link " style="background-color:#4f94cd; color:white">View Users</a>
            </li>
        </ul>
    </nav>
</header>

  <!--  header end-->
  
   <!--  form start-->
    <div class="container">
       <div class="row">
        
             <div class="col-md-12">
             
             
             
             
             
             
             
             
                <div id="app" class="container" style="background-color: #D76786; width: 98.1%;">
<h3 class="mt-3">Add User</h3>
  <hr>
<div class="row">
  <div class="col">
       <form action="addUser.php" method="post">   

    <label>RFID Id</label>
    <input type="number" name="id" required autocomplete="off"class="form-control" value="">
  </div>
    <div class="col">

    <label>Name</label>
    <input type="text" name="name" required autocomplete="off" class="form-control" value="">
  </div>
    <div class="col">

    <label>User Email</label>
    <input type="email" name="email" required autocomplete="off" class="form-control" value="">
  </div>

  </div>
    <button class="custom-btn btn-1" name="button" type="submit">Submit</button>
      <hr>
</div>   

        </form>     
              
              
              
       <!--  form end-->       
       
       
       
    <!--  table start-->
              
              <div class="container" style="width: 100%; border: border border-primary">
                

        <div class="row">
            <div class="col">
            <h2 style="color:black;background-color:#fcedfa; text-align:center">Users</h2>
                
        </div>
        </div>
        
        <table class="table table-striped table-danger">
            
            <thead class="table-dark">

                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">RFID UID</th>
                     <th scope="col">Email Id</th>
                    <th scope="col">created</th>
                    <th scope="col">Action</th>

                </tr>
            </thead>
            <tbody class="table-group-divider">
                <?php
//Loop through and list all the information of each user including their RFID UID
foreach ($users as $user) {
    echo '<tr>';
    $id = $user['id'];
    echo '<td scope="row">' . $user['id'] . '</td>';
    echo '<td>' . $user['name'] . '</td>';
    echo '<td>' . $user['rfid_uid'] . '</td>';
    echo '<td>' . $user['user_email'] . '</td>';
    echo '<td>' . $user['created'] . '</td>';
    //echo  '<td>'."<a href='#' onclick='popup($id)'> Delete</a>".'</td>';
    //echo  '<td>'."<a href='delete.php?id=$id'> Delete</a>".'</td>';
    //echo '<td>' . ' <button onclick="toggle()">Delete</button> '.'</td>';
   echo "<td> <a style='background-color:tomato; color:white;padding:10px' href='delete.php?id=$id' onClick=\"return confirm('Are you sure you want to delete this user ?');\">Delete</center></a></td>";
    echo '</tr>';
}
?>
             

            </tbody>

        </table>
        </div>
    </div>
             
            <!--  table end-->     
             
             </div>
        
        </div>
    
    
    </div>
    

    
    </body>

</html>
