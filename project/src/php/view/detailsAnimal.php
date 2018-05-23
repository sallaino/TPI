<?php
/**
 * Created by PhpStorm.
 * User: sallaino
 * Date: 23.05.2018
 * Time: 15:23
 */

$title = 'Pet La Forme - Accueil';

ob_start();

$nav = '';

//$req->closeCursor();

$content = ob_get_clean();

require('template.php');