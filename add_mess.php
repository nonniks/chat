<?php
//Проверям есть ли переменные на добавление
if(isset($_POST['mess']) && $_POST['mess']!="" && $_POST['mess']!=" ")
{
    //Стартуем сессию для записи логина пользователя
    session_start();
    //Принимаем переменную сообщения
    $mess=$_POST['mess'];
    //Переменная с логином пользователя
    $login=$_SESSION['login'];
    $name=$_SESSION['name'];
    $surname=$_SESSION['surname'];
    $pos=$_SESSION['pos'];
    //Подключаемся к базе
    include ('bd.php');
    //Добавляем все в таблицу
    $res=mysqli_query($link,"INSERT INTO `messages` (`login`,`message`,`name`,`surname`,`pos`) VALUES ('$login','$mess','$name','$surname','$pos') ");
}
?>