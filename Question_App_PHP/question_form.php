<?php
require 'init.php';
$Num = $_POST['SeatNum'];
$Ques = $_POST['Question'];
$User_Name = htmlspecialchars($_GET["data"]);
$Class_ID = htmlspecialchars($_GET["ClassID"]);

$sql = "SELECT `Seat`, `User_ID`, `Question` FROM `questions` WHERE Seat = $Num";
$result = mysqli_query($con, $sql);
if (($result->num_rows > 0)){
   $update = "UPDATE `questions` SET `User_ID`='$Username',`Question`='$Ques' WHERE Seat = $Num";
      if ($con->query($update) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error: " . $update . "<br>" . $con->error;
}
} else {
$ins = "INSERT INTO `questions`(`Seat`, `User_ID`, `Question`) VALUES ($Num,'$User_Name','$Ques')";
if ($con->query($ins) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $ins . "<br>" . $con->error;
}
}
$con->close();
header("Location: ClassroomLayout.php?data=$User_Name&ClassID=$Class_ID");
?>
