<?php echo $this->element('admin/alerts', array('clients' => $clients, 'totalSold' => $totalSold, 'messages' => $messages));?>

<br />
<?php echo $this->Html->script('highcharts/js/highcharts');?>
<?php echo $this->Html->script('highcharts/js/modules/exporting');?>
<script type='text/javascript' src='https://www.google.com/jsapi'></script>

<div class="row">
    <div class="col-md-12">
        <div id="sellsByMonth" style="min-width: 270px; height: 350px; margin: 0 auto"></div>
    </div>
</div>

<br/>
<br/>
<hr/>

<div class="row">
    <div class="col-md-12">
        <div id="sellsByWeek" style="min-width: 270px; height: 350px; margin: 0 auto"></div>
    </div>
</div>

<br/>
<br/>
<hr/>

<div class="row">
    <div class="col-md-3">
        <div id="chart_div" style="min-width: 270px; height: 300px; margin: 0 auto"></div>
    </div>
</div>

<hr/>

<div class="row">
    <div class="col-md-6">
        <div id="bestProducts" style="min-width: 270px; height: 350px; margin: 0 auto"></div>
    </div>

    <div class="col-md-6">
        <div id="worstProducts" style="min-width: 270px; height: 350px; margin: 0 auto"></div>
    </div>
</div>

<br/>
<br/>
<hr/>

<div class="row">
    <div class="col-md-6">
        <div id="bestClients" style="min-width: 270px; height: 350px; margin: 0 auto"></div>
    </div>

    <div class="col-md-6">
        <div id="worstClients" style="min-width: 270px; height: 350px; margin: 0 auto"></div>
    </div>
</div>

<?php echo $this->Html->script('charts')?>

<script type="text/javascript">
    var sellsMonth = '<?php echo $sellsMonth; ?>';
    var sellsWeek = '<?php echo $sellsWeek; ?>';
    var bestProduct = '<?php echo $bestProducts?>';
    var worstProduct = '<?php echo $worstProducts?>';
    var bestClient = '<?php echo $bestClients?>';
    var worstClient = '<?php echo $worstClients?>';;
    $(document).ready(function (){
        sellsByMonth(sellsMonth);
        sellsByWeek(sellsWeek);
        bestProducts(bestProduct);
        worstProducts(worstProduct);
        bestClients(bestClient);
        worstClients(worstClient);
    });
    
</script>

<script type='text/javascript'>
    var percentage = parseFloat("<?php echo $percentage[0]['percentage']?>");
    
    google.load('visualization', '1', {packages:['gauge']});
        google.setOnLoadCallback(drawChart);
        function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Label', 'Value'],
          ['Meta %', percentage]
        ]);

        var options = {
          width: 300, height: 300,
          redFrom: 90, redTo: 100,
          yellowFrom:75, yellowTo: 90,
          minorTicks: 5
        };

        var chart = new google.visualization.Gauge(document.getElementById('chart_div'));
        chart.draw(data, options);
    }
</script>