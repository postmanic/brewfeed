<?php

// Create User 




echo <<<HTML_OUT

<table align="center" bgcolor="white" height="700px" width="100%" border="0">
<tr>
<td>

<form id="opretevent" action="index.php?page=crevco.php" method="post">
    <h1>Ny bruger</h1>
    <fieldset id="inputnybruger">
        <input name="brugernavn" id="username" type="text" placeholder="Begivenhed" autofocus required>   
        <input name="fornavn" id="fornavn" type="text" placeholder="Beskrivelse" required>
        <input name="efternavn" id="username" type="text" placeholder="Efternavn" autofocus required>   
        <input name="email" id="password" type="text" placeholder="Email" required>
        <input name="kodeord" id="password" type="password" placeholder="Adgangskode" autofocus required>   

    </fieldset>
    <fieldset id="actions">
        <input type="submit" id="submit" value="Opret">

    </fieldset>
</form>

</td>
</tr>
</table>


HTML_OUT;
  


?>