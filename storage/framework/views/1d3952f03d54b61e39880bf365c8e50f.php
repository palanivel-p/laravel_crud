
<?php $__env->startSection('content'); ?>
<?php if(session()->has('message')): ?>   
<div  class="alert alert-success">
    <?php echo e(session()->get('message')); ?>

</div>
<?php endif; ?>
<a class="text-light" href="<?php echo e(route('employee.index')); ?>">Back To Index</a>
        <div class="card">
            <div class="card-body">
                <p style="font-size:20px; font-weight:bold;">Update Employee</p>
                <form action="<?php echo e(route('employee.update',$emp->id)); ?>" class="was-validated" method="POST">
                 
                 <?php echo method_field('PUT'); ?>
                 <?php echo csrf_field(); ?>
                    <div class="form-group has-validation">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control <?php echo e($errors ->has('name')?'is-invalid':''); ?>" value="<?php echo e($emp->name); ?>" required> 
                        <?php if($errors ->has('name')): ?>               
                        <span class="invalid-feedback">
                            <strong><?php echo e($errors->first('name')); ?></strong>
                        </span>
                       <?php endif; ?>
                    </div>
                    <div class="form-group has-validation">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control <?php echo e($errors ->has('email')?'is-invalid':''); ?>" value="<?php echo e($emp->email); ?>" required>
                        <?php if($errors ->has('email')): ?>               
                        <span class="invalid-feedback">
                            <strong><?php echo e($errors->first('email')); ?></strong>
                        </span>
                       <?php endif; ?>
                    </div>
                    <div class="form-group has-validation   ">
                        <label for="joining_date">Joining date</label>
                        <input type="date" name="joining_date" id="joining_date" class="form-control <?php echo e($errors ->has('joining_date')?'is-invalid':''); ?>" value="<?php echo e($emp->joining_date); ?>" required>
                        <?php if($errors ->has('joining_date')): ?>               
                        <span class="invalid-feedback">
                            <strong><?php echo e($errors->first('joining_date')); ?></strong>
                        </span>
                       <?php endif; ?>
                    </div>

                    <div class="form-group has-validation">
                        <label for="joining_salary">Joining salary</label>
                        <input type="number" name="joining_salary" id="joining_salary" class="form-control <?php echo e($errors ->has('joining_salary')?'is-invalid':''); ?>" value="<?php echo e($emp->joining_salary); ?>" required>
                        <?php if($errors ->has('joining_salary')): ?>               
                        <span class="invalid-feedback">
                            <strong><?php echo e($errors->first('joining_salary')); ?></strong>
                        </span>
                       <?php endif; ?>
                    </div>
                    <div class="form-group has-validation">
                        <label for="is_active">Active</label><br>
                        <input type="checkbox" name="is_active" id="is_active" class="<?php echo e($errors ->has('is_active')?'is-invalid':''); ?>" <?php echo e($emp->is_active=='1'?'checked':''); ?> required>
                        <?php if($errors ->has('is_active')): ?>               
                        <span class="invalid-feedback">
                            <strong><?php echo e($errors->first('is_active')); ?></strong>
                        </span>
                       <?php endif; ?>
                    </div>
                    <button type="submit" class="btn btn-primary">Update Employee</button>
                </form>
            </div>
        </div>
        <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel project\emp-app\resources\views/edit.blade.php ENDPATH**/ ?>