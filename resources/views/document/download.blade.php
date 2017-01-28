@extends('layouts.main')

@section('content')
<div class="col-lg-12">
     <div class="panel panel-info">
            <div class="panel-heading">
                 <center>{{ $project->project_name or '' }}</center>
                </div> 
                <div class="panel-body">  
                    <table class="table table-striped table-bordered table-hover dataTable no-footer dtr-inline">
                    <tr>
                        <td>File Name</td> 
                        <td>Action</td>
                    </tr>
                     @if (count($project->documents) <= 0)
                     <tr>
                         <td colspan="2"></td>
                     </tr>
                    @else
                        @foreach($project->documents as $file)
                            <tr>
                                <td>{!! $file->file_name !!}</td>
                                <td>
                                    {!! Form::open(['route' => ['download'], 'method' => 'post']) !!}
                                    <input type="hidden" name="file_path" value="{{ $file->file_path }}">
                                    <button type="submit" class="btn btn-primary" value="Download">Download</button> {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                    @endif 
                    </div>
                <br/><br/><br/> 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
