@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                Bateeq
                </div>
                <div class="panel-heading">
                Clearing Chat
                </div>
                <br/>
                <br/>
                <div class="form-group">
                    <label for="email" class="col-md-4 control-label">Project</label> 
                       <div class="col-md-7">
                           <select>
                                <option></option>
                                <option>nama project pertama yang ada</option>
                                <option></option>
                            </select>
                       </div>
                    </div>
                <br/><br/>
                 <div class="form-group">
                            <label class="col-md-4 control-label">From</label>
                            <div class="col-md-8"> 
                                <input id="dateFrom" type="date" name="dateFrom" >
                                <label for="to">&nbsp;To</label>
                                <input id="dateTo" type="date" name="dateTo" >
                            </div>
                    </div>
                <br/><br/>
                <div class="form-group">
                    <div class="col-md-4"> </div>
                    <div class="col-md-5">
                        <button>Clear    Chat</button>
                    </div>
                </div>
                <br/><br/><br/>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
