<?php
include 'connecting.php';
echo "<meta charset='utf-8'>";
echo "<script src='myScript.js'></script>";


$link = mysqli_connect($host,$user,$password,$database) or die("Error:  ".mysqli_error($link));

$teacher = $_POST['teacherName'];
$group = $_POST['group'];
$studentName = $_POST['studentName'];
$studentSurname = $_POST['studentSurname'];
$date = $_POST['date'];
$assessment = $_POST['asses'];


$query = "INSERT INTO `journal`(`teacherName`, `groupName`, `studentName`, `studentSurname`, `dateAss`, `assessment`)
VALUES ('$teacher','$group','$studentName','$studentSurname','$date',$assessment)";

$result = mysqli_query($link,$query) or die(mysqli_error($link));

$count = mysqli_num_rows($result);

if($count > 0)
{
    echo "Add   ".$count."   nodes";
}





