<?php

$dbcon=mysql_connect ("127.0.0.1","root","");
mysql_select_db ("mybd",$dbcon);
if (!$dbcon) {
echo "<p>Ошибк подключения!</p>".mysql_error(); exit();
} else {
if (!mysql_select_db("mybd",$dbcon)){
		echo '<p>Выбранной базы не существует!</p>';
	}
}
session_start();
?>