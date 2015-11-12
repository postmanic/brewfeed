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




echo <<<HTML_OUT

<table align="center" bgcolor="white" height="700px" width="100%" border="0">
<tr>
<td>

<form id="nybruger" action="index.php?page=crusco.php" method="post">
    <h1>Ny bruger</h1>
    <fieldset id="inputnybruger">
        <input name="brugernavn" id="brugernavn" type="text" placeholder="Brugernavn" autofocus required>   
        <input name="navn" id="navn" type="text" placeholder="Navn" required>
        <input name="email" id="email" type="text" placeholder="Email" required>
        <input name="kodeord" id="kodeord" type="password" placeholder="Adgangskode" required>   

    </fieldset>
    <fieldset id="actions">
        <input type="submit" id="submit" value="Opret">
     <a>Terms of Service</a> <a>Privacy Policy</a>
    </fieldset>
</form>

</td>
</tr>
</table>


HTML_OUT;
  


?>