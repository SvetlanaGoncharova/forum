<?php
header('Content-Type: text/html; charset=utf-8');
setlocale(LC_ALL,'ru_RU.65001','rus_RUS.65001','Russian_Russia.65001','russian');
include_once("bd.php");
if (isset($_POST['login'])){
     $login = $_POST['login']; 
     if ($login == '') {
         unset($login);
         exit ("Введите пожалуйста логин!");
     } 
 }
if (isset($_POST['password'])){
     $password = $_POST['password']; 
     if ($password == '') {
         unset($password);
         exit ("Введите пароль");
     }
 }
$login = stripslashes($login);
$login = htmlspecialchars($login);
$password = stripslashes($password);
$password = htmlspecialchars($password);
  
$login = trim($login);
$password = trim($password);
$user = mysql_query("SELECT id FROM users WHERE login='$login' AND password='$password'");
$id_user = mysql_fetch_array($user);
if (empty($id_user['id'])){
     exit ("Извините, введённый вами логин или пароль неверный.");
 }
else {
     $_SESSION['password'] = $password; 
     $_SESSION['login'] = $login; 
     $_SESSION['id'] = $id_user['id']; 
 }
echo "<meta http-equiv='Refresh' content='0; URL=index.php'>";
?>