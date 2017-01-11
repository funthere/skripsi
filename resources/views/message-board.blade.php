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
                <table border="1">
                    <tr><td class="col-md-4"> Project Description </td><td class="col-md-4"> Message Board </td><td class="col-md-4"> Todo List </td><td class="col-md-4"> Project Upload </td><td class="col-md-4"> Project Download </td><td class="col-md-4"> Chatting </td></tr>
                </table>
                </div>

                <div class="panel-body">
                    <div class="form-group">
                    <center>Message Board</center>
                    <br/>
                            <label for="message" class="col-md-4 control-label">Message</label>

                            <div class="col-md-7">
                                <TEXTAREA id="prjDescription" class="form-control"></TEXTAREA> 
                            </div>
                    </div>
                    <br/><br/><br/>
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
                </div>
            </div>
        </div>
    </div>
</div>
@endsection