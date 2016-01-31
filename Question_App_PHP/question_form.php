<?php
require 'init.php';
$Num = $_POST['SeatNum'];
$Ques = $_POST['Question'];
$User_Name = htmlspecialchars($_GET["data"]);
$Class_ID = htmlspecialchars($_GET["ClassID"]);
$QAsked = 1;
/*
$sql = "SELECT `Seat`, `User_ID`, `Question` `Class_Name` FROM `questions` WHERE Seat = $Num AND Class_Name = $Class_Name";
$result = mysqli_query($con, $sql);
if (($result->num_rows > 0)){
   $update = "UPDATE `questions` SET `User_ID`='$Username',`Question`='$Ques' WHERE Seat = $Num";
      if ($con->query($update) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error: " . $update . "<br>" . $con->error;
}

} else { */
$ins = "INSERT INTO `questions`(`Seat`, `User_ID`, `Question`,`Class_Name`) VALUES ($Num,'$User_Name','$Ques','$Class_ID')";
if ($con->query($ins) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $ins . "<br>" . $con->error;
}
$con->close();
header("Location: ClassroomLayout.php?data=$User_Name&ClassID=$Class_ID&QAsked=1");
?>
