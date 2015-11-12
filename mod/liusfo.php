<?php

/**
 *
 * BrewFeed
 * 
 * filename: liusfo.php
 * 
 * Copyright: Lars Jacobsen
 * Author: Lars Jacobsen
 * 
 *
 **/

// if user exists log in. Else say nono.

echo <<<HTML_OUT

<table align="center" bgcolor="white" height="700px" width="100%" border="0">
  <tr>
    <td>

<form id="login" action="index.php?page=liusco.php" method="post">
    <h1>BEERFEED</h1>
    <p id="error">Forkert brugernavn eller kodeord</p>
    <fieldset id="inputs">
        <input name="user_name" id="username" type="text" placeholder="Brugernavn" autofocus required>   
        <input name="user_pass" id="password" type="password" placeholder="Adgangskode" required>
    </fieldset>
    <fieldset id="actions">
        <input type="submit" id="submit" value="Sign in">
        <a href="">Glemt adgangskode?</a><a href="index.php?page=crusfo.php">Ny bruger</a>
    </fieldset>
</form>
 
    </td>
  </tr>
</table>

HTML_OUT;
  


?>