<?php
//Use dao file
require_once("../inc/db/dao.php");?>
<?php 
// Проверка на тип запроса
if ($_SERVER['REQUEST_METHOD'] == "POST") {
   // Добавляем переменные с $_POST
	$login = $_POST['login'];
	$password = $_POST['password'];
	$firstName = $_POST['first_name'];
	$lastName = $_POST['last_name'];

   //Проверка на наличие пользователя
	$checkUser = findUserBySelectRequest($login, $password, $firstName, $lastName);
	
   // Записать пользователя в таблицу users
	$insertResult = createUser($login, $password, $firstName, $lastName);

   


    
    // Условие на проверку юзера
	if ($checkUser) {
		echo 'Такой пользователь уже зарегистрирован, заполните поля.';
	}
	else {
		echo $insertResult;
		echo "Все заебись!";
		//header('Location: login.php');
	}
}	

?>

<form action="" method="POST" accept-charset="utf-8">
	Логин: <br> <input name="login" type="text"> <br>
	Пароль: <br> <input name="password" type="text"> <br>
	Имя: <br> <input name="first_name" type="text"> <br>
	Фамилия: <br> <input name="last_name" type="text">
	<p><input type="submit" value="Отправить"></p>
</form>
