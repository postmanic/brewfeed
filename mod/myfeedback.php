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


$kategori_id = isset($_REQUEST['k']) ? $_REQUEST['k'] : '';
$conn = DBH::opretForbindelse();
    

// List alle definitioner i kategorien

$query = <<<query

        SELECT *
          FROM beer 
         WHERE kategori = {$kategori['kid']}
query;

$result = $conn->query($query); 

while (($definition = $result->fetch_assoc()) != NULL)    { 

echo <<<HTML_OUT

            <a href="index.php?page=styledefdo.php&k={$definition['id']}">{$definition['did']}. {$definition['navn']}</a><br />

HTML_OUT;

}
echo <<<HTML_OUT

          </td><td>&nbsp;</td></tr>

HTML_OUT;

}
echo <<<HTML_OUT


      </table>
    </td>
  </tr>
</table>
          <p align="center"><a target="_blank" href="http://www.beerxml.com">BEERXML</a> || <a target="_blank" href="http://www.beer.com">BJCP2008 as XML</a> || <a target="_blank" href="http://www.beer.dk">DØ2011 as XML</a> </p>

HTML_OUT;

  


?>