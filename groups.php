<?php
include 'connecting.php';
echo "<meta charset='utf-8'>";
echo "<script src='myScript.js'></script>";

$link = mysqli_connect($host,$user,$password,$database) or die("Error:  ".mysqli_error($link));

//Добавить группу появляется список всех групп
   if($_POST['idAction'] == 'addGroup')
{
    $query = "SELECT `groupId`,`groupName` FROM `groups`";

    $result = mysqli_query($link,$query) or die('Error'.mysqli_error($link));

    $rows = mysqli_num_rows($result);

    if($rows > 0) {
        echo "<h3>List of groups</h3>";
        echo "<ul id='list_group'>";
        for ($i = 0; $i < $rows; ++$i) {
            $row = mysqli_fetch_row($result);


            echo "<input type='checkbox' id='check' value=$row[0]>";

            echo $row[1];

            echo "<br>";
        }
        echo "</ul>";
        echo "<button class='btn btn-success' id='btn_add'>add</button>";
    }
}
//Выставить оценки появляется список групп в которых ведет данный преподаватель
   else if($_POST['idAction'] == 'setEval' && isset($_POST['teacherID']))
    {
        $teacherID = $_POST['teacherID'];//Идентификатор преподавателя

       $query_1 = "SELECT `groupId` FROM `journal_teachers` WHERE `teacherId`= $teacherID";//Поиск групп по id препода

        $result_1 = mysqli_query($link,$query_1) or die('Error'.mysqli_error($link));

        $rows_1 = mysqli_num_rows($result_1);//Количество найденных групп

        if($rows_1 > 0) {
            echo "<h3>List of groups</h3>";
            echo "<ul id='list_group'>";
            for ($i = 0; $i < $rows_1; ++$i) {

                $row_1 = mysqli_fetch_row($result_1);

                $query_2 = "SELECT `groupId`,`groupName` FROM `groups` WHERE `groupId`=$row_1[0]";

                $result_2 = mysqli_query($link, $query_2) or die('Error' . mysqli_error($link));

                $rows_2 = mysqli_num_rows($result_2);

                if ($rows_2 > 0) {


                    for ($j = 0; $j < $rows_2; ++$j) {
                        $row_2 = mysqli_fetch_row($result_2);


                        echo "<input type='checkbox' id='check' value=$row_2[1]>";

                        echo $row_2[1];

                        echo "<br>";
                    }


                }

            }
            echo "</ul>";
            echo "<button class='btn btn-success' id='btn_select'>select</button>";
        }
        else
            echo "No groups have this teacher";
    }
//Просмотреть информацию по группам в которых преподает данный препод
   elseif($_POST['idAction'] == 'show' && isset($_POST['teacherID']))
{
    $teacherID = $_POST['teacherID'];//Идентификатор преподавателя

    $query_1 = "SELECT `groupId` FROM `journal_teachers` WHERE `teacherId`= $teacherID";//Поиск групп по id препода

    $result_1 = mysqli_query($link,$query_1) or die('Error'.mysqli_error($link));

    $rows_1 = mysqli_num_rows($result_1);//Количество найденных групп

    if($rows_1 > 0) {
        echo "<h3>List of groups</h3>";
        echo "<ul id='list_group'>";
        for ($i = 0; $i < $rows_1; ++$i) {

            $row_1 = mysqli_fetch_row($result_1);

            $query_2 = "SELECT `groupId`,`groupName` FROM `groups` WHERE `groupId`=$row_1[0]";

            $result_2 = mysqli_query($link, $query_2) or die('Error' . mysqli_error($link));

            $rows_2 = mysqli_num_rows($result_2);

            if ($rows_2 > 0) {


                for ($j = 0; $j < $rows_2; ++$j) {
                    $row_2 = mysqli_fetch_row($result_2);


                    echo "<input type='checkbox' id='check' value=$row_2[1]>";

                    echo $row_2[1];

                    echo "<br>";
                }


            }

        }
        echo "</ul>";
        echo "<button class='btn btn-success' id='btn_show'>show</button>";
    }
    else
        echo "No groups have this teacher";
}



mysqli_close($link);