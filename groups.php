<?php
include 'connecting.php';
echo "<meta charset='utf-8'>";
echo "<script src='myScript.js'></script>";


$link = mysqli_connect($host,$user,$password,$database) or die("Error:  ".mysqli_error($link));

$query = "SELECT `groupName` FROM `groups`";

$result = mysqli_query($link,$query) or die('Error'.mysqli_error($link));

$rows = mysqli_num_rows($result);

if($rows > 0)
{
    echo "<h3>List of groups</h3>";
        echo "<ul id='list_group'>";
        for ($i = 0 ; $i < $rows ; ++$i)
        {
            $row = mysqli_fetch_row($result);


            echo "<input type='checkbox' id='check' value=$row[0]>";

                echo $row[0];

        echo "<br>";
        }
        echo "</ul>";
    if($_POST['idAction'] == 'addGroup')
        echo "<button class='btn btn-success' id='btn_add'>add</button>";
    elseif($_POST['idAction'] == 'setEval')
        echo "<button class='btn btn-success' id='btn_select'>select</button>";
    elseif($_POST['idAction'] == 'show')
        echo "<button class='btn btn-success' id='btn_show'>show</button>";

}
mysqli_close($link);