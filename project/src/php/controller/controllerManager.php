<?php
/**
* Etml
* Author: sallaino
* Date: 28.05.2018
* Description: Manage all the controller
*/
class controllerManager
{

  // ===============================  Login and register ========================================

  /**
  * Récupère les données utilisateurs dans la bdd, test la compatibilité avec celle entrée par l'utilisateur et redirige si elles sont correcte.
  * @param: -
  * @return: -
  */
  public function loginAction()
  {

    require('./model/modelManager.php');

    // verify if the user's identifier and the password are not empty
    if(!empty($_POST['useIdentifier']) && !empty($_POST['usePassword'])){

      // set the variables
      $useName =  $_POST['useIdentifier'];
      $usePassword =  $_POST['usePassword'];

      // get the login data in the data base
      $modelManager = new modelManager();
      $login = $modelManager->getLoginData($useName);
      $getLogin = $login->fetch(PDO::FETCH_ASSOC);

      // Verify if the password entered by the user is the same that in the data base
      if (password_verify($usePassword,$getLogin['usePassword'])) {

        // if it is, a session start and the session variables are set and the user redirected
        session_start();
        $_SESSION['auth'] = $getLogin['useName'];
        $_SESSION['idAuth'] = $getLogin['idUser'];
        header('Location:./router.php?action=indexAction');

      }else {

        // else the user stay on the login page
        require('./view/login.php');

      }

    }else {
      require('./view/login.php');
    }

  }

  /**
  * Unset the session for auth and idAuth and redirect to the login page
  * @param: -
  * @return: -
  */
  public function logoutAction()
  {

    // Star a session, unset the session's variables and redirect on the login page
    session_start();
    unset($_SESSION['auth']);
    unset($_SESSION['idAuth']);
    header('Location:./router.php?action=loginAction');

  }

  /**
  * Get the POST data, test them, if ok : add the user in the data base and redirect the user on the index page, else send an error message
  * @param: -
  * @return: -
  */
  public function registerAction()
  {


    require('./model/modelManager.php');
    $modelManager = new modelManager();

    // Verify if the POST values are not empty
    if(!empty($_POST['regEmail']) && !empty($_POST['regUser']) && !empty($_POST['regPassword']) && !empty($_POST['regConfirmePassword'])){

      // if not, set the variables
      $regUser =  $_POST['regUser'];
      $regEmail =  $_POST['regEmail'];
      $regPassword =  $_POST['regPassword'];
      $regConfirmePassword =  $_POST['regConfirmePassword'];

      // get the login data in the database
      $login = $modelManager->getLoginData($regEmail);
      $getLogin = $login->fetch(PDO::FETCH_ASSOC);

      // Test if the email entered by the user is the same that in the database
      if ($getLogin['useEmail'] == $regEmail) {

        // if it is, throw an exception
        throw new \Exception("Cette adresse email est déjà utilisée !");
      }else {
        // Else, if the password and the Confirmation password are the same
        if ($regPassword == $regConfirmePassword) {

          // hash the password and call the register function
          $passHash = password_hash($regPassword,PASSWORD_DEFAULT);
          $register = $modelManager->register($regUser,$regEmail,$passHash);

          //Get the login data
          $acc = $modelManager->getLoginData($regEmail);
          $cvb = $acc->fetch(PDO::FETCH_ASSOC);

          // Start a session and set the session variables the redirect on the index page
          session_start();
          $_SESSION['auth'] = $cvb['useName'];
          $_SESSION['idAuth'] = $cvb['idUser'];
          header('Location:./router.php?action=indexAction');

        }else {

          //Else, throw an exception
          throw new \Exception("Les mot de passe ne correspondent pas");
          require('./view/register.php');
        }

      }

    }else {
      require('./view/register.php');
    }
  }

  // =============================== end Login and register =============================
  // ===============================  Index =============================================

  /**
  * Get animals' data and require the index page
  * @param: -
  * @return: -
  */
  public function indexAction()
  {

    require('./model/modelManager.php');

    //Call the getAnimals() function and pass the idAuth set in parameter then require the index page
    $modelManager = new modelManager();
    $req = $modelManager->getAnimals($_SESSION['idAuth']);
    require('./view/index.php');

  }



  // =============================== end Index ==========================================

  // =============================== animal data ========================================

  // ============= add animal =================

  /**
  * Get type and race of an animal and the POST data, test them, if ok : call the addAnimal function to add the animal in the data base and require the user on the addAnimal page
  * @param: -
  * @return: -
  */
  public function addAnimal()
  {

    require('./model/modelManager.php');

    // Call the getTypeAndRace() function
    $modelManager = new modelManager();
    $typeandrace = $modelManager->getTypeAndRace();

    // Test if the POST is not empty
    if (!empty($_POST)) {

      // if not, set the variables
      $animalName = $_POST['aniName'];
      $animalBirthDate = $_POST['aniBirthDate'];

      // if the animal's chip number value is empty then set the $_POST['aniChipNumber'] NULL
      if (empty($_POST['aniChipNumber'])) {

        $_POST['aniChipNumber'] = NULL;
        $aniChipNumber = $_POST['aniChipNumber'];

      }else {

        //Else, set the variables with the POST value
        $aniChipNumber = $_POST['aniChipNumber'];
      }

        // if the animal's photo's link value is empty then set the $_POST['aniLinkPhoto'] with an default photo
      if (empty($_POST['aniLinkPhoto'])){

        $_POST['aniLinkPhoto'] = './../../resources/images/animaldefault.jpg';
        $aniLinkPhoto =  $_POST['aniLinkPhoto'];

      }else {

        //Else, set the variables with the POST value
        $aniLinkPhoto = $_POST['aniLinkPhoto'];
      }

      $aniRace = $_POST['aniRace'];



      // Call the addAnimal() function to add the animal in the data base
      $addAnimalInformations = $modelManager->addAnimal($animalName,$animalBirthDate,$aniChipNumber,$aniLinkPhoto,$_SESSION['idAuth'],$aniRace);
    }

    // Then require the add animal poge
    require('./view/addAnimal.php');

  }

  // ============= end add animal =================

  // ============= edit animal =================

  /**
  * Get details,weight, type and race data, and require the user on the addAnimal page
  * @param: -
  * @return: -
  */
  public function editAnimal()
  {

    require('./model/modelManager.php');

    // Call getAnimalDetail, getAnimalWeight, getTypeAndRace to have all aniaml's details
    $modelManager = new modelManager();
    $req = $modelManager->getAnimalDetail($_GET['idAnimal']);
    $wei = $modelManager->getAnimalWeight($_GET['idAnimal']);
    $typeandrace = $modelManager->getTypeAndRace();
    $data = $req->fetch(PDO::FETCH_ASSOC);

    //Then require the edit animal page
    require('./view/editAnimal.php');

  }

  /**
  * Get animal details, get the POST data, test them and call the editAnimal function for the update in the database and redirect on the index page
  * @param: -
  * @return: -
  */
  public function editAnimalFunction()
  {


    require('./model/modelManager.php');

    // Call getAnimalDetail() function to have the animal's details
    $modelManager = new modelManager();
    $getAnimalData = $modelManager->getAnimalDetail($_SESSION['idAnimal']);
    $animalData = $getAnimalData->fetch(PDO::FETCH_ASSOC);

    // Test if the POST is not empty
    if (!empty($_POST)) {

      // if not, set the variables
      $animalName = $_POST['aniName'];
      $animalBirthDate = $_POST['aniBirthDate'];

      // if the animal's chip number value is empty then set the $_POST['aniChipNumber'] on NULL
      if (empty($_POST['aniChipNumber'])) {

        $_POST['aniChipNumber'] = NULL;
        $aniChipNumber = $_POST['aniChipNumber'];

      }else {

        //Else, set the variables with the POST value
        $aniChipNumber = $_POST['aniChipNumber'];

      }

      // if the animal's photo's link value is empty then set the $_POST['aniLinkPhoto'] with the photo of this animal from the database
      if (empty($_POST['aniLinkPhoto'])){

        $_POST['aniLinkPhoto'] = $animalData['aniLinkPhoto'];
        $aniLinkPhoto = './../../userContent/'.$_POST['aniLinkPhoto'];

      }else {

      // Else, set the variable with the new photo
        $aniLinkPhoto = './../../userContent/'.$_POST['aniLinkPhoto'];
      }

      $aniRace = $_POST['aniRace'];

      // Then call the editAnimal() function to update the database and redirect on the index page
      $editAniaml = $modelManager->editAnimal($animalName,$animalBirthDate,$aniChipNumber,$aniLinkPhoto,$_SESSION['idAuth'],$aniRace,$_SESSION['idAnimal']);
      header('Location:./router.php?action=indexAction');

    }

  }

  // ============= end edit animal =================

  // ============= details animal =================

  /**
  * Get animal details and weight by calling getAnimalDetail() and getAnimalWeight() function, test if the user is logged and require the detailsAnimal page the user is connected. Else, an error message is send
  * @param: -
  * @return: -
  */
  public function detailsAction()
  {
    require('./model/modelManager.php');

    // Call the getAnimalDetail() and getAnimalWeight() function to get animal's details
    $modelManager = new modelManager();
    $req = $modelManager->getAnimalDetail($_GET['idAnimal']);
    $wei = $modelManager->getAnimalWeight($_GET['idAnimal']);
    $data = $req->fetch(PDO::FETCH_ASSOC);

    // Test if the user's foreign key is the same that the user's id connected. If it is, require the animal's details page
    if ($data['fkIdUser'] == $_SESSION['idAuth']) {
      require('./view/detailsAnimal.php');
    }else {

      //Else throw Exception
      throw new \Exception("Vous n'avez pas les droits d'accèder à cette page");
    }
  }

  // ============= end details animal =================

  // ============= delete animal =================

  /**
  * Call the deleteAnimal function to delete an animal then call the getAnimals function to get all animal and redirect on th e index page
  * @param: -
  * @return: -
  */
  public function deleteAction()
  {
    require('./model/modelManager.php');

    // Call deleteAnimal() function to delete an animal
    $modelManager = new modelManager();
    $modelManager->deleteAnimal($_GET['idAnimal']);

    // Call getAnimals() function to get all animals and redirect on the index page
    $req = $modelManager->getAnimals($_SESSION['idAuth']);
    header('Location:./router.php?action=indexAction');

  }

  // ============= end delete animal =================

  // =============================== vaccins data ========================================

  // ============= get vaccin =================

  /**
  * Get vaccins' data and requier the vaccins page
  * @param: -
  * @return: -
  */
  public function vaccinsAction()
  {
    require('./model/modelManager.php');
    $modelManager = new modelManager();
    $req = $modelManager->getVaccins($_GET['idAnimal']);
    require('./view/vaccins.php');

  }

  // ============= add vaccin =================

  /**
  * Get POST data and call the addVaccins() function to add the vaccin in the data base then call the getVaccins() function to get all vaccins for an animal and require the vaccins page
  * @param: -
  * @return: -
  */
  public function addVaccins()
  {

    require('./model/modelManager.php');

    // Test if the POST is empty
    if (!empty($_POST)) {

      // if not, set the variables
      $vacDate = $_POST['vacDate'];
      $vacVaccinType = $_POST['vacVaccinType'];
      $vacClinic = $_POST['vacClinic'];

      // then, call the addVaccins() function to add the vaccin
      $modelManager = new modelManager();
      $addVaccin = $modelManager->addVaccins($vacDate,$vacVaccinType,$vacClinic,$_SESSION['idAnimal']);

      // Call getVaccins() function to get all vaccins and require vaccin page
      $req = $modelManager->getVaccins($_SESSION['idAnimal']);
      require('./view/vaccins.php');

    }

  }
  // ============= end add vaccin =================

  // ============= delete vaccin =================
  /**
  * Call the deleteVaccinsAction function to delete a vaccin then call the getVaccins function to get all vaccins and require the index page
  * @param: -
  * @return: -
  */
  public function deleteVaccinsAction()
  {
    require('./model/modelManager.php');

    // Call the deleteVaccinsAction() function to delete the function
    $modelManager = new modelManager();
    $modelManager->deleteVaccinsAction($_GET['idVaccination']);

    // Them call the getVaccins() function to get all vaccins and require vaccin page
    $req = $modelManager->getVaccins($_GET['idAnimal']);
    require('./view/vaccins.php');

  }

}
// ============= end delete vaccin =================
