
<?php
require 'init.php';

$login_name = $_POST[ID];
$login_pass = $_POST[Password];

$sql_query =  "select User_ID from user_info where User_ID like '$login_name' and Password like '$login_pass';";

$result = mysqli_query($con, $sql_query);

if(mysqli_num_rows($result)>0)
{
$row = mysqli_fetch_assoc($result);
$name = $row["ID"];
header('home.php' );
}
else
{
echo "ID or password is invalid.";
}

?>