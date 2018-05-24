<?php
/**
 * Etml
 * Author: sallaino
 * Date: 03.05.2018
 * Description:
 */



require_once('./model/animalManager.php');


function getAnimals()
{
    $animalManager = new animalManager();
    $req = $animalManager->getAnimals();

    require('./view/index.php');

}
function getAnimalDetails()
{
    $animalManager = new animalManager();
    $req = $animalManager->getAnimalDetail($_GET['idAnimal']);

    require('./view/detailsAnimal.php');
}


