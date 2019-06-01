<?php require ('../connect_db.php');//Коннектимся к бд ?>
<?php 
//Проверка на тип запроса
if ($_SERVER['REQUEST_METHOD'] == "POST") {
   //Добавляем переменные с $_POST
	$login = $_POST['login'];
	$password = $_POST['password'];
	$firstName = $_POST['first_name'];
	$lastName = $_POST['last_name'];
	//Добавляет sql запрос на выбор данных
	$result = mysqli_query($connect, "SELECT count(*) as total from users where login ='$login'");
	//Добавляем данные в переменную из таблицы users
	$data = mysqli_fetch_assoc($result);
	//Условие на совпадение
	$alreadyexists = $data['total'] > 0;

	//SQL запрос на добавление данных в таблицу
	$sql = "INSERT INTO users (
	login, 
	password, 
	first_name, 
	last_name)
	VALUES ('$login', '$password', '$firstName', '$lastName')";
    
    //Условие на проверку юзера
	if ($alreadyexists) {
		echo 'Такой пользователь уже зарегистрирован, заполните поля.';
	}
	else {
		mysqli_query($connect, $sql);
		header('Location: login.php');
	}
}	

//Закрываем коннект
mysqli_close($connect);
?>

<form action="" method="POST" accept-charset="utf-8">
	Логин: <br> <input name="login" type="text"> <br>
	Пароль: <br> <input name="password" type="text"> <br>
	Имя: <br> <input name="first_name" type="text"> <br>
	Фамилия: <br> <input name="last_name" type="text">
	<p><input type="submit" value="Отправить"></p>
</form>