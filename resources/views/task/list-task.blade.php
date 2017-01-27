@extends('layouts.app')

@section('content')

@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><a href="{!! url('/home'); !!}"><img src="/image/home.png" width="30" height="30"></a><center>{{ isset($sprint->sprint) ? 'List Task for Sprint' . $sprint->sprint : '' }}</center>
                </div>
                @if(auth()->user()->role != "member")
                <span>
                    <a href='{!! url('/add-todo-list', ['projectId' => $projectId, 'sprintId' => $sprint->id]); !!}'>Add New Task</a>
                </span>
                @endif
                @if (auth()->user()->role == "member")
                   <div class="form-group">
                        <label for="email" class="col-md-4 control-label">Select Sprint</label> 
                         <div class="col-md-4">
                            <select name="sprint" class="form-input" id="sprint" required>
                                <option value="">--- select sprint --</option>
                                    @foreach($project->sprints as $sprint)
                                        <option value="{{ $sprint->id }}"}}>{{ "Sprint " . $sprint->sprint }}</option>
                                    @endforeach
                            </select>
                        </div>
                    </div>
                    <div id="content-member">
                        
                    </div>
                @else
                <table class="table">
                <tr>
                    <th>Nama task</th>
                    <th>Deskripsi</th>
                    <th>Ditugaskan kepada</th>
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
                                    <td><label class="green" style="<?php echo $task->status == "done" ? "color: white; background-color: forestgreen;" : ''; ?>"><?php echo $task->status; ?></label></td>
                                    <td>
                                        <a title="delete" align="right" class="" href='{!! url('/delete-task/'.$task->id); !!}'><img src="{{ url('/image/icon-delete.jpg') }}" height="30px" width="30px"> </a>
                                        <a class="btn btn-primary" href='{!! url('/change-status-task/'.$task->id); !!}'> <?php echo $task->status == "active" ? "Done" : "Undone" ?> </a>
                                        <a class="btn btn-primary" href='{!! url('/edit-todo-list/'.$task->id); !!}'> Edit </a>
                                    </td>
                                </tr>
                            <?php } ?>
                        <?php } ?>

                    <?php } ?>
                </table>
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