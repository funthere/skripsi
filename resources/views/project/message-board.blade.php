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
                            <TEXTAREA id="prjDescription" rows="8" name="prjDescription" class="form-control" {!! auth()->user()->role == "member" ? 'disabled' : '' !!}><?php echo isset($project) ? $project->message_board : ''; ?></TEXTAREA> 
                        </div>
                    </div> 
                    @if(auth()->user()->role != "member")
                    <div class="form-group">
                        <div class="col-md-8 col-md-offset-2">
                         <br/>
                            <button type="submit" class="btn btn-primary">
                                Save
                            </button>
                            <a href="{!! url('/message-board/'.$project->id) !!}" class="btn btn-primary">
                                Reset
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