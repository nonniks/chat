<?php
//Подключаемся к БД
include("bd.php");
//Выбираем все сообщения
$res=mysqli_query($link,"SELECT * FROM `messages` ORDER BY `id` ");
//Выводим все сообщения на экран
while($d=mysqli_fetch_array($res))
{
    echo "<b><font color='blue'>".$d['name']."&nbsp;".$d['surname']."&nbsp;/".$d['pos'].":&nbsp;</font></b>".$d['message']."<br>";
}
?>