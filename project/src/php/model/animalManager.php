<?php

/**
 * Created by PhpStorm.
 * User: sallaino
 * Date: 24.05.2018
 * Time: 11:07
 */
class animalManager
{

    public function getAnimals()
    {

        $db = $this->dbConnect();

        $req = $db->query('SELECT * FROM t_animal INNER JOIN t_race on t_animal.fkRace = t_race.idRace INNER JOIN t_typeandrace on t_race.idRace = t_typeandrace.fkRace INNER JOIN t_type on t_typeandrace.fkidType = t_type.idType');

        return $req;

    }

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


    public function getRace()
    {

        $db = $this->dbConnect();

        $req = $db->query('SELECT * FROM  t_race  INNER JOIN t_typeandrace on t_race.idRace = t_typeandrace.fkRace INNER JOIN t_type on t_typeandrace.fkidType = t_type.idType WHERE t_typeandrace.fkidType = t_type.idType AND t_race.idRace = t_typeandrace.fkRace');

        return $req;


    }

    public function getTypeAndRace()
    {


        $db = $this->dbConnect();


        $req = $db->query('SELECT * FROM  t_typeandrace  INNER JOIN t_type on t_typeandrace.fkidType = t_type.idType INNER JOIN t_race on t_typeandrace.fkRace = t_race.idRace');
        return $req;


    }

    public function addAnimal($aniName, $aniBirthDate, $aniChipNumber, $aniLinkPhoto,$fkIdUser, $fkRace)
    {


            $db = $this->dbConnect();

            $add = $db->exec('INSERT INTO t_animal(aniName,aniBirthDate,aniChipNumber,aniLinkPhoto,fkIdUser,fkRace) VALUES("'.$aniName.'",'.$aniBirthDate.','.$aniChipNumber.',' . $aniLinkPhoto . ','. $fkIdUser .','.$fkRace.')');
    }

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

    public function getLoginData($useName,$usePassword){

      $db = $this->dbConnect();

      $login = $db->query('SELECT * FROM t_user WHERE (t_user.useName ="'.$useName .'" OR t_user.useEmail ="'.$useName.'")');

      return $login;

    }

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
