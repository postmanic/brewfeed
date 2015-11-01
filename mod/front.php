<?php

echo <<<HTMLOUT

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
            text: 'Moosebrew by RedFox (DØ - 12B)'

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
            lineWidth: 5,
            min: 0,
            max: 100
        },
        
        tooltip: {
            shared: true,
            pointFormat: '<span style="color:{series.color}">{series.name}: <b>{point.y:.1f}</b><br/>'
        },
        
        series: [{
            name: 'Anonym',
            data: [70, 80, 90, 100, 100],
            pointPlacement: 'on'
        }, {
            name: 'Forening',
            color: 'red',
            data: [80, 70, 80, 100, 80],
            pointPlacement: 'on'
        }, {
            name: 'DM i ølbrygning 2012',
            color: 'green',
            data: [75, 65, 60, 80, 70],
            pointPlacement: 'on'            
            
        }]
    
    });
});
        </script>       
<script src="chart/js/highcharts.js"></script>
<script src="chart/js/highcharts-more.js"></script>
<script src="chart/js/modules/exporting.js"></script>


<p>

I beerfeed kan du oprette dit bryg til bedømmelse. Det får en unik QR kode som kan skannes til brug for feedback.
 Du kan oprette forskellige former for feedback. Du kan oprette dit bryg og sætte det til bedømmelse hvor alle kan 
Opret bryg og tilmeld det events udskriv etiket som påsættes flasken som kan skannes af dommerne der kan give feedback.



</p>



<table align="center" bgcolor="white" height="700px" width="100%" border="0">
<tr>
<td valign="top">
<p><div id="container" style="min-width: 600px; max-width: 600px; height: 400px; margin: 0 auto"></div>    </p>
</td>
</tr>
</table>

HTMLOUT;

?>