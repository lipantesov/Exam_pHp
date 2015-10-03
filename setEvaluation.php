<?php
include 'connecting.php';
echo "<meta charset='utf-8'>";
echo "<script src='myScript.js'></script>";



$link = mysqli_connect($host,$user,$password,$database) or die("Error:  ".mysqli_error($link));
$groupName = $_POST['groupName'];

$query = "SELECT studentId,studentName,studentSurname FROM `students` WHERE `groupName`='$groupName'";

$result = mysqli_query($link,$query)or die(mysqli_error($link));
if($result)
{
    $rows = mysqli_num_rows($result); // количество полученных строк

    echo "<table class='table table-bordered'><tr><th>Id</th><th>Name</th><th>Surname</th><th>Assessment</th><th>Date</th></tr>";
    for ($i = 0 ; $i < $rows ; ++$i)
    {
        $row = mysqli_fetch_row($result);


        echo "<tr>";
        for ($j = 0 ; $j < 3 ;$j++)
        {
            echo "<td>$row[$j]</td>";
//            if($j == 3)
//            {
//                echo "<td><input type='text' style='width: 50px'></td>";
//                break;
//            }

        }

        echo "<td><input type='text' style='width: 50px'></td>";
        echo "<td>getDate()</td>";
        echo "</tr>";
    }
    echo "</table>";
}



mysqli_close($link);