@extends('layouts.main')

@section('content')

@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif

<div class="col-lg-12">
     <div class="panel panel-info"> 
                @if(auth()->user()->role != "member" || auth()->user()->role == "administrator"))
            <div class="panel-heading"><center><b>{{ isset($sprint->sprint) ? 'List Task for Sprint' . $sprint->sprint : '' }}</b></center>
                </div>
                <br/>
                <span>
                    &nbsp;&nbsp;&nbsp;<a href='{!! url('/view-sprint', ['projectId' => $projectId]); !!}'>Back To Sprint</a>
                    &nbsp;&nbsp;&nbsp;<a class= "btn btn-primary" href='{!! url('/add-todo-list', ['projectId' => $projectId, 'sprintId' => $sprint->id]); !!}'>Add New Task</a>
                </span>
                @endif
                @if (auth()->user()->role == "member")
                <div class="panel-heading"> <center><b>{{ $project->project_name or '' }}</b></center>
                </div>
                   <div class="form-group">
                   <br/><br/> &nbsp;&nbsp;&nbsp;
                        <label>Select Sprint&nbsp;&nbsp;</label>  
                            <select name="sprint" class="form-input" id="sprint" required>
                                <option value="">--- select sprint --</option>
                                    @foreach($project->sprints as $sprint)
                                        <option value="{{ $sprint->id }}"}}>{{ "Sprint " . $sprint->sprint }}</option>
                                    @endforeach
                            </select> 
                    <div id="content-member">
                        
                    </div>
                @else
                <div class="panel-body">
                <table class="table table-striped table-bordered table-hover dataTable no-footer dtr-inline">
                <tr>
                    <th>Task Name</th>
                    <th>Description</th>
                    <th>Assigned To</th>
                    <th>Deadline</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                    <?php
                    foreach ($datas as $sprintId => $data) { ?>
                        <?php if (count($data) > 0) {
                            foreach ($data as $task) { ?>
                                <tr>
                                    <td><?php echo $task->activity ? $task->activity : ''; ?></td>
                                    <td><?php echo $task->description ? $task->description : ''; ?></td>
                                    <td><?php echo $task->assignedTo && $task->assignedTo->fullname ? $task->assignedTo->fullname : ''; ?></td>
                                    <td><?php echo $task->deadline_datetime ? $task->deadline_datetime : ''; ?></td>
                                    <td><label class="green" style="<?php echo $task->status == "done" ? "color: white; background-color: forestgreen;" : ''; ?>"><?php echo $task->status == "active" ? "open" : "closed"; ?></label></td>
                                    <td>
                                        <a class="btn btn-primary" href='{!! url('/edit-todo-list/'.$task->id); !!}'> Edit </a>
                                        <a class="btn btn-danger" href='{!! url('/delete-task/'.$task->id); !!}'> Delete </a>
                                        
                                    </td>
                                </tr>
                            <?php } ?>
                        <?php } ?>

                    <?php } ?>
                </table>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection

@section('script-footer')
<script>
    $(document).ready(function() {
        $('#sprint').change(function(){
            // if ($(this).val() != "") {
                // alert($(this).val());
                $.get("{{ url('get-member-task-ajax')}}", { sprint_id: $(this).val() },
                    function(data) {
                        $('#content-member').empty();
                        $('#content-member').append(data);

                });
            // }
        });
    });


    $('#content-member').on('click', '.btn-change-status', function(){
        var url = $(this).data('url'),
        typeid = $(this).data('typeid');

        $.get("{{ url('change-status-ajax')}}", { task_id: typeid },
            function(data) {
                if (data) {
                    $('#sprint').trigger('change');
                }
        });
    });
</script>
@stop