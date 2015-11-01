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

$selfparts = split('/', $_SERVER['PHP_SELF']);
$file = ereg_replace('\\\\', '/', __FILE__);
$fileparts = split('/', $file);

if ($selfparts[count($selfparts) - 1] == $fileparts[count($fileparts) - 1])
    {
    header('location: /');
    exit;
    }

 
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

$usermgr = new UserManager();
$usermgr->processLogin($user_name, $user_pass);

echo <<<TEKST
 
<h1>Logging user in</h1>
<br />
<br />
<br />
<br />
<p><img alt="Sample" src="img/loading.gif" /></p>
<meta http-equiv="refresh" content="0;url=/">

TEKST;

?>