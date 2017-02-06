<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Moonlay Project Management System</title>
    <!-- Bootstrap Core CSS -->
    <link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="/assets/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="/assets/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="/assets/vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="/assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"> 

    <!-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"> -->
    <link href="/css/select2.min.css" rel="stylesheet" />

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href='{!! url('/home'); !!}'>Moonlay Project Management System</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                @if (Auth::guest())
                    
                @else
                    @if (Auth::user()->role == "administrator")
                        <li><a href="{{ url('/list-user') }}">List User</a></li>
                        <li><a href="{{ url('/clearing-chat') }}">Clear Chat</a></li>
                    @endif
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>

                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> {{ Auth::user()->fullname }}</a> 
                        </li>
                        @if(auth()->user()->role != "administrator")
                        <li class="divider"></li>
                         <li>
                                <a href="{{ url('/change-password') }}" >
                                    Change Password
                                </a>
                        </li>
                        @endif
                        <li class="divider"></li>
                        <li>  <a href="{{ url('/logout') }}"
                                onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                Logout
                            </a>

                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    @endif
                    </ul>
                </li>
            </ul>

        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                     @yield('script-header')
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <script src="/js/jquery.min.js"></script>
            <script src="/js/bootstrap.min.js"></script>
            <script src="/js/select2.min.js"></script>

            <div class="row">
             @if (isset($hideMenu) || Request::is('login') || Request::is('register') )

        @else
            <div class="col-lg-2 col-md-5">
                    <div class="panel panel-{{ isset($menuActive) && $menuActive == 1 ? 'primary' : 'info' }}">
                        <div class="panel-heading">
                            <div class="row">
                                <div align="center">
                                    <i class="fa fa-file-text-o fa-5x"></i>
                                </div>
                                
                            </div>
                        </div>
                        <a href="{!! isset($projectId) ? url('/view-project/'.$projectId) : ''; !!}">
                            <div class="panel-footer">
                                <span class="pull-left">Project Description</span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                 <div class="col-lg-2 col-md-5">
                    <div class="panel panel-{{ isset($menuActive) && $menuActive == 2 ? 'primary' : 'info' }}">
                        <div class="panel-heading">
                            <div class="row">
                                <div align="center">
                                    <i class="fa fa-calendar-o fa-5x"></i>
                                </div> 
                            </div>
                        </div>
                        <a href="{!! isset($projectId) ? url('/message-board/'.$projectId) : ''; !!}">
                            <div class="panel-footer">
                                <span class="pull-left">Message Board</span>
                                <span class="pull-right"></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
               
                <div class="col-lg-2 col-md-5">
                    <div class="panel panel-{{ isset($menuActive) && $menuActive == 3 ? 'primary' : 'info' }}">
                        <div class="panel-heading">
                            <div class="row">
                                <div align="center">
                                    <i class="fa fa-tasks fa-5x"></i>
                                </div>
                            </div>
                        </div>
                        <a href="{!! isset($projectId) ? url('/view-sprint/'.$projectId) : ''; !!}">
                            <div class="panel-footer">
                                <span class="pull-left">Todo List</span>
                                <span class="pull-right"></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-5">
                    <div class="panel panel-{{ isset($menuActive) && $menuActive == 4 ? 'primary' : 'info' }}">
                        <div class="panel-heading">
                            <div class="row">
                                <div align="center">
                                    <i class="fa fa-upload fa-5x"></i>
                                </div>
                            </div>
                        </div>
                        <a href="{!! isset($projectId) ? url('/view-project-upload/'.$projectId) : ''; !!}">
                            <div class="panel-footer">
                                <span class="pull-left">Project Upload</span>
                                <span class="pull-right"></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-lg-2 col-md-5">
                    <div class="panel panel-{{ isset($menuActive) && $menuActive == 5 ? 'primary' : 'info' }}">
                        <div class="panel-heading">
                            <div class="row">
                                <div align="center">
                                    <i class="fa fa-download fa-5x"></i>
                                </div>
                            </div>
                        </div>
                        <a href="{!! isset($projectId) ? url('/view-project-download/'.$projectId) : ''; !!}">
                            <div class="panel-footer">
                                <span class="pull-left">Project Download</span>
                                <span class="pull-right"></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-lg-2 col-md-5">
                    <div class="panel panel-{{ isset($menuActive) && $menuActive == 6 ? 'primary' : 'info' }}">
                        <div class="panel-heading">
                            <div class="row">
                                <div align="center">
                                    <i class="fa fa-comments fa-5x"></i>
                                </div>
                            </div>
                        </div>
                        <a href="{!! isset($projectId) ? url('/chatting/'.$projectId) : ''; !!}">
                            <div class="panel-footer">
                                <span class="pull-left">Chatting</span> 
                                <span class="pull-right"></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <hr class="panel-primary">
            @endif
            <!-- /.row -->
            <div class="row">  
            @yield('content')
            </div>
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    {{-- <script src="/assets/vendor/jquery/jquery.min.js"></script> --}}

    <!-- Bootstrap Core JavaScript -->
    {{-- <script src="/assets/vendor/bootstrap/js/bootstrap.min.js"></script> --}}

    <!-- Metis Menu Plugin JavaScript -->
    <script src="/assets/vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    {{-- <script src="/assets/vendor/raphael/raphael.min.js"></script> --}}
    {{-- <script src="/assets/vendor/morrisjs/morris.min.js"></script> --}}
    {{-- <script src="/assets/data/morris-data.js"></script> --}}

    <!-- Custom Theme JavaScript -->
    <script src="/assets/dist/js/sb-admin-2.js"></script>

</body>

@yield('script-footer')
</html>
