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


echo <<<HTML_OUT



<form id="login" action="index.php?page=liusco.php" method="post">
    <h1>BEER FEED</h1>
    <fieldset id="inputs">
        <input name="user_name" id="username" type="text" placeholder="Brugernavn" autofocus required>   
        <input name="user_pass" id="password" type="password" placeholder="Adgangskode" required>
    </fieldset>
    <fieldset id="actions">
        <input type="submit" id="submit" value="Log in">
        <a href="">Glemt adgangskode?</a><a href="index.php?page=crusfo.php">Ny bruger</a>
    </fieldset>
</form>

HTML_OUT;
  


?>