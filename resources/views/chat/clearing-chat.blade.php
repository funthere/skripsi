@extends('layouts.main')

@section('content')

@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
@if (session('error'))
    <div class="alert alert-warning">
        {{ session('error') }}
    </div>
@endif

<div class="col-lg-12">
    <div class="panel panel-info">
        <div class="panel-heading">
            <center><b>{{ $project->project_name or '' }}</b></center>
        </div>
        <div class="panel-heading">
            Clearing Chat
        </div>
        <br/>
        <br/>

        {!! Form::open(['route' => ['chat.clear.save']]) !!}
            <div class="form-group">
                <label for="email" class="col-md-4 control-label">Project</label> 
               <div class="col-md-7">

                    <select id="project_id" name="project_id" class="form-control"  <?php echo auth()->user()->role == "member" ? 'disabled' : '' ?>>
                        <?php

                        foreach($projects as $key => $value):
                            $chk = '';
                    ?>
                        <option value="<?php echo $value->id; ?>" <?php echo $chk; ?>><?php echo $value->project_name; ?></option>
                    <?php
                        endforeach;
                    ?>
                    </select>
               </div>
            </div>
            <br/><br/><br/>
            <div class="form-group">
                <label class="col-md-4 control-label">From</label>
                <div class="col-md-8"> 
                    <input id="dateFrom" type="date" name="dateFrom" required>
                    <label for="to">&nbsp;To</label>
                    <input id="dateTo" type="date" name="dateTo" required>
                </div>
            </div>
            <br/><br/>
            <div class="form-group">
                <div class="col-md-4"> </div>
                <div class="col-md-5">
                    <button class="btn btn-primary">Clear Chat</button>
                </div>
            </div>
            <br/><br/><br/>
        </div>
    </div>
</div>
@endsection
