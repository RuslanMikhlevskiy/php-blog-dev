<?php require ('..\connect_db.php'); ?>


<form action="" method="POST" accept-charset="utf-8">
Логин: <input name="login" type="text"> <br>
Пароль: <input name="password" type="text"> <br>
Имя: <input name="first_name" type="text"> <br>
Фамилия: <input name="last_name" type="text">
<p><input type="submit" value="Отправить"></p>
</form>

<?php 

if (isset($_POST['login'])) {

$login = $_POST['login'];
$password = $_POST['password'];
$firstName = $_POST['first_name'];
$lastName = $_POST['last_name'];

$sql = "INSERT INTO `users` (
`login`, 
`password`, 
`first_name`, 
`last_name`)
VALUES ('$login', '$password', '$firstName', '$lastName')";



if (mysqli_query($connect, $sql) == TRUE) {
	echo 'Запись добавлена в таблицу';
}
else {
	echo 'Ошибка данных: '. mysqli_error($connect);
}
}
mysqli_close($connect);
