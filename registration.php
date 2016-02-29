<?php
require_once('PhpConsole.phar');
require_once('connection.php');
  ?>
<head>

    <link rel="stylesheet" href="registrationstyle.css"/>
    <script src="node_modules/alertifyjs/build/alertify.js"></script>
    <link rel="stylesheet" href="node_modules/alertifyjs/build/css/alertify.css" />
    <style>
    div#usernameForm{
      width: 300px;
      position: relative;
      right: 110px;
      /* height: 2930210px; */
    }
    </style>
</head>
<md-whiteframe class="md-whiteframe-12dp" id="loginBackgrond"  layout layout-align="center center">
 <form method="POST" name="regForm" action="<?php echo $_SERVER["PHP_SELF"];?>">
   <!--  -->
    <div id="login2">
    <div class="avatarContainer">
     <i class="fa fa-users" id="login"></i>
     <h1 id="regHead">Register</h1>
      <div class="form">
        <div class="form-search search-only has-error" id="usernameForm">
                             <i class="glyphicon glyphicon-user"></i>
                             <input type="text" name="username" class="form-control search-query" placeholder="Username.." required>
                           </div>
     <div class="form-search search-only has-success" id="emailForm">
                          <i class="glyphicon glyphicon-envelope"></i>
                          <input type="email" name="email" class="form-control search-query" placeholder="Email.." required>
                        </div>
     <div class="form-search search-only has-warning" id="passwordForm">
                          <i class="glyphicon glyphicon-lock"></i>
                          <input type="password" name="password" class="form-control search-query" placeholder="Password.." required>
                        </div>
                        <input type="submit" name="submit" id="formSubmit" class="btn btn-normal"  value="SignUp" ng-disabled="regForm.$invalid"/>
                        <div class="signup">
                        <input type="button" id="signUp" class="btn " value="Login" ng-click="loginPage()"/>
                        </div>
    </div>
    </div>
  </div>
  </form>

  </md-whiteframe>

  <?php
  $username = $_POST["username"];
  $email = $_POST["email"];
  $password = $_POST["password"];
  if(isset($_POST["submit"])){

    $query = "INSERT INTO authe (authe.Email , authe.Password, authe.Username) VALUES ('".$email."', '".$password."' , '".$username."')";
    if($result = $connection->query($query))
    {
    echo "<script>alertify.success('Sucessfully Authenticated');</script>";
    }
    else{
     echo "<script> alertify.error('Authetication Failed'); </script>";
    }
  }
   ?>
