<?php
/**
* Etml
* Author: sallaino
* Date: 23.05.2018
* Description: Page where are showed the animal's details
*/

$title = 'Pet La Forme - Détails de l\'animal';

ob_start();

$nav = '<li class="nav-item">
<a class="btn btn-link color-link-login" style="display: inline-block;text-decoration: none;" href="" ><u><b>Détails</b></u></span></a>
</li>
<li class="nav-item">
<a class="btn btn-link color-link-login" style="display: inline-block;text-decoration: none;" href="../php/router.php?action=vaccinsAction&idAnimal='. $data['idAnimal']. '" >Carnet de vaccinations</span></a>
</li>
<li class="nav-item">
<a class="btn btn-link color-link-login" style="display: inline-block;text-decoration: none;" href="" >Rappels</span></a>
</li>';

if ($data == false) {
  throw new Exception('Aucune données à afficher, veuillez vérifier l\'id ! ');
}elseif ($data['aniDeleted'] == true){
  throw new Exception('Cet animal à été supprimé !');
}

$birthDate = new DateTime($data['aniBirthDate']);


?>

<main role="main" class="container">

  <div class="row">
    <div class="col-sm-5">
      <div>
        <img src="<?= $data['aniLinkPhoto'] ?>" class="img" alt="test" height="200px" width="200px">

      </div>
      <br>

      <div class="row">
        <div class="col-lg-5">
          <span id="labelType"><b>Type - Race : </b></span>
        </div>
        <div class="col-lg-5">
          <p><?= $data['typType'] . ' - ' . $data['racRace'] ?></p>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-5">
          <span><b>Nom : </b></span>
        </div>
        <div class="col-lg-5">
          <p><?= $data['aniName'] ?></p>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-5">
          <span><b>Date de naissance : </b></span>
        </div>
        <div class="col-lg-5">
          <p><?= $birthDate->format('d.m.Y') ?></p>
        </div>
      </div>

      <div class="row">
        <div class="col-lg-5">
          <span><b>Numéro de la puce : </b></span>
        </div>
        <div class="col-lg-5">
          <p><?= $data['aniChipNumber'] ?></p>
        </div>
      </div>
    </div>

    <div class="col-sm-6">
      <form action="">
        <div class="form-group">
          <label for="from">Du :</label>
          <input type="date" class="form-control" id="from">
          <div class="form-group">
            <label for="to">Au :</label>
            <input type="date" class="form-control" id="to">
          </div>
          <button type="submit" class="btn btn-success" style="float:right ">Visualiser</button>
        </form>
        <br>
        <br>
        <div  id="weightChart" style="width: 100%; height: 250px;"></div>
      </div>
    </div>


  </main><!-- /.container -->
  <?php

  $req->closeCursor();
  $content = ob_get_contents();
  ob_end_clean();


  require('template.php');
  ?>

  <script>
  new Morris.Line({
    // ID of the element in which to draw the chart.
    element: 'weightChart',
    // Chart data records -- each entry in this array corresponds to a point on
    // the chart.
    data: [

      <?php

      while ($weiAni = $wei->fetch(PDO::FETCH_ASSOC)) {
        $weiDate = new DateTime($weiAni['weiDate']);
        echo "{ period:\"" . $weiDate->format('Y-m-d') . "\", value:" . $weiAni['weiWeight'] . "},";

      }

      ?>

    ],
    // The name of the data record attribute that contains x-values.
    xkey: 'period',
    // A list of names of data record attributes that contain y-values.
    ykeys: ['value'],
    // Labels for the ykeys -- will be displayed when you hover over the
    // chart.
    labels: ['Poids']
  });
</script>
