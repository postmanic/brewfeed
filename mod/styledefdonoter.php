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
    <p>Inledende noter til bryggere og øldommere:
    <ol>
    <li>Stilartsbeksrivelsen er blevet grundlæggende revideret i 2011. Bemærk nye stilarter er kommet til, andre er udgået og nogle er slået sammen. Derfor er nummereringen også ændret.
    <li>Den enkelte stilart er systematisk beskrevet, så det for hver karakter er angivet om den
er fraværende eller kan være til stede på svagt, middel eller kraftigt niveau.
Øldommere skal være særligt opmærksomme på disse angivelser, som definerer hvad
der er den enkelte stilarts hovedkarakter. Normalt nævnes først malt, derefter humle,
derefter øvrige karakterer uanset at malten måske ikke er det mest markante.
<li>Karakterord angivet under aroma, vil gå igen i smagen, med mindre andet er angivet.
<li>Stilartsbeskrivelsen skal først og fremmest ses som et redskab til konkurrencer, og ikke
som en komplet kategorisering af verdens kommercielle øl. Derfor vil der nogen steder i
stilartsbeskrivelse stå at den skal indeholde eller ikke må indeholde bestemte
elementer. Dette for at understrege at det er noget dommerne skal være
opmærksomme på ved bedømmelse af konkurrencer.
<li>I visse stilarter skal grundstilarten og tilsætningerne angives. Husk dette når der
sendes øl ind til konkurrencer.
<li>Mange stilarter er brede, og defineres ikke af en enkelt kommerciel øl. F.eks. stilarten
Engelsk strong bitter/pale ale hvor Fullers ESB kun er et blandt mange forskelligartede
eksempler.
<li>De kommercielle stilartseksempler er nævnt i prioriteret rækkefølge. Det første
eksempel er således det mest klassiske, og sammenlignes de første 2 til 3 eksempler
giver det et godt indtryk af stilartens bredde.
<li>Når en øl vurderes skal der fokuseres på helheden og ikke på enkelte elementer hver
for sig. Læs først hele den pågældende stilart igennem og forstå dens karakter før øllet
bedømmes.
      
      
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
          <p align="center"><a target="_blank" href="http://www.beerxml.com">BEERXML</a> || <a target="_blank" href="http://www.beer.com">BJCP2008 as XML</a> || <a target="_blank" href="http://www.beer.dk">DØ2011 as XML</a> </p>

HTML_OUT;

  


?>