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
                <div class="panel-heading">List Project</div>
                <span>
                    <a href='{!! url('/add-project'); !!}'>Add New Project</a>
                </span>
                <table border="2" class="table">
                <tr>
                    <th>Nama proyek</th>
                    <th>Deskripsi</th>
                    <th>Mulai</th>
                    <th>Selesai</th>
                    <th>PIC</th>
                </tr>
                    <?php
                    foreach ($datas as $data) { ?>
                        <tr>
                        <td><a href='{!! url('/view-project/'.$data['id']); !!}'> <?php echo $data['project_name'] ?> </a></td>
                        <td><?php echo $data['description'] ?></td>
                        <td><?php echo $data->start_datetime ?></td>
                        <td><?php echo $data->finish_datetime ?></td>
                        <td><?php echo $data->user->fullname ?></td>
                        </tr>
                    <?php }
                    ?>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection