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

// Denne fil er inklusive index. Der er allerede lavet et kald til userid
 
//$usermgr = new UserManager();
//$userid = $usermgr->sessionLoggedIn(session_id());

$plainmail = $usermgr->getAccountInfo($userid);
$usermail = md5 (strtolower( trim( $plainmail['email'] ) ));
$str = file_get_contents( 'http://www.gravatar.com/'.$usermail.'.php' );
$profile = unserialize( $str );

            
 
 
 
echo <<<HTML_OUT
  

<table width="100%">
  <tr>
    <td width="300px">                                   
      
  <p>Brugernavn:<div class='edit' id='user_brugernavn_userid_$userid'>{$plainmail['brugernavn']}</div> </p>
  <p>Navn:<div class='edit' id='user_navn_userid_$userid'>{$plainmail['navn']}</div></p> 
  <p>Email:<div class='edit' id='user_email_userid_$userid'>{$plainmail['email']}</div></p>  
  <p>Postnummer:<div class='edit' id='user_postnummer_userid_$userid'>{$plainmail['postnummer']}</div></p>
  <p>Om:<div class='edit_area' id='user_om_userid_$userid'>{$plainmail['om']}</div></p>  
  <p>Synlighed: <div class='edit_area' id='user_om_userid_$userid'>Privat, Forening, Events, Offentlig</div></p> 

    </td>
    <td valign="top">
      

      <p><a href='http://www.gravatar.com'>Gravatar</a></p><img border="1" alt="{$profile['entry']['0']['name']['formatted']}" src="http://www.gravatar.com/avatar/$usermail" /><br />{$profile['entry']['0']['currentLocation']}
      <p><a href='http://www.facebook.com'>Facebook</a></p><img border="1" alt="{$profile['entry']['0']['name']['formatted']}" src="http://www.gravatar.com/avatar/$usermail" />
    </td>
  </tr>
</table>

HTML_OUT;

?>