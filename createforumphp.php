<?php
include_once("bd.php");
header('Content-Type: text/html; charset=utf-8');
setlocale(LC_ALL,'ru_RU.65001','rus_RUS.65001','Russian_Russia.65001','russian');
if (isset($_POST['submit1'])){
    if(empty($_POST['name']))  {
     echo '<br><font color="red"><img border="0" src="error.gif" alt="Введите название"> Введите название!</font>';
 } 
elseif (!preg_match("/^\w{3,}$/", $_POST['name'])) {
echo '<br><font color="red"><img border="0" src="error.gif" alt="В поле "Название" введены недопустимые символы!">В поле "Название" введены недопустимые символы! Только буквы, цифры и подчеркивание!</font>';
 }
else{
$name = $_POST['name'];
$creatorid = $_SESSION['id'];
$query = ("SELECT id FROM forums WHERE name='$name'");
$sql = mysql_query($query) or die(mysql_error());
if (mysql_num_rows($sql) > 0) {
echo '<font color="red"><img border="0" src="error.gif" alt="Раздел с таким названием уже существует!">Раздел с таким названием уже существует!</font>';
 }

else{
$query = "INSERT INTO forums (name, creatorid)
 VALUES ('$name', $creatorid)";
$result = mysql_query($query) or die(mysql_error());;
echo '<font color="green"><img border="0" src="ok.gif"  alt="Вы успешно создали раздел!">Вы успешно создали раздел!</font>';
echo '<a href = index.php>Главная</a>';
 }
 }
 }
?>