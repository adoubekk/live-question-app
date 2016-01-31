<?php
require 'init.php';
$Ans = $_POST['Answer'];
$Ques = htmlspecialchars($_GET["ques"]);
$Seat = htmlspecialchars($_GET["seat"]);
$User_Name = htmlspecialchars($_GET["data"]);
$sql = "INSERT INTO `Answered`(`Question`, `Answer`, `Asker`) VALUES ('$Ques','$Ans','$User_Name')";
if ($con->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
}
$del = "DELETE FROM `questions` WHERE Seat = $Seat";

if ($con->query($del) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}
$con->close();
?>
