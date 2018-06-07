<?php
/**
* Etml
* Author: sallaino
* Date: 24.05.2018
* Description: Error page, allow to show the error 
*/


$title = 'Pet La Forme - Erreurs';

ob_start();

$nav = '';


//$req->closeCursor();

?>
<main role="main" class="container-addAnimal">
  <div class="alert alert-info" role="alert">
    <h4 class="alert-heading">Oups !</h4>
    <p><?= $error ?></p>
  </div>
</main>
<?php



$content = ob_get_clean();

require('template.php');
