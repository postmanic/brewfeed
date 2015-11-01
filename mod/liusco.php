<?php

/**
 *
 * YAP.DK
 * 
 * process_login.php
 * 
 * Copyright: Vamdrup IT
 * Author: Lars Rosenskjold Jacobsen
 * Oprettet:  2008
 *
 **/



 
// TODO 2 -o Lars -c Prog: Der skal checkes ved forkerte password. hvis der er for mange fejl indtastninger fra samme ip, skal ip bannes. Eller sådan noget. Der skal også være mulighed for at anvende FACEBOOK     
    
if (!isset($_REQUEST['user_name']) || $_REQUEST['user_name'] == ''
    || !isset($_REQUEST['user_pass']) || $_REQUEST['user_pass'] == '')
{ 

echo <<<TEKST
    
<meta http-equiv="refresh" content="0;url=/">

TEKST;
  
exit;
}
else
{
// TODO 2 -o Lars -c Prog: _request skal renses for injection.       
  $user_name = $_POST['user_name'];
  $user_pass = $_POST['user_pass'];
}

$usermgr->processLogin($user_name, $user_pass);

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

?>