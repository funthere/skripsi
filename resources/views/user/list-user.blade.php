@extends('layouts.main')

@section('content')

@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif

<div class="col-lg-12">
     <div class="panel panel-info">
            <div class="panel-heading"><center><b>List User</b></center></div>
                <span>
                    <br/>&nbsp;&nbsp;&nbsp;
                    <a href='{!! url('/register'); !!}' class="btn btn-primary">Add New User</a>
                </span>
                <div class="panel-body">
                <table class="table table-striped table-bordered table-hover dataTable no-footer dtr-inline">
                <tr>
                    <th>Username</th>
                    <th>Fullname</th>
                    <th>Email</th>
                    <th>Role</th>
                </tr>
                    <?php
                    // $counter = 1;
                    foreach ($users as $user) { ?>
                        <tr>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->fullname }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role }}</td>
                        </tr>
                    <?php }
                    ?>
                </table>
                </div>
             </div>
        </div>
@endsection