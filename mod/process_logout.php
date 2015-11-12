<?php

/**
 *
 * BrewFeed
 * 
 * filename: process_logout.php
 * 
 * Copyright: Lars Jacobsen
 * Author: Lars Jacobsen
 * 
 *
 **/

$usermgr->processLogout();

echo <<<TEKST

 <meta http-equiv="refresh" content="0;url=index.php">

TEKST;

?>