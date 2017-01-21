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
                <center>Todo List </center>
                <br/><br/>
                 <div class="form-group">
                            <label for="email" class="col-md-3 control-label">Sprint</label> 
                            <div class="col-md-4">
                                <select>
                                    <option>Sprint1</option>
                                    <option>Sprint2</option>
                                    <option>Sprint3</option>
                                </select>
                            </div>
                    </div>
                 <br/>
                   <table border="1" width="100%">
                   <tr>
                   <td>
                   <br/><br/>
                   <div class="form-group">
                            <div class="col-md-4">
                             <input type="checkbox" name="" class="col-md-7 control-label"> Task Name
                            </div>
                             <div class="col-md-4">
                             <input type="checkbox" name="" class="col-md-7 control-label"> Task Name
                            </div>
                   </div>
                   <br/>
                   <div class="form-group">
                            <div class="col-md-4">
                             <input type="checkbox" name="" class="col-md-7 control-label"> Task Name
                            </div>
                             <div class="col-md-4">
                             <input type="checkbox" name="" class="col-md-7 control-label"> Task Name
                            </div>
                   </div>
                    <br/>
                     <div class="form-group">
                           <div class="col-md-4">
                             <input type="checkbox" name="" class="col-md-7 control-label"> Task Name
                            </div>
                   </div>
                    <br/>
                   
                    </td>
                    </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection