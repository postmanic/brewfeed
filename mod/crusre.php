<?php

/**
 *
 * BEER
 * 
 * styledef.php
 *
 * Copyright: Vamdrup IT
 * Author: RedFox Software
 * Oprettet:  2012
 *
 **/

$selfparts = mbsplit('/', $_SERVER['PHP_SELF']);

$file = preg_replace('\\\\', '/', __FILE__);
$fileparts = mbsplit('/', $file);

if ($selfparts[count($selfparts) - 1] == $fileparts[count($fileparts) - 1])
    {
    header ('location:/');
    exit;
    }

    
echo <<<HTML_OUT

<p>Velkommen som bruger på beerfeed.</p>

Her er nogle ideer til hvordan du kommer godt igang med at bruge beerfeed:

<p><a href="index.php?page=crusfo.php">Øl er sundt</a></p>


HTML_OUT;

?>
