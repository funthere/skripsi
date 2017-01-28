@extends('layouts.main')

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

<div class="col-lg-12">
     <div class="panel panel-info">
            <div class="panel-heading">
                <center>{{ $project->project_name or '' }}</center>
                </div>
                <br/>
                <center>Project Upload</center>
                <!-- @if (count($project->documents) > 0)
                    <table class="table" border="1">
                    <tr>
                        <th>File Name</th>
                        <th>Uploaded By</th>
                        <th>Uploaded At</th>
                        <th>Action</th>
                    </tr>
                    @foreach($project->documents as $file)
                        <tr>
                            <td>{!! $file->file_name !!}</td>
                            <td>{!! isset($file->owner) && isset($file->owner->fullname) ? $file->owner->fullname : '' !!}</td>
                            <td>{!! $file->created_at !!}</td>
                            <td>
                                @if($file->user_id == auth()->user()->id)
                                {!! Form::open(['route' => ['document.delete', 'file_id' => $file->id], 'method' => 'delete']) !!}
                                <input type="hidden" name="file_id" value="{{ $file->id }}">
                                <button type="submit" class="btn btn--blue" value="Download">Delete</button> {!! Form::close() !!}
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </table>
                @endif -->
                <br/>
                {!! Form::model($project, ['files'=> true, 'id'=>'form_documents']) !!}
                    <div id="form-file">
                        <div class="form-group">
                            <label for="file" class="col-md-1 control-label">File Name </label>
                            <div class="col-md-3">
                                <div class="input-group date">
                                    <input id="filename[0]" type="text" class="form-control" name="filename[0]" required>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="input-group date">
                                    <input type="file" name="file[0]" required>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <button class="btn btn--blue btn-add-file" type="button" style="min-width: 40%;"><i class="fa fa-fw fa-plus"></i>  </button>
                            </div>
                        <br/><br/><br/>
                        </div>
                    </div>
                        <div class="form-group">
                            <div class="col-md-3 col-md-offset-2">
                                <!-- <button type="cancel" class="btn ">
                                    Cancel
                                </button> -->
                        <input class="btn btn-primary" type="submit" onClick="if ($('#inputPassword').val() != $('#inputPasswordConfirm').val()) { alert('Your password and password confirmation not the same!'); return false;  } else { return true; }" value="Upload"/>
                            </div>
                        </div>
                    <br/><br/><br/>

                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection

@section('script-footer')
<script>
$(document).ready(function() {

    var index = 1;
    $('.btn-add-file').on('click', function() {
        $('#form-file').append(
            '<div class="form-group">' +
                '<label for="file" class="col-md-1 control-label">File Name </label>' +
                '<div class="col-md-3">' +
                    '<div class="input-group date">' +
                        '<input id="filename[]" type="text" class="form-control" name="filename[' + index + ']" required>' +
                    '</div>' +
                '</div>' +
                '<div class="col-md-5">' +
                    '<div class="input-group date">' +
                        '<input type="file" name="file[' + index + ']" required>' +
                    '</div>' +
                '</div>' +
                '<div class="col-md-2">' +
                    '<button class="btn btn-danger btn-delete-file" type="button" style="min-width: 40%;"><i class="fa fa-fw fa-minus"></i>  </button>' +
                '</div><br/><br/><br/>' +
            '</div>'
        );
        index++;
    });

    $('#form-file').on('click', '.btn-delete-file', function() {
        $(this).parent().parent().remove();
    });
});
</script>
@stop
