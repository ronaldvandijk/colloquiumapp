<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Colloquia @yield('title')</title>

    <!-- Styles -->
    <link href="{{ url('/') }}/css/app.css" rel="stylesheet">
    <link href="{{ url('/') }}/css/font-awesome.css" rel="stylesheet">
    @yield('styles')
    <link href="/css/app.css" rel="stylesheet">
    <link href="/css/font-awesome.css" rel="stylesheet">

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
                        Colloquium @ <img src="{{ url('/images/logo.png') }}" alt="Hanzehogeschool Groningen"/>
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        @if (Auth::guest())
                            <!-- Authentication Links -->
                            <li><a href="{{ url('/login') }}">Login</a></li>
                            <li><a href="{{ url('/register') }}">Register</a></li>
                        @else
                            @if(Auth::user()->hasRole('user'))
                                <li><a href="{{url('/mycolloquia')}}">Mijn Colloquia</a></li>
                            @endif
                            <li><a href="{{ url('/agenda') }}">Agenda</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->first_name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="{{ url('/profile') }}">{{ trans('profile.profile') }}</a></li>
                                    @if (Auth::user()->hasRole('administrator'))
                                        <li><a href="{{ url('/admin') }}">Dashboard</a></li>
                                    @endif
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
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container">
	        <div class="row">
		        <div class="col-md-12">
		            @if(Session::has('custom_error'))
			            <div class="alert alert-{{ request()->session()->get('custom_error')['type'] }}">
			                {!! request()->session()->get('custom_error')['message'] !!}
			            </div>
			        @endif
		        </div>
	        </div>
        </div>

        @yield('content')
    </div>

    <!-- Scripts -->
    @yield('scripts')
    <script src="{{ url('/') }}/js/app.js"></script>

</body>
</html>
