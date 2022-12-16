<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>laravel - dwes - {{ $table ?? 'reviews'}}</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="{{url('plugins/bootstrap/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{url('plugins/fontawesome/css/all.css')}}">

    <!-- Main Stylesheet -->
    <link href="{{url('/css/style.css')}}" rel="stylesheet">

    <!--Favicon-->
    <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">
    <link rel="icon" href="images/favicon.png" type="image/x-icon">
    </head>
    <body>
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
            <a class="navbar-brand" href="{{ url('') }}">BetterReads</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item {{$activeHome ?? ''}}">
                        <a class="nav-link" href="{{ url('home') }}">Home</a>
                    </li>
                    @yield('navItems')
                </ul>
                <ul class="navbar-nav ml-auto">
                    @auth
                        <li class="nav-item">
                            <a href="{{ url('/home') }}" class="nav-link">{{ auth()->user()->name }}</a>
                        </li>
                        <li class="nav-item">
                            <a href="javascript:;" onclick="document.getElementById('formLogout').submit();" class="nav-link">Logout</a>
                            <form id="formLogout" action="{{ url('logout') }}" method="post">
                                @csrf
                            </form>
                        </li>
                    @else
                        <li class="nav-item">
                            <a href="{{ route('login') }}" class="nav-link">Log in</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a href="{{ route('register') }}" class="nav-link">Register</a>
                            </li>
                        @endif
                    @endauth
                </ul>
            </div>
        </nav>
        @yield('modalContent')
        <main role="main">
          
            <div class="container">
                <!-- para mostrar mensajes de error -->
                @error('message')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <!-- para mostrar mensajes de operaciones -->
                @if(session('message'))
                    <div class="alert alert-success">{{ session('message') }}</div>
                @endif
                @yield('content')
                <hr>
            </div>
        </main>
<footer class="bg-dark">
    <div class="container">
        <div class="row text-center">
            <div class="col-lg-3 col-sm-6 mb-5">
                <h5 class="font-primary text-white mb-4">Inspirations</h5>
                <ul class="list-unstyled">
                    <li><a href="#!">Privacy State</a></li>
                    <li><a href="#!">Privacy</a></li>
                    <li><a href="#!">State</a></li>
                    <li><a href="#!">Privacy</a></li>
                </ul>
            </div>
            <div class="col-lg-3 col-sm-6 mb-5">
                <h5 class="font-primary text-white mb-4">Templates</h5>
                <ul class="list-unstyled">
                    <li><a href="#!">Privacy State</a></li>
                    <li><a href="#!">Privacy</a></li>
                    <li><a href="#!">State</a></li>
                    <li><a href="#!">Privacy</a></li>
                </ul>
            </div>
            <div class="col-lg-3 col-sm-6 mb-5">
                <h5 class="font-primary text-white mb-4">Resource</h5>
                <ul class="list-unstyled">
                    <li><a href="#!">Privacy State</a></li>
                    <li><a href="#!">Privacy</a></li>
                    <li><a href="#!">State</a></li>
                    <li><a href="#!">Privacy</a></li>
                </ul>
            </div>
            <div class="col-lg-3 col-sm-6 mb-5">
                <h5 class="font-primary text-white mb-4">Company</h5>
                <ul class="list-unstyled">
                    <li><a href="#!">Privacy State</a></li>
                    <li><a href="#!">Privacy</a></li>
                    <li><a href="#!">State</a></li>
                    <li><a href="#!">Privacy</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>
        <script src="{{url('plugins/jQuery/jquery.min.js')}}"></script>
    <script src="{{url('plugins/bootstrap/bootstrap.min.js')}}"></script>

    <!-- Main Script -->
    <script src="{{url('js/script.js')}}"></script>
    <script src="{{url('assets/js/common.js')}}"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        @yield('scripts')
    </body>
</html>