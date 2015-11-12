<?php

// Feedback Page

/**
 *
 * BEER
 * 
 * velkommen.php
 *
 * Copyright: Vamdrup IT
 * Author: RedFox Software
 * Oprettet:  2012
 *
 **/
 
$beerid = isset($_REQUEST['id']) ? md5($_REQUEST['id']) : NULL; 

switch($beerid)
{
   
case !NULL:

break;


Default:

echo  <<<HTML_OUT

<table align="center" bgcolor="white" height="700px" width="100%" border="0">
    <tr>
        <td>      

            <form id="login" action='index.php?page=fearfo.php' method='POST'>
            <h1>FEEDBACK</h1><p align="center">Indtast koden i feltet herunder</p>                  

       <fieldset id="inputs">
        <input name="beerid" id="username" type="text" placeholder="Indtast kode fra etiket" autofocus required>   
           </fieldset>
    <fieldset id="actions">
        <input type="submit" id="submit" value="Bed&oslash;m">
        <a href="">Hvordan bed&oslash;mmer jeg?</a><a href="index.php?page=crusfo.php">Ny bruger</a>
    </fieldset>
</form>      

        </td>

    
    </tr>
</table>



HTML_OUT;

}
 


?>