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

    $brewcode = $_REQUEST['code'];
    
    $svgCode = QRcode::png('HTTP://192.168.1.135/beer/index.php?page=feedback.php&brewcode='.$brewcode, 'test2.png', QR_ECLEVEL_L, 2, 4);  

echo <<<HTML_OUT

<p>Bryg oprettet.</p>


    <a href="HTTP://192.168.1.135/beer/index.php?page=feedback.php&brewcode=$brewcode"><img src="test2.png" border="0"/></a>

HTML_OUT;



?>
