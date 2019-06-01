<!doctype html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">   
    <title>PHP</title>
  </head>
  <body>

<?php 

$one = 1;
$two = 2;
$three = 3;
$four = 4;

$generator = rand(1,4);

switch ($generator) {
    case $one:
        echo "Оставайтесь дома парни!";
        break;
    case $two:
        echo "Похавайте шаву.";
        break;
    case $three:
        echo "Прибухните пивчаги с шавой";
        break;
    case $four:
        echo "Вискарь и шавуха уже ждет!";
        break;    
}
 
?>
  </body>
</html>
