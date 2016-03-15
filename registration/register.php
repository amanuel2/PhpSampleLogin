<?php
require_once('../connection/connection.php')
?>
<!DOCTYPE html>
<html>
<head>
    <script src="../node_modules/alertifyjs/build/alertify.js"></script>
    <link rel="stylesheet" href="../node_modules/alertifyjs/build/css/alertify.css" />
</head>
<body >
	<h1>Login</h1>
	<form action="" method="POST">
	    <input type="username" placeholder = "Username..." name="registerUsername"/>
	    <input type="email" placeholder="Email..." name="registerEmail"/>
	    <input type="password" placeholder="Password..." name="registerPassword"/>
	    <input type="submit" name="submit"/>
	    <a href="">Or Login</a>
	</form>

  <?php
 $submit           = $_POST["submit"];
 $registerUsername = $_POST["registerUsername"];
 $registerEmail    = $_POST["registerEmail"];
 $registerPassword = $_POST["registerPassword"];


 if (isset($_POST["submit"])) {
     if ($duplicateCheckQuery = mysqli_query($connection, "SELECT * FROM `authe` WHERE Email = '" . $registerEmail . "' OR  Username = '" . $registerUsername . "'")) {
         $duplicateCheckRows = mysqli_num_rows($duplicateCheckQuery);

         /**
          *Check If Username or Email is
          *Registered.
          */
         if ($duplicateCheckRows > 0) {
             echo "<script> alertify.error('Username Or/And Email already registered...'); </script>";
         }
         /**
          *Check If Password is min length
          */
         else if (strlen($registerPassword) <= 6) {
             echo "<script> alertify.warning('Password must at least be 7 characters..'); </script>";
         }

         else {

             $query = "INSERT INTO authe (authe.Email , authe.Password, authe.Username) VALUES ('" . $registerEmail . "', '" . $registerPassword . "' , '" . $registerUsername . "')";
             if ($result = $connection->query($query)) {
                 echo "<script>alertify.success('SucessFully Registered! Login Now!');</script>";
             } else {
                 echo "<script> alertify.error('Registration Failed..'); </script>";
             }

         }

     }

     else {
         echo "<script> alertify.error('Something Went Wrong...'); </script>";
     }


 }
 ?>

</body>
</html>
