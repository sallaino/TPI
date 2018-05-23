<?php
/**
 * Etml
 * Author: sallaino
 * Date: 03.05.2018
 * Description:
 */

require('../model/getAnimalData.php');

$req = getAnimalData();

require ('../view/index.php');