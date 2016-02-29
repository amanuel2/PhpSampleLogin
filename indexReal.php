<?php
require_once('PhpConsole.phar');
require_once('connection.php');
  ?>
<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
<link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.css"/>
<script src="bower_components/jquery/dist/jquery.js"></script>
<script src="bower_components/angular/angular.js"></script>
<script src="bower_components/angular-ui-router/release/angular-ui-router.js"></script>
<link rel="stylesheet" href="bower_components/angular-material/angular-material.css"/>
<link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="bower_components/bootflat/css/bootflat.css">
<script src="bower_components/jquery/dist/jquery.js"></script>
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="bower_components/bootflat/js/jquery.icheck.js"></script>
<link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.css"/>
<script src="bower_components/angular-material/angular-material.js"></script>
<script src="bower_components/angular-animate/angular-animate.js"></script>
<script src="bower_components/angular-aria/angular-aria.js"></script>
<script src="bower_components/angular-messages/angular-messages.js"></script>
<script src="bower_components/angular-material-icons/angular-material-icons.js"></script>
<script src="bower_components/sweetalert/dist/sweetalert.min.js"></script>
<script src="bower_components/sweetalert/dist/sweetalert-dev.js"></script>
<link rel="stylesheet" href="bower_components/sweetalert/dist/sweetalert.css"/>
<script src="node_modules/alertifyjs/build/alertify.js"></script>
<link rel="stylesheet" href="node_modules/alertifyjs/build/css/alertify.css" />
<link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/3.1.1/css/font-awesome.css"/>
<style>
 #loginBackgrond{
  width:300px;
  height:500px;
  position:relative;
  left:500px;
  top:50px;
  background-image: linear-gradient(to bottom, #4a4969 0%, #7072ab 50%, #cd82a0 100%);


 }
 .avatarContainer{
  background:rgba(0, 0, 0, 0.2);
    width: 80px;
    height: 80px;
    position:relative;
    bottom:180px;
    border-radius: 50%;
    -moz-border-radius: 50%;
    -webkit-border-radius: 50%;
 }
  #login {
      color: white;
    margin-left: 13px;
    margin-top: 12px;
    font-size: 50px;
    height: 30px;
    vertical-align: middle;
  }
  #loginHeader{
   font-family: proxima_nova!important;
   color:#d3d3d3;
       font-size: 44px;
    font-weight: 100;
    margin-bottom: 10px;
    position: relative;
    left: -12px;
    top: 5px;
  }
</style>
<script src="script.js"></script>
</head>
<body ng-app= "SparkApp">
	<div id="page">
	 <div ui-view>
   </div>

	</div>
</body>
</html>
