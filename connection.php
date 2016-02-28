<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'authentication1';
$port = 3306;

 $connection = new mysqli($host, $user, $pass, $db, $port);

 if($connection->connect_errno)
   {
       printf("Connect failed: %s\n", $mysqli->connect_error);
       exit();
   }

 ?>
