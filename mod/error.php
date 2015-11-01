<?php


require_once('fnc/error_handler.inc.php');
require_once('fnc/htmlmotor.inc.php');
require_once('fnc/session.fnc.php');

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

$page = new htmlmotor("BEERFEED");

$page->Header('BEERFEED');

?>

<table bgcolor="white" width="100%">
<tr>
<td>
<h2 align='center'>Unexpected Error</h2>
<p align='center'>
  We are very sorry, but an unexpected error has occurred in
  the application.  This occurs either because a page was
  used improperly and visited directly instead of through the
  web site or because of a system error in the application.
  The website administrators have been
  notified and will look into the problem as soon as possible.
  We apologise for the inconvenience and kindly ask you to try
  again or try back again in a little while.
</p>
<p align='center'>
  Please click <a href='index.php'>here</a> to go back to the
  main page and continue working with our system.
</p>
<p align='center'>
  The error received was: <br/><br/>
  <b><?php echo $msg ?></b>
</p>
</td>
</tr>
</table>