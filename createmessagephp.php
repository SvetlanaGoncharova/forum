<?php
include_once("bd.php");
header('Content-Type: text/html; charset=utf-8');
setlocale(LC_ALL,'ru_RU.65001','rus_RUS.65001','Russian_Russia.65001','russian');

if (isset($_POST['submit3'])){
    if(empty($_POST['message']))  {
     echo '<br><font color="red"><img border="0" src="error.gif" alt="Введите сообщение"> Введите сообщение!</font>';
 }
else{
$message = $_POST['message'];
$creatorid = $_SESSION['id'];
$id_theme = $_SESSION['themeid'];
$query = "INSERT INTO messages (message, creatorid, themeid)
 VALUES ('$message', $creatorid, $id_theme)";
$result = mysql_query($query) or die(mysql_error());;
echo '<font color="green"><img border="0" src="ok.gif"  alt="Вы успешно написали сообщение!">Вы успешно написали сообщение!</font>';
echo "<a href = messagespage.php?themeid=$id_theme>Вернутся к сообщениям</a>";
 }
 }
?>