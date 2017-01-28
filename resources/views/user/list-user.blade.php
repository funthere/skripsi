@extends('layouts.main')

@section('content')

@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">List User</div>
                <span>
                    <a href='{!! url('/register'); !!}' class="btn btn-primary">Add New User</a>
                </span>
                <table class="table">
                <tr>
                    <th>Full Name</th>
                    <th>Username</th>
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
</div>
@endsection