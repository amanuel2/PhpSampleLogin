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
  <script src="https://code.angularjs.org/1.4.9/angular.js"></script>
  <link href='https://fonts.googleapis.com/css?family=Yanone+Kaffeesatz:700' rel='stylesheet' type='text/css'>
  <script src = "page.js"></script>
  <link rel="stylesheet" href="lib/sweetalert.css">
  <script src="lib/sweetalert-dev.js"></script>
  <style>
  #toDoButton {
  	position: relative;
      color: rgba(255,255,255,1);
      text-decoration: none;
      background-color: rgba(219,87,5,1);
      font-family: 'Yanone Kaffeesatz';
      font-weight: 700;
      right:550px;
      bottom:70px;
      font-size: 3em;
      display: block;
      padding: 4px;
      -webkit-border-radius: 8px;
      -moz-border-radius: 8px;
      border-radius: 8px;
      -webkit-box-shadow: 0px 9px 0px rgba(219,31,5,1), 0px 9px 25px rgba(0,0,0,.7);
      -moz-box-shadow: 0px 9px 0px rgba(219,31,5,1), 0px 9px 25px rgba(0,0,0,.7);
      box-shadow: 0px 9px 0px rgba(219,31,5,1), 0px 9px 25px rgba(0,0,0,.7);
      margin: 100px auto;
  	width: 160px;
  	text-align: center;

  	-webkit-transition: all .1s ease;
  	-moz-transition: all .1s ease;
  	-ms-transition: all .1s ease;
  	-o-transition: all .1s ease;
  	transition: all .1s ease;
  }

  #toDoButton:active {
      -webkit-box-shadow: 0px 3px 0px rgba(219,31,5,1), 0px 3px 6px rgba(0,0,0,.9);
      -moz-box-shadow: 0px 3px 0px rgba(219,31,5,1), 0px 3px 6px rgba(0,0,0,.9);
      box-shadow: 0px 3px 0px rgba(219,31,5,1), 0px 3px 6px rgba(0,0,0,.9);
  }

  </style>
</head>

<body>

	<div id="page" ng-app = "pageApp" ng-controller="pageController">
      <h1>Welcome <?php  echo $_SESSION['username']; ?></h1>
      <h5>Here is one cool feauture. Type in the box :)</h5>
      <div class = "coolFeauture" id = "CoolFeauture1">
      <input type = "text" ng-model = "CoolFeauture"/>
      <div ng-bind = "CoolFeauture"></div>
    </div>
<div class = "todoMain">

    <form method = "post" role = "form" id = "form" >
          <h4>Click on the button for a TODO App! Check it out!</h4>
      <input type = "submit"  name = "todoSubmit" id = "toDoButton" value = "Todo"/>
    </form>
    </div>
	</div>
</body>
  </html>

  <!-- <br>

<input  type = "text" class="form-control" name = "loginemail" style = "width = 20px;" id = "input" placeholder = "Enter Email" required/>
<i class="glyphicon glyphicon-user form-control-feedback"></i>
  <br> -->
