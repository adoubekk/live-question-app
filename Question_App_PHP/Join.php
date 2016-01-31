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
      <li class="active"><a href="Join.php?data=<?php echo $User_Name?>">Enter a classroom</a></li>
      <!-- Make Upload only visible to admins -->
      <li><a href="#">Search</a></li> 
    </ul>
  </div>
</nav>

<div class="container-fluid">
	<h2>Choose a classroom</h2>
</div>
<div class="col-xs-4">
<form action="ClassroomLayout.php?data=<?php echo $User_Name?>" method="post">
        <fieldset class="form-group">
        <select id="Classrooms" name="Classroom" class = "form-control">
        
            <?php
            
            require 'init.php';
            
            $Cquery="SELECT Class_Name FROM classrooms";
            $Cresult=mysqli_query($con,$Cquery) or die ("Query to get data from firsttable failed: ".mysql_error());
            
            while ($Crow=mysqli_fetch_array($Cresult)) {
            $CTitle=$Crow["Class_Name"];
                echo "<option>
                    $CTitle

                </option>";
            
            }
                
            ?>
    
        </select>

    </fieldset>
        <div class="col-xs-3">
  <input type="submit" class="btn btn-space" value="join this class" >
</div>
    </form>
</div>

</html>