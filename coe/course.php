<?php
session_start();
include('./backend/dbconnect.php');

$_SESSION['alogin']='connected';
if(strlen($_SESSION['alogin'])==0)
    {   
header('location:index.php');
}
else{

if(isset($_POST['submit']))
{

$coursename=$_POST['coursename'];
$courseDesc=$_POST['courseDesc'];
$target_dir = "resources/"; // specify the directory where you want to store the uploaded file
$target_file = $target_dir . basename($_FILES["file"]["name"]); // get the name of the uploaded file
	$uploadOk = 1;
	// $FileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

	

	

    // Check if file already exists
	if (file_exists($target_file)) {
	    echo "Sorry, file already exists.";
	    $uploadOk = 0;
	}
    else
    {
        move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);
    }

$ret=mysqli_query($conn, "insert into course(courseName,courseDesc,resource) values('$coursename','$courseDesc','$target_file')");
if($ret)
{
$_SESSION['msg']="Course Created Successfully !!";
}
else
{
  $_SESSION['msg']="Error : Course not created";
}
}
if(isset($_GET['del']))
      {
              mysqli_query($conn, "delete from course where id = '".$_GET['id']."'");
                  $_SESSION['delmsg']="Course deleted !!";
      }




   ?>


<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Admin | Course</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
    <style>
         #box-head
  {
      background-color:#194359;
      color:white;
  } 
  #submit-button 
  {
      background-color:#66A499;
      border-radius:7px;
      float:right;
      
  }
    </style>
</head>

<body>

    
<?php if($_SESSION['alogin']!="")
{
 include('includes/menubar.php');
}
 ?>
   
    <div class="content-wrapper">
        <div class="container">
              <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Course  </h1>
                    </div>
                </div>
                <div class="row" >
                  <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <div class="panel panel-default">
                        <div class="panel-heading" id="box-head">
                           Course 
                        </div>
<font color="green" align="center"><?php echo htmlentities($_SESSION['msg']);?><?php echo htmlentities($_SESSION['msg']="");?></font>


                        <div class="panel-body">
                       <form name="dept" method="post" enctype="multipart/form-data">

 <div class="form-group">
    <label for="coursename">Course Name  </label>
    <input type="text" class="form-control" id="coursename" name="coursename" placeholder="Course Name" required />
  </div>

<div class="form-group">
    <label for="courseDesc">Course Description  </label>
    <input type="text" class="form-control" id="courseDesc" name="courseDesc" placeholder="Course Description" required />
  </div> 

  <div class="form-group">
   <label for="file">Select file to upload:</label>
		<input type="file" name="file" id="file"><br><br>
  </div>




 <button id="submit-button" type="submit" name="submit" class="btn btn-default"><b>Submit</b></button>
</form>
                            </div>
                            </div>
                    </div>
                  
                </div>
                <font color="#85FFC7" align="center"><?php echo htmlentities($_SESSION['delmsg']);?><?php echo htmlentities($_SESSION['delmsg']="");?></font>
                <div class="col-md-12">
                    
                    <div class="panel panel-default">
                        <div class="panel-heading" id="box-head">
                            Manage Course
                        </div>
                       
                        <div class="panel-body">
                            <div class="table-responsive table-bordered">
                                <table class="table" id="table" style="color:white;">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Course Name </th>
                                            <th>Course Description</th>
                                             <th>Creation Date</th>
                                             <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
<?php
$sql=mysqli_query($conn, "select * from course");
$cnt=1;
while($row=mysqli_fetch_array($sql))
{
?>


                                        <tr>
                                            <td><?php echo $cnt;?></td>
                                            <td><?php echo htmlentities($row['courseName']);?></td>
                                            <td><?php echo htmlentities($row['courseDesc']);?></td>
                                            <td><?php echo htmlentities($row['creationDate']);?></td>
                                            <td>
                                            <a href="edit-course.php?id=<?php echo $row['id']?>">
<button class="btn btn-primary"><i class="fa fa-edit "></i> Edit</button> </a>                                        
  <a href="course.php?id=<?php echo $row['id']?>&del=delete" onClick="return confirm('Are you sure you want to delete?')">
                                            <button class="btn btn-danger">Delete</button>
</a>
                                            </td>
                                        </tr>
<?php 
$cnt++;
} ?>

                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                     
                </div>
            </div>





        </div>
    </div>
    

    
    <script src="assets/js/jquery-1.11.1.js"></script>
    
    <script src="assets/js/bootstrap.js"></script>
</body>
</html>
<?php } ?>




