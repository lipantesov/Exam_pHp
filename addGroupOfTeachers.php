<?php
include 'connecting.php';
echo "<meta charset='utf-8'>";
echo "<script src='myScript.js'></script>";


$link = mysqli_connect($host,$user,$password,$database) or die("Error:  ".mysqli_error($link));

if(isset($_POST['groupName']))
{
    echo "<h3>Group successfully added</h3>";

}


mysqli_close($link);