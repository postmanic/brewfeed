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
    <td>Navn på bryg</td>
  </tr>
  <tr>
    <td>Beskrivelse</td>

  </tr>
  <tr>
    <td>Bryg dato:</td>
  </tr>
  <tr>
    <td>Stilart:</td>
  </tr>  
  <tr>
    <td>ID</td>
  </tr>   
             <tr>
    <td colspan="2">
           Bedømmelse: <select name="score">
                    <option value="0"></option>
                    <option value="3">Normal</option>
                    <option value="4">Beerfeed</option>
                    <option value="5">DØ 2011</option>
                    <option value="6">BJCP</option>
                    <option value="7">Forening</option>
                    <option value="8">Egen</option>

                  </select>
        </td>
        </tr> 
  
  
  
  
<table align="center">

<table align="center" width="100%" height="100px" bgcolor ="white">
<tr>
<td>
<input type="submit" value="Opret bedømmelse"/>
</td>
</tr>
</table>
</form>


HTML_OUT;
  


?>