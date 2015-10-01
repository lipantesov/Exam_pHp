<?php
include 'connecting.php';
echo "<meta charset='utf-8'>";

$link = mysqli_connect($host,$user,$password,$database) or die("Error:  ".mysqli_error($link));

$query = "SELECT `groupName`, `numberPerson` FROM `groups`";

$result = mysqli_query($link,$query) or die('Error'.mysqli_error($link));

$rows = mysqli_num_rows($result);

if($rows > 0)
{
//    echo "<table>";
//    for ($i = 0 ; $i < $rows ; ++$i)
//    {
//        $row = mysqli_fetch_row($result);
//        echo "<tr>";
//        for ($j = 0 ; $j < 3 ; ++$j)
//        {
//            echo "<td>$row[$j]</td>";
//
//        }
//        echo "</tr>";
//    }
//    echo "</table>";


    echo "<ul>";
    for ($i = 0 ; $i < $rows ; ++$i)
    {
        $row = mysqli_fetch_row($result);
        echo "<li>";
        for ($j = 0 ; $j < 3 ; ++$j)
        {
            echo $row[$j];

        }
        echo "</li>";
    }
    echo "</ul>";
}
