@extends('layouts.app')

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
                <table border="2" class="table">
                <tr>
                    <th>Nama proyek</th>
                    <th>Deskripsi</th>
                    <th>Mulai</th>
                    <th>Selesai</th>
                    <th>PIC</th>
                </tr>
                    <?php
                    foreach ($datas as $data) {
                        echo "<tr>";
                        echo "<td>" . $data['project_name'] . "</td>";
                        echo "<td>" . $data['project_name'] . "</td>";
                        echo "<td>" . $data->start_datetime . "</td>";
                        echo "<td>" . $data->finish_datetime . "</td>";
                        echo "<td>" . $data->pic . "</td>";
                        echo "</tr>";
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection