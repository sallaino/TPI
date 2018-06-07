<?php
/**
* Etml
* Author: sallaino
* Date: 24.05.2018
* Description: Manage all the model
*/
class modelManager
{

  //  ====================================  "get" functions  ======================================================================

  /**
  * get the login's data of a user from the database
  * @param: $useName : can be the name of the user or the email address
  * @return: an  array set of login's data
  */
  public function getLoginData($useName){

    $db = $this->dbConnect();

    $login = $db->query('SELECT * FROM t_user WHERE (t_user.useName ="'.$useName .'" OR t_user.useEmail ="'.$useName.'")');

    return $login;

  }

  /**
  * get all animals' data  from the database
  * @param: $fkUser : the foreign key of the user
  * @return: an array set of all animals' data
  */
  public function getAnimals($fkUser)
  {

    $db = $this->dbConnect();

    $req = $db->query('SELECT * FROM t_animal INNER JOIN t_race on t_animal.fkRace = t_race.idRace INNER JOIN t_typeandrace on t_race.idRace = t_typeandrace.fkRace INNER JOIN t_type on t_typeandrace.fkidType = t_type.idType  WHERE t_animal.fkIdUser =' . $fkUser );

    return $req;

  }

  /**
  * Get the animal's data from the database
  * @param: $id : the identifier of an animal
  * @return: an  array set of one animal's data
  */
  public function getAnimalDetail($id)
  {

    $db = $this->dbConnect();

    if (isset($id) && !empty($id)) {

      $req = $db->query('SELECT * FROM t_animal INNER JOIN t_race on t_animal.fkRace = t_race.idRace INNER JOIN t_typeandrace on t_race.idRace = t_typeandrace.fkRace INNER JOIN t_type on t_typeandrace.fkidType = t_type.idType  WHERE t_animal.idAnimal =' . $id);

      return $req;

    } else {
      throw new Exception('Error : pas d\'id');
    }

  }

  /**
  * Get the animal weight's data from the database
  * @param: $id : the identifier of an animal
  * @return: an array set of one animal weight's data
  */
  public function getAnimalWeight($id)
  {


    $db = $this->dbConnect();

    if (isset($id) && !empty($id)) {

      $wei = $db->query('SELECT * FROM t_weight  WHERE t_weight.fkIdAnimal =' . $id);

      return $wei;

    } else {
      throw new Exception('pas d\'id');
    }

  }

  /**
  * Get the animal type and race from the database
  * @param: -
  * @return: an array set of one animal type and race's data
  */
  public function getTypeAndRace()
  {

    $db = $this->dbConnect();

    $req = $db->query('SELECT * FROM  t_typeandrace  INNER JOIN t_type on t_typeandrace.fkidType = t_type.idType INNER JOIN t_race on t_typeandrace.fkRace = t_race.idRace');

    return $req;

  }

  /**
  * Get the vaccins's data from the database
  * @param: $id: the identifier of an animal
  * @return: an array set of all vaccins' data
  */
  public function getVaccins($id)
  {

    $db = $this->dbConnect();

    $req = $db->query('SELECT * FROM  t_vaccination INNER JOIN t_animal on t_vaccination.fkIdAnimal = t_animal.idAnimal INNER JOIN t_reminder on t_reminder.fkIdAnimal = t_animal.idAnimal WHERE t_vaccination.fkIdAnimal='. $id);
    return $req;


  }


  //  ====================================  "add" functions  ======================================================================

  /**
  * Add an animal in the database
  * @param: $aniName: animal's name
  * @param: $aniBirthDate: animal's birth date
  * @param: $aniChipNumber: animal's micro chip number
  * @param: $aniLinkPhoto: animal's photo link
  * @param: $fkIdUser: user's foreign key
  * @param: $fkRace: race's foreign key
  * @return: -
  */
  public function addAnimal($aniName, $aniBirthDate, $aniChipNumber, $aniLinkPhoto,$fkIdUser, $fkRace)
  {


    $db = $this->dbConnect();

    $add = $db->exec('INSERT INTO t_animal(aniName,aniBirthDate,aniChipNumber,aniLinkPhoto,fkIdUser,fkRace) VALUES("'.$aniName.'","'.$aniBirthDate.'","'.$aniChipNumber.'","' . $aniLinkPhoto . '","'. $fkIdUser .'","'.$fkRace.'")');
  }


  /**
  * Add an vaccine in the database
  * @param: $vacDate: vaccine's date
  * @param: $vacVaccinType: vaccine's type
  * @param: $vacClinic: Clinic where is made the vaccine
  * @param: $fkIdAnimal: animal's foreign key
  * @return: -
  */
  public function addVaccins($vacDate, $vacVaccinType, $vacClinic,$fkIdAnimal)
  {

    $db = $this->dbConnect();

    $add = $db->exec('INSERT INTO t_vaccination(vacDate,vacVaccinType,vacClinic,fkIdAnimal) VALUES("'.$vacDate.'","'.$vacVaccinType.'","'.$vacClinic.'","' . $fkIdAnimal . '")');
  }

  /**
  * Add a new user in the database
  * @param: $regUser: user's nickname
  * @param: $regEmail: user's email address
  * @param: $regPassword: user's password
  * @return: -
  */
  public function register($regUser,$regEmail,$regPassword){

    $db = $this->dbConnect();

    $register = $db->query('INSERT INTO t_user(useName,useEmail,usePassword)VALUES("'.$regUser.'","'.$regEmail.'","'.$regPassword.'")');

  }

  //  ====================================  "edit" functions  ======================================================================

  /**
  * Update animal's data
  * @param: $aniName: animal's name
  * @param: $aniBirthDate: animal's birth date
  * @param: $aniChipNumber: animal's micro chip number
  * @param: $aniLinkPhoto: animal's photo link
  * @param: $fkIdUser: user's foreign key
  * @param: $fkRace: race's foreign key
  * @param: $idAnimal: animal's primary key
  * @return: an array set of animal data
  */
  public function editAnimal($aniName, $aniBirthDate, $aniChipNumber, $aniLinkPhoto,$fkIdUser, $fkRace,$idAnimal)
  {

    $db = $this->dbConnect();

    $edit = $db->query("UPDATE t_animal SET t_animal.aniName='$aniName',t_animal.aniBirthDate='$aniBirthDate',t_animal.aniChipNumber='$aniChipNumber',t_animal.aniLinkPhoto = '$aniLinkPhoto',t_animal.fkIdUser='$fkIdUser' ,t_animal.fkRace='$fkRace' WHERE t_animal.idAnimal=".$idAnimal);

    return $edit;
  }


  //  ====================================  "delete" functions  ======================================================================


    /**
    * Delete animal's data. Actually update the field aniDelete to true
    * @param: $id: animal's identifier
    * @return: an array set of animal data
    */
  public function deleteAnimal($id)
  {

    $db = $this->dbConnect();

    if (isset($id) && !empty($id)) {

      $del = $db->query('UPDATE t_animal SET t_animal.aniDeleted = 1 WHERE t_animal.idAnimal =' . $id);

      return $del;

    } else {
      throw new Exception('Error : pas d\'id');
    }

  }

  /**
  * Delete vaccine's data from the database
  * @param: $id: animal's identifier
  * @return: an array set of animal data
  */
  public function deleteVaccinsAction($id)
  {

    $db = $this->dbConnect();

    if (isset($id) && !empty($id)) {

      $del = $db->query('DELETE FROM t_vaccination WHERE t_vaccination.idVaccination ='. $id );

      return $del;

    } else {
      throw new Exception('Error : pas d\'id');
    }

  }

  //  ====================================  db Connexion ======================================================================

  /**
  * Delete vaccine's data from the database
  * @param: -
  * @return: an array set of connexion to the database's data
  */
  private function dbConnect()
  {
    try {
      $db = new PDO('mysql:host=localhost;dbname=db_gestanimalhealth;charset=utf8', 'root', '');
      return $db;
    } catch (Exception $e) {
      die($e->getMessage());
    }

  }

}
