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

    $usermgr = new UserManager();
    $userid = $usermgr->sessionLoggedIn(session_id());

if  ($userid > 0)
{

    $conn = DBH::opretForbindelse();
        

     $query = "SELECT * FROM bedoemmelse WHERE userid = $userid";
     $result_feedback = $conn->query($query);      
   
    while (($definition = $result_feedback->fetch_assoc()) != NULL)
       {                                                                                                          
       $feedbackliste = "<tr>";
       $feedbackliste .= "<td><a href='index.php?page=bryg.php&beerid=".$definition['id']."'>".$definition['id'].$definition['userid']."</a></td>";
       $feedbackliste .= "<td>".$definition['beskrivelse']."</td>";
       $feedbackliste .= "<td>".$definition['oprettet']."</td>";
       //$feedbackliste .= "<td>".$definition['aroma']."</td>";
       //$feedbackliste .= "<td>".$definition['udseende']."</td>";
       //$feedbackliste .= "<td>".$definition['smag']."</td>";       
       //$feedbackliste .= "<td>".$definition['mundfylde']."</td>";
       //$feedbackliste .= "<td>".$definition['helheds']."</td>";
  
       if ($definition['status'] == "Åben")
       {
       $feedbackliste .= "<td><font color='green'>".$definition['status']."</font></td>";
       }
       else        
       {
       $feedbackliste .= "<td><font color='red'>".$definition['status']."</font></td>";
       }
       
       $feedbackliste .= "</tr>";
       } 
 
    $query = "SELECT * FROM beer WHERE userid = $userid";
    $result_beer = $conn->query($query);

 
    
    while (($definition = $result_beer->fetch_assoc()) != NULL)
       {                                                                                                          
       $brygliste .= "<tr>";
       $brygliste .= "<td><a href='index.php?page=bryg.php&beerid=".$definition['tablebeerid']."'>".$definition['tablebeerid'].$definition['userid']."</a></td>";
       $brygliste .= "<td>".$definition['beername']."</td>";
       $brygliste .= "<td>".$definition['stilart']."</td>";
       $brygliste .= "<td>".$definition['beskrivelse']."</td>";      
               
       if ($definition['uid'] != NULL)
       {
       $brygliste .= "<td><font color='green'>".$definition['uid']."</font></td>";
       }
       else        
       {
       $brygliste .= "<td><a href='index.php?page=crfefo.php&k=".$definition['tablebeerid']."'>Opret</a></td>";
       }


       $brygliste .= "</tr>";
       }    

       
       // Udregning af samtlige bedømmelser. Eventuelt delt op i kategorier.
       $aroma = 60;
       $udseende = 60; 
       $smag = 60;
       $mundfylde = 60; 
       $helhedsindtryk = 60;


        
echo <<<HTML_OUT
<script type="text/javascript">
$(function () {

    $('#container').highcharts({
                
        chart: {
            borderColor: '#EBBA95',
            borderWidth: 2,
           polar: true,
            type: 'line'

        },
        
        title: {
            align: 'center',
            text: 'Samlet vurdering'

        },
        
        pane: {
            size: '90%'
        },
        
        xAxis: {
            categories: ['Aroma', 'Udseende', 'Smag', 'Mundfylde', 
                    'Helhedsindtryk'],
            tickmarkPlacement: 'on',
            lineWidth: 10
        },
            
        yAxis: {
            gridLineInterpolation: 'polygon',
            lineWidth: 1,
            min: 0,
            max: 100
        },
        
        tooltip: {            
        align: 'left',
            shared: true,
            pointFormat: '<span style="color:{series.color}">{series.name}: <b>{point.y:.1f}</b><br/>'
        },
        
        series: [{
            name: 'Alle bedømmelser',
            data: [{$aroma}, {$udseende}, {$smag}, {$mundfylde}, {$helhedsindtryk}],
            pointPlacement: 'on'
        }]
    
    });
});
        </script>       
<script src="chart/js/highcharts.js"></script>
<script src="chart/js/highcharts-more.js"></script>
<script src="chart/js/modules/exporting.js"></script>



<h1>Brygger</h1> 

<p>Tilmeldte events</p> 

<table width="100%" class="brygliste">
  <th>#</th>
  <th>Event</th>
  <th>Fra</th>
  <th>Til</th>
  <th>Bed&oslash;mmelser</th>
  <th>Feedback</th>
$feedbackliste

</table>  
          
<p>Oprettede bed&oslash;mmelser</p> 

<table width="100%" class="brygliste">
  <th>#</th>
  <th>Beskrivelse</th>
  <th>Oprettet</th>
  <th>Aroma</th>
  <th>Udseende</th>
  <th>Smag</th>
  <th>Mundfylde</th>
  <th>Helhedsindtryk</th>
  <th>Status</th>

  <tr><td valign="right"><a href='index.php?page=crbrfo.php'>Opret bed&oslash;mmelse</a></td>

</tr>
  
  
</table>         

<p>Dine bryg</p> 

<table border="1" class="brygliste">
<th>#</th>
<th>Navn</th>
<th>Stilart</th>
<th>Beskrivelse</th>
<th>Feed</th>
$brygliste



</tr>
</table>
<a href='index.php?page=crbrfo.php'>Opret bryg</a>
HTML_OUT;
    


}
else
{
    echo <<<HTML_OUT

    
    
  

    
<table align="center" bgcolor="white" height="700px" width="100%" border="0">
  <tr>
    <td>

<form id="login" action="index.php?page=liusco.php" method="post">
    <h1>BEERFEED</h1>
    <fieldset id="inputs">
        <input name="user_name" id="username" type="text" placeholder="Brugernavn" autofocus required>   
        <input name="user_pass" id="password" type="password" placeholder="Adgangskode" required>
    </fieldset>
    <fieldset id="actions">
        <input type="submit" id="submit" value="Log in">
        <a href="">Glemt adgangskode?</a><a href="index.php?page=crusfo.php">Ny bruger</a>
    </fieldset>
</form>
 
    </td>
  </tr>
</table>
HTML_OUT;
    
    
    
}








?>