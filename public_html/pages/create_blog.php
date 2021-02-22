<?php session_start();//Запускаем сессию с UserId?>
<?php require ('../connect_db.php');//Коннектимся к бд ?>
<?php
//Проверяем включена ли сессия
if (isset($_SESSION['USER'])) {
	$user = $_SESSION['USER']['login'];
	echo "<h1>Привет $user</h1>";
} else {
	header('Location: login.php');
}

//Проверяем запрос
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	//Проверяем заполнение формы
	if (isset($_POST['description']) && isset($_POST['name'])) {
		//Название блога
		$name = $_POST['name'];
		//Описание блога
		$description = $_POST['description'];
		//Id юзера из сессии
		$userId = $_SESSION['USER']['id'];
		//Запрос на добавление блога
		$insert = "INSERT INTO blogs(name,description,created_date,owner_id) values('$name','$description',now(),$userId)";
		//Запрос на выборку из таблицы
		$select = "SELECT count(*) as test FROM blogs WHERE name = '$name'";
		//Отправляем SELECT запрос в бд
		$result = mysqli_query($connect, $select);
		//Получаем массив
		$data = mysqli_fetch_assoc($result);
		//Проходимся по массиву из таблицы
		if ($test = $data['test'] > 0) {
			echo 'Блог с таким именем уже существует' . '<hr>';
		//Если все ок, то добавляем запись	
		} else {
			mysqli_query($connect, $insert);
			//Получаем последний id для url
			$sql = "SELECT LAST_INSERT_ID()";
			$query = mysqli_query($connect, $sql);
			$blogId = mysqli_fetch_assoc($query);
			header('Location: create_post.php?blog_id='.$blogId['LAST_INSERT_ID()'].'');
		}

	}
}

?>

<form action="" method="POST" accept-charset="utf-8">
	Название: <br> <input name="name" type="text"> <br>
	Описание: <br> <textarea rows="10" cols="45" name="description"></textarea> <br>
	<p><input type="submit" value="Создать"></p>
</form>
