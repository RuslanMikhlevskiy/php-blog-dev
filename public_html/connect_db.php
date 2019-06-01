<?php 
$connect = mysqli_connect('127.0.0.1', 'root', 'GoticaNeerotice', 'php_blog.db') 
OR die (mysqli_connect_error());
mysqli_set_charset($connect, 'utf8');

if (!mysqli_ping($connect)) {
	echo 'Ошибка соединения';
} 