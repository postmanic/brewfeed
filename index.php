<?php

/**
 *
 * BEERFEED
 * 
 * index.php
 *
 * Copyright: Vamdrup IT
 * Author: RedFox Software
 * Oprettet:  2012
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

$page = new htmlmotor("BEERFEED");
$feedtekst ="";
if ($body_html == "brygger.php")
 {
$feedtekst = <<<htmltekst
<p>

Du har brygget lidt godt &oslash;l som du kunne tænke dig at få andres mening om hvordan smager.
Du opretter dit bryg i beerfeed og opretter samtidigt en bed&oslash;mmelse der får et unikt QR tag. 
Du klistrer dit unikke QR tag på din etiket og forærer dit &oslash;l til venner og bekendte.
Dine venner og bekendte skanner QR fra din &oslash;l ved hjælp af deres IPAD eller smartphone og giver deres mening.
Du kan se dine anonyme bed&oslash;mmelser i beerfeed og bruge dem i dine overvejelser til hvordan du kan forbedre dit &oslash;l.
</p>

<p>Du har en god ide om hvordan dit &oslash;l smager. Du mangler råd til hvordan du kan g&oslash;re det bedre. Du opretter dit bryg i beerfeed og
opretter en åben bed&oslash;mmelse med dit postnummer. Interesserede dommere i dit område kontakter dig og får lidt af dit &oslash;l hvor de skanner AR koden
og giver deres bed&oslash;mmelse af dit &oslash;l. Du kan se deres bed&oslash;mmelser og gode råd i beerfed.
</p>
<p>Du har mod på at deltage i konkurrencer for at sammenligne dit &oslash;l med andres. 
Du opretter dit bryg i beerfeed og finder et event som du ønsker at deltage i. 
Du tilmelder dig dette event og klistrer QR kode på de &oslash;l der skal bed&oslash;mmes og afleverer dem til konkurrencen. 
Dommerne bed&oslash;mmer dit &oslash;l ved hjælp og du kan se hvordan de har bed&oslash;mt dit &oslash;l i beerfedd. 
Du kan bruge reulstatet til at g&oslash;re dit &oslash;l endnu bedre.
</p>

<p> Du b&oslash;r som brygger kende kvaliteten af dit &oslash;l. En god måde at finde ud af hvilken kvalitet dit &oslash;l
 har er at bruge andre. Start med at bruge venner og bekendte, de vil hurtigt fortælle dig om dit &oslash;l kan drikkes!
  Tilbagemeldingerne er anonyme. Derefter b&oslash;r du deltage i din forenings konkurrencer, så finder du af hvordan dit &oslash;l er 
  fra andre bryggere. Er du ikke medlem af en forening så brug de &oslash;ldommere eller foreninger der er i dit område når det kan
   lade sig g&oslash;re. De vil også kunne fortælle dig om du er klar til at deltage i st&oslash;rre konkurrencer. Deltagelse i konkurrencer
   er det ultimative kvalitets stempel. Her bliver dit &oslash;l sammenlignet med referencer af for at give dig gode råd til forbedringer.
</p>  

htmltekst;
 }


$page->Header('BEERFEED', $userid);

echo "<table height='100%'><tr><td bgcolor='tan' valign='top' width='200px'>";

$page->Menu($userid, $feedtekst);

echo "</td><td valign='top'>";

require_once("mod/" . $body_html);

echo "</td></tr></table>";

$time_end = explode(' ', microtime());
$parse_time = number_format(($time_end[1] + $time_end[0] - ($time_start[1] + $time_start[0])), 3);


$page->Footer($parse_time);


ob_end_flush();
?>