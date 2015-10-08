<?php
include 'connecting.php';
echo "<meta charset='utf-8'>";
echo "<script src='myScript.js'></script>";


$link = mysqli_connect($host,$user,$password,$database) or die("Error:  ".mysqli_error($link));

if(isset($_POST['groupId']) && isset($_POST['teacherId']))
{
    $teacherID = $_POST['teacherId'];
    $groupId = $_POST['groupId'];

    $query = "INSERT INTO `journal_teachers`(`id`, `teacherId`, `groupId`) VALUES (NULL,$teacherID,$groupId)";

    $result = mysqli_query($link,$query) or die(mysqli_error($link));

    if($result)
    echo "<h3>Group successfully added</h3>";

}


mysqli_close($link);