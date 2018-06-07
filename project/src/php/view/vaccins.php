<?php
/**
* Etml
* Author: sallaino
* Date: 05.06.2018
* Description: Page where the list of vaccines is showed
*/

$title = 'Pet La Forme - Vaccins';

// Test if the animal'id is set in the session, if not, set the session
if (!isset($_SESSION['idAnimal'])) {
  $_SESSION['idAnimal'] = $_GET['idAnimal'];
}

ob_start();


$nav = ' <li class="nav-item">
<a class="btn btn-link color-link-login" style="display: inline-block;text-decoration: none;" href="../php/router.php?action=detailsAction&idAnimal='. $_SESSION['idAnimal']. '" >Détails</span></a>
</li>
<li class="nav-item">
<a class="btn btn-link color-link-login" style="display: inline-block;text-decoration: none;" href="" ><u><b>Carnet de vaccinations</b></u></span></a>
</li>
<li class="nav-item">
<a class="btn btn-link color-link-login" style="display: inline-block;text-decoration: none;" href="" >Rappels</span></a>
</li>';

?>
<body>

  <main role="main" class="container-addAnimal">
    <div class="col-lg-8">
      <form method="post" action="../php/router.php?action=addVaccinsAction">
        <div class="row">
          <div class="form-group col-lg-4">
            <label for="aniName">Date</label>
            <input type="date" class="form-control"  name="vacDate" aria-describedby="animal name"
            placeholder="Date du vaccins" required="required">
            <!--          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>-->
          </div>
          <div class="form-group col-lg-4">
            <label for="aniChipNumber">Vaccin</label>
            <input type="text" class="form-control"  name="vacVaccinType" aria-describedby="Chip number"
            placeholder="Entrez le vaccin">
            <!--          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>-->
          </div>


          <div class="form-group col-lg-4">
            <label for="aniWeight">Clinique</label>
            <input type="text" class="form-control"  name="vacClinic" aria-describedby="animal weight"
            placeholder="Entrez La clinique" required="required">
            <!--          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>-->
          </div>


        </div>

        <button type="submit" class="btn btn-success" style="float:right">Ajouter</button>
      </form>
    </div>

  </main><!-- /.container -->
  <br>
  <main role="main" class="container">
    <div class="table-responsive-sm">
      <table class="table">
        <thead>

          <tr style="background-color: #4e656b; color: #fff;">
            <th>Date</th>
            <th>Nom</th>
            <th>Vaccin</th>
            <th>Clinique</th>
            <th>Rappel<th>
            </tr>

          </thead>
          <tbody>

            <!-- Show vaccine's data -->
            <?php while ($data = $req->fetch(PDO::FETCH_ASSOC)) {

              $vacDate = new DateTime($data['vacDate']);
              $remDate = new DateTime($data['remDate']);
              ?>

              <tr>
                <td>
                  <?= $vacDate->format('d.m.Y') ?>
                </td>
                <td>
                  <?= $data['aniName'] ?>
                </td>
                <td>
                  <?= $data['vacVaccinType'] ?>
                </td>
                <td>
                  <?= $data['vacClinic'] ?>
                </td>
                <td></td>

                <td  style="text-align: right">

                  <a class="btn btn-danger btn" style="display: inline-block"
                  href="../php/router.php?action=deleteVaccinsAction&idVaccination=<?= $data['idVaccination'] ?>&idAnimal=<?= $data['idAnimal'] ?>"
                  role="button">Supprimer</span></a>

                </td>
              </tr>
            <?php }  ?>
          </tbody>
        </table>
      </div>

    </main><!-- /.container -->

    <?php

    $req->closeCursor();

    $content = ob_get_clean();

    require('template.php');
