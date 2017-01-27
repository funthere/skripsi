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
                <div class="panel-heading">
                <a href="{!! url('/home'); !!}"><img src="/image/home.png" width="30" height="30"></a><center>{{ isset($project) ? $project->project_name : '' }}</center>
                </div>
                <span>
                    <a href='{!! url('/add-sprint/'.$project['id']); !!}'>Add New Sprint</a>
                </span>
                <table border="2" class="table">
                <tr>
                    <th>Sprint</th>
                    <th>Summary</th>
                    <th>Action</th>
                </tr>
                    <?php
                    foreach ($project->sprints as $sprint) { ?>
                        <tr>
                        <td>
                            <a href='{!! url('/view-todo-list/'.$project->id.'/'.$sprint->id); !!}'> <b>See task in Sprint <?php echo $sprint['sprint'] ?></b> </a>
                            <a class="btn btn-primary" href='{!! url('/add-todo-list/'.$project->id.'/'.$sprint->id); !!}'> Add task </a> 

                        </td>
                        <td>
                            Open: <?php echo $sprint->tasks->where('status', 'active')->count(); ?>
                            | 
                            Closed: <?php echo $sprint->tasks->where('status', 'done')->count(); ?>
                            
                        </td>
                        <td>
                            <a title="delete" class="btn btn-primary" href='{!! url('/delete-sprint/'.$sprint->id); !!}'> Delete </a>
                        </td>
                        </tr>
                    <?php }
                    ?>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection