<?php
//�������� ���� �� ���������� �� ����������
if(isset($_POST['mess']) && $_POST['mess']!="" && $_POST['mess']!=" ")
{
    //�������� ������ ��� ������ ������ ������������
    session_start();
    //��������� ���������� ���������
    $mess=$_POST['mess'];
    //���������� � ������� ������������
    $login=$_SESSION['login'];
    $name=$_SESSION['name'];
    $surname=$_SESSION['surname'];
    $pos=$_SESSION['pos'];
    //������������ � ����
    include ('bd.php');
    //��������� ��� � �������
    $res=mysqli_query($link,"INSERT INTO `messages` (`login`,`message`,`name`,`surname`,`pos`) VALUES ('$login','$mess','$name','$surname','$pos') ");
}
?>