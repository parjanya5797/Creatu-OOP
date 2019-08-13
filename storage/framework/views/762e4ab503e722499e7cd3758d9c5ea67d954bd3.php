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
    <h1 class="text text-center">View Products</h1>
    <a href="<?php echo e(url('product/create')); ?>"><button class="btn btn-primary">Add Product</button></a>
    <table class="table">
            <thead>
              <tr>
                <th scope="col">id</th>
                <th scope="col">Product Name</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
                <th colspan="2">Action</th>

              </tr>
            </thead>
            <tbody>
              <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                <th><?php echo e($product->id); ?></th>
                <td><?php echo e($product->product_name); ?></td>
                <td><?php echo e($product->prices); ?></td>
                <td><?php echo e($product->quantityw); ?></td>
                <td>
                <a href="<?php echo e(url('/edit/'.$product->id)); ?>"><button class="btn btn-primary">Edit</button></a>
                </td>
                <td>
              <form action="<?php echo e(url('/delete/'.$product->id)); ?>" method="get">
                  
                  <?php echo csrf_field(); ?>
                <a href="<?php echo e(url('/delete/'.$product->id)); ?>"><button class="btn btn-danger">Delete</button></a>
              </form>
                </td>
              </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
          </table>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\creatu\resources\views/product/index.blade.php ENDPATH**/ ?>