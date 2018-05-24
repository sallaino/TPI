<?php
/**
 * Created by PhpStorm.
 * User: sallaino
 * Date: 24.05.2018
 * Time: 09:13
 */

require('../php/controller/controller.php');

try{
    if (isset($_GET['action'])) {

        if ($_GET['action'] == 'getAnimalData') {
            getAnimals();
        } elseif ($_GET['action'] == 'getAnimalDetail')
        {
            if (isset($_GET['idAnimal'])) {
                getAnimalDetails();
            }
        }
    }else{
        getAnimals();
    }
}catch(Exception $exception){
    echo 'Erreur : ' . $exception->getMessage();
    require('../php/view/error.php');
}

