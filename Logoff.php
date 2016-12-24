<?php
header('Content-Type: text/html; charset=utf-8');
setlocale(LC_ALL,'ru_RU.65001','rus_RUS.65001','Russian_Russia.65001','russian');

session_start();

unset($_SESSION['password']);
unset($_SESSION['login']); 
unset($_SESSION['id']);

session_destroy();
echo ' <a href = index.php>Вернуться на главную</a>';
?>