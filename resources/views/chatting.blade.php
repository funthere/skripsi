@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                Bateeq
                </div>
                </div>
                <br/>
                <center>_______tanggal chat________</center>
                <br/>
                <div class="form-group">
                    <div class="col-md-5"></div>
                    <div class="col-md-2"></div>
                </div>
                <br/><br/>
                <div class="form-group">
                    <div class="col-md-5"></div>
                    <div class="col-md-2"> </div>
                </div>
                <br/><br/>
                <div class="form-group"> 
                    <center>    
                        <label class="col-md-3"></label>
                        <div class="col-md-6">
                            <input id="chat" type="text" class="form-control" name="chat" >
                        </div>
                        <div class="col-md-">
                            <button id="btnChat" name="btnChat">>></button>  
                        </div>
                    </center>        
                </div>
                <br/><br/><br/>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
