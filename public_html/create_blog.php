<?php session_start();?>










<form action="" method="POST" accept-charset="utf-8">
	Название: <br> <input name="login" type="text"> <br>
	Описание: <textarea cols="50" rows="50" name="text"></textarea> <br>
	<p><input type="submit" value="Создать"></p>
</form>

<form action="textarea1.php" method="post">
    <p><b>Введите ваш отзыв:</b></p>
    <p><textarea rows="10" cols="45" name="text"></textarea></p>
    <p><input type="submit" value="Отправить"></p>
  </form>