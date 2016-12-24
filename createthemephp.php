<?php
include_once("bd.php");
header('Content-Type: text/html; charset=utf-8');
setlocale(LC_ALL,'ru_RU.65001','rus_RUS.65001','Russian_Russia.65001','russian');

if (isset($_POST['submit2'])){
    if(empty($_POST['name1']))  {
     echo '<br><font color="red"><img border="0" src="error.gif" alt="Введите название"> Введите название!</font>';
 } 
elseif (!preg_match("/^\w{3,}$/", $_POST['name1'])) {
echo '<br><font color="red"><img border="0" src="error.gif" alt="В поле "Название" введены недопустимые символы!">В поле "Название" введены недопустимые символы! Только буквы, цифры и подчеркивание!</font>';
 }
else{
$name1 = $_POST['name1'];
$creatorid = $_SESSION['id'];
$id_forum = $_SESSION['forumid'];
$query = ("SELECT id FROM themes WHERE name='$name1'");
$sql = mysql_query($query) or die(mysql_error());
if (mysql_num_rows($sql) > 0) {
echo '<font color="red"><img border="0" src="error.gif" alt="Тема с таким названием уже существует!">Тема с таким названием уже существует!</font>';
 }

else{
$query = "INSERT INTO themes (name, creatorid, forumid)
 VALUES ('$name1', $creatorid, $id_forum)";
$result = mysql_query($query) or die(mysql_error());;
echo '<font color="green"><img border="0" src="ok.gif"  alt="Вы успешно создали тему!">Вы успешно создали тему!</font>';
echo "<a href = themespage.php?forumid=$id_forum>К списку тем</a>";
 }
 }
 }
?>