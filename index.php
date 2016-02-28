<?php
var_dump($_GET);
require_once('PhpConsole.phar');
require_once('connection.php');
  ?>
<!DOCTYPE html>
<html lang="en-US">
<head>
</head>

<body>

	<div id="page">

    <h1>Registration </h1>
    <form action = "login.php" method = "post">
          <input  type = "text" name = "username" placeholder = "Username"required/>
          <br>
          <input  type = "text"name = "email" placeholder = "Email"required/>
          <br>
          <input type = "text" placeholder = "password" name = "password" required/>
          <br>
          <input type = "submit" name = "submit"/>
    </form>
	</div>
<?php
$username = $_POST["username"];
$email = $_POST["email"];
$password = $_POST["password"];
function generateRandomString($length = 99999999999995) {
   $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
   $charactersLength = strlen($characters);
   $randomString = '';
   for ($i = 0; $i < $length; $i++) {
       $randomString .= $characters[rand(0, $charactersLength - 1)];
   }
   return $randomString;
}
$userID = generateRandomString();
echo $userID;
if(isset($_POST["submit"])){

  $query = "INSERT INTO authe (authe.Email , authe.Password, authe.UserID, authe.Username) VALUES ('".$email."', '".$password."' , '".$userID."', '".$username."')";
  if($result = $connection->query($query))
  {
  header("Location: http://localhost:8012/phpForm/login.php");
  }
  else{
    echo "Something Went wrong...";
  }
}
 ?>

</body>
  </html>
