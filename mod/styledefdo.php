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

$selfparts = mbsplit('/', $_SERVER['PHP_SELF']);

$file = preg_replace('\\\\', '/', __FILE__);
$fileparts = mbsplit('/', $file);

if ($selfparts[count($selfparts) - 1] == $fileparts[count($fileparts) - 1])
    {
    header ('location:/');
    exit;
    }
$kategori_id = isset($_REQUEST['k']) ? $_REQUEST['k'] : '';
$conn = DBH::opretForbindelse();
    
if ($kategori_id !== "")
{

$query = <<<query

        SELECT *,
               stilart_definition.navn AS stil_navn 
          FROM stilart_definition
       INNER JOIN stilart_kategori ON stilart_kategori.kid = stilart_definition.kategori     
       WHERE stilart_definition.id = '{$kategori_id}'
query;

$resultkat = $conn->query($query); 
$row = $resultkat->fetch_assoc();
}


echo <<<HTML_OUT

<p align="center"><h1 align="center">DØ STILARTSDEFINITIONER 2011</h1></p>

<table class="style">
  <tr>
  <td>
      <table id="definition">
        <tr>
          <th>
            {$row['kategori']}. {$row['navn']}<br />
            {$row['did']}. {$row['stil_navn']}
          </th>
        </tr>
        <tr>
          <td>
            <table id="definition_data">
              <tr>
                <th>OG</th>
                <th>FG</th>
                <th>ABV</th>
                <th>IBU</th>
                <th>EBC</th>
              </tr>
              <tr>
                <td>{$row['ogfra']} - {$row['ogtil']}</td>
                <td>{$row['fgfra']} - {$row['fgtil']}</td>
                <td>{$row['alkoholfra']} - {$row['alkoholtil']}</td>
                <td>{$row['ibufra']} - {$row['ibutil']}</td>
                <td>{$row['ebcfra']} - {$row['ebctil']}</td>
              </tr>
            </table>
          </td>
        </tr>
        <tr>
          <td>
            <h2>Beskrivelse</h2>
            <p>{$row['beskrivelse']}</p>
            <h2>Aroma</h2>
            <p>{$row['aroma']}</p>
            <h2>Udseende</h2>
            <p>{$row['udseende']}</p>
            <h2>Smag</h2>
            <p>{$row['smag']}</p>
            <h2>Krop</h2>
            <p>{$row['krop']}</p>
            <h2>Eksempler</h2>
            <p>{$row['eksempel']}</p>
          </td>
        </tr>
      </table>
    </td>
  <td>       
     <table id="report">
 
      <tr><th>Stilarter</th><th>&nbsp;</th></tr>
      <tr><td>Noter</td><td><div class="arrow"></div></td></tr>
      <tr><td>
      <a href="index.php?page=styledefdonoter.php">Inledende noter</a><br />
      <a href="index.php?page=styledefbjcp.php">Forklaringer</a><br />
      
      
      </td><td>&nbsp;</td></tr>
HTML_OUT;

$query = <<<query

        SELECT *
          FROM stilart_kategori 
query;

$resultkat = $conn->query($query); 

while (($kategori = $resultkat->fetch_assoc()) != NULL)    { 
    
echo <<<HTML_OUT
    

      <tr><td>{$kategori['kid']}. {$kategori['navn']}</td><td><div class="arrow"></div></td></tr>
      <tr><td>
HTML_OUT;

// List alle definitioner i kategorien

$query = <<<query

        SELECT *
          FROM stilart_definition 
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