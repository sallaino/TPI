<?php

/**
 * Created by PhpStorm.
 * User: sallaino
 * Date: 24.05.2018
 * Time: 11:07
 */
class animalManager
{

    public $id;

    public function getAnimals()
    {

        $db = $this->dbConnect();

        $req = $db->query('SELECT * FROM t_animal INNER JOIN t_race on t_animal.fkRace = t_race.idRace INNER JOIN t_type on t_race.fkIdType = t_type.idType');

        return $req;

    }

    public function getAnimalDetail($id)
    {


        $db = $this->dbConnect();

        if (isset($id) && !empty($id)) {

            $req = $db->query('SELECT * FROM t_animal INNER JOIN t_race on t_animal.fkRace = t_race.idRace INNER JOIN t_type on t_race.fkIdType = t_type.idType WHERE t_animal.idAnimal =' . $id);


            return $req;


        } else {
            throw new Exception('ID incorrect');
        }


    }

    private function dbConnect()
    {
        try {
            $db = new PDO('mysql:host=localhost;dbname=db_gestanimalhealth;charset=utf8', 'root', '');
            return $db;
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }

    }

}