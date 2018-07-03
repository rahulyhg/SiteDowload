

<?php $__env->startSection('title', 'Deposit Preview'); ?>

<?php $__env->startSection('content'); ?>
  <div class="jumbotron">
    <h3>
      You are going to deposit <strong><?php echo e($wcAmount); ?><?php echo e($gs->base_curr_symbol); ?></strong> to your account
      <br><br>
      using <strong><?php echo e($gateway->name); ?></strong> payment gateway.
    </h3>
    <h3><strong><?php echo e($amount); ?><?php echo e($gs->base_curr_symbol); ?></strong> will be cut from your <?php echo e($gateway->name); ?> account.</h3>
    <a href="<?php echo e(route('deposit.confirm')); ?>" class="btn btn-primary">Deposit Now</a>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('users.layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>