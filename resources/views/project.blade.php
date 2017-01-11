@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add Project</div>

                <div class="panel-body">
                   <div class="form-group">
                            <label for="email" class="col-md-4 control-label">Project Name</label> 
                            <div class="col-md-7">
                                <input id="prjname" type="text" class="form-control" name="prjname" >
                            </div>
                    </div>
                    <br/>
                    <br/>
                    <div class="form-group">
                            <label for="prjDescription" class="col-md-4 control-label">Project Description</label>

                            <div class="col-md-7">
                                <TEXTAREA id="prjDescription" class="form-control"></TEXTAREA> 
                            </div>
                    </div>
                    <br/><br/><br/>
                    <div class="form-group">
                            <label for="prjDescription" class="col-md-4 control-label">Project Schedule</label>
                            <div class="col-md-8">
                                <label for="from">From</label>
                                <input id="dateFrom" type="date" name="dateFrom" >
                                <label for="to">&nbsp;To</label>
                                <input id="dateTo" type="date" name="dateTo" >
                            </div>
                    </div>
                    <br/><br/>
                    <div class="form-group">
                            <div class="col-md-8 col-md-offset-6">
                                <button type="submit" class="btn btn-primary">
                                    Create
                                </button>
                                 <button type="cancel" class="btn btn-primary">
                                    Cancel
                                </button>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection