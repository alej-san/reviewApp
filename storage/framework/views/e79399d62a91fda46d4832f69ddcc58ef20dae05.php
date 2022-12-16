<?php $__env->startSection('content'); ?>
<body>
    <!-- START preloader-wrapper -->
    <div class="preloader-wrapper">
        <div class="preloader-inner">
            <div class="spinner-border text-red"></div>
        </div>
    </div>
    <!-- END preloader-wrapper -->
    
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
             <?php $__currentLoopData = $types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li class="nav-item">
                <a class="nav-link text-white px-0 pt-0" href="<?php echo e(session(['tipo' => '$type->id'])); ?>"><?php echo e($type->tipo); ?></a>
            </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            
            <li class="nav-item  accordion">
                <div id="drop-menu" class="drop-menu collapse">
                    <a class="d-block " href="index-2.html">Home 2</a>
                    <a class="d-block " href="category.html">Category</a>
                    <a class="d-block " href="post-details.html">Post Details</a>
                    <a class="d-block " href="privacy.html">Privacy &amp; Policy</a>
                </div>
                
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

        <div class="container pt-4 mt-5">
            <div class="row justify-content-between">
                <div class="col-lg-7">
                   
                    <!-- end of post-item -->
                     <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            <?php if(Route::has('login')): ?>
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    <?php if(auth()->guard()->check()): ?>
                        <a href="<?php echo e(url('/post/create')); ?>" class="text-sm text-gray-700 dark:text-gray-500 underline">Create new post</a>
                    <?php else: ?>
                        <a href="<?php echo e(route('login')); ?>" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                        <?php if(Route::has('register')): ?>
                            <a href="<?php echo e(route('register')); ?>" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
                    <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            
                            
                                        
                                    
                    <div class="card post-item bg-transparent border-0 mb-5">
                        <a href="<?php echo e(url('/post/'. $post->id)); ?>">
                            <img class="img-fluid" src="data:image/png;base64,<?php echo e($post->file); ?>"/>
                        </a>
                        <div class="card-body px-0">
                            <h2 class="card-title">
                                <a class="text-white opacity-75-onHover" href="<?php echo e(url('/post/'. $post->id)); ?>">
                                   <?php echo e($post->title); ?>

                                    </a>
                            </h2>
                            <ul class="post-meta mt-3">
                                <li class="d-inline-block mr-3">
                                    <span class="fas fa-clock text-primary"></span>
                                    <a class="ml-1" href="#"><?php echo e($post->created_at->format('d M Y')); ?></a>
                                </li>
                                <li class="d-inline-block mr-3">
                                    <span class="fas fa-user text-primary"></span>
                                    <a class="ml-1" href="#"><?php echo e($post->user->name); ?></a>
                                </li>
                                <li class="d-inline-block">
                                    <span class="fas fa-list-alt text-primary"></span>
                                    <a class="ml-1" href="#"><?php echo e($post->tipos->tipo); ?></a>
                                </li>
                            </ul>
                            <p class="card-text my-4"><?php echo e($post->message); ?></p>
                            <a href="<?php echo e(url('/post/'. $post->id)); ?>" class="btn btn-primary">Read More <img src="images/arrow-right.png" alt=""></a>
                        </div>
                    </div>
                    <!-- end of post-item -->
                    
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    
                    <!-- end of post-item -->
                </div>
                </div>
                <div class="col-lg-4 col-md-5">
                    <div class="widget text-center">
                        <img class="author-thumb-sm rounded-circle d-block mx-auto" src="images/author-sm.png" alt="">
                        <h2 class="widget-title text-white d-inline-block mt-4"><?php echo e(Auth::user()->name); ?></h2>
                        <p class="mt-4">Lorem ipsum dolor sit coectetur adiing elit. Tincidunfywjt leo mi, viearra urna. Arcu ve isus, condimentum ut vulpate cursus por turpis.</p>
                        <ul class="list-inline mt-3">
                            <li class="list-inline-item">
                                <a href="#!" class="text-white text-primary-onHover p-2">
                                    <span class="fab fa-twitter"></span>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#!" class="text-white text-primary-onHover p-2">
                                    <span class="fab fa-facebook-f"></span>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#!" class="text-white text-primary-onHover p-2">
                                    <span class="fab fa-instagram"></span>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#!" class="text-white text-primary-onHover p-2">
                                    <span class="fab fa-linkedin-in"></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- end of author-widget -->

                    <div class="widget bg-dark p-4 text-center">
                        <h2 class="widget-title text-white d-inline-block mt-4">Subscribe Blog</h2>
                        <p class="mt-4">Lorem ipsum dolor sit coectetur elit. Tincidu nfywjt leo mi, urna. Arcu ve isus, condimentum ut vulpate cursus por.</p>
                        <form action="#">
                            <div class="form-group">
                                <input type="email" class="form-control bg-transparent rounded-0 my-4" placeholder="Your Email Address">
                                <button class="btn btn-primary">Subscribe Now <img src="images/arrow-right.png" alt=""></button>
                            </div>
                        </form>
                    </div>
                    <!-- end of subscription-widget -->

                    <div class="widget">
                        <div class="mb-5 text-center">
                            <h2 class="widget-title text-white d-inline-block">Featured Posts</h2>
                        </div>
                        <div class="card post-item bg-transparent border-0 mb-5">
                            <a href="post-details.html">
                                <img class="card-img-top rounded-0" src="images/post/post-sm/01.png" alt="">
                            </a>
                            <div class="card-body px-0">
                                <h2 class="card-title">
                                    <a class="text-white opacity-75-onHover" href="post-details.html">Excepteur ado Do minimal duis laborum Fugiat ea</a>
                                </h2>
                                <ul class="post-meta mt-3 mb-4">
                                    <li class="d-inline-block mr-3">
                                        <span class="fas fa-clock text-primary"></span>
                                        <a class="ml-1" href="#">24 April, 2016</a>
                                    </li>
                                    <li class="d-inline-block">
                                        <span class="fas fa-list-alt text-primary"></span>
                                        <a class="ml-1" href="#">Photography</a>
                                    </li>
                                </ul>
                                <a href="post-details.html" class="btn btn-primary">Read More <img src="images/arrow-right.png" alt=""></a>
                            </div>
                        </div>
                        <!-- end of widget-post-item -->
                        <div class="card post-item bg-transparent border-0 mb-5">
                            <a href="post-details.html">
                                <img class="card-img-top rounded-0" src="images/post/post-sm/02.png" alt="">
                            </a>
                            <div class="card-body px-0">
                                <h2 class="card-title">
                                    <a class="text-white opacity-75-onHover" href="post-details.html">Excepteur ado Do minimal duis laborum Fugiat ea</a>
                                </h2>
                                <ul class="post-meta mt-3 mb-4">
                                    <li class="d-inline-block mr-3">
                                        <span class="fas fa-clock text-primary"></span>
                                        <a class="ml-1" href="#">24 April, 2016</a>
                                    </li>
                                    <li class="d-inline-block">
                                        <span class="fas fa-list-alt text-primary"></span>
                                        <a class="ml-1" href="#">Photography</a>
                                    </li>
                                </ul>
                                <a href="post-details.html" class="btn btn-primary">Read More <img src="images/arrow-right.png" alt=""></a>
                            </div>
                        </div>
                        <!-- end of widget-post-item -->
                    </div>
                    <!-- end of post-items widget -->
                </div>
            </div>
        </div>

        <!-- start of footer -->
<!-- end of footer -->
    </div>

    </section>
    <!-- END main-wrapper -->

    <!-- All JS Files -->
    <script src="plugins/jQuery/jquery.min.js"></script>
    <script src="plugins/bootstrap/bootstrap.min.js"></script>

    <!-- Main Script -->
    <script src="js/script.js"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/Goodreads/resources/views/home.blade.php ENDPATH**/ ?>