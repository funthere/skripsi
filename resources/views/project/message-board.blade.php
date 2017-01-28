@extends('layouts.main')

@section('content')
<div class="col-lg-12">
     <div class="panel panel-info">
            <div class="panel-heading"><center>{{ $project->project_name or '' }}</center>
                </div>

                {!! Form::open(['route' => ['message-board.save', $project->id]]) !!}

                <div class="panel-body">
                    <div class="form-group"> 
                    <br/>
                        <label for="message" class="col-md-2 control-label">Message</label>
                        <div class="col-md-10">
                            <TEXTAREA id="prjDescription" name="prjDescription" class="form-control" {!! auth()->user()->role == "member" ? 'disabled' : '' !!}><?php echo isset($project) ? $project->message_board : ''; ?></TEXTAREA> 
                        </div>
                    </div>
                    <br/><br/><br/>
                    @if(auth()->user()->role != "member")
                    <div class="form-group">
                        <div class="col-md-8 col-md-offset-6">
                            <button type="submit" class="btn btn-primary">
                                Save
                            </button>
                            <a href="{!! url('/list-project'); !!}" class="btn btn-primary">
                                Cancel
                            </a>
                        </div>
                    </div>
                    @endif
                </div>
                {!! Form::close() !!}

            </div>
        </div>
    </div>
</div>
@endsection