<?php
include ("bd.php");
header('Content-Type: text/html; charset=utf-8');
setlocale(LC_ALL,'ru_RU.65001','rus_RUS.65001','Russian_Russia.65001','russian');

$_SESSION['forumid']=$_GET[forumid];
$id_forum = $_SESSION['forumid'];
$res5 = mysql_query("SELECT name FROM forums WHERE id=$id_forum");
$row5=mysql_fetch_array($res5);
$res6 = mysql_query("SELECT creatorid FROM forums WHERE id=$id_forum");
$row6=mysql_fetch_array($res6);
$res7 = mysql_query("SELECT login FROM users WHERE id='$row6[creatorid]'");
$row7=mysql_fetch_array($res7);
echo 'Раздел: '.$row5['name'].' | Создатель раздела: '.$row7['login'];
echo '<br>';
echo '<br>';
echo '<a href = createthemehtml.php>Создать тему</a>';
echo '<br>';
$res8 = mysql_query("SELECT name FROM themes WHERE forumid=$id_forum");
while($row8=mysql_fetch_array($res8)) {
$res9 = mysql_query("SELECT creatorid FROM themes WHERE name='$row8[name]'");
$row9=mysql_fetch_array($res9);
$res10 = mysql_query("SELECT login FROM users WHERE id='$row9[creatorid]'");
$row10=mysql_fetch_array($res10);
$res11 = mysql_query("SELECT id FROM themes WHERE name='$row8[name]'");
$row11=mysql_fetch_array($res11);
echo '<br>';
echo $row10['login'].' создал(а) тему:';
echo '<br>';
echo "<a href = messagespage.php?themeid=$row11[id]>$row8[name]</a>";
echo '<br>';
}
echo '<br>';
echo '<a href = index.php>К списку разделов</a>';
?>
