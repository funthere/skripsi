@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                Bateeq
                </div>
                <div class="panel-body">
                <center>Todo List </center>
                <br/><br/>
                 <div class="form-group">
                            <label for="email" class="col-md-4 control-label">Sprint</label> 
                            <div class="col-md-7"> 
                            </div>
                    </div>
                 <br/>
                  <div class="form-group">
                            <label for="email" class="col-md-4 control-label">Sprint1</label> 
                            <div class="col-md-7"> 
                            </div>
                    </div>
                    <br/>
                   <table border="1" width="100%">
                   <tr>
                   <td>
                   <br/><br/>
                   <div class="form-group">
                            <label for="email" class="col-md-4 control-label">Task1</label> 
                            <div class="col-md-7">
                            </div>
                    </div>
                   <br/><br/>
                   <div class="form-group">
                            <label for="email" class="col-md-4 control-label">Task</label> 
                            <div class="col-md-4">
                                <input id="task_name" type="text" class="form-control" name="task_name" placeholder="Task Name">
                            </div>
                             <div class="col-md-4">
                                <input id="assigned_to" type="text" class="form-control" name="assigned_to" placeholder="Assigned To">
                            </div>
                    </div>
                    <br/><br/>
                    <div class="form-group">
                            <label for="prjDescription" class="col-md-4 control-label">Deadline</label>
                            <div class="col-md-8">
                                <input id="date" type="date" name="dateFrom" >
        
                            </div>
                    </div>
                    <br/><br/>
                    <div class="form-group">
                            <div class="col-md-8 col-md-offset-6">
                                <button type="submit" class="btn btn-primary">
                                    Save
                                </button>
                                 <button type="cancel" class="btn btn-primary">
                                    Cancel
                                </button>
                            </div>
                    </div>
                    <br/><br/>
                    </td>
                    </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection