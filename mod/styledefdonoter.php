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

<p align="center"><h1 align="center">D� STILARTSDEFINITIONER 2011</h1></p>

<table class="style">
  <tr>
  <td> 
    <p>Inledende noter til bryggere og �ldommere:
    <ol>
    <li>Stilartsbeksrivelsen er blevet grundl�ggende revideret i 2011. Bem�rk nye stilarter er kommet til, andre er udg�et og nogle er sl�et sammen. Derfor er nummereringen ogs� �ndret.
    <li>Den enkelte stilart er systematisk beskrevet, s� det for hver karakter er angivet om den
er frav�rende eller kan v�re til stede p� svagt, middel eller kraftigt niveau.
�ldommere skal v�re s�rligt opm�rksomme p� disse angivelser, som definerer hvad
der er den enkelte stilarts hovedkarakter. Normalt n�vnes f�rst malt, derefter humle,
derefter �vrige karakterer uanset at malten m�ske ikke er det mest markante.
<li>Karakterord angivet under aroma, vil g� igen i smagen, med mindre andet er angivet.
<li>Stilartsbeskrivelsen skal f�rst og fremmest ses som et redskab til konkurrencer, og ikke
som en komplet kategorisering af verdens kommercielle �l. Derfor vil der nogen steder i
stilartsbeskrivelse st� at den skal indeholde eller ikke m� indeholde bestemte
elementer. Dette for at understrege at det er noget dommerne skal v�re
opm�rksomme p� ved bed�mmelse af konkurrencer.
<li>I visse stilarter skal grundstilarten og tils�tningerne angives. Husk dette n�r der
sendes �l ind til konkurrencer.
<li>Mange stilarter er brede, og defineres ikke af en enkelt kommerciel �l. F.eks. stilarten
Engelsk strong bitter/pale ale hvor Fullers ESB kun er et blandt mange forskelligartede
eksempler.
<li>De kommercielle stilartseksempler er n�vnt i prioriteret r�kkef�lge. Det f�rste
eksempel er s�ledes det mest klassiske, og sammenlignes de f�rste 2 til 3 eksempler
giver det et godt indtryk af stilartens bredde.
<li>N�r en �l vurderes skal der fokuseres p� helheden og ikke p� enkelte elementer hver
for sig. L�s f�rst hele den p�g�ldende stilart igennem og forst� dens karakter f�r �llet
bed�mmes.
      
      
    </td>
  <td>    
     <table id="report">
      <tr><th width="200">Stilarter</th><th width="50">&nbsp;</th></tr>
      <tr><td>Noter</td><td><div class="arrow"></div></td></tr>
      <tr><td>
      <a href="index.php?page=styledefbjcp.php">Inledende noter</a><br />
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
          <p align="center"><a target="_blank" href="http://www.beerxml.com">BEERXML</a> || <a target="_blank" href="http://www.beer.com">BJCP2008 as XML</a> || <a target="_blank" href="http://www.beer.dk">D�2011 as XML</a> </p>

HTML_OUT;

  


?>