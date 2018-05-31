<?php
/**
 * Created by PhpStorm.
 * User: sallaino
 * Date: 23.05.2018
 * Time: 13:46
 */
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title><?= $title ?></title>

    <!-- Bootstrap core CSS -->
    <link href="../../resources/css/bootstrap.css" rel="stylesheet">
    <link href="../../resources/css/starter-template.css" rel="stylesheet">
    <link href="../../resources/css/PetLaForme.css" rel="stylesheet">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">

    <!-- Custom styles for this template -->
    <link href="./../../resources/css/starter-template.css" rel="stylesheet">
</head>

<body>

<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="./router.php?action=indexAction">Pet La Forme</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navBar"
            aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navBar">
        <ul class="navbar-nav mr-auto">
            <?php

            if (!empty($nav)) {
                echo $nav;
            }

            ?>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="btn btn-link color-link-login" style="display: inline-block;text-decoration: none;"
                       href="">Se
                        connecter</span></a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-link color-link-login" style="display: inline-block;text-decoration: none;"
                       href="">Créer
                        un compte</span></a>
                </li>
            </ul>


        </form>
    </div>


</nav>

<?= $content ?>


<footer>

</footer>
<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
<script src="./../../resources/bootstrap-4.1.0/assets/js/vendor/popper.min.js"></script>
<script src="./../js/bootstrap.min.js"></script>

<!-- Morris.js -->
<script src=./../js/morris.js-0.5.1/morris.js></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>


</body>
</html>
