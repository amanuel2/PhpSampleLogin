<?php
session_start();
require_once('PhpConsole.phar');
require_once('connection.php');
ob_start();
require('index.php');
$data = ob_get_clean();
ob_end_clean();
?>
<!DOCTYPE html>
<html lang="en-US">
<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://rawgit.com/marcoceppi/bootstrap-glyphicons/master/css/bootstrap.icon-large.css">
  <link rel="stylesheet" href="main.css">
  <link rel="stylesheet" href="lib/sweetalert.css">
  <script src="lib/sweetalert-dev.js"></script>
</head>
<?php flush(); ?>
<body>

	<div id="page">

    <form method = "post" role = "form" id = "form">
      <h1 style = "position:relative; left:60px; font-family: Impact;">Login </h1>
      <div class="col-xs-2">
          <div class="inner-addon left-addon">
            <i class="glyphicon glyphicon-envelope"></i>
            <input type="text" class="form-control" id = "email" name = "loginemail" placeholder="Email"  />
          </div>
        </div>
        <br>
          <div class="col-xs-2">
          <div class="inner-addon left-addon">
            <img src = "http://i.imgur.com/GqkLI3z.png" id = "imgLock"/>
            <input type="text" class="form-control" name = "loginpassword" placeholder="Password" id = "password" />

          </div>
        </div>

        <br>
        <br>
        <div id = "buttons">
        <div class="col-xs-2">
        <div class="inner-addon left-addon">
          <i class="glyphicon glyphicon-ok-sign" ></i>
          <input type = "submit" class="btn btn-info" name = "loginsubmit" id = "submit"/>
        </div>
        <div>
        </div>

    </form>
	</div>
<?php
  if(isset($_POST["loginsubmit"])){

  $loginEmail = $_POST["loginemail"];
  $loginPassword = $_POST["loginpassword"];
  if ($query = mysqli_query($connection, "SELECT * FROM `authe` WHERE Email = '".$loginEmail."' AND Password = '".$loginPassword."' ")) {

  $rows = mysqli_num_rows($query);

  if($rows>0){
      echo "<script> swal('Good job!', 'Sucessfully Authenticated', 'success')</script>";
      $_SESSION['email'] = $loginEmail;
      $_SESSION['password'] = $loginPassword;
      if(true){

        //////////////////////////////////QUERY FOR STORING USERNAME IN SESSION///////////////////////////
        if ($queryTwo = mysqli_query($connection, "SELECT Username FROM `authe` WHERE Email = '".$loginEmail."'")) {
          $rowsTwo = mysqli_num_rows($queryTwo);
          if($rowsTwo>0){
            printf($rowsTwo);
            while($roww = mysqli_fetch_array($queryTwo))
              {
                $_SESSION["username"] =  $roww['Username'];
              }
              echo "<script> window.location.href = 'http://localhost:8012/phpForm/Profile.php' </script>";
          }
        }
        /////////////////////////////////QUERY FOR STORING USERID IN SESSION////////////////////////////////


      }

    }
   else {
     echo "<script>sweetAlert('Oops...', 'Authentication Failed', 'error');</script>";
   }
  }
 }
?>


</body>
  </html>

  <!-- <br>

<input  type = "text" class="form-control" name = "loginemail" style = "width = 20px;" id = "input" placeholder = "Enter Email" required/>
<i class="glyphicon glyphicon-user form-control-feedback"></i>
  <br> -->
