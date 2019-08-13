<?php $__env->startSection('content'); ?>
    <h1 class="text text-center">Create Product Here</h1>
    <?php if($errors->any()): ?>
    <div class="alert alert-danger">
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
<?php endif; ?>
    <form action="<?php echo e(url('/product/store')); ?>" method="POST">
        <?php echo csrf_field(); ?>
    <div class="form-group">
        <label for="product_name">Product Name</label>
    <input type="text" name="product_name" class="form-control" placeholder="Enter Product Name" value="<?php echo e(old('product_name')); ?>">
    </div>
    <div class="form-group">
            <label for="price">Price</label>
    <input type="number" name="price" class="form-control" placeholder="Enter Price of Product" value="<?php echo e(old('price')); ?>">
    </div>
    <div class="form-group">
            <label for="price">Quantity</label>
    <input type="number" name="quantity" class="form-control" placeholder="Enter Quantity of Product" value="<?php echo e(old('quantity')); ?>">
    </div>
    <input type="submit" name="submit" value="Submit" class="btn btn-primary">
</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\creatu\resources\views/product/create.blade.php ENDPATH**/ ?>