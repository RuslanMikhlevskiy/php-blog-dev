<?php session_start();//Запускаем сессию с UserId?>
<?php require ('../connect_db.php');//Коннектимся к бд ?>
<?php
//Проверяем включена ли сессия
if (isset($_SESSION['USER'])) {
	$user = $_SESSION['USER'][0]['login'];
	echo "<h1>Привет $user</h1>";
} else {
	echo "Сессия не активна";
}

$page = $_GET['blog_id'];

//Проверяем запрос
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	//Проверяем заполнение формы
	if (isset($_POST['title']) && isset($_POST['content'])) {
		//Название блога
		$title = $_POST['title'];
		//Описание блога
		$content = $_POST['content'];
		//Запрос на добавление поста
		$insert = "INSERT INTO posts(blog_id,title,content,created) values($page,'$title','$content',now())";
		//Запрос на выборку из таблицы
		$select = "SELECT count(*) as test FROM posts WHERE title = '$title'";
		//Отправляем SELECT запрос в бд
		$result = mysqli_query($connect, $select);
		//Получаем массив
		$data = mysqli_fetch_assoc($result);
		//Проходимся по массиву из таблицы
		if ($test = $data['test'] > 0) {
			echo 'Пост с таким названием уже есть' . '<hr>';
		//Если все ок, то добавляем запись	
		} else {
			mysqli_query($connect, $insert);
			header('Location: posts.php?blog_id='.$page.'');
		}

	}
}

?>
<form action="create_post.php?blog_id=<?php echo $page;?>" method="POST" accept-charset="utf-8">
	<input type="hidden" name="blog_id" value="<?php echo $page;?>">
	Название поста: <br> <input name="title" type="text"> <br>
	Контент: <br> <textarea rows="10" cols="45" name="content"></textarea> <br>
	<p><input type="submit" value="Создать"></p>
</form>


