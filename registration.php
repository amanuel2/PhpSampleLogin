<?php
require_once('PhpConsole.phar');
require_once('connection.php');

$query = "INSERT INTO `authe` (`Email`, `Password`, 'Username', 'UserID') VALUES ('.$email.', '.$password.', '.$username.', '.$userID.');";

   if($result = $connection->mysql_query($query))
   {
       printf("Error: %s\n", $result->error);
       $result->close();
   }
   header('http://localhost:8012/phpForm/login.php')
    mysql_close($connection);

 ?>
