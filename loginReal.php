<?php
require_once('PhpConsole.phar');
require_once('connection.php');

/*	FACEBOOK LOGIN BASIC - PHP SDK V4.0
 *	file 			- index.php
 * 	Developer 		- AManuelBogale
 *	Website			- NONE
 *	Date 			- 29th Feb 2016
 *	license			- GNU General Public License version 2 or later
*/
/* INCLUSION OF LIBRARY FILEs*/
	require_once( 'lib/Facebook/FacebookSession.php');
	require_once( 'lib/Facebook/FacebookRequest.php' );
	require_once( 'lib/Facebook/FacebookResponse.php' );
	require_once( 'lib/Facebook/FacebookSDKException.php' );
	require_once( 'lib/Facebook/FacebookRequestException.php' );
	require_once( 'lib/Facebook/FacebookRedirectLoginHelper.php');
	require_once( 'lib/Facebook/FacebookAuthorizationException.php' );
	require_once( 'lib/Facebook/GraphObject.php' );
	require_once( 'lib/Facebook/GraphUser.php' );
	require_once( 'lib/Facebook/GraphSessionInfo.php' );
	require_once( 'lib/Facebook/Entities/AccessToken.php');
	require_once( 'lib/Facebook/HttpClients/FacebookCurl.php' );
	require_once( 'lib/Facebook/HttpClients/FacebookHttpable.php');
	require_once( 'lib/Facebook/HttpClients/FacebookCurlHttpClient.php');
/* USE NAMESPACES */

	use Facebook\FacebookSession;
	use Facebook\FacebookRedirectLoginHelper;
	use Facebook\FacebookRequest;
	use Facebook\FacebookResponse;
	use Facebook\FacebookSDKException;
	use Facebook\FacebookRequestException;
	use Facebook\FacebookAuthorizationException;
	use Facebook\GraphObject;
	use Facebook\GraphUser;
	use Facebook\GraphSessionInfo;
	use Facebook\FacebookHttpable;
	use Facebook\FacebookCurlHttpClient;
	use Facebook\FacebookCurl;
  ?>
<head>

    <link rel="stylesheet" href="styles.css"/>
    <script src="node_modules/alertifyjs/build/alertify.js"></script>
    <link rel="stylesheet" href="node_modules/alertifyjs/build/css/alertify.css" />
</head>
<md-whiteframe class="md-whiteframe-12dp" id="loginBackgrond"  layout layout-align="center center">
    <div id="login2">
    <div class="avatarContainer">
     <i class="fa fa-users" id="login"></i>
     <h1 id="loginHeader">Login</h1>
     <form method="POST">
     <div class="social-buttons">
        <a href="http://twitter.com" class="icon-button twitter"><i class="icon-twitter"></i><span></span></a>
        <a href="http://facebook.com" class="icon-button facebook"><i class="icon-facebook"></i><span></span></a>
        <a href="http://plus.google.com" class="icon-button google-plus"><i class="icon-google-plus"></i><span></span></a>
      </div>
    </form>
      <form name="loginForm" method="POST" action="<?php echo $_SERVER["PHP_SELF"];?>">
      <div class="form">
     <div class="form-search search-only has-success" id="emailForm">
                          <i class="glyphicon glyphicon-envelope"></i>
                          <input type="email" class="form-control search-query" name="loginEmail" placeholder="Email.." required>
                        </div>
     <div class="form-search search-only has-warning" id="passwordForm">
                          <i class="glyphicon glyphicon-lock"></i>
                          <input type="password" class="form-control search-query" name="loginPassword" placeholder="Password.." required>
                        </div>

                        <input type="submit" id="formSubmit" name="submitLogin" class="btn btn-normal" value="Login"/>
                        <div class="signup">
                        <input type="button" id="signUp" class="btn " value="SignUp" ng-click="toSignUp();"/>
                        </div>
                        <div class="forgotPass">
                        <input type="button" id="forgot" class="btn " value="Forgot your Password?"/>
                        </div>
    </div>
  </form>
    </div>
    </div>
  </md-whiteframe>

  <?php
    if(isset($_POST["submitLogin"])){
    $loginEmail = $_POST["loginEmail"];
    $loginPassword = $_POST["loginPassword"];
    if ($query = mysqli_query($connection, "SELECT * FROM `authe` WHERE Email = '".$loginEmail."' AND Password = '".$loginPassword."' ")) {

    $rows = mysqli_num_rows($query);

    if($rows>0){

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
                echo "<script> alertify.success('Sucessfully Authenticated'); </script>";
            }
          }
          /////////////////////////////////QUERY FOR STORING USERID IN SESSION////////////////////////////////


        }

      }
     else {
       echo "<script> alertify.error('Authetication Failed'); </script>";
     }
    }
   }
  ?>
