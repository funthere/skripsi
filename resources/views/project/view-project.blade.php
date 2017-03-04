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
            @if(auth()->user()->role != "member" && !isset($project->project_name))
            <b><center>Add Project</center></b>
            @endif
            <b><center>{{ isset($project) ? $project->project_name : '' }}</center></b>
            </div>
            {!! Form::open(['route'=>'project.create']) !!}
                    @if (isset($project))
                        <input type="hidden" name="id" value="{{ $project->id }}">
                    @endif
                    <div class="panel-body">
                       <div class="form-group">
                            <label for="email" class="col-md-4 control-label">Project Name</label> 
                            <div class="col-md-7">
                                <input id="prjname" type="text" class="form-control" name="prjname" value="<?php echo isset($project) ? $project->project_name : '' ?>" required <?php echo auth()->user()->role == "member" ? 'disabled' : '' ?>>
                            </div>
                        </div>
                        <br/>
                        <br/>
                        <div class="form-group">
                            <label for="prjDescription" class="col-md-4 control-label">Project Description</label>
                            <div class="col-md-7">
                                <TEXTAREA id="prjDescription" name="prjDescription" class="form-control" required <?php echo auth()->user()->role == "member" ? 'disabled' : '' ?>><?php echo isset($project) ? $project->description : '' ?></TEXTAREA> 
                            </div>
                        </div>
                        <br/><br/><br/>
                        <div class="form-group">
                            <label for="prjDescription" class="col-md-4 control-label">Project Schedule</label>
                            <div class="col-md-8">
                                <label for="from">From</label>
                                <input id="dateFrom" type="date" name="dateFrom" class="form-input" value="{{ isset($project) ? $project->start_datetime : '' }}" required <?php echo auth()->user()->role == "member" ? 'disabled' : '' ?>>
                                <label for="to">&nbsp;To</label>
                                <input id="dateTo" type="date" name="dateTo" value="{{ isset($project) ? $project->finish_datetime : '' }}" required <?php echo auth()->user()->role == "member" ? 'disabled' : '' ?>>
                            </div>
                        </div>
                        <br/><br/>

                        <div class="form-group">
                            <label for="prjDescription" class="col-md-4 control-label">Team Member</label>
                            <div class="col-md-7">
                                <!-- <input id="teamId" type="text" class="form-control" name="teamName" > -->
                                <select id="team_member" name="team_member[]" class="form-control" multiple <?php echo auth()->user()->role == "member" ? 'disabled' : '' ?>>
                                    <?php
                                    $types = \App\User::select('fullname', 'id', 'role')->get();

                                    foreach($types as $key => $member):
                                        echo $member->role;
                                        if ($member->role != "administrator" && auth()->user()->id != $member->id) {
                                            var_dump($member->fullname);
                                            $chk = '';
                                            if(isset($project)) {
                                                $memberUser = [];
                                                foreach ($project->userProjects as $user) {
                                                    $memberUser[$user->id] = $user->user->id;
                                                }
                                                $chk = in_array($member->id, $memberUser) ? 'selected' : '';
                                            }

                                        
                                ?>
                                    <option value="<?php echo $member->id; ?>" <?php echo $chk; ?>><?php echo $member->fullname; ?></option>
                                <?php
                                    }
                                    endforeach;
                                ?>
                                </select>
                            </div>
                        </div>

                        <br/><br/>
                    @if(auth()->user()->role != "member") 
                        <div class="form-group"><br/>
                        <label for="prjDescription" class="col-md-4 control-label"></label>
                        <div class="col-md-1">
                        <button type="submit" class="btn btn-primary">
                            <?php echo isset($project) ? "Save" : "Create"; ?>
                        </button>
                        </div>
                        <div class="col-md-2">
                        <a href="{!! url('/list-project'); !!}" class="btn btn-primary">
                            <!-- <button class="btn btn-primary"> -->
                            Cancel
                            <!-- </button> -->
                        </a>
                        </div>
                    @endif
                {!! Form::close() !!}
<script>

$(function() {
    // $('#team_member').select2({
    // placeholder: "Choose member...",
    // minimumInputLength: 2,
    // ajax: {
    //     url: '/users/find',
    //     dataType: 'json',
    //     data: function (params) 
    //     {
    //         return  
    //             {
    //                 q: $.trim(params.term)
    //             };
    //         },
    //         processResults: function (data) {
    //             return {
    //                 results: data
    //             };
    //         },
    //             cache: true
    //         }
    //     });

    $('#team_member').select2({
    
    });

    $('.team').select2({
    
    });

});
</script>
@endsection

