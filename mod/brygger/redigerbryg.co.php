<?php

    $beerid = $_REQUEST['beerid'];
    $usermgr = new UserManager();
    $userid = $usermgr->sessionLoggedIn(session_id());

     $conn = DBH::opretForbindelse();    
    $query = "SELECT * FROM beer WHERE userid = $userid AND tablebeerid = $beerid";
    $result = $conn->query($query); 
 
 
        $aroma_1 = 61;
        $udseende_1 = 62; 
        $smag_1 = 63;
        $mundfylde_1 = 64; 
        $helhedsindtryk_1 = 65;
        $aroma_2 = 71;
        $udseende_2 = 72; 
        $smag_2 = 73;
        $mundfylde_2 = 74; 
        $helhedsindtryk_2 = 75;
        $aroma_3 = 81;
        $udseende_3 = 82; 
        $smag_3 = 83;
        $mundfylde_3 = 84; 
        $helhedsindtryk_3 = 85;
        
    $definition = $result->fetch_assoc();

echo <<<htmltekst

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
            align: 'left',
            text: '{$definition['beername']}'

        },
        
        pane: {
            size: '90%'
        },
        
        xAxis: {
            categories: ['Aroma', 'Udseende', 'Smag', 'Mundfylde', 
                    'Helhedsindtryk'],
            tickmarkPlacement: 'on',
            lineWidth: 0
        },
            
        yAxis: {
            gridLineInterpolation: 'polygon',
            lineWidth: 1,
            min: 0,
            max: 100
        },
        
        tooltip: {
            shared: true,
            pointFormat: '<span style="color:{series.color}">{series.name}: <b>{point.y:.1f}</b><br/>'
        },
        
        series: [{
            name: 'Anonym',
            data: [{$aroma_1}, {$udseende_1}, {$smag_1}, {$mundfylde_1}, {$helhedsindtryk_1}],
            pointPlacement: 'on'
        }, {
            name: 'Forening',
            color: 'red',
            data: [{$aroma_2}, {$udseende_2}, {$smag_2}, {$mundfylde_2}, {$helhedsindtryk_2}],
            pointPlacement: 'on'
        }, {
            name: 'DM i ølbrygning 2012',
            color: 'green',
            data: [{$aroma_3}, {$udseende_3}, {$smag_3}, {$mundfylde_3}, {$helhedsindtryk_3}],
            pointPlacement: 'on'

        }]
    
    });
});
        </script>       
<script src="chart/js/highcharts.js"></script>
<script src="chart/js/highcharts-more.js"></script>
<script src="chart/js/modules/exporting.js"></script>



{$definition['tablebeerid']}{$definition['userid']}

<p>Bryg:</p> <div class='edit' id='beer_beername_tablebeerid_{$definition['tablebeerid']}'>{$definition['beername']}</div>
<p>Stilart:</p> <div class='edit' id='beer_stilart_tablebeerid_{$definition['tablebeerid']}'>{$definition['stilart']}</div>
<p>Beskrivelse:</p> <div class='edit_area' id='beer_beskrivelse_tablebeerid_{$definition['tablebeerid']}'>{$definition['beskrivelse']}</div>
<p>Brygget:</p> <div class='edit_area' id='beer_brygget_tablebeerid_{$definition['tablebeerid']}'>{$definition['brygget']}</div>

<p>
<table width='300px' border='1'>
  <tr>
    <th>OG:</th> 
    <th>FG:</th> 
    <th>ALK:</th>  
    <th>IBU:</th>   
    <th>EBC:</th>
  </tr>
  <tr>
    <td><div class='edit' id='beer_og_tablebeerid_{$definition['tablebeerid']}'>{$definition['og']}</div></td>
    <td><div class='edit' id='beer_fg_tablebeerid_{$definition['tablebeerid']}'>{$definition['fg']}</div></td> 
    <td><div class='edit' id='beer_alk_tablebeerid_{$definition['tablebeerid']}'>{$definition['alk']}</div>   </td>
    <td><div class='edit' id='beer_ibu_tablebeerid_{$definition['tablebeerid']}'>{$definition['ibu']}</div></td> 
    <td> <div class='edit' id='beer_ebc_tablebeerid_{$definition['tablebeerid']}'>{$definition['ebc']}</div></td>
  </tr>       
</table>    
</p>     
    
    
  <div id="container" style="min-width: 400px; max-width: 400px; height: 300px; margin: 0 auto"></div>




     
htmltekst;


?>

