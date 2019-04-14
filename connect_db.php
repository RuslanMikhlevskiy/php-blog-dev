<?php 
$connectDb = mysqli_connect('127.0.0.1', 'root', '', 'php_blog.db') 
OR die (mysqli_connect_error());
mysqli_set_charset($connectDb, 'utf-8');

if (mysqli_ping($connectDb)) {
	echo 'Сервер MySQL '. mysqli_get_server_info($connectDb) . ' на '. mysqli_get_host_info($connectDb);
}