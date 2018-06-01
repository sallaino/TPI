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

        require('./view/login.php');
        $path = $_SERVER['PHP_SELF'];


        return $path;

      }
      public function login()
      {


        require('./model/animalManager.php');
        $animalManager = new animalManager();



          if(!empty($_POST['useIdentifier']) && !empty($_POST['usePassword'])){

            $useName =  $_POST['useIdentifier'];
            $usePassword =  $_POST['usePassword'];


            $login = $animalManager->getLoginData($useName,$usePassword);


            $getLogin = $login->fetch(PDO::FETCH_ASSOC);


            $a = password_hash('test',PASSWORD_DEFAULT);
            if (password_verify($usePassword,$a)) {


              header('Location:./router.php?action=indexAction');

            }else {


              require('./view/login.php');
            }





          }else {
          require('./view/login.php');
          }

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
        $typeandrace = $animalManager->getTypeAndRace();


        if (!empty($_POST)) {

          $animalName = $_POST['aniName'];
          $animalBirthDate = $_POST['aniBirthDate'];

          if (empty($_POST['aniChipNumber'])) {
            $_POST['aniChipNumber'] = NULL;

            $aniChipNumber = $_POST['aniChipNumber'];

          }else {
            $aniChipNumber = $_POST['aniChipNumber'];
          }

          if (empty($_POST['aniLinkPhoto'])){
            $_POST['aniLinkPhoto'] = './../../resources/images/animaldefault.jpg';

            $aniLinkPhoto =  $_POST['aniLinkPhoto'];
          }else {
            $aniLinkPhoto = $_POST['aniLinkPhoto'];
          }
          $aniRace = $_POST['aniRace'];


          $addAnimalInformations = $animalManager->addAnimal($animalName,$animalBirthDate,$aniChipNumber,$aniLinkPhoto,1,$aniRace);
        }


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
