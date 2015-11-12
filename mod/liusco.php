<?php

/**
 *
 * BrewFeed
 * 
 * filename: liusco.php
 * 
 * Copyright: Lars Jacobsen
 * Author: Lars Jacobsen
 * 
 *
 **/


 

  $user_name = $_REQUEST['user_name'];
  $user_pass = $_REQUEST['user_pass'];


$userid = $usermgr->processLogin($user_name, $user_pass);

if ($userid === -1) {
}
else {

echo <<<TEKST

<table align="center" bgcolor="white" height="700px" width="100%" border="0">
   <tr>
      <td>
 
<h1>Logging user in</h1>

<p align="center"><img alt="Sample" height="30px" src="img/loading.gif" /></p>
      </td>
   </tr>
</table>


 <meta http-equiv="refresh" content="0;url=index.php?page=brugerprofil.php">


TEKST;
}

?>