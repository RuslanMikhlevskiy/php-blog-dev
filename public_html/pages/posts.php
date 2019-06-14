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
?>
<?php

$page = $_GET['blog_id'];

$sql = "SELECT * from posts WHERE blog_id = $page";

$result = mysqli_query($connect, $sql);


while ($test = mysqli_fetch_assoc($result)) {
	echo $test['id'] . '|';
	echo $test['blog_id'] . '|';
	echo $test['title'] . '|';
	echo $test['content'] . '|';
	echo $test['created'] . '<br>';
}

