
<?php require ('..\connect_db.php');//Коннектимся к бд ?>


<form action="" method="POST" accept-charset="utf-8">
	Логин: <input name="login" type="text"> <br>
	Пароль: <input name="password" type="text"> <br>
	Имя: <input name="first_name" type="text"> <br>
	Фамилия: <input name="last_name" type="text">
	<p><input type="submit" value="Отправить"></p>
</form>

<?php 
//Проверка заполнены ли поля на примере логина
if (isset($_POST['login']) && !empty($_POST['login'])) {

	//Добавляем переменные с $_POST
	$login = $_POST['login'];
	$password = $_POST['password'];
	$firstName = $_POST['first_name'];
	$lastName = $_POST['last_name'];

	//SQL запрос на добавление данных в таблицу
	$sql = "INSERT INTO `users` (
	`login`, 
	`password`, 
	`first_name`, 
	`last_name`)
	VALUES ('$login', '$password', '$firstName', '$lastName')";


	//Проверка установлено ли соединение с бд
	if (mysqli_query($connect, $sql) == TRUE) {
		echo 'Запись добавлена в таблицу';
	}
	else {
		echo 'Ошибка данных: '. mysqli_error($connect);
	}
}
//Закрываем коннект
mysqli_close($connect);
