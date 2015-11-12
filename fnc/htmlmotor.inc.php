<?php

/**
 *
 * BrewFeed
 * 
 * filename: htmlmotor.php
 * 
 * Copyright: Lars Jacobsen
 * Author: Lars Jacobsen
 * 
 *
 **/

$selfparts = mb_split('/', $_SERVER['PHP_SELF']);
$file = preg_replace('/\\\\/', '/', __FILE__);
$fileparts = mb_split('/', $file);

if ($selfparts[count($selfparts) - 1] == $fileparts[count($fileparts) - 1])
	{
	header('location: /');
	exit;
	}

class HtmlMotor {

function Header()	{
    
echo <<<HEADER

<head>  
<title>BrewFeed</title>
<meta name="description" content="beerfeed feedback micro bryg redfox">
<meta name="generator" content="phped">  
<meta name="ProgId" content="phped">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="stylesheet" type="text/css" href="css/stylesheet.css" />
<link rel="stylesheet" type="text/css" href="css/login.css" />
<link rel="stylesheet" type="text/css" href="uiinterface/css/pepper-grinder/jquery-ui-1.10.4.custom.css" >
<script src="uiinterface/js/jquery-1.10.2.js"></script>
<script src="uiinterface/js/jquery-ui-1.10.4.custom.js"></script>
<script src="js/jeditable.js"></script>

 <script>

$(document).ready(function() {
     $('.edit').editable('save.php', {
         indicator : 'Saving...'

     });
     $('.edit_area').editable('save.php', { 
         type      : 'textarea',
         cancel    : 'Cancel',
         submit    : 'OK',
         indicator : 'Saving...'

     });
 });
  
 $(function() {
 
$( "#datepicker" ).datepicker({ dateFormat: "yy-mm-dd" ,monthNames: [ "Januar", "Februar", "Marts", "April", "Maj", "Juni", "Juli", "August", "September", "Oktober", "November", "December" ] });   

});

 $(function() {
$( "#tabs" ).tabs();
});

 $(function() {
$( "#menu" ).menu();
});



</script>

<style>
label {
display: inline-block;
width: 5em;
}
</style> 
</head> 

<html>

<body>

HEADER;


}

function MenuOut() {
    
$usermgr = new UserManager();
$userid = $usermgr->sessionLoggedIn(session_id());
$userinfo = $usermgr->getAccountInfo($userid);
$usermail = md5 (strtolower( trim( $userinfo['email'] ) ));  
  
echo <<<MENU
<div id="topmenu_container">
  <div id="navigation_container">
    <ul id="navigation">
      <li><a href="index.php">BREWFEED</a></li>
      <li><a href="index.php?page=feedback.php">Bed&oslash;mmer</a> </li>
      <li><a href="index.php?page=brygger.php">Brygger</a></li>
      <li><a href="index.php?page=forening.php">Forening</a></li>
      <li><a href="index.php?page=event.php">Event</a></li>
      <li><a href="index.php?page=process_logout.php" class="button">Sign Out</a></li>
      <a href="index.php?page=brugerprofil.php"><img border="1" src="http://www.gravatar.com/avatar/$usermail?s=40" /> </a>

  </ul>
</div>
</div>
MENU;
}

function MenuOutNot() {
    
echo <<<MENU
<div id="topmenu_container">
<div id="navigation_container">
  <ul id="navigation">
    <li><a href="index.php">BREWFEED</a></li>
    <li><a href="index.php?page=feedback.php">Bed&oslash;mmer</a> </li>
    <li><a href="index.php?page=brygger.php">Brygger</a></li>
    <li><a href="index.php?page=forening.php">Forening</a></li>
    <li><a href="index.php?page=event.php">Event</a></li>
    <li><a href="index.php?page=crusfo.php" class="button">Sign Up</a></li>
    <li><a href="index.php?page=liusfo.php" class="button">Sign In</a></li>
  </ul>
</div>
</div>
MENU;
}


function Footer($p_time) {

    $indhold = "HTTP://www.vamdrupit.dk";
    $svgCode = QRcode::png($indhold, 'test.png', QR_ECLEVEL_L, 4, 4);    
    
echo <<<FOOTER


      
      <font size="0,01"><p>I loaded this page in $p_time secs just for you.</p></font>


</body>
</html>

FOOTER;



}}

?>