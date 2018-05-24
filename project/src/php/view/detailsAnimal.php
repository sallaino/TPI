<?php
/**
 * Created by PhpStorm.
 * User: sallaino
 * Date: 23.05.2018
 * Time: 15:23
 */

$title = 'Pet La Forme - Détails';

ob_start();

$nav = ' <li class="nav-item">
            <a class="btn btn-link color-link-login" style="display: inline-block;text-decoration: none;" href="" ><b>Détails</b></span></a>
          </li>
          <li class="nav-item">
           <a class="btn btn-link color-link-login" style="display: inline-block;text-decoration: none;" href="" >Carnet de vaccinations</span></a>
          </li>
          <li class="nav-item">
           <a class="btn btn-link color-link-login" style="display: inline-block;text-decoration: none;" href="" >Rappels</span></a>
          </li>\';';

$data = $req->fetch(PDO::FETCH_ASSOC);

$birthDate = new DateTime($data['aniBirthDate'])
?>

    <main role="main" class="container">

    <div>
        <img src="<?= $data['aniLinkPhoto'] ?>" class="img-fluid" style="width: 200px;height: 200px" alt="test">

    </div>
    <br>
    <div>
        <p><?= $data['typType'] . ' - ' . $data['racRace'] ?></p>
        <p><?= $data['aniName'] ?></p>
        <p><?= $birthDate->format('d.m.Y') ?></p>
        <p><?= $data['aniChipNumber'] ?></p>
    </div>
    </main><!-- /.container -->
<?php

//$req->closeCursor();

$content = ob_get_clean();

require('template.php');