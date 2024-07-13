
<?php $__env->startSection('content'); ?>
        <div class="card">
            <div class="card-body">
                <p style="font-size:20px; font-weight:bold;">Employee details</p>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" value="<?php echo e($emp->name); ?>" readonly>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" value="<?php echo e($emp->email); ?>" readonly>
                </div>

                <div class="form-group">
                    <label for="joining_date">Joining date</label>
                    <input type="date" class="form-control" value="<?php echo e($emp->joining_date); ?>" readonly>
                </div>

                <div class="form-group">
                    <label for="joining_salary">Joining salary</label>
                    <input type="number" class="form-control" value="<?php echo e($emp->joining_salary); ?>" readonly >
                </div>

                <div class="form-group">
                    <label for="is_active" >Active</label><br>
                    <input type="checkbox"  <?php echo e($emp->is_active=='1'?'checked':''); ?> readonly />
                </div>
                <a href="<?php echo e(route('employee.index')); ?>" class="btn btn-primary">Back</a>
            </div>
        </div>
        <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\firstProject\emp-app\resources\views/show.blade.php ENDPATH**/ ?>