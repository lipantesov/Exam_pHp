<?php
include 'connecting.php';
echo "<meta charset='utf-8'>";
echo "<script src='myScript.js'></script>";



$link = mysqli_connect($host,$user,$password,$database) or die("Error:  ".mysqli_error($link));
$groupName = $_POST['groupName'];

$query = "SELECT studentName,studentSurname,dateAss,assessment FROM `journal` WHERE `groupName`='$groupName'";

$result = mysqli_query($link,$query)or die(mysqli_error($link));


if($result)
{
    $rows = mysqli_num_rows($result); // количество полученных строк

    echo "<h4 id='group'>$groupName</h4>";
    echo "<table class='table table-bordered' id='tbl_set_eval'><tr><th>Name</th><th>Surname</th><th>Date</th><th>Assessment</th></tr>";
    for ($i = 0 ; $i < $rows ; ++$i)
    {
        $row = mysqli_fetch_row($result);


        echo "<tr>";
        for ($j = 0 ; $j < 4 ;$j++)
        {
            echo "<td>$row[$j]</td>";
        }

        echo "</tr>";
    }
    echo "</table>";

}



mysqli_close($link);



