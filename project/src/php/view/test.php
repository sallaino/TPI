<?php
/**
 * Created by PhpStorm.
 * User: sallaino
 * Date: 25.05.2018
 * Time: 10:21
 */

ob_start();

$data = $req->fetch(PDO::FETCH_ASSOC);

?>




<?php

$script = ob_get_contents();

ob_end_clean();

require('template.php');