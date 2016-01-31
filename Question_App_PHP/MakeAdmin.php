<?php
require 'init.php';

$name = $_GET['data'];
$password = $_GET['data2'];

echo $name;

$sql= "UPDATE user_info SET admin = 1 WHERE User_ID = '$name';";


$result = mysqli_query($con, $sql);

if(mysqli_num_rows($result)>0)
{
echo "admin created";
}
else
{
echo "error";
}

?>