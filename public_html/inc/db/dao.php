<?php
/*
 * This file contains data access layer functions.
*/

require_once ('mysql_utils.php');

function findUserByLoginAndPassword(string $login, string $password) {
  // Opening connection
  $connection = createDbConnection();

  // Searching for user by login and password
  $sql = "SELECT * from users where login = '$login' and password = '$password'";
  $result = mysqli_query($connection, $sql);
  // mysqli_fetch_assoc returns NULL in case if there's no result
  $userInfo = mysqli_fetch_assoc($result);

  // Closing connection
  $result->free();
  $connection->close();

  return $userInfo;
}

?>
