@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                Bateeq
                </div>
                <br/>
                <center>Project Download</center>
                <br/>
                <center>
                    <table border="1">
                    <tr >
                        <td class="col-md-5"> File Name </td>
                        <td class="col-md-3"> Action </td>
                    </tr>
                    <tr>
                        <td class="col-md-5"> Business requirement Document </td>
                        <td class="col-md-3"> <a href="{{ url($file) }}">Download </a></td>
                    </tr>
                    <tr>
                        <td class="col-md-5"> Timeline Bateeq</td>
                        <td class="col-md-3"> <a>Download </a></td>
                    </tr>
                     <tr>
                        <td class="col-md-5"> User Story Bateeq </td>
                        <td class="col-md-3"> <a>Download </a></td>
                    </tr>
                </table>
                </center>
                <br/><br/><br/> 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
