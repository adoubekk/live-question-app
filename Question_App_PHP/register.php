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
		
	</head>

<?php

require 'init.php';
/*$db_name="users";
$mysql_user="root";
$mysql_pass="usbw";
$server_name="localhost";

$link = mysqli_connect($server_name, $mysql_user, $mysql_pass, $db_name);

if(!$link) {
	die('Could not connect: ' . mysql_error() );
}*/





$value2 =   $_POST['Password'];

$value =  $_POST['ID'];

$sql= "INSERT INTO user_info (User_ID, Password) VALUES ( '$value' ,'$value2')";


if(mysqli_query($con,$sql)){

	?>

	<div class="container">
<h1> Registration Success! </h1>
<div>



<?php 
} else
{
echo "Data insertion error...".mysqli_error($con);
}



?>