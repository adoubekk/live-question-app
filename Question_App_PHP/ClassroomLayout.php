<!DOCTYPE html>
<! DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=ISO-8859-1" />
		<style type="text/css">
		
		</style>

		<link rel="stylesheet" type"text/css" href="styles.css" />

		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		
		<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">WebSiteName</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="home.php?data=<?php echo $User_Name?>">Home</a></li>
      <li><a href="Login&Register.html">Login</a></li>
      <li class="active"><a href="Join.php?data=<?php echo $_POST['ID']?>">Enter a classroom</a></li>
      <li><a href="Post.php?data=<?php echo $_POST['ID']?>">Post a question</a></li> 
      <!-- Make Upload only visible to admins -->
      <li><a href="Upload.php?data=<?php echo $_POST['ID']?>">Upload a classroom</a></li>
      <li><a href="#">Search</a></li> 
    </ul>
  </div>
</nav>
	</head>

	<?php 

	require 'init.php';

	$Classroom = $_POST['Classroom'];
	$Cquery="SELECT Class_Seats FROM classrooms where Class_Name like '$Classroom';";
	$Cresult=mysqli_query($con,$Cquery) or die ("Query to get data from firsttable failed: ".mysql_error());
	$CSeats = mysqli_fetch_array($Cresult);
	$NumSeats = $CSeats["Class_Seats"];
	echo $NumSeats;


	?>