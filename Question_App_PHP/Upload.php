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
      <li class="active"><a href="Join.php?data=<?php echo $User_Name?>">Upload a classroom</a></li>
      <!-- Make Upload only visible to admins -->
      <li><a href="#">Search</a></li> 
    </ul>
  </div>
</nav>

<div class="container-fluid">
	<h2>Upload</h2>
</div>

	</div>

		<form action="home.php?data=<?php echo $User_Name ?>" method="post" />
		<div class="form-group">
			<div class="col-xs-4">
  <label for="usr">Class Name:</label>
  <input type="text" class="form-control" placeholder=".col-lg-4" id="usr" name="Class_Name">
  <div class="col-xs-3">
  <input type="submit" class="btn btn-space" value="Submit" >
</div>
</div>
</div>
<div class="form-group">
	<div class="col-xs-4">
  <label for="pwd"># of seats</label>
  <input type="text" class="form-control" id="pwd" name="Class_Seats">
</div>
</div>
		</form>
		<br> &nbsp

</html>