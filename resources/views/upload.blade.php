@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                Bateeq
                </div>
                <br/>
                <center>Project Upload</center>
                <br/>
                <div class="form-group">
                        <label for="file" class="col-md-4 control-label">File 1 </label> 
                        <div class="col-md-5">
                            <input id="file1" type="text" class="form-control" name="file1" >
                        </div>
                        <div class="col-md-2">
                            <button id="btnFile1" name="btnfile1">Browse</button> 
                        </div>
                </div>
                <br/><br/>
                 <div class="form-group">
                        <label for="file" class="col-md-4 control-label">File 2 </label> 
                        <div class="col-md-5">
                            <input id="file1" type="text" class="form-control" name="file1" >
                        </div>
                        <div class="col-md-2">
                            <button id="btnFile1" name="btnfile1">Browse</button> 
                            <button id="btnFile1" name="btnfile1">+</button> 
                        </div>
                </div>
                <br/><br/>
                    <div class="form-group">
                            <div class="col-md-8 col-md-offset-6">
                                <button type="cancel" class="btn btn-primary">
                                    Cancel
                                </button>
                                 <button type="submit" class="btn btn-primary">
                                    Upload
                                </button>
                            </div>
                    </div>
                <br/><br/><br/>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
