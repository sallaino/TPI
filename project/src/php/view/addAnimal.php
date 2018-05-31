<?php
/**
 * Created by PhpStorm.
 * User: sallaino
 * Date: 31.05.2018
 * Time: 09:56
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
        <form method="post">
            <div class=" row">
                <div class="form-group col-lg-6">
                    <label for="aniType">Type d'animal</label>
                    <select class="form-control" id="aniType">
                        <option>-</option>
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
                    <select class="form-control" id="aniRace" onChange="THEFUNCTION(this.selectedIndex);">
                        <option>-</option>
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
                    <input type="text" class="form-control" id="aniName" aria-describedby="animal name"
                           placeholder="Entrez le nom" required="required">
                    <!--          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>-->
                </div>
                <div class="form-group col-lg-6">
                    <label for="aniBirthDate">Date de naissance</label>
                    <input type="date" class="form-control" id="aniBirthDate" aria-describedby="BirthDate">
                    <!--          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>-->
                </div>
            </div>

            <div class="row">
                <div class="form-group col-lg-6">
                    <label for="aniChipNumber">Numéro de puce électronmique</label>
                    <input type="text" class="form-control" id="aniChipNumber" aria-describedby="Chip number"
                           placeholder="Entrez numéro de la puce">
                    <!--          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>-->
                </div>


                <div class="form-group col-lg-6">
                    <label for="aniWeight">Poids de l'animal</label>
                    <input type="text" class="form-control" id="aniWeight" aria-describedby="animal weight"
                           placeholder="Entrez le poids" required="required">
                    <!--          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>-->
                </div>
            </div>

            <div class="row">
                <div class="form-group col-lg-6">
                    <label for="consultation">Etat de santé de l'animal</label>
                    <select class="form-control" id="consultation">
                        <option>-</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                </div>
                <div class="form-group col-lg-6">
                    <label for="exampleInputFile">Choisissez une photo pour votre animal !</label>
                    <input type="file" class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp">
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
