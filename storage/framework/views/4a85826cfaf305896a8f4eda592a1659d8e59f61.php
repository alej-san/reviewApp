<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>laravel - dwes - <?php echo e($table ?? 'reviews'); ?></title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="<?php echo e(url('plugins/bootstrap/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(url('plugins/fontawesome/css/all.css')); ?>">

    <!-- Main Stylesheet -->
    <link href="<?php echo e(url('/css/style.css')); ?>" rel="stylesheet">

    <!--Favicon-->
    <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">
    <link rel="icon" href="images/favicon.png" type="image/x-icon">
    </head>
    <body>
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
            <a class="navbar-brand" href="<?php echo e(url('')); ?>">BetterReads</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item <?php echo e($activeHome ?? ''); ?>">
                        <a class="nav-link" href="<?php echo e(url('home')); ?>">Home</a>
                    </li>
                    <?php echo $__env->yieldContent('navItems'); ?>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <?php if(auth()->guard()->check()): ?>
                        <li class="nav-item">
                            <a href="<?php echo e(url('/home')); ?>" class="nav-link"><?php echo e(auth()->user()->name); ?></a>
                        </li>
                        <li class="nav-item">
                            <a href="javascript:;" onclick="document.getElementById('formLogout').submit();" class="nav-link">Logout</a>
                            <form id="formLogout" action="<?php echo e(url('logout')); ?>" method="post">
                                <?php echo csrf_field(); ?>
                            </form>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <a href="<?php echo e(route('login')); ?>" class="nav-link">Log in</a>
                        </li>
                        <?php if(Route::has('register')): ?>
                            <li class="nav-item">
                                <a href="<?php echo e(route('register')); ?>" class="nav-link">Register</a>
                            </li>
                        <?php endif; ?>
                    <?php endif; ?>
                </ul>
            </div>
        </nav>
        <?php echo $__env->yieldContent('modalContent'); ?>
        <main role="main">
          
            <div class="container">
                <!-- para mostrar mensajes de error -->
                <?php $__errorArgs = ['message'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="alert alert-danger"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                <!-- para mostrar mensajes de operaciones -->
                <?php if(session('message')): ?>
                    <div class="alert alert-success"><?php echo e(session('message')); ?></div>
                <?php endif; ?>
                <?php echo $__env->yieldContent('content'); ?>
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
        <script src="<?php echo e(url('plugins/jQuery/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(url('plugins/bootstrap/bootstrap.min.js')); ?>"></script>

    <!-- Main Script -->
    <script src="<?php echo e(url('js/script.js')); ?>"></script>
    <script src="<?php echo e(url('assets/js/common.js')); ?>"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <?php echo $__env->yieldContent('scripts'); ?>
    </body>
</html><?php /**PATH /var/www/html/Goodreads/resources/views/layouts/app.blade.php ENDPATH**/ ?>