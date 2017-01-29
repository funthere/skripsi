@extends('layouts.main')

@section('content')

@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
@if(auth()->user()->role != "member")
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="btn btn-primary" href='{!! url('/add-project'); !!}'>Add New Project</a>
@endif
<div class="row">
<h3>&nbsp;&nbsp;&nbsp;<i class="fa fa-fighter-jet" aria-hidden="true"></i> Ongoing Proyek</h3>
    <?php
    $counter = 1;
    foreach ($datas as $data) { ?>
    <div class="col-lg-6">
        <div class="panel panel-primary">
            <div class="panel-heading"><center><?php echo $data['project_name'] ?></center>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <?php echo $data['description'] ?><br/>
                <b>Start:<?php echo $data->start_datetime ?> |
                End: <?php echo $data->finish_datetime ?></b><br/>
                <a class="btn btn-info" href='{!! url('/view-project/'.$data['id']); !!}'> View Detail </a>
                <div id="container-chart-{{$counter}}" class="project-chart" style="height: 150px; width: 150px;"></div>
                <input type="hidden" id="data-closed{{$counter}}" value="{{$data->taskClosed}}">
                <input type="hidden" id="data-total{{$counter}}" value="{{$data->taskTotal}}">
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <?php
        $counter++;
        }
    ?>
    <br><br><hr>
</div>
<div class="row">
<h3>&nbsp;&nbsp;&nbsp;<i class="fa fa-check-square-o" aria-hidden="true"></i> Completed Proyek</h3>
    <?php
    foreach ($projects2 as $data) { ?>
    <div class="col-lg-6">
        <div class="panel panel-primary">
            <div class="panel-heading"><center><?php echo $data['project_name'] ?></center>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <?php echo $data['description'] ?><br/>
                <b>Start:<?php echo $data->start_datetime ?>
                End: <?php echo $data->finish_datetime ?></b><br/>
                <a class="btn btn-info" href='{!! url('/view-project/'.$data['id']); !!}'> View Detail </a>
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <?php }
    ?>
        <script src="/js/highchart/highcharts.js"></script>
@endsection

@section('script-footer')
<script type="text/javascript">

 $(function() {
    Highcharts.setOptions({
     colors: ['#7cb5ec', '#ddd']
    });

    var i = 1;
    for (i = 1 ; i <= <?php echo $counter ?>; i++) {
        var taskClosed = parseInt($('#data-closed'+i).val(), 10);
        var taskTotal = parseInt($('#data-total'+i).val(), 10);
       
        var chart = new Highcharts.Chart({
            chart: {
                renderTo: 'container-chart-'+i,
                type: 'pie'
            },
            credits: {
                enabled: false
            },
            title: {
                text: '',
                y: 5,
                verticalAlign: 'bottom'
            },
            tooltip: {
                enabled: false
            },
            plotOptions: {
                pie: {
                    borderColor: '#000000',
                    innerSize: '60%',
                    dataLabels: {
                        enabled: false
                    }
                }
            },
            series: [{
                data: [
                    ['active', taskClosed],
                    ['closed', 100 - taskClosed]
                    ]}]
        },
        // using 

        function(chart) { // on complete
            var xpos = '50%';
            var ypos = '50%';
            var circleradius = 40;

            // Render the circle
            chart.renderer.circle(xpos, ypos, circleradius).attr({
                fill: '#ffffff',
            }).add();

            // Render the text 
            chart.renderer.text(chart.series[0].data[0].y + '%', 62, 80).css({
                width: circleradius * 2,
                color: '#000000',
                fontSize: '16px',
                textAlign: 'center'
            }).attr({
                // why doesn't zIndex get the text in front of the chart?
                zIndex: 999
            }).add();
        });

    
    }

});

 
</script>
@stop