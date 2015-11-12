<?php

/**
 *
 * BrewFeed
 * 
 * filename: error_handler.php
 * 
 * Copyright: Lars Jacobsen
 * Author: Lars Jacobsen
 * 
 *
 **/

ini_set('date.timezone' , 'Europe/Copenhagen');
define('PAGE_PARSE_START_TIME', microtime());
error_reporting(E_ALL & ~E_NOTICE);

require_once('phpqrcode/qrlib.php');
require_once('fnc/solo.inc.php');
require_once('fnc/error_handler.inc.php');
require_once('fnc/dbhandler.fnc.php');
require_once('fnc/user_manager.inc.php');
require_once('fnc/htmlmotor.inc.php');
require_once('fnc/session.fnc.php');

$usermgr = new UserManager();
$userid = $usermgr->sessionLoggedIn(session_id());

$msg = 'Unknown Error';
$page_title = "Error";

if (isset($_SESSION['exception']))
{
  $exc = $_SESSION['exception'];
  $msg = $exc->getMessage();
}
else if (isset($_SESSION['errstr']))
{
  $msg = $_SESSION['errstr'];
}
else if (!isset($_SESSION))
{
  $msg = <<<EOM
  
Unable to initialise the session.  Please verify
that the session data directory exists.

EOM;

}
else
{
  $msg = 'Unknown Error';
}

/**
 * Make sure that the next time an error occurs, we reset
 * these error data.
 */

unset($_SESSION['exception']);
unset($_SESSION['errstr']);

$time_start = explode(' ', PAGE_PARSE_START_TIME);

$page = new htmlmotor("BrewFeed");

$page->Header();

if ($userid === -1)
{
  $page->MenuOutNot();
}
else
{
  $page->MenuOut();   
}

echo <<<HTML_OUT

<table align="center" bgcolor="white" height="700px" width="100%" border="0">
  <tr>
    <td>

<form id="login" action="index.php?page=liusco.php" method="post">
    <h1>BEERFEED</h1>
    <h3>$msg</h3>    
    <fieldset id="actions">
        <a href="">Glemt adgangskode?</a><a href="index.php?page=crusfo.php">Ny bruger</a>
    </fieldset>
</form>
 
    </td>
  </tr>
</table>

HTML_OUT;



?>
