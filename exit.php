<?php
//��������� ������ ��� ������ � ������
session_start();
//��� ��� ������������ ����� �����,
//������� ��� ����� � id �� �������
unset($_SESSION['login']);
unset($_SESSION['id']);
 
//���������������� �� �������
header("location: index.php");
?>