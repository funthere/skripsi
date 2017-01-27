@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                 <center>{{ $project->project_name or '' }}</center>
                </div>
                <br/>
                <center>Project Download</center>
                <br/>
                    <table class="table" border="1">
                    <tr>
                        <th>File Name</th>
                        <th>Uploaded By</th>
                        <th>Uploaded At</th>
                        <th>Action</th>
                    </tr>
                     @if (count($project->documents) <= 0)
                     <tr>
                         <td colspan="4"></td>
                     </tr>
                    @else
                        @foreach($project->documents as $file)
                            <tr>
                                <td>{!! $file->file_name !!}</td>
                                <td>{!! $file->owner->fullname !!}</td>
                                <td>{!! $file->created_at !!}</td>
                                <td>
                                    {!! Form::open(['route' => ['download'], 'method' => 'post']) !!}
                                    <input type="hidden" name="file_path" value="{{ $file->file_path }}">
                                    <button type="submit" class="btn btn--blue" value="Download">Download</button> {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </table>
                <br/><br/><br/> 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
