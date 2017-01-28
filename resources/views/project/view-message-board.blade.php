@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"></a><center>{{ $project->project_name or '' }}</center> 
                </div>
                <div class="panel-body">
                    <div class="form-group">
                    <center>Message Board</center>
                    <br/>
                            <label for="message" class="col-md-4 control-label">Message</label>

                            <div class="col-md-7">
                                <TEXTAREA id="prjDescription" class="form-control"></TEXTAREA> 
                            </div>
                    </div>
                    <br/><br/><br/>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection