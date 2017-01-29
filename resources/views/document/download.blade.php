@extends('layouts.main')

@section('content')

<div class="col-lg-12">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <center><b>{{ $project->project_name or '' }}</b></center>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table table-striped table-bordered table-hover dataTable no-footer dtr-inline">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>File Name</th> 
                                            <th>Uploaded By</th> 
                                            <th>Uploaded At</th> 
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (count($project->documents) <= 0)
                                         <tr>
                                             <td colspan="4"></td>
                                         </tr>
                                        @else
                                            @foreach($project->documents as $file)
                                                <tr>
                                                    <td>{!! $file->file_name !!}</td>
                                                    <td>{!! $file->owner->fullname !!}</td>
                                                    <td>{!! date_format(date_create($file->updated_at), 'Y-m-d') !!}</td>
                                                    <td>
                                                        {!! Form::open(['route' => ['download'], 'method' => 'post']) !!}
                                                        <input type="hidden" name="file_path" value="{{ $file->file_path }}">
                                                        <button type="submit" class="btn btn-primary" value="Download">Download</button> {!! Form::close() !!}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif 
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
@endsection
