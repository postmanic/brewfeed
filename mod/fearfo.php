<?php

// Create User Form


$beerid = isset($_REQUEST['beerid']) ? md5($_REQUEST['beerid']) : NULL;


// Check om bedømmelsen eksisterer. 
// Check om vedkommende er tildelt denne bedømmelse. 

echo $beerid;

echo <<<HTML_OUT

<p><h1>Bedømmelsesark</h1></p>

<div id="tabs">
<ul>
<li><a href="#tabs-0">Flaske</a></li>
<li><a href="#tabs-1">Aroma</a></li>
<li><a href="#tabs-2">Udseende</a></li>
<li><a href="#tabs-3">Smag</a></li>
<li><a href="#tabs-4">Mundfylde</a></li>
<li><a href="#tabs-5">Helhedsindtryk</a></li>
<li><a href="#tabs-6">Kommentarer til bryggeren</a></li>
</ul>


<div height="100px" id="tabs-0">

ID på bryg,
Dato og tidspunkt for bed&oslash;mmelse,
Bed&oslash;mmer




</div>
<div height="100px" id="tabs-1">
<form name="signup" action="index.php?page=crbrco.php" method="post">

<table align="center" width="100%" height="100px" bgcolor ="white">     

<table>
   <tr>
      <td width="60%">
         <table>
            <tr>
               <th></th>
               <th><a href="#" title="Fraværende">F</a></th>
               <th><a href="#" title="Svag">S</a></th>
                 <th><a href="#" title="Middel">M</a></th>
                 <th><a href="#" title="Kraftig">K</a></th>
                 <th>&nbsp;</th>
              </tr>           
              <tr>
                 <td>Malt</td>
                 <td><input type="checkbox" name="alkohol"></td>
                 <td><input type="checkbox" name="alkohol"></td>
                 <td><input type="checkbox" name="alkohol"></td>
                 <td><input type="checkbox" name="alkohol"></td>
                 <td> 
                    <select>
                      <option value="0"></option>
                      <option value="1">+</option>
                      <option value="2">OK</option>
                      <option value="3">-</option>
                    </select>
                 </td>
              </tr>
              <tr>
                 <td>
                    Humle
                 </td>
                 <td>
                    <input type="checkbox" name="alkohol">
                 </td>
                 <td>
                    <input type="checkbox" name="alkohol">
                 </td>
                 <td>
                    <input type="checkbox" name="alkohol">
                 </td>
                 <td>
                    <input type="checkbox" name="alkohol">
                 </td>
                 <td>
                    <select>
                      <option value="0"></option>
                      <option value="1">+</option>
                      <option value="2">OK</option>
                      <option value="3">-</option>
                    </select>
                 </td>
              </tr>
              <tr>
                 <td>
                    Estere
                 </td>
                 <td>
                    <input type="checkbox" name="alkohol">
                 </td>
                 <td>
                    <input type="checkbox" name="alkohol">
                 </td>
                 <td>
                    <input type="checkbox" name="alkohol">
                 </td>
                 <td>
                    <input type="checkbox" name="alkohol">
                 </td>
                 <td>
                    <select>
                      <option value="0"></option>
                      <option value="1">+</option>
                      <option value="2">OK</option>
                      <option value="3">-</option>
                    </select>
                 </td>
              </tr>
              <tr>
                 <td>
                    Fenoler
                 </td>
                 <td>
                    <input type="checkbox" name="alkohol">
                 </td>
                 <td>
                    <input type="checkbox" name="alkohol">
                 </td>
                 <td>
                    <input type="checkbox" name="alkohol">
                 </td>
                 <td>
                    <input type="checkbox" name="alkohol">
                 </td>
                 <td>
                    <select>
                      <option value="0"></option>
                      <option value="1">+</option>
                      <option value="2">OK</option>
                      <option value="3">-</option>
                    </select>
                 </td>
              </tr>
              <tr>
                 <td>
                    Alkohol
                 </td>
                 <td>
                    <input type="checkbox" name="alkohol">
                 </td>
                 <td>
                    <input type="checkbox" name="alkohol">
                 </td>
                 <td>
                    <input type="checkbox" name="alkohol">
                 </td>
                 <td>
                    <input type="checkbox" name="alkohol">
                 </td>
                 <td>
                    <select>
                      <option value="0"></option>
                      <option value="1">+</option>
                      <option value="2">OK</option>
                      <option value="3">-</option>
                    </select>
                 </td>
              </tr>
              <tr>
                 <td>
                    <input size="10" type="text" name="fritekst2i">
                 </td>
                 <td>
                    <input type="checkbox" name="alkohol">
                 </td>
                 <td>
                    <input type="checkbox" name="alkohol">
                 </td>
                 <td>
                    <input type="checkbox" name="alkohol">
                 </td>
                 <td>
                    <input type="checkbox" name="alkohol">
                 </td>
                 <td>
                    <select>
                      <option value="0"></option>
                      <option value="1">+</option>
                      <option value="2">OK</option>
                      <option value="3">-</option>
                    </select>
                 </td>
              </tr>
              <tr>
                 <td>
                    <input size="10" type="text" name="fritekst2i">
                 </td>
                 <td>
                    <input type="checkbox" name="alkohol">
                 </td>
                 <td>
                    <input type="checkbox" name="alkohol">
                 </td>
                 <td>
                    <input type="checkbox" name="alkohol">
                 </td>
                 <td>
                    <input type="checkbox" name="alkohol">
                 </td>
                 <td>
                    <select>
                      <option value="0"></option>
                      <option value="1">+</option>
                      <option value="2">OK</option>
                      <option value="3">-</option>
                    </select>
                 </td>
              </tr>
           </table>
           
        </td>
        <td>
            <table>
              <tr>
                 <td>
                    <input type="checkbox" name="acetaldehyd">
                 </td>
                 <td>
                    Acetaldehyd
                 </td>
                 <td>
                    <input type="checkbox" name="klorfenoler">
                 </td>
                 <td>
                    Klorfenoler
                 </td>
              </tr>
              <tr>
                 <td>
                    <input type="checkbox" name="alkohol">
                 </td>
                 <td>
                    <a href="#" title="Svag duft af alkohol, føles varmende når man drikker øllet.">Alkohol</a>
                 </td>
                 <td>
                    <input type="checkbox" name="oxideret">
                 </td>
                 <td>
                    Oxideret
                 </td>
              </tr>
              <tr>
                 <td>
                    <input type="checkbox" name="dms">
                 </td>
                 <td>
                    DMS
                 </td>
                 <td>
                    <input type="checkbox" name="sol">
                 </td>
                 <td>
                    Sol
                 </td>
              </tr>
              <tr>
                 <td>
                    <input type="checkbox" name="diacetyl">
                 </td>
                 <td>
                    Diacetyl
                 </td>
                 <td>
                    <input type="checkbox" name="sur">
                 </td>
                 <td>
                    Sur
                 </td>
              </tr>
              <tr>
                 <td>
                    <input type="checkbox" name="estere">
                 </td>
                 <td>
                    Estere
                 </td>
                 <td>
                    <input type="checkbox" name="svovl">
                 </td>
                 <td>
                    Svovl
                 </td>
              </tr>
              <tr>
                 <td>
                    <input type="checkbox" name="fenolisk">
                 </td>
                 <td>
                    Fenolisk
                 </td>
                 <td>
                    <input type="checkbox" name="fritekst2c">
                 </td>
                 <td>
                    <input type="text" name="fritekst2i">
                 </td>
              </tr>
              <tr>
                 <td>
                    <input type="checkbox" name="fortynder">
                 </td>
                 <td>
                    Fortynder
                 </td>
                 <td>
                    <input type="checkbox" name="fritekst1c">
                 </td>
                 <td>
                    <input type="text" name="fritekst1i">
                 </td>
              </tr>
              <tr>
                 <td>
                    <input type="checkbox" name="gær">
                 </td>
                 <td>
                   Gær
                 </td>
                 <td>
                    &nbsp;
                 </td>
                 <td>
                    &nbsp;
                 </td>
              </tr>
              <tr>
                 <td>
                    &nbsp;
                 </td>
                 <td>
                    &nbsp;
                 </td>
                 <td>
                    &nbsp;
                 </td>
                 <td>
                    &nbsp;
                 </td>
              </tr>
           </table>
           
           
        </td>
     </tr>
     <tr>
        <td colspan="2"> 
           <textarea name="beskrivelse" rows="4" cols="50"></textarea>
        </td>

     </tr>
          <tr>
        <td colspan="2">
           Score: <select name="score">
                    <option value="0"></option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                  </select>
        </td>

     </tr>
  </table>
</form>
</div>
<div height="100px" id="tabs-2">
         <table>
            <tr>
    <td colspan="2">
           Farve: <select name="score">
                    <option value="0"></option>
                    <option value="1">EBC 3 - 6, Lys halmgul</option>
                    <option value="2">EBC 7 - 10, Halmgul</option>
                    <option value="3">EBC 11 - 15, Gylden</option>
                    <option value="4">EBC 15 - 25, Ravfarvet</option>
                    <option value="5">EBC 25 - 35, Kobberfarvet</option>
                    <option value="6">EBC 35 - 45, M&oslash;rk kobberfarvet / lys brun</option>
                    <option value="7">EBC 45 - 60, R&oslash;dbrun / brun</option>
                    <option value="8">EBC 60 - 80, M&oslash;rk r&oslash;dbrun / m&oslash;rkebrun</option>
                    <option value="9">EBC 80 - 100, R&oslash;dsort / brunsort</option>
                    <option value="10">EBC 100+, Sort</option>

                  </select>
        </td>
        </tr>
             <tr>
        <td colspan="2"> 
           <textarea name="beskrivelse" rows="4" cols="50"></textarea>
        </td>

     </tr>
        <tr>
     <td colspan="2">
           Score: <select name="score">
                    <option value="0"></option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>

                  </select>
        </td>
      </tr>
  </table>

</div>
<div id="tabs-3">
<table>
   <tr>
      <td>
         <table>
            <tr>
               <th></th>
               <th>F</th>
               <th>S</th>
                 <th>M</th>
                 <th>K</th>
                 <th>&nbsp;</th>
              </tr>           
              <tr>
                 <td>Malt</td>
                 <td><input type="checkbox" name="alkohol"></td>
                 <td><input type="checkbox" name="alkohol"></td>
                 <td><input type="checkbox" name="alkohol"></td>
                 <td><input type="checkbox" name="alkohol"></td>
                 <td>
                    <select>
                      <option value="0"></option>
                      <option value="1">+</option>
                      <option value="2">OK</option>
                      <option value="3">-</option>
                    </select>
                 </td>
              </tr>
              <tr>
                 <td>
                    Humle
                 </td>
                 <td>
                    <input type="checkbox" name="alkohol">
                 </td>
                 <td>
                    <input type="checkbox" name="alkohol">
                 </td>
                 <td>
                    <input type="checkbox" name="alkohol">
                 </td>
                 <td>
                    <input type="checkbox" name="alkohol">
                 </td>
                 <td>
                    <select>
                      <option value="0"></option>
                      <option value="1">+</option>
                      <option value="2">OK</option>
                      <option value="3">-</option>
                    </select>
                 </td>
              </tr>
              <tr>
                 <td>
                    Alkohol
                 </td>
                 <td>
                    <input type="checkbox" name="alkohol">
                 </td>
                 <td>
                    <input type="checkbox" name="alkohol">
                 </td>
                 <td>
                    <input type="checkbox" name="alkohol">
                 </td>
                 <td>
                    <input type="checkbox" name="alkohol">
                 </td>
                 <td>
                    <select>
                      <option value="0"></option>
                      <option value="1">+</option>
                      <option value="2">OK</option>
                      <option value="3">-</option>
                    </select>
                 </td>
              </tr>
              <tr>
                 <td>
                    Eftersmag
                 </td>
                 <td>
                    <input type="checkbox" name="alkohol">
                 </td>
                 <td>
                    <input type="checkbox" name="alkohol">
                 </td>
                 <td>
                    <input type="checkbox" name="alkohol">
                 </td>
                 <td>
                    <input type="checkbox" name="alkohol">
                 </td>
                 <td>
                    <select>
                      <option value="0"></option>
                      <option value="1">+</option>
                      <option value="2">OK</option>
                      <option value="3">-</option>
                    </select>
                 </td>
              </tr>
              <tr>
                 <td>
                    Efterbitterhed
                 </td>
                 <td>
                    <input type="checkbox" name="alkohol">
                 </td>
                 <td>
                    <input type="checkbox" name="alkohol">
                 </td>
                 <td>
                    <input type="checkbox" name="alkohol">
                 </td>
                 <td>
                    <input type="checkbox" name="alkohol">
                 </td>
                 <td>
                    <select>
                      <option value="0"></option>
                      <option value="1">+</option>
                      <option value="2">OK</option>
                      <option value="3">-</option>
                    </select>
                 </td>
              </tr>
              <tr>
                 <td>
                    <input size="10" type="text" name="fritekst2i">
                 </td>
                 <td>
                    <input type="checkbox" name="alkohol">
                 </td>
                 <td>
                    <input type="checkbox" name="alkohol">
                 </td>
                 <td>
                    <input type="checkbox" name="alkohol">
                 </td>
                 <td>
                    <input type="checkbox" name="alkohol">
                 </td>
                 <td>
                    <select>
                      <option value="0"></option>
                      <option value="1">+</option>
                      <option value="2">OK</option>
                      <option value="3">-</option>
                    </select>
                 </td>
              </tr>
              <tr>
                 <td>
                    <input size="10" type="text" name="fritekst2i">
                 </td>
                 <td>
                    <input type="checkbox" name="alkohol">
                 </td>
                 <td>
                    <input type="checkbox" name="alkohol">
                 </td>
                 <td>
                    <input type="checkbox" name="alkohol">
                 </td>
                 <td>
                    <input type="checkbox" name="alkohol">
                 </td>
                 <td>
                    <select>
                      <option value="0"></option>
                      <option value="1">+</option>
                      <option value="2">OK</option>
                      <option value="3">-</option>
                    </select>
                 </td>
              </tr>
           </table>
           
        </td>
        <td>
            <table>
              <tr>
                 <td>
                    <input type="checkbox" name="acetaldehyd">
                 </td>
                 <td>
                    Acetaldehyd
                 </td>
                 <td>
                    <input type="checkbox" name="klorfenoler">
                 </td>
                 <td>
                    Klorfenoler
                 </td>
              </tr>
              <tr>
                 <td>
                    <input type="checkbox" name="alkohol">
                 </td>
                 <td>
                    Alkohol
                 </td>
                 <td>
                    <input type="checkbox" name="oxideret">
                 </td>
                 <td>
                    Oxideret
                 </td>
              </tr>
              <tr>
                 <td>
                    <input type="checkbox" name="dms">
                 </td>
                 <td>
                    DMS
                 </td>
                 <td>
                    <input type="checkbox" name="sol">
                 </td>
                 <td>
                    Sol
                 </td>
              </tr>
              <tr>
                 <td>
                    <input type="checkbox" name="diacetyl">
                 </td>
                 <td>
                    Diacetyl
                 </td>
                 <td>
                    <input type="checkbox" name="sur">
                 </td>
                 <td>
                    Sur
                 </td>
              </tr>
              <tr>
                 <td>
                    <input type="checkbox" name="estere">
                 </td>
                 <td>
                    Estere
                 </td>
                 <td>
                    <input type="checkbox" name="svovl">
                 </td>
                 <td>
                    Svovl
                 </td>
              </tr>
              <tr>
                 <td>
                    <input type="checkbox" name="fenolisk">
                 </td>
                 <td>
                    Fenolisk
                 </td>
                 <td>
                    <input type="checkbox" name="fritekst2c">
                 </td>
                 <td>
                    <input type="text" name="fritekst2i">
                 </td>
              </tr>
              <tr>
                 <td>
                    <input type="checkbox" name="fortynder">
                 </td>
                 <td>
                    Fortynder
                 </td>
                 <td>
                    <input type="checkbox" name="fritekst1c">
                 </td>
                 <td>
                    <input type="text" name="fritekst1i">
                 </td>
              </tr>
              <tr>
                 <td>
                    <input type="checkbox" name="gær">
                 </td>
                 <td>
                   Gær
                 </td>
                 <td>
                    &nbsp;
                 </td>
                 <td>
                    &nbsp;
                 </td>
              </tr>
              <tr>
                 <td>
                    &nbsp;
                 </td>
                 <td>
                    &nbsp;
                 </td>
                 <td>
                    &nbsp;
                 </td>
                 <td>
                    &nbsp;
                 </td>
              </tr>
           </table>
           
           
        </td>
     </tr>
     <tr>
        <td colspan="2">
           <textarea name="beskrivelse" rows="4" cols="50"></textarea>
        </td>

     </tr>
          <tr>
        <td colspan="2">
           Score: <select name="score">
                    <option value="0"></option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                  </select>
        </td>

     </tr>
  </table>
</div>
<div id="tabs-4">

Mundfylde

</div>
<div id="tabs-5">

Overordnet betragtning

</div>

<div id="tabs-6">

Overordnet betragtning

</div>

</div>








HTML_OUT;
  

  
  
  
  
  
  
  
  
  

?>