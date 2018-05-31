<?php

/**
 * Created by PhpStorm.
 * User: sallaino
 * Date: 28.05.2018
 * Time: 10:59
 */
class controllerManager
{
    public function getPath()
    {

       $path = $_SERVER['PHP_SELF'];


       return $path;


    }

    public function indexAction()
    {
        require('./model/animalManager.php');

        $animalManager = new animalManager();
        $req = $animalManager->getAnimals();

        require('./view/index.php');

    }

    public function addAnimal()
    {

        require('./model/animalManager.php');

        $animalManager = new animalManager();
        $req = $animalManager->getAnimals();
        $race = $animalManager->getRace();
        $typeandrace = $animalManager->getTypeAndRace();

        require('./view/addAnimal.php');

    }

    public function detailsAction()
    {
        require('./model/animalManager.php');
        $animalManager = new animalManager();
        $req = $animalManager->getAnimalDetail($_GET['idAnimal']);
        $wei = $animalManager->getAnimalWeight($_GET['idAnimal']);


        require('./view/detailsAnimal.php');

    }
    public function deleteAction()
    {
        require('./model/animalManager.php');
        $animalManager = new animalManager();
        $animalManager->deleteAnimal($_GET['idAnimal']);
        $req = $animalManager->getAnimals();

        require('./view/index.php');

    }
}
