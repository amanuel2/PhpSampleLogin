<?php
//Start session...
session_start();
require_once('../connection/connection.php')
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
   <h1>Welcome <?php  echo $_SESSION['username']; ?></h1>
   Email: <?php  echo $_SESSION['email']; ?>
   UserID : <?php  echo $_SESSION['id']; ?>
  </body>
</html>
