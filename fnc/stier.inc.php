<?php

/**
 *
 * WWW.PIGIT.DK
 * 
 * stier.inc.php
 * 
 * Copyright: Vamdrup IT
 * Author: Lars Rosenskjold Jacobsen
 * Oprettet:  2005
 *
 **/

$selfparts = split('/', $_SERVER['PHP_SELF']);
$file = ereg_replace('\\\\', '/', __FILE__);
$fileparts = split('/', $file);

if ($selfparts[count($selfparts) - 1] == $fileparts[count($fileparts) - 1])
	{
	header('location: /');
	exit;
	}

define('HTTP_SERVER', '/var/www/beer/');
define('HTTPS_SERVER', '/var/www/beer/');
define('HTTP_COOKIE_DOMAIN', 'localhost');
define('HTTPS_COOKIE_DOMAIN', 'localhost');
define('HTTP_COOKIE_PATH', '/');
define('HTTPS_COOKIE_PATH', '/');
define('DIR_WS_HTTP_SOLO', '/');
define('DIR_WS_HTTPS_SOLO', '/');
define('DIR_WS_INCLUDES', 'inc/');
define('DIR_WS_IMAGES', 'img/');
define('DIR_WS_FUNCTIONS', 'fnc/');
define('DIR_WS_CLASSES', 'cls/');
define('DIR_WS_MODULES', 'mod/');
define('DIR_WS_LANGUAGES', 'lng/');
define('parse_time', $parse_time);
define('PAGE_PARSE_START_TIME', microtime());
define('SOLO_VERSION', 'BrewFeed V 1.0');

?>