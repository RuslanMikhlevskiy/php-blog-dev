<?php session_start();?>
<?php 
if (isset($_SESSION['USER'])) {
	$user = $_SESSION['USER']['login'];
	echo "<h1>Привет $user</h1>";
}
?>
<?php require ('../connect_db.php');//Коннектимся к бд ?>
<?php
$userId = $_SESSION['USER']['id'];
$sql = "SELECT * from blogs WHERE owner_id = $userId";

$result = mysqli_query($connect, $sql);

while ($test = mysqli_fetch_assoc($result)) {
	echo $test['id'] . '|';
	echo $test['name'] . '|';
	echo $test['description'] . '|';
	echo $test['created_date'] . '|';
	echo $test['owner_id'] . '<br>';
}


echo '<div style="text-align: center; font-weight: bold; font-size: 50px; margin-top: 350px;"><a style="text-decoration: none; color: red" href="http://php-blog-dev.com/pages/create_blog.php">Создание блога</a></div>';
