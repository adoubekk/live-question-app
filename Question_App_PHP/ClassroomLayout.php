<!DOCTYPE html>
<! DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<?php

if($_GET["data"] != NULL){
$User_Name = htmlspecialchars($_GET["data"]);
}
else{
	echo "Must Login First.";
	header('Location: Login&Register.html' );
	
}

?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=ISO-8859-1" />
		<style type="text/css">
		
		</style>

		<link rel="stylesheet" type"text/css" href="styles.css" />
      <link rel="stylesheet" type="text/css" href="css/style.css">
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
      <li class="active"><a href="Join.php?data=<?php echo $_GET['ID']?>">Enter a classroom</a></li>
      <!-- Make Upload only visible to admins -->
      <li><a href="Upload.php?data=<?php echo $_POST['ID']?>">Upload a classroom</a></li>
      <li><a href="#">Search</a></li> 
    </ul>
  </div>
</nav>
	</head>

	<?php 

	require 'init.php';
   
   if ($_POST['Classroom']!=NULL){
      $Class_Name=$_POST['Classroom'];
   } else {
      $Class_Name = $_GET['ClassID'];
   }
   echo $Class_Name;

	$Cquery="SELECT Class_Seats FROM classrooms where Class_Name like '$Class_Name';";
	$Cresult=mysqli_query($con,$Cquery) or die ("Query to get data from firsttable failed: ".mysql_error());
	$CSeats = mysqli_fetch_array($Cresult);
	$NumSeats = $CSeats["Class_Seats"];
   
   ?>
   <form action="answer_form.php?data=<?php echo $User_Name?>&ClassID=<?php echo $Class_Name?>" method="post">
      <?php for($i=1; $i<=$NumSeats; $i++): 
      $sql = "SELECT `Seat`, `User_ID`, `Question` FROM `questions` WHERE Seat = $i";
      $result = mysqli_query($con, $sql);
         if (($result->num_rows > 0)): ?>
         <button class="chairQ" name="Chair" value=<?php echo $i ?>><?php echo $i ?></button>
         <?php else: ?>
         <button class="chair" disabled><?php echo $i ?></button>
         <?php endif;
         if ($i%10 == 0): ?> 
         <br>
         <?php endif;
         endfor; ?>
   </form>
         
   <form action="question_form.php?data=<?php echo $User_Name?>&ClassID=<?php echo $Class_Name ?>" method="post">
   Enter your seat number: <br>
   <input type="number" name="SeatNum"> </input> <br>
   Enter your question: <br>
   <input type="charvar" name="Question"> </input> <br> <br>
   <input type="submit" value="Submit Question"> </input>
 </form>

	<form action="Post.php?data=<?php echo $User_Name ?>" method="post" />
		<div class="form-group">
			<div class="col-md-50">
  <label for="usr">Enter a Question</label>
  <textarea type="text" class="form-control" placeholder=".col-lg-4" id="usr" name="Question" style="width: 300px; height: 150px;"></textarea>
  <div class="col-xs-3">
  <input type="submit" class="btn btn-space" value="Submit" >
</div>
</div>
</div>
		</form>
		<br> &nbsp

	</html>