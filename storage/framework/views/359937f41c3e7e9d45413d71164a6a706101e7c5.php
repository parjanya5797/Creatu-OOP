<?php $__env->startSection('content'); ?>
  <?php if(Session::has('success')): ?>
  <div class="alert alert-success alert-dismissible">
      <a class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <strong>Data Inserted Successfully</strong>
<?php echo e(Session::get("message", '')); ?>

    </div>
    <?php elseif(Session::has('updatesuccess')): ?>
    <div class="alert alert-success alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Data Updated Successfully</strong>
        <?php echo e(Session::get("message", '')); ?>

      </div>
      <?php elseif(Session::has('deletesuccess')): ?>
      <div class="alert alert-success alert-dismissible">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>Data Deleted Successfully</strong>
          <?php echo e(Session::get("message", '')); ?>

        </div>
  <?php endif; ?>
    <h1 class="text text-center">View Employee</h1>
    <a href="<?php echo e(url('employee/create')); ?>"><button class="btn btn-primary">Add Employee</button></a>
    <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">id</th>
                <th scope="col">Employee Name</th>
                <th scope="col">Post</th>
                <th scope="col">Phone No.</th>
                <th scope="col">Address</th>
                <th scope="col">Image</th>
                <th colspan="2">Action</th>

              </tr>
            </thead>
            <tbody>
              <?php $__currentLoopData = $emp; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $emp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                <th><?php echo e($emp->id); ?></th>
                <td><?php echo e($emp->name); ?></td>
                <td><?php echo e($emp->post); ?></td>
                <td><?php echo e($emp->phone_no); ?></td>
                <td><?php echo e($emp->address); ?></td>
                <td><img src="<?php echo e(url('/uploads/'.$emp->image)); ?>" alt="image"style="height: 50px; width:50px; border-radius:50%;"></td>
                <td>
                <a href="<?php echo e(url('employee/edit/'.$emp->id)); ?>"><button class="btn btn-primary">Edit</button></a>
                </td>
                <td>
              <form action="employee/delete/<?php echo e($emp->id); ?>" method="get">
                  
                  <?php echo csrf_field(); ?>
                <a href="<?php echo e(url('/delete/'.$emp->id)); ?>"><button class="btn btn-danger">Delete</button></a>
              </form>
                </td>
              </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
          </table>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\creatu\resources\views/employee/index.blade.php ENDPATH**/ ?>