<?php
require 'init.php';
$Num = $_POST['SeatNum'];
$Ques = $_POST['Question'];
$User_Name = htmlspecialchars($_GET["data"]);
$sql = "INSERT INTO `questions`(`Seat`, `User_ID`, `Question`) VALUES ($Num,'$User_Name','$Ques')";
if ($con->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
}

$con->close();
?>
