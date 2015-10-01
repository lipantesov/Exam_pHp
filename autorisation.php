<?php
include 'connecting.php';
echo "<meta charset='utf-8'>";

if(isset($_POST['login']) && isset($_POST['password']))
{

    $link = mysqli_connect($host,$user,$password,$database) or die("Error:  ".mysqli_error($link));

    $login = $_POST['login'];
    $password = $_POST['password'];

    $query = "SELECT `teacherName`, `teacherSurname` FROM `teachers` WHERE `login`='$login' AND `password`= '$password'";

    $result = mysqli_query($link,$query) or die ("Error : ".mysqli_error($link));
if(mysqli_num_rows($result)>0)
{
    $row = mysqli_fetch_row($result);
    echo "Teacher :     ".$row[1]."     ".$row[0];
    echo "<script>
$('.control').css('display','block');
</script>";
}
    else
    {
        echo "There is no teacher.";
        echo "<script>
$('.control').css('display','none');
</script>";

}

}
