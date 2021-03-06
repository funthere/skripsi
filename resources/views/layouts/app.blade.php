<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">
    <!-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"> -->
    <link href="/css/select2.min.css" rel="stylesheet" />
     <!-- Bootstrap Core CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ url('/login') }}">Login</a></li>
                        @else
                            @if (Auth::user()->role == "administrator")
                                <li><a href="{{ url('/list-user') }}">List User</a></li>
                            @endif
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    <img src="/image/people.png" width="30" height="30">{{ Auth::user()->fullname }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                    <li>
                                        <a href="{{ url('/change-password') }}" >
                                            Change Password
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
    <script src="/js/jquery.min.js"></script>
    <!-- <script src="/js/bootstrap.min.js"></script> -->
    <script src="/js/select2.min.js"></script>
        
        @if (isset($hideMenu) || Request::is('login') || Request::is('register') || Request::is('change-password') )

        @else

        <div class="main">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="panel panel-default">
                             <div class="panel-heading">
                            <table border="1">
                                <tr>
                                <td class="col-md-4"><a href="{!! isset($projectId) ? url('/view-project/'.$projectId) : ''; !!}">Project Description </a></td>
                                <td class="col-md-4"><a href="{!! isset($projectId) ? url('/message-board/'.$projectId) : ''; !!}">Message Board </td>
                                <td class="col-md-4"><a href="{!! isset($projectId) ? url('/view-sprint/'.$projectId) : ''; !!}">Todo List </td>
                                <td class="col-md-4"><a href="{!! isset($projectId) ? url('/view-project-upload/'.$projectId) : ''; !!}">Project Upload </td>
                                <td class="col-md-4"><a href="{!! isset($projectId) ? url('/view-project-download/'.$projectId) : ''; !!}">Project Download </td>
                                <td class="col-md-4"><a href="{!! isset($projectId) ? url('/chatting/'.$projectId) : ''; !!}">Chatting </td>
                                </tr>
                            </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="/js/app.js"></script>
    @yield('script-footer')
</body>
</html>
