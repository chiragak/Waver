<?php
// Create a database connection
$servername='localhost';
$username='root';
$password='raspberrypi';
$dbname = "attendancesystem";
$table="users";
$name=$_POST['search'];
$conn=mysqli_connect($servername,$username,$password,$dbname);
if(!$conn){
 die('Could not Connect My Sql:' .mysql_error());
}
    // 2. perform a database query
    $query =mysqli_query($conn,"SELECT * FROM attendance where name='" . $_POST['search'] . "'");
     $row =mysqli_fetch_array($query,MYSQLI_ASSOC);
       
    $columname=$row['user_id'];
    
    if(!$query){
        echo $name;
        die("Database query failed");
    }
   
        $fetch="SELECT DATE(clock_in) as dte from attendance where user_id=".$columname;
        $query=mysqli_query($conn,$fetch);
        while($myrow=mysqli_fetch_array($query)) {
                echo  $myrow['dte'] ;
        }
    // test if there was a query error
    
      
    
     
                // output data from each row
              
              
            

            // 4. release returned data 
            mysqli_free_result($query);
       
    // 5. Close database connection
    mysqli_close($connection);
  // 3. use returned data (if any)
    
?>
