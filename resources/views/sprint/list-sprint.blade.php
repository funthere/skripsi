@extends('layouts.main')

@section('content')

@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
<div class="col-lg-12">
     <div class="panel panel-info">
            <div class="panel-heading"><center><b>{{ isset($project) ? $project->project_name : '' }}</b></center>
                </div>
                <br/><span>&nbsp;&nbsp;&nbsp;
                    <a href='{!! url('/add-sprint/'.$project['id']); !!}'>Add New Sprint</a>
                </span><br/><br/>
                 <div class="panel-body">
                <table border="2" class="table table-striped table-bordered table-hover dataTable no-footer dtr-inline">
                <tr>
                    <th>Sprint Name</th>
                    <th>Task Summary</th>
                    <th>Action</th>
                </tr>
                    <?php
                    foreach ($project->sprints as $sprint) { ?>
                        <tr>
                        <td>
                            <a href='{!! url('/view-todo-list/'.$project->id.'/'.$sprint->id); !!}'> Sprint <?php echo $sprint["id"]?> </a> 
                        </td>
                        <td>
                            Open: <?php echo $sprint->tasks->where('status', 'active')->count(); ?>
                            | 
                            Closed: <?php echo $sprint->tasks->where('status', 'done')->count(); ?>
                            
                        </td>
                        <td>
                            <a title="delete" class="btn btn-danger" href='{!! url('/delete-sprint/'.$sprint->id); !!}'> Delete </a>
                        </td>
                        </tr>
                    <?php }
                    ?>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection