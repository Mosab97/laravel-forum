<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        .btn-info{
            color: #fff;
        }
    </style>
    @yield('css')
</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">
<li class="nav-item">
    <a href="{{route('users.notifications')}}" class="nav-link">
          <span class="badge badge-info">
        {{auth()->user()->unreadNotifications->count()}}
              Unread Notifications
    </span>
    </a>
</li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>


    @if(!in_array(request()->path(),['login','register','password/email','password/reset']))

        <main class="container py-4">

            <div class="row">
                <div class="col-md-4">

                    @auth
                        <a href="{{route('discussions.create')}}" class="btn btn-info mb-2"
                           style="width: 100%">Add Discussion</a>
                    @else
                        <a href="{{route('login')}}" class="btn btn-info mb-2" style="width: 100%">
                            sign in to add discussion
                        </a>

                    @endauth
                    <div class="card">
                        <div class="card-header">
                            Channels
                        </div>
                        <div class="card-body">
                            <ul class="list-group">

                                @foreach($channels as $channel )
                                    <li class="list-group-item">

                                        {{$channel->name}}
                                    </li><!-- end li-->

                                @endforeach
                            </ul><!-- end ul-->
                        </div>
                    </div>

                </div> <!-- end col-4 -->

                <div class="col-md-8">
                    @yield('content')
                </div> <!-- end col-8 -->
            </div>


        </main>

    @else

        <div class="py-4">
            @yield('content')
        </div>
    @endif
</div>
<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
@yield('js')


</body>
</html>

