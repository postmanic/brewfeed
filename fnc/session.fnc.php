<?php

/**
 *
 * WWW.PIGIT.DK
 * 
 * session.fnc.php
 * 
 * Copyright: Vamdrup IT
 * Author: Lars Rosenskjold Jacobsen
 * Oprettet:  2005
 *
 **/

define('USER_AGENT_SALT', 'SOLO');

ini_set('session.gc_maxlifetime', 3600);
session_start();


if (!isset($_SESSION['created']))
{
  session_regenerate_id();
  $_SESSION['created'] = TRUE;

}

if (!isset($_SESSION['user_agent']))
{
	$_SESSION['user_agent'] = md5($_SERVER['HTTP_USER_AGENT'] . USER_AGENT_SALT);
}
else
{
	if ($_SESSION['user_agent'] !=
              md5($_SERVER['HTTP_USER_AGENT'] . USER_AGENT_SALT))
{
Echo <<<EOH
<center><font color="#000000"><b><br><br><br><br>SESSION DESTROYED<br><br><small><font color="#ff0000">[SOLO COMPROMISED]<br>[IP SAVED]
</FONT></SMALL><BR><BR></B></FONT>
EOH;
Break;
}
}

?>