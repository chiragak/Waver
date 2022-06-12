<?php

$user = "root"; //Enter the user name
$password = "raspberrypi"; //Enter the password
$host = "localhost"; //Enter the host
$dbase = "attendancesystem"; //Enter the database
$table = "users"; //Enter the table name


$id = $_POST['id'];
$name = $_POST['name'];
$email = $_POST['email'];


$connection = mysqli_connect($host, $user, $password, $dbase);
if (!$connection)
{
    echo "not connected";
    die('Could not connect:' . mysql_error());
}
else
{

    echo "connected to database";
}


$sql = "INSERT INTO $table (rfid_uid, name, user_email)
VALUES ('$id', '$name', '$email')";

if (mysqli_query($connection, $sql))
{
    echo "New record created successfully";

    header("Location: /website-as/users.php");
    exit();

}
else
{
    echo "Error: " . $sql . "<br>" . mysqli_error($connection);
}

mysql_close($connection);

?>
