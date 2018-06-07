<?php
/**
* Etml
* Author: sallaino
* Date: 24.05.2018
* Description: Where all the controller are routed
*/

session_start();
require('../php/controller/controllerManager.php');

try{
  // verify if the parameter is set
  if (isset($_GET['action'])) {

    // Call the class controllerManager
    $action = new controllerManager();

    // Test the $_GET
    switch ($_GET['action']) {

      // ================== loginAction =========================

      // Call the login's controller
      case 'loginAction':
      if (empty($_SESSION['idAuth']) || !isset($_SESSION['idAuth'])) {
      $action->loginAction();
    }else {
      unset($_SESSION['auth']);
      unset($_SESSION['idAuth']);
      $action->loginAction();
    }
      break;

      // ================= registerAction ==========================

      // Call the register's controller
      case 'registerAction':
      // Test if the user is connected
      if (empty($_SESSION['idAuth']) || !isset($_SESSION['idAuth'])) {
      $action->registerAction();
      }else {
        unset($_SESSION['auth']);
        unset($_SESSION['idAuth']);
        $action->registerAction();
      }
      break;

      // ================== logoutAction =========================

      // Call the logout's controller
      case 'logoutAction':
       //Test if the user is connected
      if (!empty($_SESSION['idAuth']) || isset($_SESSION['idAuth'])) {
        $action->logoutAction();
        break;
      }else {
        throw new Exception('Vous n\'êtes pas connecté');
      }

      // =================== indexAction ========================

      // Call the index's controller
      case 'indexAction':
      //Test if the user is connected
      if (!empty($_SESSION['idAuth']) || isset($_SESSION['idAuth'])) {
        $action->indexAction();
        break;
      }else {
        throw new Exception('Vous n\'êtes pas connecté');
      }

      // =================== detailsAction ========================

      // Call the animal details' controller
      case 'detailsAction':
      //Test if the user is connected
      if (!empty($_SESSION['idAuth']) || isset($_SESSION['idAuth'])) {
        if (isset($_GET['idAnimal'])) {
          $action->detailsAction();
        }
      }else {
        throw new Exception('Vous n\'êtes pas connecté');
      }
      break;

      // ================== vaccinsAction =========================

      // Call the vaccine's controller
      case 'vaccinsAction':
      //Test if the user is connected
      if (!empty($_SESSION['idAuth']) || isset($_SESSION['idAuth'])) {
        if (isset($_GET['idAnimal'])) {
          $action->vaccinsAction();
        }
      }else {
        throw new Exception('Vous n\'êtes pas connecté');
      }
      break;

      // ================  deleteAction ===========================

      // Call the animal delete's controller
      case 'deleteAction':
      //Test if the user is connected
      if (!empty($_SESSION['idAuth']) || isset($_SESSION['idAuth'])) {
        if (isset($_GET['idAnimal'])){
          $action->deleteAction();
        }
      }else {
        throw new Exception('Vous n\'êtes pas connecté');
      }
      break;

      // ================= deleteVaccinsAction ==========================

      // Call the vaccine delete's controller
      case 'deleteVaccinsAction':
      //Test if the user is connected
      if (!empty($_SESSION['idAuth']) || isset($_SESSION['idAuth'])) {
        if (isset($_GET['idVaccination'])){
          $action->deleteVaccinsAction();
        }
      }else {
        throw new Exception('Vous n\'êtes pas connecté');
      }
      break;

      // ================= addAnimal ==========================

      // Call the add animal's controller
      case 'addAnimal':
      //Test if the user is connected
      if (!empty($_SESSION['idAuth']) || isset($_SESSION['idAuth'])) {
        $action->addAnimal();

      }else {
        throw new Exception('Vous n\'êtes pas connecté');
      }
      break;

      // =================== editAction ========================

      // Call the edit page's controller
      case 'editAction':

      //Test if the user is connected
      if (!empty($_SESSION['idAuth']) || isset($_SESSION['idAuth'])) {
          if (isset($_GET['idAnimal'])){
        $action->editAnimal();
      }
      }else {
        throw new Exception('Vous n\'êtes pas connecté');
      }
      break;

      // ================== editAnimalFunction =========================

      // Call the edit animal's controller
      case 'editAnimal':

      //Test if the user is connected
      if (!empty($_SESSION['idAuth']) || isset($_SESSION['idAuth'])) {
        $action->editAnimalFunction();
      }else {
        throw new Exception('Vous n\'êtes pas connecté');
      }
      break;

      // =================== addVaccinsAction =======================

      // Call the add vaccine's controller
      case 'addVaccinsAction':

      //Test if the user is connected
      if (!empty($_SESSION['idAuth']) || isset($_SESSION['idAuth'])) {

        //Test if the animal id is set in the session
        if (isset($_SESSION['idAnimal'])){
        $action->addVaccins();
        }
      }else {
        throw new Exception('Vous n\'êtes pas connecté');
      }
      break;

      // ==================== default =======================

      // Throw Exception if the page doesn't exist
      default:
      throw new Exception('Erreur 404 page introuvable');
      break;

    }
  }
  }catch(Exception $exception){

    // Show exception in the error page
    $error = $exception->getMessage();
    require('../php/view/error.php');
  }
