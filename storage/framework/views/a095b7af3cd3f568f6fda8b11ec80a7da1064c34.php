<?php $__env->startSection('content'); ?>
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
                    <?php if(auth()->guard()->check()): ?>
                        <a href="<?php echo e(url('/home')); ?>" class="text-sm mb-3 text-gray-700 dark:text-gray-500 underline">Home</a>
                    <?php else: ?>
                        <a href="<?php echo e(route('login')); ?>" class="btn btn-primary mb-5 text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                        <?php if(Route::has('register')): ?>
                            <a href="<?php echo e(route('register')); ?>" class="btn btn-primary text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
      
            </div>
            </div>
            
                <div class="card-body">
                    <?php if(auth()->guard()->check()): ?>
                    <?php if(Auth::user()): ?>
                    <?php if(session('status')): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>

                    <?php echo e(__('You are logged in!')); ?>

                    
                     <div>
                    <form action="<?php echo e(url('logout')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <input class="btn btn-primary" type="submit" value="Logout"/>
                    </form>
                </div>
                <?php endif; ?>
                <?php endif; ?>
                </div
                <?php if(auth()->guard()->check()): ?>
               <?php if(!Auth::user()->hasVerifiedEmail()): ?>
                   <a href="<?php echo e(url('verify')); ?>">verify</a>
               <?php endif; ?>
               <?php endif; ?>
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

 
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/Goodreads/resources/views/log.blade.php ENDPATH**/ ?>