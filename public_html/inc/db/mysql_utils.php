<?php 

function createDbConnection() {
  // TODO: move MySQL credentials to *.ini file
  $connection = mysqli_connect('127.0.0.1', 'root', 'GoticaNeerotice', 'php_blog.db') 
    or die (mysqli_connect_error());
  mysqli_set_charset($connect, 'utf8');

  if (!mysqli_ping($connect)) {
	die ('Ошибка соединения');
  } 

  return $connection;
}



