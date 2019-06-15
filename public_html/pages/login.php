
<!-- Страница логина -->
<form action="" method="POST" accept-charset="utf-8">
	Логин: <br> <input name="login" type="text"> <br>
	Пароль: <br> <input name="password" type="text"> <br>
	<p><input type="submit" value="Войти"></p>
</form>


<?php 
require_once("../inc/db/dao.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	$login = $_POST['login'];
	$password = $_POST['password'];

    $userInfo = findUserByLoginAndPassword($login, $password);

	if ($userInfo == NULL) {
        echo "Ничего не нашлось!";
    } else {
		session_start();
        $_SESSION['USER'] = $userInfo;
		header('Location: dashboard.php');
    }
}
?>
