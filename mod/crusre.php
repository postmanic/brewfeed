<?php

/**
 *
 * BrewFeed
 * 
 * filename: crusre.php
 * 
 * Copyright: Lars Jacobsen
 * Author: Lars Jacobsen
 * 
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

    
echo <<<HTML_OUT

<p>Velkommen som bruger p� beerfeed.</p>

Her er nogle ideer til hvordan du kommer godt igang med at bruge beerfeed:

<p><a href="index.php?page=crusfo.php">�l er sundt</a></p>


HTML_OUT;

?>
