@extends('layouts.main')

@section('content') 
<div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title">Login</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}
                            <fieldset>
                                <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                                     <label for="username">&nbsp;&nbsp;&nbsp;Username</label> 
                                </div>
                                <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                                   <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" required autofocus>
                                @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                                </div>
                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                     <label for="password">&nbsp;&nbsp;&nbsp;Password</label>     
                                </div>
                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                   <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                                </div>
                                
                                <button class="btn btn-lg btn-primary btn-block">Login</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
