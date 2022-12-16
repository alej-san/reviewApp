<?php $__env->startSection('content'); ?>
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
                <?php echo method_field('delete'); ?>
                <?php echo csrf_field(); ?>
                <input type="submit" class="btn btn-primary" value="Delete element"/>
            </form>
          </div>
        </div>
      </div>
    </div>
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
                    <th scope="col">email</th>
                    <th scope="col">type</th>
                    <th scope="col">verified</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td>
                        <?php echo e($user->id); ?>

                    </td>
                    <td>
                        <?php echo e($user->name); ?>

                    </td>
                    <td>
                        <?php echo e($user->email); ?>

                    </td>
                    <td>
                        <?php echo e($user->type); ?>

                    </td>
                    
                    <td>
                        <?php if($user->email_verified_at != null): ?>
                            yes
                        <?php else: ?>
                            no
                        <?php endif; ?>
                    </td>
                    <td>
                        <?php if($user->email != Auth::user()->email): ?>
                            <a href="javascript: void(0);" 
                                       data-name="<?php echo e($user->name); ?>"
                                       data-url="<?php echo e(url('admin/' . $user->id )); ?>"
                                       data-toggle="modal"
                                       data-target="#modalDelete">delete</a>
                        <?php endif; ?>
                    </td>
                    <td>
                        <a href="<?php echo e(url('admin/' . $user->id . '/edit')); ?>">edit</a>
                    </td>
                    <td>
                        <a href="<?php echo e(url('admin/' . $user->id)); ?>">show</a>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <a href=" <?php echo e(url('admin/create')); ?>" class="btn btn-primary">Create</a>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script src="<?php echo e(url('assets/js/common.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/userApp-main/resources/views/admin/index.blade.php ENDPATH**/ ?>