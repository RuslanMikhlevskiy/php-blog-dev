<?php
/*
 * This file contains data access layer functions.
*/

require_once ('mysql_utils.php');

// Для входа при помощи логина
function findUserByLoginAndPassword(string $login, string $password) {
  // Opening connection
	$connection = createDbConnection();

  // Searching for user by login and password
	$sql = "SELECT * from users where login = '$login' and password = '$password'";
	$result = mysqli_query($connection, $sql);
  // mysqli_fetch_assoc returns NULL in case if there's no result
	$userInfo = mysqli_fetch_assoc($result);

  // Closing connection
	$result->free();
	$connection->close();

	return $userInfo;
}

// Регистрация нового пользователя
function createUser(string $login, string $password, string $firstName, string $lastName) {

  // Коннектимся в бд
	$connection = createDbConnection();

  // SQL запрос на добавление данных в таблицу
	$insertToUsers = "INSERT INTO users (login,password,first_name,last_name) VALUES ('$login', '$password', '$firstName', '$lastName')";

  // Отправляем запрос в бд	
	$startInsert = mysqli_query($connection, $insertToUsers);

  // Получаем данные из таблицы users
	$receiptData = mysqli_fetch_assoc($startInsert);

  // Closing connection
	//$startInsert->free();
	$connection->close();

	return $receiptData;
}

// Проверяем существования пользователя
function findUserBySelectRequest(string $login, string $password, string $firstName, string $lastName) {

  // Коннектимся в бд
	$connection = createDbConnection();

  // Выбираем данные из таблицы users
	$selectData = "SELECT count(*) as total from users where login ='$login'";

  //Отправляем в бд
	$selectStart = mysqli_query($connection, $selectData);

  //Получаем данные из таблицы users
	$data = mysqli_fetch_assoc($selectResult);

  //Условие на совпадение
	$alreadyexists = $data['total'] > 0;

	return $alreadyexists;
}

?>
