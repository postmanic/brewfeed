<?php

/**
 *
 * WWW.PIGIT.DK
 * 
 * solo.inc.php
 * 
 * Copyright: Vamdrup IT
 * Author: Lars Rosenskjold Jacobsen
 * Oprettet:  2005
 *
 **/

$selfparts = mb_split('/', $_SERVER['PHP_SELF']);
$file = preg_replace('/\\\\/', '/', __FILE__);
$fileparts = mb_split('/', $file);

if ($selfparts[count($selfparts) - 1] == $fileparts[count($fileparts) - 1])
    {
    header('location: /');
    exit;
    }

define('DB_SERVER', 'localhost');
define('DB_SERVER_USERNAME', 'root');
define('DB_SERVER_PASSWORD', 'Sentry500');
define('DB_DATABASE', 'beerfeed');

?>