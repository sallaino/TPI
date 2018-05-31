<?php
/**
 * Created by PhpStorm.
 * User: sallaino
 * Date: 24.05.2018
 * Time: 09:13
 */



require('../php/controller/controllerManager.php');



try{
    if (isset($_GET['action'])) {

        if ($_GET['action'] == 'indexAction') {
            $index = new controllerManager();
            $index->indexAction();

        } elseif ($_GET['action'] == 'detailsAction')
        {
            if (isset($_GET['idAnimal'])) {
                $detail = new controllerManager();
                $detail->detailsAction();
            }
        }elseif ($_GET['action'] == 'deleteAction'){
            $delete = new controllerManager();
            $delete->deleteAction();
        }elseif ($_GET['action'] == 'addAnimal'){
            $addAnimal = new controllerManager();
            $addAnimal->addAnimal();
        }else{
            throw new Exception('Erreur 404 page introuvable');
        }
    }else{
        $index = new controllerManager();
        $index->indexAction();
    }
}catch(Exception $exception){
    $error = $exception->getMessage();
    require('../php/view/error.php');
}

