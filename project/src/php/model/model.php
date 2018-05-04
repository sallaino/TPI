<?php
/**
 * Etml
 * Author: sallaino
 * Date: 03.05.2018
 * Description:
 */


function dbConnect()
{
    try
    {
        $db = new PDO('mysql:host=localhost;dbname= ;charset=utf8', 'root', 'Etml-18');
        return $db;
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
}