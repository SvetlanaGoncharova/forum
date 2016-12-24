<?php
header('Content-Type: text/html; charset=utf-8');
setlocale(LC_ALL,'ru_RU.65001','rus_RUS.65001','Russian_Russia.65001','russian');
session_start();
$login = $_SESSION['login'];
$password = $_SESSION['password'];
$id_user = $_SESSION['id'];

include_once("bd.php");

if(empty($login) and empty($password)){
 echo '<a href = logpage.php>Вход</a>';
 }
else{
echo $_SESSION['login'].', добро пожаловать на форум. | <a href = logoff.php>Выход</a>';
echo '<br>';
echo '<br>';
echo '<a href = createforumhtml.php>Создать раздел</a>';
echo '<br>';
$res1 = mysql_query("SELECT name FROM forums");
while($row1=mysql_fetch_array($res1)) {
$res2 = mysql_query("SELECT creatorid FROM forums WHERE name='$row1[name]'");
$row2=mysql_fetch_array($res2);
$res3 = mysql_query("SELECT login FROM users WHERE id='$row2[creatorid]'");
$row3=mysql_fetch_array($res3);
$res4 = mysql_query("SELECT id FROM forums WHERE name='$row1[name]'");
$row4=mysql_fetch_array($res4);
echo '<br>';
echo $row3['login'].' создал(а) раздел:';
echo '<br>';
echo "<a href = themespage.php?forumid=$row4[id]>$row1[name]</a>";
echo '<br>';
}
}
?>

