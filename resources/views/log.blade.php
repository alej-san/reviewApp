@extends('layouts.app')

@section('content')
<section class="d-flex flex-row justify-content-center align-items-center">
    <div class="sidenav position-sticky d-flex flex-column justify-content-evenly">
    <a class="navbar-brand" href="index.html" class="logo">
        <img src="images/logo.png" alt="">
    </a>
    <!-- end of navbar-brand -->

<div class="container pt-4 mt-5">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                 
                    <!-- end of post-item -->
                <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/home') }}" class="text-sm mb-3 text-gray-700 dark:text-gray-500 underline">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-primary mb-5 text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn btn-primary text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                        @endif
                    @endauth
                </div>
      
            </div>
            </div>
            
                <div class="card-body">
                    @auth
                    @if(Auth::user())
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                    
                     <div>
                    <form action="{{url('logout')}}" method="post">
                        @csrf
                        <input class="btn btn-primary" type="submit" value="Logout"/>
                    </form>
                </div>
                @endif
                @endauth
                </div
                @auth
               @if(!Auth::user()->hasVerifiedEmail())
                   <a href="{{url('verify')}}">verify</a>
               @endif
               @endauth
            </div>
        </div>
   
    <!-- end of navbar -->

    <ul class="list-inline nml-2">
        <li class="list-inline-item">
            <a href="#!" class="text-white text-red-onHover pr-2">
                <span class="fab fa-twitter"></span>
            </a>
        </li>
        <li class="list-inline-item">
            <a href="#!" class="text-white text-red-onHover p-2">
                <span class="fab fa-facebook-f"></span>
            </a>
        </li>
        <li class="list-inline-item">
            <a href="#!" class="text-white text-red-onHover p-2">
                <span class="fab fa-instagram"></span>
            </a>
        </li>
        <li class="list-inline-item">
            <a href="#!" class="text-white text-red-onHover p-2">
                <span class="fab fa-linkedin-in"></span>
            </a>
        </li>
    </ul>
    <!-- end of social-links -->
    
</div></section>

 
@endsection
