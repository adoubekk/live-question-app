<!DOCTYPE html>

<?php
require 'init.php';

if($_POST['ID'] != NULL && $_POST['Password'] != NULL){
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
}
else{
	echo "Must Login First.";
	header('Location: Login&Register.html' );
	
}

?>
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
      <li><a href="login.html">Login</a></li>
      <li><a href="#">Post A Question</a></li> 
      <li><a href="#">Search</a></li> 
    </ul>
  </div>
</nav>
<div class="container">
  <h1>Hello <?php echo $_POST['ID']?>!</h1>
  <p>This is some text.</p> 
</div>

</body>
</html>