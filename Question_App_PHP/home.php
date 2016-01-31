<!DOCTYPE html>

<?php
error_reporting(0);
require 'init.php';
session_start();
$var = array_key_exists('ID', $_POST) ? $_POST['ID'] : null;

if($_POST['ID'] != NULL & $_POST['Password'] != NULL){
$login_name = $_POST['ID'];
$login_pass = $_POST['Password'];


$sql_query =  "select User_ID from user_info where User_ID like '$login_name' and Password like '$login_pass';";

$result = mysqli_query($con, $sql_query);

if(mysqli_num_rows($result)>0)
{
$row = mysqli_fetch_assoc($result);
$name = $row["User_ID"];;
}
else
{
echo "ID or password is invalid.";
}
}elseif ($_POST['Class_Name'] != NULL) {
	$C_Name = $_POST['Class_Name'];
	$C_Seats = $_POST['Class_Seats'];

	$sql_query2 = "INSERT INTO Classrooms (Class_Name, Class_Seats) VALUES ( '$C_Name' ,'$C_Seats')";

	if(mysqli_query($con,$sql_query2))
{
echo "<h3>$C_Name has been uploaded</h3>";
}
else
{
echo "Data insertion error...".mysqli_error($con);
}
}elseif ($_GET["data"] != NULL) {
	
}

?>
<?php if($_POST['ID'] == NULL){$var = $_GET["data"];} else{$var = $_POST['ID'];} ?>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">WebSiteName</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Home</a></li>
      <li><a href="Join.php?data=<?php echo $var?>">Enter a classroom</a></li>
      <!-- Make Upload only visible to admins -->
      <?php require 'init.php';
      $sql_query3 = "select admin from user_info where User_ID like '$var';"; 
      $result = mysqli_query($con, $sql_query3);
      $row = mysqli_fetch_assoc($result);
      $bool = $row["admin"];
      
      if($bool == 1){ ?>
      <li><a href="Upload.php?data=<?php echo $var?>">Upload a classroom</a></li>
      <?php } ?>
      <li><a href="#">Search</a></li> 
    </ul>
  </div>
</nav>
<div class="container">
  <h1>Welcome <?php echo $var;?>!</h1>
  <ul>
  <li class = "well">Step 1: join an existing classroom</li>
  <li class = "well">Step 2: post questions the class/professor using the interactive classroom layout</li>
  <li class = "well">Step 3: look at questions being asked in real time on the home classroom layout</li>
  </ul> 
</div>


<?php
echo $bool;
error_reporting(0);
if($_POST['ID'] == NULL & $_GET['data'] == NULL){

	?>
	<h2>Don't have an account?</h2>
<a href="Login&Register.html"><button type="submit" class="btn-primary btn-lg">Login/Register</button></a>
<?php } ?>







</body>
</html>