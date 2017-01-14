@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                {{ isset($project) ? $project->project_name : '' }}
                </div>
                
                {!! Form::open(['route'=>'project.create']) !!}
                    @if (isset($project))
                        <input type="hidden" name="id" value="{{ $project->id }}">
                    @endif
                    <div class="panel-body">
                       <div class="form-group">
                            <label for="email" class="col-md-4 control-label">Project Name</label> 
                            <div class="col-md-7">
                                <input id="prjname" type="text" class="form-control" name="prjname" value="<?php echo isset($project) ? $project->project_name : '' ?>" required>
                            </div>
                        </div>
                        <br/>
                        <br/>
                        <div class="form-group">
                            <label for="prjDescription" class="col-md-4 control-label">Project Description</label>
                            <div class="col-md-7">
                                <TEXTAREA id="prjDescription" name="prjDescription" class="form-control" required><?php echo isset($project) ? $project->description : '' ?></TEXTAREA> 
                            </div>
                        </div>
                        <br/><br/><br/>
                        <div class="form-group">
                            <label for="prjDescription" class="col-md-4 control-label">Project Schedule</label>
                            <div class="col-md-8">
                                <label for="from">From</label>
                                <input id="dateFrom" type="date" name="dateFrom" class="form-input" value="{{ isset($project) ? $project->start_datetime : '' }}" required>
                                <label for="to">&nbsp;To</label>
                                <input id="dateTo" type="date" name="dateTo" value="{{ isset($project) ? $project->finish_datetime : '' }}" required>
                            </div>

                        </div>
                        <br/><br/>
                    <div class="form-group">
                            <label for="prjDescription" class="col-md-4 control-label">Team Member</label>
                            <div class="col-md-7">
                                <input id="teamId" type="text" class="form-control" name="teamName" >
                            </div>
                    </div>
                    <br/><br/>
                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-6">
                                <button type="submit" class="btn btn-primary">
                                    <?php echo isset($project) ? "Save" : "Create"; ?>
                                </button>
                                <a href="{!! url('/list-project'); !!}" class="btn btn-primary">
                                 <!-- <button class="btn btn-primary"> -->
                                    Cancel
                                <!-- </button> -->
                                </a>
                            </div>
                        </div>
                    </div>
                {!! Form::close() !!}

            </div>
        </div>
    </div>
</div>
@endsection