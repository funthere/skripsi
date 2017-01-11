@extends('master')

@section('header')
  <nav>
    <ul class="nav nav-pills pull-right">
      <li role="presentation" class="active"><a href="#">Home</a></li>
      <li role="presentation"><a href="#">About</a></li>
      <li role="presentation"><a href="#">Contact</a></li>
    </ul>
  </nav>
  <h3 class="text-muted">www.hc-kr.com</h3>
@stop

@section('sidebar-up')
  <h1>www.hc-kr.com</h1>
  <p class="lead">Cras justo odio, dapibus ac facilisis in, egestas eget quam. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
  <p><a class="btn btn-lg btn-success" href="#" role="button">Sign up today</a></p>
@stop

@section('sidebar-left')
  <h4>Judul 1</h4>
  <p>Donec id elit non mi porta gravida at eget metus. Maecenas faucibus mollis interdum.</p>

  <h4>Judul 2</h4>
  <p>Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Cras mattis consectetur purus sit amet fermentum.</p>

  <h4>Judul 3</h4>
  <p>Maecenas sed diam eget risus varius blandit sit amet non magna.</p>
@stop
@section('sidebar-right')
  <h4>Judul 4</h4>
  <p>Donec id elit non mi porta gravida at eget metus. Maecenas faucibus mollis interdum.</p>

  <h4>Judul 5</h4>
  <p>Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Cras mattis consectetur purus sit amet fermentum.</p>

  <h4>Judul 6</h4>
  <p>Maecenas sed diam eget risus varius blandit sit amet non magna.</p>
@stop
@section('footer')
  <p>&copy; 2016 www.hc-kr.com, Inc.</p>
@stop