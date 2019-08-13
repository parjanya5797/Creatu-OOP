<?php $__env->startSection('content'); ?>
        <?php if(Session::has('success')): ?>
        <div class="alert alert-success alert-dismissible">
            <a class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Mail Sent Successfully</strong>
      <?php echo e(Session::get("message", '')); ?>

          </div>
        <?php endif; ?>
    <h1 class="text text-center">Send Mail</h1>
   
    <form action="<?php echo e(url('mail/store')); ?>" method="post">
        <?php echo csrf_field(); ?>
    <div class="form-group">
        <label for="email_id">Email Id</label>
    <input type="email" name="email_id" class="form-control" placeholder="Enter Email Id" value="<?php echo e(old('email_id')); ?>">
    <div> <?php echo e($errors->first('email_id')); ?></div>
    </div>
    <div class="form-group">
            <label for="subject">Subject</label>
    <input type="text" name="subject" class="form-control" placeholder="Enter Subject" value="<?php echo e(old('subject')); ?>">
    </div>
    <div> <?php echo e($errors->first('subject')); ?></div>
  
    <div class="form-group">
            <label for="message">Message</label>
    <textarea name="message" cols="30" rows="10" class="form-control" placeholder="Enter Message Here" value="<?php echo e(old('message')); ?>"></textarea>
    <div> <?php echo e($errors->first('message')); ?></div>
</div>
        
    <input type="submit" name="submit" value="Send Mail" class="btn btn-primary">
</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\creatu\resources\views/mail.blade.php ENDPATH**/ ?>