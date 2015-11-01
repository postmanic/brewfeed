<?php

// Create User Form

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


echo <<<HTML_OUT
<form name="signup" action="index.php?page=crbrco.php" method="post">

<table align="center" width="100%" height="100px" bgcolor ="white">     
  <tr>
    <td>Navn på bryg:</td>
    <td><input type="text" name="brygnavn" required></td>
  </tr>
  <tr>
    <td>Beskrivelse:</td>
    <td><input type="text" name="beskrivelse"></td>
  </tr>
  <tr>
    <td>Bryg dato:</td>
    <td><input type="text" id="datepicker" name="brygget" required></td>
  </tr>
  <tr>
    <td>Stilart:</td>
    <td><input type="text" name="stilart"></td>
  </tr>  
   <tr>
    <td>OG:</td>
    <td><input type="text" name="og"></td>
  </tr>   
  <tr>
    <td>FG:</td>
    <td><input type="text" name="fg"></td>
  </tr>  
  <tr>
    <td>Vol%:</td>
    <td><input type="text" name="alk"></td>
  </tr>    
  
  <tr>
    <td>IBU:</td>
    <td><input type="text" name="ibu"></td>
  </tr>    
  <tr>
    <td>EBC:</td>
    <td><input type="text" name="ebc"></td>
  </tr>  
  
<table align="center">

<table align="center" width="100%" height="100px" bgcolor ="white">
<tr>
<td>
<input type="submit" value="Opret bryg"/>
</td>
</tr>
</table>
</form>


HTML_OUT;
  


?>