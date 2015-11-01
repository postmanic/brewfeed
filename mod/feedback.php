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


<table bgcolor ="white" align="center" border="0" align="center" height="700px" width="100%" cellpadding="30" cellspacing="1">
    <tr>
        <td align="center" width="70%" colspan="2">      
            <table>
            <form action='index.php?page=fearfo.php' method='POST'>      
                <tr>
                    <td align="center">
                    <h1>FEEDBACK</h1><p align="center">Skan eller indtast koden i felterne herunder</p>
                    </td>
                </tr>
                <tr>
                    <td align="center">
                   <input name="beerid" type="text" style="width:15em;"><br/><br/>
                    </td>
                </tr>
                <tr>
                    <td align="center">
                    <input type="submit" value="GO" class="q_button" />
                    </td>
                </tr>
            </form>       
            </table>
        </td>

    
    </tr>
</table>



HTML_OUT;

}
 


?>