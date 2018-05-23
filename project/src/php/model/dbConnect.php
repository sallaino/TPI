<?php
/**
 * Created by PhpStorm.
 * User: sallaino
 * Date: 23.05.2018
 * Time: 13:36
 */

function dbConnect()
{
    try
    {
        $db = new PDO('mysql:host=localhost;dbname=db_gestanimalhealth;charset=utf8', 'root', '');
        return $db;
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }

}