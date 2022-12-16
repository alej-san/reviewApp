@extends('layouts.app')
@section('content')
<body>
    <!-- START preloader-wrapper -->
    <div class="preloader-wrapper">
        <div class="preloader-inner">
            <div class="spinner-border text-red"></div>
        </div>
    </div>
    <!-- END preloader-wrapper -->
    <div class="modal fade" id="modalDelete" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Confirm delete</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>
          <div class="modal-body">
            <p>Confirm delete <span id="deleteElement">XXX</span>?</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <form id="modalDeleteResourceForm" action="" method="post">
                @method('delete')
                @csrf
                <input type="submit" class="btn btn-primary" value="Delete element"/>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- START main-wrapper -->
    <section class="d-flex">
  
<!-- start of sidenav -->
<aside><div class="sidenav position-sticky d-flex flex-column justify-content-between">
    <a class="navbar-brand" href="index.html" class="logo">
        <img src="images/logo.png" alt="">
    </a>
    <!-- end of navbar-brand -->

    <div class="navbar navbar-dark my-4 p-0 font-primary">
        <ul class="navbar-nav w-100">
            <li class="nav-item ">
                <a class="nav-link text-white px-0 pt-0" href="index.html">Home</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link text-white px-0" href="about.html">About</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link text-white px-0" href="contact.html">Contact</a>
            </li>
            <li class="nav-item active accordion">
                <div id="drop-menu" class="drop-menu collapse">
                    <a class="d-block " href="index-2.html">Home 2</a>
                    <a class="d-block " href="category.html">Category</a>
                    <a class="d-block active" href="post-details.html">Post Details</a>
                    <a class="d-block " href="privacy.html">Privacy &amp; Policy</a>
                </div>
                <a class="nav-link text-white" href="#!" role="button" data-toggle="collapse" data-target="#drop-menu" aria-expanded="false" aria-controls="drop-menu">Pages</a>
            </li>
            <li class="nav-item mt-3">
                <select class="custom-select bg-transparent rounded-0 text-white shadow-none" id="pick-lang">
                    <option selected value="en">English</option>
                    <option value="fr">French</option>
                </select>
            </li>
        </ul>
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
</div></aside>
<!-- end of sidenav -->
    <div class="main-content">
        <!-- start of mobile-nav -->
<header class="mobile-nav pt-4">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-6">
                <a href="index.html">
                    <img src="images/logo.png" alt="">
                </a>
            </div>
            <div class="col-6 text-right">
                <button class="nav-toggle bg-transparent border text-white">
                    <span class="fas fa-bars"></span>
                </button>
            </div>
        </div>
    </div>
</header>
<div class="nav-toggle-overlay"></div>
<!-- end of mobile-nav -->

            <div class="container py-4 my-5">
                <div class="row">
    <div class="col-lg-5 col-md-8">
        <form class="search-form" action="#">
            <div class="input-group">
                <input type="search" class="form-control bg-transparent shadow-none rounded-0" placeholder="Search here">
                <div class="input-group-append">
                    <button class="btn" type="submit">
                        <span class="fas fa-search"></span>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
                
                <div class="row justify-content-between">
                    <div class="col-lg-10">
                        <img class="img-fluid" src="data:image/png;base64,{{ $post->file }}"/>
                        @auth
                        @if(Auth::id() == $post->userid)
                        <a href=" {{ url('post/' . $post->id . '/edit')}} " class="btn btn-primary">Edit <img src="images/arrow-right.png" alt=""></a>
                        
                         <a href="javascript: void(0);" 
                                       data-name="{{ $post->title }}"
                                       data-url="{{ url('post/' . $post->id ) }}"
                                       data-toggle="modal"
                                       data-target="#modalDelete">delete</a>
                        @endif
                        @endauth
                        <h1 class="text-white add-letter-space mt-4">{{$post->title}}</h1>
                        <ul class="post-meta mt-3 mb-4">
                            <li class="d-inline-block mr-3">
                                <span class="fas fa-clock text-primary"></span>
                                <a class="ml-1" href="#">{{$post->created_at->format('d M, Y')}}</a>
                            </li>
                            <li class="d-inline-block">
                                <span class="fas fa-list-alt text-primary"></span>
                                <a class="ml-1" href="#">Photography</a>
                            </li>
                        </ul>

                        <p>
                            {{$post->message}}
                        </p>

                    
                    

                        <img src="{{ asset('storage/postpics/20221215224045.jpg') }}">
                        
                    </div>
                </div>
            </div>

@endsection