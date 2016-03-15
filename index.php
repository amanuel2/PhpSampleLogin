<?php
// Start the session
session_start();
require_once('connection/connection.php')

?>
<!DOCTYPE html>
<html>
<head>
    <script src="node_modules/alertifyjs/build/alertify.js"></script>
    <link rel="stylesheet" href="node_modules/alertifyjs/build/css/alertify.css" />
</head>
<body >
	<h1>Login</h1>
	<form action="" method="POST">
	    <input type="text" placeholder="Username/Email..." name="loginEmail"/><br>
	    <input type="password" placeholder="Password..." name="loginPassword"/><br>
	    <input type="submit" name="submit"/><br>
	    <a href="http://localhost:8012/phpFormTodo/registration/register.php">Or Register</a>
	</form>

	<?php
	    if (isset($_POST['submit'])) {
        $loginEmail = $_POST["loginEmail"];
        $loginPassword = $_POST["loginPassword"];

	         if ($query = mysqli_query($connection, "SELECT * FROM `authe` WHERE Email = '".$loginEmail."' AND Password = '".$loginPassword."' ")) {

	    			$rows = mysqli_num_rows($query);
	    				 	/**
      						 * Successfull Authentication
      						 * User exists because there is a cell
      						 */
		    			 if($rows>0){
						        $_SESSION['email'] = $loginEmail;
						        $_SESSION['password'] = $loginPassword;
						        if(true){
						        	/**
		      						 * QUERY FOR STORING USERNAME IN SESSION
		      						 */
						          if ($queryTwo = mysqli_query($connection, "SELECT Username FROM `authe` WHERE Email = '".$loginEmail."' AND Password = '".$loginPassword."'")) {
						            $rowsTwo = mysqli_num_rows($queryTwo);
						            if($rowsTwo>0){
						              printf($rowsTwo);
						              while($roww = mysqli_fetch_array($queryTwo)){
						                  $_SESSION["username"] =  $roww['Username'];
						                }
						                echo "<script> alertify.success('Sucessfully Authenticated'); </script>";
                            echo "<script> window.location.href = 'http://localhost:8012/phpFormTodo/page/todo.php' </script>";
						            }
						          }
						          else {
						          	echo "<script> alertify.error('Something Went Wrong...'); </script>";
						          }
						        }
      						}

                  /**
                    *Checking if user
                    *put username..
                    */
              else if($query = mysqli_query($connection, "SELECT * FROM `authe` WHERE Username = '".$loginEmail."' AND Password = '".$loginPassword."' ")){

                $rows = mysqli_num_rows($query);
                    /**
                       * Successfull Authentication
                       * User exists because there is a cell
                       *Getting Email..
                       */
                   if($rows>0){
                        $_SESSION['username'] = $loginEmail;
                        $_SESSION['password'] = $loginPassword;
                        if(true){
                          if ($queryTwo = mysqli_query($connection, "SELECT Email FROM `authe` WHERE Username = '".$loginEmail."' AND Password = '".$loginPassword."'")) {
                            $rowsTwo = mysqli_num_rows($queryTwo);
                            if($rowsTwo>0){
                              while($roww = mysqli_fetch_array($queryTwo)){
                                  $_SESSION["email"] =  $roww['Email'];
                                }
                             }
                          }
                          else {
                            echo "<script> alertify.error('Something Went Wrong...'); </script>";
                          }

                        }
                        /**
                          *Getting ID Of User...
                          */
                        if(true){

                          if ($queryID = mysqli_query($connection, "SELECT ID FROM `authe` WHERE Email = '".$loginEmail."' AND Password = '".$loginPassword."'")) {
                            $rowsThree = mysqli_num_rows($queryID);
                            if($rowsThree>0){
                              while($rowww = mysqli_fetch_array($queryID)){
                                  $_SESSION["id"] =  $rowww['ID'];
                                  var_dump($rowww);
                                }
                                echo "<script> alertify.success('Sucessfully Authenticated'); </script>";
                                // echo "<script> window.location.href = 'http://localhost:8012/phpFormTodo/page/todo.php' </script>";
                            }
                            else{
                              echo "<script> alertify.error('Something Went Wrong...'); </script>";
                            }
                          }
                          else {
                            echo "<script> alertify.error('Something Went Wrong...'); </script>";
                          }

                        }
                     }
              }
      						/**
      						 *Not Successfull Authentication
      						 */
					     else {
					       echo "<script> alertify.error('Authetication Failed'); </script>";
					     }


	          }

	    }
	?>

</body>
</html>
