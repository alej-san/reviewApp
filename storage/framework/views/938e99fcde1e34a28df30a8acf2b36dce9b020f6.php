<?php $__env->startSection('content'); ?>
    
    <div class="row" style="margin-top: 8px;">
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
        <?php if(session('message')): ?>
            <div class="alert alert-danger"><?php echo e(session('message')); ?></div>
        <?php endif; ?>
        <table class="table table-striped" id="userTable">
            <thead>
                <tr>
                    <th scope="col"># id</th>
                    <th scope="col">name</th>
                    <th scope="col">idtipo</th>
                    <th scope="col">iduser</th>
                    <th scope="col">idastillero</th>
                    <th scope="col">descripcion</th>
                    <th scope="col">precio</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $yates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $yate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td>
                        <?php echo e($yate->id); ?>

                    </td>
                    <td>
                        <?php echo e($yate->nombre); ?>

                    </td>
                    <td>
                        <?php echo e($yate->idtipo); ?>

                    </td>
                    <td>
                        <?php echo e($yate->idastillero); ?>

                    </td>
                    <td>
                        <?php echo e(substr( $yate->descripcion, 0, 10)); ?>

                    </td>
                    <td>
                        <?php echo e($yate->precio); ?>

                    </td>
                    
                  
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script src="<?php echo e(url('assets/js/common.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/userApp-main/resources/views/yate/index.blade.php ENDPATH**/ ?>