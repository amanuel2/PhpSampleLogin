<?php
session_start();
require_once('PhpConsole.phar');
require_once('connection.php');
ob_start();
require('index.php');
require('Profile.php')
$data = ob_get_clean();
ob_end_clean();

  ?>
<!DOCTYPE html>
<html lang="en-US">
<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://rawgit.com/marcoceppi/bootstrap-glyphicons/master/css/bootstrap.icon-large.css">
  <script src="https://code.angularjs.org/1.4.9/angular.js"></script>
  <link href='https://fonts.googleapis.com/css?family=Yanone+Kaffeesatz:700' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="lib/sweetalert.css">
  <script src="lib/sweetalert-dev.js"></script>
</head>

<body>
<?php
$userID = $_SESSION["ID"];
$result = mysqli_query("SHOW COLUMNS FROM `todotable` LIKE '".$userID."' ");
$exists = (mysqli_num_rows($result))?TRUE:FALSE;
if($exists) {
   echo "Incorrect"
}
else{
  echo "Correct.."
}

 ?>


</body>
  </html>

  <!-- <br>

<input  type = "text" class="form-control" name = "loginemail" style = "width = 20px;" id = "input" placeholder = "Enter Email" required/>
<i class="glyphicon glyphicon-user form-control-feedback"></i>
  <br> -->
