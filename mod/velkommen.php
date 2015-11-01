<?php

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

$selfparts=split('/', $_SERVER['PHP_SELF']);

$file     =ereg_replace('\\\\', '/', __FILE__);
$fileparts=split('/', $file);

if ($selfparts[count($selfparts) - 1] == $fileparts[count($fileparts) - 1])
    {
    header ('location:/');
    exit;
    }

echo  <<<HTML_OUT

<table align="center" width="80%" border="0" cellpadding="15" cellspacing="1">
  <tr>
    <td align="center" valign="middle">
      <br />
      <font color="darkgreen" size="0,01">
<h1>RATE|MY|BEER</h1>
      </font>
    </td>
  </tr>
</table>


<table align="center" width="80%" cellpadding="30" cellspacing="1">
  <tr>
    <td align="center" style="font-size:14px;" width="100%">
      <form action='index.php?page=styledef.php' method='POST'>
      <table>
        <tr>
          <td align="center"> <input name="user_name" type="text" size="8"> - <input name="user_name" type="text" size="8"></td>
        </tr>

        <tr>
          <td align="center"><input type="submit" value="RATE|MY|BEER" class="q_button" /></td>
        </tr>
      </table>
      </form>
    </td>    
  </tr>                  
</table>

HTML_OUT;

?>