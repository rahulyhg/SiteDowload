

<?php $__env->startSection('title', 'Reset Password Mail Form'); ?>

<?php $__env->startSection('content'); ?>
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <?php if(session()->has('alert')): ?>
        <div class="alert alert-danger">
          <?php echo e(session('alert')); ?>

        </div>
      <?php endif; ?>
      <?php if(session()->has('message')): ?>
        <div class="alert alert-success">
          <?php echo e(session('message')); ?>

        </div>
      <?php endif; ?>

      <form id="sendResetPassMailForm" action="<?php echo e(route('users.sendResetPassMail')); ?>" class="" method="post">
        <?php echo e(csrf_field()); ?>

        <div class="form-group">
          <label for=""><strong style="font-size:25px;">Email:</strong></label>
          <input placeholder="Enter your mail address" class="form-control" type="email" name="resetEmail" value="" style="height:60px;">
          <?php if($errors->has('resetEmail')): ?>
            <p class="text-danger"><?php echo e($errors->first('resetEmail')); ?></p>
          <?php endif; ?>
        </div>
        <div class="form-group text-center">
          <input class="btn btn-success" type="submit" name="" value="Send Reset Password Mail">
        </div>
      </form>
    </div>
  </div>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('users.layout.loginMaster', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>