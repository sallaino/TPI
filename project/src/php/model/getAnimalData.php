<?php
/**
 * Etml
 * Author: sallaino
 * Date: 03.05.2018
 * Description:
 */

require ('dbConnect.php');

function getAnimalData(){

    $db = dbConnect();

    $req = $db->query('SELECT * FROM t_animal INNER JOIN t_race on t_animal.fkRace = t_race.idRace INNER JOIN t_type on t_race.fkIdType = t_type.idType');

    return $req;

}