<?php
include ("bd.php");
header('Content-Type: text/html; charset=utf-8');
setlocale(LC_ALL,'ru_RU.65001','rus_RUS.65001','Russian_Russia.65001','russian');

$_SESSION['themeid']=$_GET[themeid];
$id_theme = $_SESSION['themeid'];
$id_forum = $_SESSION['forumid'];

$res12 = mysql_query("SELECT name FROM themes WHERE id=$id_theme");
$row12=mysql_fetch_array($res12);
$res13 = mysql_query("SELECT creatorid FROM themes WHERE id=$id_theme");
$row13=mysql_fetch_array($res13);
$res14 = mysql_query("SELECT login FROM users WHERE id='$row13[creatorid]'");
$row14=mysql_fetch_array($res14);
echo 'Тема: '.$row12['name'].' | Создатель темы: '.$row14['login'];
echo '<br>';
echo '<br>';
echo '<a href = createmessagehtml.php>Написать сообщение</a>';
echo '<br>';
$res15 = mysql_query("SELECT message FROM messages WHERE themeid=$id_theme");
while($row15=mysql_fetch_array($res15)) {
$res16 = mysql_query("SELECT creatorid FROM messages WHERE message='$row15[message]'");
$row16=mysql_fetch_array($res16);
$res17 = mysql_query("SELECT login FROM users WHERE id='$row16[creatorid]'");
$row17=mysql_fetch_array($res17);
echo '<br>';
echo $row17['login'].' написал(а) сообщение:';
echo '<br>';
echo $row15['message'];
echo '<br>';
}
echo '<br>';
echo "<a href = themespage.php?forumid=$id_forum>К списку тем</a>";
?>