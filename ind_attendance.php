<?php
session_start();
$gmail=$_SESSION['sesname'];
$page= $_SESSION['page'];
   if($gmail==''){
       header("location: loginpage.php");
        exit();
   }

$con = mysqli_connect("localhost","root","raspberrypi","attendancesystem");

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}
echo $gmail;
$qury="SELECT * FROM users where user_email='$gmail'";
$result=mysqli_query($con, $qury);
$row=mysqli_fetch_row($result,MYSQLI_ASSOC);
echo $row['id'];
$user_id=$row['id'];

$sql = "SELECT *FROM attendance where user_id='$user_id'";

if ($result = mysqli_query($con, $sql)) {
  // Fetch one and one row
 $row= mysqli_fetch_row($result);
  
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
                
               	
					
					
								
                    echo '<tr>';
					echo '<td scope="row">' . $row['id'] . '</td>';
                    echo '<td scope="row">' .$row['name']. '</td>';
                    echo '<td>' . $row['clock_in'] . '</td>';
                    echo '<td>' . $row['clock_out'] . '</td>';
                     echo '<td>' . $row['total_time_daily'] . '</td>';
                    echo '</tr>';
                
                ?>
            </tbody>
        </table>
    </div>
</html>
