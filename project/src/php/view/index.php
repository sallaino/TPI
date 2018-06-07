<?php
/**
* Etml
* Author: sallaino
* Date: 03.05.2018
* Description: Home page where the list of animal is showed
*/

$title = 'Pet La Forme - Accueil';

ob_start();

?>
<body>
  <main role="main" class="container">
    <div class="table-responsive-sm">
      <table class="table">
        <thead>
          <tr style="background-color: #4e656b; color: #fff;">
            <th>Type - Race</th>
            <th>Nom</th>
            <th>Date de naissance</th>
            <th>Numéro de puce</th>
            <th>

              <a  class="btn btn-success btn" style="display: inline-block;float: right"
              href="../php/router.php?action=addAnimal"
              role="button">Ajouter un animal</span></a>
            </th>
          </tr>
        </thead>
        <tbody>
          <?php while ($data = $req->fetch(PDO::FETCH_ASSOC)) {

            // if the animal is not delete, show the animal's data
            if ($data['aniDeleted'] == false){

              $birthDate = new DateTime($data['aniBirthDate']);
              ?>

              <tr>
                <td>
                  <?= $data['typType'] . ' - ' . $data['racRace'] ?>
                </td>
                <td>
                  <?= $data['aniName'] ?>
                </td>
                <td>
                  <?= $birthDate->format('d.m.Y') ?>
                </td>
                <td>
                  <?= $data['aniChipNumber'] ?>
                </td>

                <td  style="text-align: right">

                  <a  class="btn btn-primary btn" style="display: inline-block"
                  href="../php/router.php?action=detailsAction&idAnimal=<?= $data['idAnimal'] ?>"
                  role="button">Détails</span></a>
                  <a class="btn btn-edit btn" style="display: inline-block"
                  href="../php/router.php?action=editAction&idAnimal=<?= $data['idAnimal'] ?>"
                  role="button">Modifier</span></a>
                  <a class="btn btn-danger btn" style="display: inline-block"
                  href="../php/router.php?action=deleteAction&idAnimal=<?= $data['idAnimal'] ?>"
                  role="button">Supprimer</span></a>

                </td>
              </tr>
            <?php } } ?>
          </tbody>
        </table>
      </div>


      <div class="row">
        <div class="col-lg-6">
          <div class="jumbotron">
            <h1 class="display-6">Derniers vaccins</h1>
            <table class="table">
              <thead>
                <tr>
                  <th>
                    Date
                  </th>
                  <th>
                    Nom
                  </th>
                  <th>
                    Raison
                  </th>
                </tr>
              </thead>
              <tbody>
          
              </tbody>
            </table>
            <p class="lead">
              <a class="btn btn-primary btn-lg" href="#" role="button">Afficher tous les vaccins</a>
            </p>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="jumbotron">
            <h1 class="display-6">Derniers rappels</h1>
            <table class="table">
              <thead>
                <tr>
                  <th>
                    Date
                  </th>
                  <th>
                    Nom
                  </th>
                  <th>
                    Vaccin
                  </th>
                </tr>
              </thead>
              <tbody>

              </tbody>
            </table>

            <p class="lead">
              <a class="btn btn-primary btn-lg" href="#" role="button">Afficher tous les rappels</a>
            </p>
          </div>
        </div>
      </div>

    </main><!-- /.container -->

    <?php

    $req->closeCursor();

    $content = ob_get_clean();


    require('template.php');
