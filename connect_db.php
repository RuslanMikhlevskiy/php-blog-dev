<?php 
$connect = mysqli_connect('127.0.0.1', 'root', '', 'php_blog.db') 
OR die (mysqli_connect_error());
mysqli_set_charset($connect, 'utf-8');

if (!mysqli_ping($connect)) {
	echo 'Ошибка соеденения';
}