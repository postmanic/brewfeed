<?php

/**
 *
 * BrewFeed
 * 
 * filename: index.php
 * 
 * Copyright: Lars Jacobsen
 * Author: Lars Jacobsen
 * 
 *
 **/

ob_start();

ini_set('date.timezone' , 'Europe/Copenhagen');
define('PAGE_PARSE_START_TIME', microtime());
error_reporting(E_ALL & ~E_NOTICE);

require_once('fnc/session.fnc.php');
require_once('phpqrcode/qrlib.php');
require_once('fnc/solo.inc.php');
require_once('fnc/error_handler.inc.php');
require_once('fnc/dbhandler.fnc.php');
require_once('fnc/user_manager.inc.php');
require_once('fnc/htmlmotor.inc.php');

$usermgr = new UserManager();
$userid = $usermgr->sessionLoggedIn(session_id());

$time_start = explode(' ', PAGE_PARSE_START_TIME);

$body_html = isset($_REQUEST['page']) ? $_REQUEST['page'] : "front.php";

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
require_once("mod/" . $body_html);

$time_end = explode(' ', microtime());
$parse_time = number_format(($time_end[1] + $time_end[0] - ($time_start[1] + $time_start[0])), 3);

$page->Footer($parse_time);

ob_end_flush();
?>