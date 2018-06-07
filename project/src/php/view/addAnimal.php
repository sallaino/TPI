<?php
/**
* Etml
* Author: sallaino
* Date: 31.05.2018
* Description: Forular to add an animal
*/


$title = 'Pet La Forme - Ajouter un animal';

ob_start();


$nav = '';

$typeAndRaceData = array();
while ($data = $typeandrace->fetch(PDO::FETCH_ASSOC)) {


  if (!isset($test[$data['racRace']])) {


    $typeAndRaceData[$data['idType']][$data['typType']][$data['idRace']] = $data['racRace'];

  }

}


?>
<body>
  <main role="main" class="container-addAnimal">
    <div class="col-lg-8">
      <form method="post" action="../php/router.php?action=addAnimal">
        <div class=" row">
          <div class="form-group col-lg-6">
            <label for="aniType">Type d'animal</label>
            <select class="form-control" name="aniType" id="aniType">
              <?php

              foreach ($typeAndRaceData as $keytad => $typeAndRaceDatum) {

                foreach ($typeAndRaceDatum as $keyType => $races) {


                  ?>

                  <option value="<?= $keytad ?>"><?= $keyType ?></option>

                  <?php

                }

              }

              ?>
            </select>
          </div>
          <div class="form-group  col-lg-6">
            <label for="aniRace">Race de l'animal</label>
            <select class="form-control" name="aniRace" id="aniRace" >
              <?php

              foreach ($typeAndRaceData as $kTARDA => $typeAndRaceDatum) {

                foreach ($typeAndRaceDatum as $kTARDM => $races) {

                  foreach ($races as $keyRace => $race) {

                    ?>

                    <option value="<?= $keyRace ?>"><?= $race ?></option>

                    <?php
                  }

                }

              }

              ?>
            </select>
          </div>
        </div>
        <div class="row">
          <div class="form-group col-lg-6">
            <label for="aniName">Nom de l'animal</label>
            <input type="text" class="form-control" id="aniName" name="aniName" aria-describedby="animal name"
            placeholder="Entrez le nom" required="required">
            <!--          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>-->
          </div>
          <div class="form-group col-lg-6">
            <label for="aniBirthDate">Date de naissance</label>
            <input type="date" class="form-control" name="aniBirthDate" id="aniBirthDate" aria-describedby="BirthDate">
            <!--          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>-->
          </div>
        </div>

        <div class="row">
          <div class="form-group col-lg-6">
            <label for="aniChipNumber">Numéro de puce électronmique</label>
            <input type="text" class="form-control" id="aniChipNumber" name="aniChipNumber" aria-describedby="Chip number"
            placeholder="Entrez numéro de la puce">
            <!--          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>-->
          </div>


          <div class="form-group col-lg-6">
            <label for="aniWeight">Poids de l'animal</label>
            <input type="text" class="form-control" id="aniWeight" name="aniWeight" aria-describedby="animal weight"
            placeholder="Entrez le poids" required="required">
            <!--          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>-->
          </div>
        </div>

        <div class="row">
          <div class="form-group col-lg-6">
            <label for="aniLinkPhoto">Choisissez une photo pour votre animal !</label>
            <input name="aniLinkPhoto"type="file" class="form-control-file" id="aniLinkPhoto" aria-describedby="fileHelp">
            <small id="fileHelp" class="form-text text-muted">La photo n'est pas obligatoire !</small>
          </div>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>

  </main><!-- /.container -->
  <?php


  //$req->closeCursor();

  $content = ob_get_clean();

  require('template.php');

  ?>
