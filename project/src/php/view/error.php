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

?>

    <div class="alert alert-info" role="alert">
        <h4 class="alert-heading">Oups !</h4>
        <p><?= $error ?></p>
        <hr>
        <p class="mb-0">Vous serrez redirigé automatiquement dans 5 seconds !</p>
    </div>

<?php



$content = ob_get_clean();

require('template.php');