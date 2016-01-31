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
      <li class="active"><a href="Join.php?data=<?php echo $_POST['ID']?>">Enter a classroom</a></li>
      <!-- Make Upload only visible to admins -->
      <li><a href="Upload.php?data=<?php echo $_POST['ID']?>">Upload a classroom</a></li>
      <li><a href="#">Search</a></li> 
    </ul>
  </div>
</nav>
	</head>
   <body>
   
   <div class="container-fluid">
	<h2>Answer this question</h2>
   </div>
	<?php 
	require 'init.php';

   
   $QNum = $_POST["Chair"];
   $sql = "SELECT `Seat`, `User_ID`, `Question` FROM `questions` WHERE Seat = $QNum";
   $result = mysqli_query($con, $sql);
   $entry = mysqli_fetch_assoc($result);
   $question = $entry["Question"];
   echo $question;
   ?>

   <form action="answer.php?data=<?php echo $User_Name?>&ques=<?php echo $question ?>&seat=<?php echo $QNum ?>&ClassID=<?php echo $_GET['ClassID']?>" method="post">
   Answer this question: <br>
   <input type="charvar" name="Answer"> </input> <br> <br>
   <input type="submit" value="Submit Question"> </input>
   </form>


		</form>
		<br> &nbsp
   </body>
	</html>