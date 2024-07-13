

<?php $__env->startSection('content'); ?>
<?php if(session()->has('message')): ?>   
<div class="alert alert-success">
    <?php echo e(session()->get('message')); ?>

</div>
<?php endif; ?>

<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <strong>Employee List</strong>
                <a href="<?php echo e(route('employee.create')); ?>" class="btn btn-primary btn-xs float-end py-0">Create Employee</a>
                
                <!-- Make table responsive -->
                <div class="table-responsive" style="margin-top:10px;">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Joining Date</th>
                                <th>Joining Salary</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $employee; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $tableName): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($key+1); ?></td>
                                <td><?php echo e($tableName->name); ?></td>
                                <td><?php echo e($tableName->email); ?></td>
                                <td><?php echo e($tableName->joining_date); ?></td>
                                <td><?php echo e($tableName->joining_salary); ?></td>
                                <td>
                                    <span class="btn <?php echo e($tableName->is_active == 1 ? 'btn-success' : 'btn-danger'); ?> btn-xs py-0">
                                        <?php echo e($tableName->is_active == 1 ? 'Active' : 'Inactive'); ?>

                                    </span>
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <a href="<?php echo e(route('employee.edit', $tableName->id)); ?>" class="btn btn-warning btn-xs py-0 mx-1">Edit</a>
                                    <a href="<?php echo e(route('employee.show', $tableName->id)); ?>" class="btn btn-primary btn-xs py-0 mx-1">Show</a>
                                    <form action="<?php echo e(route('employee.destroy', $tableName->id)); ?>" method="POST" style="display:inline;">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="submit" class="btn btn-danger btn-xs py-0">Delete</button>
                                    </form>
                                    </div>
                                    
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
                <?php echo e($employee->links()); ?>

            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel project\emp-app\resources\views/index.blade.php ENDPATH**/ ?>