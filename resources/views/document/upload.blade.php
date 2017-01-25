@extends('layouts.app')

@section('content')

@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
@if (session('error'))
    <div class="alert alert-warning">
        {{ session('error') }}
    </div>
@endif

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                <a href="{!! url('/home'); !!}"><img src="/image/home.png" width="30" height="30"></a><center>{{ $project->project_name or '' }}</center>
                </div>
                <br/>
                <center>Project Upload</center>
                @if (count($project->documents) > 0)
                    <table class="table" border="1">
                    <tr>
                        <th>File Name</th>
                        <th>Uploaded At</th>
                        <th>Action</th>
                    </tr>
                    @foreach($project->documents as $file)
                        <tr>
                            <td>{!! $file->file_name !!}</td>
                            <td>{!! $file->created_at !!}</td>
                            <td>
                                {!! Form::open(['route' => ['download'], 'method' => 'post']) !!}
                                <input type="hidden" name="file_path" value="{{ $file->file_path }}">
                                <button type="submit" class="btn btn--blue" value="Download">Download</button> {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                    </table>
                @endif
                <br/>
            {!! Form::model($project, ['files'=> true, 'id'=>'form_documents']) !!}
                <div class="form-group">
                    <label for="file" class="col-md-4 control-label">File Name </label> 
                    <div class="col-md-5">
                        <input id="filename[]" type="text" class="form-control" name="filename[]" required>
                    </div>
                </div>
                <br/><br/>
                <div class="form-group">
                    <label for="file" class="col-md-4 control-label"></label>
                    <div class="col-md-5">
                        <input type="file" name="file[]" required>
                    </div>
                </div>
                <br/><br/>
                    <div class="form-group">
                        <div class="col-md-8 col-md-offset-6">
                            <button type="cancel" class="btn btn-primary">
                                Cancel
                            </button>
                    <input class="btn btn--blue" type="submit" onClick="if ($('#inputPassword').val() != $('#inputPasswordConfirm').val()) { alert('Your password and password confirmation not the same!'); return false;  } else { return true; }" value="Upload"/>
                        </div>
                    </div>
                <br/><br/><br/>

            {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection
