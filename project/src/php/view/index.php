<?php
/**
 * Etml
 * Author: sallaino
 * Date: 03.05.2018
 * Description:
 */

$title = 'Pet La Forme - Accueil';

ob_start();

$nav = '';

?>
    <body>
<main role="main" class="container">

    <table class="table">
        <thead>
        <tr style="background-color: #4e656b; color: #fff;">
            <th>Type - Race</th>
            <th>Nom</th>
            <th>Date de naissance</th>
            <th>Numéro de puce</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <?php while ($data = $req->fetch(PDO::FETCH_ASSOC)) {

            $date = new DateTime($data['aniBirthDate']);
            ?>

            <tr>
                <td>
                    <?= $data['typType'] . ' - ' . $data['racRace'] ?>
                </td>
                <td>
                    <?= $data['aniName'] ?>
                </td>
                <td>
                    <?= $date->format('d.m.Y') ?>
                </td>
                <td>
                    <?= $data['aniChipNumber'] ?>
                </td>
                <td style="text-align: right">
                    <a class="btn btn-primary btn" style="display: inline-block" href="../controller/detailAnimalCon.php?idAnimal=<?=$data['idAnimal']?>" role="button">Détails</span></a>
                    <a class="btn btn-success btn" style="display: inline-block" href="../controller/editAnimalCon.php?idAnimal=<?=$data['idAnimal']?>" role="button">Modifier</span></a>
                    <a class="btn btn-danger btn" style="display: inline-block" href="../controller/delAnimalCon.php?idAnimal=<?=$data['idAnimal']?>" role="button">Supprimer</span></a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>

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
                    <tr>
                        <td>
                            12.02.2000
                        </td>
                        <td>
                            Félix
                        </td>
                        <td>
                            Immunodéficiance Féline
                        </td>
                    </tr>

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
                    <tr>
                        <td>
                            12.02.2000
                        </td>
                        <td>
                            Félix
                        </td>
                        <td>
                            Vermifuge
                        </td>
                    </tr>

                    </tbody>
                </table>

                <p class="lead">
                    <a class="btn btn-primary btn-lg" href="#" role="button">Afficher tous les rappels</a>
                </p>
            </div>
        </div>
    </div>



<?php

$req->closeCursor();

$content = ob_get_clean();

require('template.php');

