<?php 
# Страница логина
require ('../connect_db.php');//Коннектимся к бд ?>
<form action="" method="POST" accept-charset="utf-8">
	Логин: <br> <input name="login" type="text"> <br>
	Пароль: <br> <input name="password" type="text"> <br>
	<p><input type="submit" value="Войти"></p>
</form>



<?php 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	$login = $_POST['login'];
	$password = $_POST['password'];

	$sql = "SELECT * from users where login = '$login' and password = '$password'";
	$result = mysqli_query($connect, $sql);
	
	if(mysqli_num_rows($result) < 1) {
		echo "Ничего не нашлось!";
		header('Location: signup.php');
	}
	else {
		$userInfo[] = mysqli_fetch_assoc($result);
		session_start();
        $_SESSION['USER'] = $userInfo;
		header('Location: dashboard.php');
	}

}
?>
