<?php

/**
 *
 * YAP.DK
 * 
 * process_logout.php
 * 
 * Copyright: Vamdrup IT
 * Author: Lars Rosenskjold Jacobsen
 * Oprettet:  2008
 *
 **/



$usermgr->processLogout();

echo <<<TEKST

<table align="center" bgcolor="white" height="700px" width="100%" border="0">
   <tr>
      <td>

<h1>Logging user out</h1>

<p align="center"><img alt="Sample" src="img/loading.gif" /></p>


      </td>
   </tr>
</table>

 <meta http-equiv="refresh" content="0;url=index.php">

TEKST;

?>