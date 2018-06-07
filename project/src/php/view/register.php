<?php
/**
* Etml
* Author: sallaino
* Date: 24.05.2018
* Description: register's formular og the application 
*/
$title = 'Pet La Forme - login';

?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="../../favicon.ico">

  <title>Signin Template for Bootstrap</title>

  <!-- Bootstrap core CSS -->
  <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
  <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="signin.css" rel="stylesheet">

  <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
  <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
  <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>

<body>

  <main role="main" class="container-addAnimal">

    <form class="form-signin" action="../php/router.php?action=registerAction" method="post">
      <h2 class="form-signin-heading">Enregistrement</h2>
      <label for="useIdentifier" class="sr-only">Adresse email</label>
      <input type="email" id="useIdentifier" name="regEmail" class="form-control" placeholder="Adresse email" required autofocus>
      <br>
      <label for="useIdentifier" class="sr-only">Nom d'utilisateur</label>
      <input type="text" id="useIdentifier" name="regUser" class="form-control" placeholder="Nom d'utilisateur" required autofocus>
      <br>
      <label for="usePassword" class="sr-only">Password</label>
      <input type="password" id="usePassword" name="regPassword" class="form-control" placeholder="Mot de passe" required>
      <br>
      <label for="usePassword" class="sr-only">Password</label>
      <input type="password" id="usePassword" name="regConfirmePassword" class="form-control" placeholder="Confirmation" required>

      <br>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Se connecter</button>
    </form>

  </div> <!-- /container -->

  <main >


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
  </html>


  <?php
  require('template.php');
