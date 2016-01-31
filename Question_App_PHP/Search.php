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
		
	</head>


<?php
require 'init.php';


if($_GET["data"] != NULL){
$User_Name = htmlspecialchars($_GET["data"]);
}
else{
	echo "Must Login First.";
	header('Location: Login&Register.html' );
	
}

?>
<html>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">WebSiteName</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="home.php?data=<?php echo $User_Name?>">Home</a></li>
      <li><a href="Join.php?data=<?php echo $User_Name?>">Enter a classroom</a></li>
      <!-- Make Upload only visible to admins -->
      <li class="active"><a href="#">Search</a></li> 
    </ul>
  </div>
</nav>

<?php

 require 'init.php';
            
            $Qquery="SELECT Question,Class_Name,User_ID FROM questions";
            $Qresult=mysqli_query($con,$Qquery) or die ("Query to get data from firsttable failed: ".mysql_error());
            
            while ($Qrow=mysqli_fetch_array($Qresult)) {

            $Question=$Qrow["Question"];
            $Classroom=$Qrow["Class_Name"];
            $Student=$Qrow["User_ID"];
                ?>
                <div class="well"><?php echo $Question ?> <br> <?php echo $Classroom ?> <br> <?php echo $Student ?> </div>
                <br> 
            
          <?php  } 



?>