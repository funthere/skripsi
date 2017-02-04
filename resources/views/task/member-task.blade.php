
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
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
            if (count($tasks) > 0) {
                foreach ($tasks as $task) { ?>
                    <tr>
                        <td><?php echo $task->activity ? $task->activity : ''; ?></td>
                        <td><?php echo $task->description ? $task->description : ''; ?></td>
                        <td><?php echo $task->assignedTo && $task->assignedTo->fullname ? $task->assignedTo->fullname : ''; ?></td>
                        <td><?php echo $task->deadline_datetime ? date_format(date_create($task->deadline_datetime), 'Y-m-d') : ''; ?></td>
                        <td><label class="green" style="<?php echo $task->status == "done" ? "color: white; background-color: forestgreen;" : ''; ?>"><?php echo $task->status == "active" ? "open" : "closed"; ?></label></td>
                        <td>
                            <!-- <a title="delete" align="right" class="" href='{!! url('/delete-task/'.$task->id); !!}'><img src="{{ url('/image/icon-delete.jpg') }}" height="30px" width="30px"> </a> -->
                            <a href="javascript:;" data-url="{!! url('/edit-todo-list/'.$task->id); !!}" data-typeid="<?php echo $task['id'] ?>" class="btn btn-primary btn-change-status" > <?php echo $task->status == "active" ? "Done" : "Undone" ?> </a>
                        </td>
                    </tr>
                <?php } ?>
            <?php } else { ?>
                <tr>
                    <td colspan="6">
                        <center>(no data)</center>
                    </td>
                </tr>
            <?php } ?>
</table>
</div>
