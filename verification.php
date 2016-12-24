<?php
header('Content-Type: text/html; charset=utf-8');
setlocale(LC_ALL,'ru_RU.65001','rus_RUS.65001','Russian_Russia.65001','russian');
$dbcon=mysql_connect ("127.0.0.1","root","");
mysql_select_db ("mybd",$dbcon);
if (!$dbcon) {
echo '<p>Ошибк подключения!</p>'.mysql_error(); exit();
} else {
if (!mysql_select_db("mybd",$dbcon)){
echo('<p>Выбранной базы не существует!</p>');
}
}

if (isset($_POST['submit'])){
    if(empty($_POST['login']))  {
     echo '<br><font color="red"><img border="0" src="error.gif" alt="Введите логин"> Введите логин!</font>';
 } 
elseif (!preg_match("/^\w{3,}$/", $_POST['login'])) {
echo '<br><font color="red"><img border="0" src="error.gif" alt="В поле "Логин" введены недопустимые символы!">В поле "Логин" введены недопустимые символы! Только буквы, цифры и подчеркивание!</font>';
 }
elseif(empty($_POST['password'])) {
echo '<br><font color="red"><img border="0" src="error.gif" alt="Введите пароль !">Введите пароль!</font>';
 }
elseif (!preg_match("/\A(\w){6,20}\Z/", $_POST['password'])) {
 echo '<br><font color="red"><img border="0" src="error.gif" alt="Пароль слишком короткий!">Пароль слишком короткий! Пароль должен быть не менее 6 символов! </font>';
 }
elseif(empty($_POST['password2'])) {
echo '<br><font color="red"><img border="0" src="error.gif" alt="Введите подтверждение пароля!">Введите подтверждение пароля!</font>';
 }
elseif($_POST['password'] != $_POST['password2']) {
echo '<br><font color="red"><img border="0" src="error.gif" alt="Введенные пароли не совпадают!">Введенные пароли не совпадают!</font>';
 }


else{
$login = $_POST['login'];
$password = $_POST['password'];
$password2 = $_POST['password2'];

$query = ("SELECT id FROM users WHERE login='$login'");
$sql = mysql_query($query) or die(mysql_error());

if (mysql_num_rows($sql) > 0) {
echo '<font color="red"><img border="0" src="error.gif" alt="Пользователь с таким логином зарегистрированый!">Пользователь с таким логином зарегистрирован!</font>';
 }

else{
$query = "INSERT INTO users (login, password) VALUES ('$login', '$password')";
$result = mysql_query($query) or die(mysql_error());;
echo '<font color="green"><img border="0" src="ok.gif"  alt="Вы успешно зарегистрировались!">Вы успешно зарегистрировались!</font>';
echo '<a href = index.php>Главная</a>';
 }
 }
 }
?>