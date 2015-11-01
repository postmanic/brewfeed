<?php

/**
 *
 * WWW.PIGIT.DK
 * 
 * htmlmotor.inc.php
 * 
 * Copyright: Vamdrup IT
 * Author: Lars Rosenskjold Jacobsen
 * Oprettet:  2005
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

function Header($in_pagetitle, $userid)	{
    
echo <<<HEADER

<head>  
<title>{$in_pagetitle}</title>
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

function Menu($userid, $feedtekst)
{
    
if ($userid > 0)

{
           
        $userli = "<li id='menu'><a href='index.php?page=brugerprofil.php'>Min profil</a></li><li id='menu'><a href='index.php?page=process_logout.php'>Log ud</a></li>";
    
}
else
{
        $userli = "<li id='menu'><a href='index.php?page=liusfo.php'>Log ind</a></li>";
    
}    
        
echo <<<MENU
       
      <ul id="menu">
        <li id="menu"><a href="index.php?page=feedback.php">Bed&oslash;mmer</a></li>
        <li id="menu"><a href="index.php?page=brygger.php">Brygger</a></li> 
        <li id="menu"><a href="index.php?page=forening.php">Forening</a></li> 
        <li id="menu"><a href="index.php?page=event.php">Event</a></li> 
        $userli
      </ul>
        $feedtekst
MENU;
}


function Footer($p_time) {

//    $indhold = "HTTP://www.vamdrupit.dk";
//    $svgCode = QRcode::png($indhold, 'test.png', QR_ECLEVEL_L, 4, 4);    
    
echo <<<FOOTER


      
      <font size="0,01"><p>I loaded this page in $p_time secs just for you.</p></font>


</body>
</html>

FOOTER;



}}

?>