<?php $__env->startSection('title', 'Deposit Preview'); ?>

<?php $__env->startSection('content'); ?>
  <div class="jumbotron">
    <h3>
      Vous allez déposert <strong><?php echo e($wcAmount); ?><?php echo e($gs->base_curr_symbol); ?></strong> sur votre compte
      <br><br>
      en utilisant <strong><?php echo e($gateway->name); ?></strong> la passerelle de paiement.
    </h3>
    <h3><strong><?php echo e($amount); ?><?php echo e($gs->base_curr_symbol); ?></strong> sera débité de votre <?php echo e($gateway->name); ?> compte.</h3>
    <a href="<?php echo e(route('deposit.confirm')); ?>" class="btn btn-primary" style="background-color:#FF1043; color:#FFFFFF; font-size:14px; font-weight:900; border-radius: 28px; border:none;">Deposer maintenant</a>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('users.layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>