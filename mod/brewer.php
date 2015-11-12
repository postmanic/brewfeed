<?php

/**
 *
 * BEER
 * 
 * styledef.php
 *
 * Copyright: Vamdrup IT
 * Author: RedFox Software
 * Oprettet:  2012
 *
 **/

    $usermgr = new UserManager();
    $userid = $usermgr->sessionLoggedIn(session_id());

if  ($userid > 0)
{

    $conn = DBH::opretForbindelse();    
    $query = "SELECT * FROM beer WHERE userid = $userid";
    $result = $conn->query($query); 
    $indhold = $definition['uid'];

    while (($definition = $result->fetch_assoc()) != NULL)
       {                                                                                                          
       $brygliste .= "<tr>";
       $brygliste .= "<td><a href='index.php?page=bryg.php&beerid=".$definition['tablebeerid']."'>".$definition['tablebeerid'].$definition['userid']."</a></td>";
       $brygliste .= "<td><div class='edit' id='beer_beername_tablebeerid_".$definition['tablebeerid']."'>".$definition['beername']."</div></td>";
       $brygliste .= "<td><div class='edit' id='beer_stilart_tablebeerid_".$definition['tablebeerid']."'>".$definition['stilart']."</div></td>";
       $brygliste .= "<td><div class='edit_area' id='beer_beskrivelse_tablebeerid_".$definition['tablebeerid']."'>".$definition['beskrivelse']."</div></td>";
       $brygliste .= "<td><div class='edit_area' id='beer_og_tablebeerid_".$definition['tablebeerid']."'>".$definition['og']."</div></td>";
       $brygliste .= "<td><div class='edit_area' id='beer_fg_tablebeerid_".$definition['tablebeerid']."'>".$definition['fg']."</div></td>";
       $brygliste .= "<td><div class='edit_area' id='beer_alk_tablebeerid_".$definition['tablebeerid']."'>".$definition['alk']."</div></td>";       
       $brygliste .= "<td><div class='edit_area' id='beer_ibu_tablebeerid_".$definition['tablebeerid']."'>".$definition['ibu']."</div></td>";
       $brygliste .= "<td><div class='edit_area' id='beer_ebc_tablebeerid_".$definition['tablebeerid']."'>".$definition['ebc']."</div></td>";
       $brygliste .= "<td><div class='edit_area' id='beer_brygget_tablebeerid_".$definition['tablebeerid']."'>".$definition['brygget']."</div></td>"; 
       $brygliste .= "<td><a href='index.php?page=styledefdo.php&k=".$definition['tablebeerid']."'>Opret</a></td>";        
       $brygliste .= "</tr>";
       }    

        
        
echo <<<HTML_OUT
          <h1>Bryg</h1>  
          <table class="brygliste">
          <th>#</th>
          <th>Navn</th>
          <th>Stilart</th>
          <th>Beskrivelse</th>
          <th>OG</th>
          <th>FG</th>
          <th>ALK</th>
          <th>IBU</th>
          <th>EBC</th> 
          <th>Brygget</th>
          <th>FeeD</th>
          $brygliste
          </table>
          
          <table>
<tr><td><a href='index.php?page=crbrfo.php'>Opret bryg</a></td></tr></table>
         
HTML_OUT;

}
else
{
    echo <<<HTML_OUT

<table align="center" bgcolor="white" height="700px" width="100%" border="0">
  <tr>
    <td>

<form id="login" action="index.php?page=liusco.php" method="post">
    <h1>BEERFEED</h1>
    <fieldset id="inputs">
        <input name="user_name" id="username" type="text" placeholder="Brugernavn" autofocus required>   
        <input name="user_pass" id="password" type="password" placeholder="Adgangskode" required>
    </fieldset>
    <fieldset id="actions">
        <input type="submit" id="submit" value="Log in">
        <a href="">Glemt adgangskode?</a><a href="index.php?page=crusfo.php">Ny bruger</a>
    </fieldset>
</form>
 
    </td>
  </tr>
</table>
HTML_OUT;
    
    
    
}








?>