<?php
/**
 * Created by PhpStorm.
 * User: sallaino
 * Date: 24.05.2018
 * Time: 11:01
 */

$title = 'Pet La Forme - Erreurs';

ob_start();

$nav = '';


//$req->closeCursor();


$content = ob_get_clean();

require('template.php');