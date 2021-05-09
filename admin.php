<html>

<title>Чат</title>

<head>
</head>

<body>
<?php
//Запускаем сессию для работы с кукис файлами
session_start();
//Если отсутствуют логин и айди,
//регистрации
if(!isset($_SESSION['login']) || !isset($_SESSION['id']))
{
    ?>
    <center>
        <form action="register.php" method="POST">
            <h3>Регистрация</h3>
            Логин: <br> <input type="text" name="login">
            <br>
            Пароль: <br> <input type="password" name="password">
            <br>
            Имя: <br> <input type="text" name="name">
            <br>
            Фамилия: <br> <input type="text" name="surname">
            <br>
            Должность: <br> <input type="text" name="pos">
            <br>
            <input type="submit" value="Зарегистрировать">
        </form>

    </center>
    <?php
}
//Если сессия запущена, то есть присутствуют файлы
//кукис, и в них есть логин и айди
//то отображаем профиль пользователя
//Для этого достаем из базы все данные по логину
//и выводим их на странице
if(isset($_SESSION['login']) && isset($_SESSION['id']))
{

    include("bd.php");
    $user=$_SESSION['login'];
    $res=mysqli_query($link,"SELECT * FROM `users` WHERE `login`='$user' ");
    $user_data=mysqli_fetch_array($res);

    echo "<div class = 'header'>";
    echo "Ваш логин: <b>". $user_data['login']."</b><br>";
    echo "Ваше имя: <b>". $user_data['name']."</b><br>";
    echo "Ваша фамилия: <b>". $user_data['surname']."</b><br>";
    echo "Должность: <b>". $user_data['pos']."</b><br>";
    echo "</div>";
    include("chat.php");
}
?>
</body>

</html>