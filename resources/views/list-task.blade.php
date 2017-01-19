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
                <div class="panel-heading">List Task for Sprint {{ $sprintId }}</div>
                <span>
                    <a href='{!! url('/add-todo-list', ['projectId' => $projectId, 'sprintId' => $sprintId]); !!}'>Add New Task</a>
                </span>
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
                        <tr>
                            <th colspan="4">Sprint <?php echo $sprintId; ?></th>
                        </tr>
                        <?php
                            foreach ($data as $task) { ?>
                                <tr>
                                    <td><?php echo $task->activity; ?></td>
                                    <td><?php echo $task->description; ?></td>
                                    <td><?php echo $task->assignedTo->fullname; ?></td>
                                    <td><?php echo $task->deadline_datetime; ?></td>
                                    <td><label class="green" style="<?php echo $task->status == "done" ? "color: white; background-color: forestgreen;" : ''; ?>"><?php echo $task->status; ?></label></td>
                                    <td><a class="btn btn-primary" href='{!! url('/change-status-task/'.$task->id); !!}'> <?php echo $task->status == "active" ? "Done" : "Undone" ?> </a></td>
                                </tr>
                        <?php } ?>

                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection