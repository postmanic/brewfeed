<?php

/**
 *
 * BrewFeed
 * 
 * filename: crusco.php
 * 
 * Copyright: Lars Jacobsen
 * Author: Lars Jacobsen
 * 
 *
 **/

    $brugernavn = $_REQUEST['brugernavn'];
    $navn = $_REQUEST['navn'];
    $email = $_REQUEST['email'];
    $kodeord = $_REQUEST['kodeord'];
  
   
      $usermgr = new UserManager();
      $createuser = $usermgr->createAccount($brugernavn, $navn, $email, $kodeord);


echo  <<<HTML_OUT

<meta http-equiv="refresh" content="0;url=index.php?page=crusre.php">

HTML_OUT;

?>