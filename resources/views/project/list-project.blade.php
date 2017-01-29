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
    foreach ($datas->where('status_progress', 'on_going') as $data) { ?>
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
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <?php }
    ?>
    <br><br><hr>
</div>
<div class="row">
<h3>&nbsp;&nbsp;&nbsp;<i class="fa fa-check-square-o" aria-hidden="true"></i> Completed Proyek</h3>
    <?php
    foreach ($datas->where('status_progress', 'complete') as $data) { ?>
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
</div>
@endsection