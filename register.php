<?php

//Проверяем пришли ли данные
if(isset($_POST['login']) && isset($_POST['password']))
{
//Записываем все в переменные
    $login=htmlspecialchars(trim($_POST['login']));
    $password=htmlspecialchars(trim($_POST['password']));
    $name=htmlspecialchars(trim($_POST['name']));
    $surname=htmlspecialchars(trim($_POST['surname']));
    $pos=htmlspecialchars(trim($_POST['pos']));

//Проверяем на пустоту
    if($login=="" || $password=="" || $name=="" || $surname=="" || $pos=="")
    {
        die("Заполните все поля!");
    }

//Подключаем базу данных
    include("bd.php");

//Достаем из БД информацию о введенном логине
    $res=mysqli_query($link,"SELECT `login` FROM `users` WHERE `login`='$login' ");
    $data=mysqli_fetch_array($res);

//Если он не пуст, то значит такой уже есть
    if(!empty($data['login']))
    {
        die("Такой логин уже существует!");
    }


//Вставляем данные в БД
    $result=mysqli_query($link,"INSERT INTO `users` (`login`,`password`,`name`,`surname`,`pos`) VALUES('$login','$password','$name','$surname','$pos') ");

//Если данные успешно занесены в таблицу
    if($result==true)
    {
        echo "Пользователь успешно зарегестрирован! <br><a href='index.php'>На главную</a>";
    }
//Если не так, то выводим ошибку
    else
    {
        echo "ERROR <br><a href='index.php'>На главную</a>".mysqli_error();
    }
}
?>