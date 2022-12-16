<?php $__env->startSection('content'); ?>
<body>
    <!-- START preloader-wrapper -->
   
    <!-- END preloader-wrapper -->
    
    <!-- START main-wrapper -->
    <section class="d-flex">
  
<!-- start of sidenav -->
<aside><div class="sidenav position-sticky d-flex flex-column justify-content-between">
    <a class="navbar-brand" href="index.html" class="logo">
        <img src="<?php echo e(url('images/logo.png')); ?>" alt="">
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
            <li class="nav-item active">
                <a class="nav-link text-white px-0" href="contact.html">Contact</a>
            </li>
            <li class="nav-item  accordion">
                <div id="drop-menu" class="drop-menu collapse">
                    <a class="d-block " href="index-2.html">Home 2</a>
                    <a class="d-block " href="category.html">Category</a>
                    <a class="d-block " href="post-details.html">Post Details</a>
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
                    <img src="<?php echo e(url('images/logo.png')); ?>" alt="">
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
            <div class="row">
                <div class="col-md-10">
                    <div class="contact-form bg-dark">
                        <h1 class="text-white add-letter-space mb-5">Create new post</h1>
                        <form action="<?php echo e(url('post')); ?>" enctype="multipart/form-data" method="post">
                            <?php echo csrf_field(); ?>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group mb-5">
                                        <label for="title" class="text-black-300">Post Title</label>
                                        <input type="text" name="title" id="title" class="form-control bg-transparent rounded-0 border-bottom shadow-none pb-15 px-0" placeholder="Robert Lee" required>
                                        <p class="invalid-feedback">Your first-name is required!</p>
                                    </div>
                                </div>
                                
                                <div class="col-md-12">
                                    <div class="form-group mb-5">
                                        <label for="file" class="text-black-300">Post header</label>
                                        <input type="file" name="file" id="file"/>
                                        <p class="invalid-feedback">Your email is required!</p>
                                    </div>
                                </div>
                                
                                
                                <div class="col-md-12">
                                    <div class="form-group mb-5">
                                        <label for="message" class="text-black-300">Your message</label>
                                        <textarea name="message" class="form-control bg-transparent rounded-0 border-bottom shadow-none pb-15 px-0" placeholder="Lorem Ipsum is simply dummy text of the printing and..." required></textarea>
                                        <p class="invalid-feedback">Message is required!</p>
                                    </div>
                                </div>
                                
                                <div class="col-md-12">
                                    <div class="form-group mb-5">
                                        <label for="file" class="text-black-300">Pictures</label>
                                        <input type="file" name="uploads" id="uploads" multiple/>
                                        <p class="invalid-feedback">Your email is required!</p>
                                    </div>
                                </div>
                                
                                <div class="col-md-12">
                                    <div class="form-group mb-5">
                                        <label for="type" class="text-black-300">Post category</label>
                                             <select class="form-control" id="type" name="type">
                                              <option value="1">Book</option>
                                              <option value="2">Album</option>
                                              <option value="3">Game</option>
                                              <option value="4">Movie</option>
                                            
                                            </select>
                                        <p class="invalid-feedback">Your email is required!</p>
                                    </div>
                                </div>
                                
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-sm btn-primary">Send Now <img src="<?php echo e(url('images/arrow-right.png')); ?>" alt=""></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- start of footer -->
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
<!-- end of footer -->
    </div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/Goodreads/resources/views/posts/create.blade.php ENDPATH**/ ?>