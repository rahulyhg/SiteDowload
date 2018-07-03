

<?php $__env->startSection('title', 'Register'); ?>

<?php $__env->startPush('styles'); ?>
  <style media="screen">
    .login-admin {
      padding:0px 100px;
    }
    @media  screen and (max-width: 500px) {
      .login-admin {
        padding:0px 10px;
      }

    }
  </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
  <!-- Register Section Start -->

  <div class="login-admin" style="">
    <?php if($errors->has('registration')): ?>
      <div class="alert alert-danger">
        <strong><?php echo e($errors->first('registration')); ?></strong>
      </div>
    <?php endif; ?>
    <?php if($gs->registration == 0): ?>
      <div style="margin-bottom:10px;">
        <h4 style="color:red;">*** [Registration is currently disabled by Admin] ***</h4>
      </div>
    <?php endif; ?>

    <div class="login-header">
      <h2>New <span>Customer</span></h2>
    </div>
    <div class="login-form">
      <form action="<?php echo e(route('register')); ?>" method="post">
        <?php echo e(csrf_field()); ?>

        <input type="hidden" name="registration" value="<?php echo e($gs->registration); ?>">
        <input type="hidden" name="ref" value="<?php echo e($username); ?>">
        <input type="text" name="username" placeholder="Enter Username" value="<?php echo e(old('username')); ?>">
        <?php if($errors->has('username')): ?>
            <span style="color:red;">
                <strong><?php echo e($errors->first('username')); ?></strong>
            </span>
        <?php endif; ?>
        <input type="email" name="email" placeholder="Enter your E-mail" value="<?php echo e(old('email')); ?>">
        <?php if($errors->has('email')): ?>
            <span style="color:red;">
                <strong><?php echo e($errors->first('email')); ?></strong>
            </span>
        <?php endif; ?>
        <input type="text" name="firstname" placeholder="Enter Firstname" value="<?php echo e(old('firstname')); ?>">
        <?php if($errors->has('firstname')): ?>
            <span style="color:red;">
                <strong><?php echo e($errors->first('firstname')); ?></strong>
            </span>
        <?php endif; ?>
        <input type="text" name="lastname" placeholder="Enter Lastname" value="<?php echo e(old('lastname')); ?>">
        <?php if($errors->has('lastname')): ?>
            <span style="color:red;">
                <strong><?php echo e($errors->first('lastname')); ?></strong>
            </span>
        <?php endif; ?>
        <input type="text" name="country" placeholder="Enter Country Name" value="<?php echo e(old('country')); ?>">
        <?php if($errors->has('country')): ?>
            <span style="color:red;">
                <strong><?php echo e($errors->first('country')); ?></strong>
            </span>
        <?php endif; ?>
        <input type="text" name="phone" placeholder="Enter Phone Number (Use Country Dialing Code)" value="<?php echo e(old('phone')); ?>">
        <?php if($errors->has('phone')): ?>
            <span style="color:red;">
                <strong><?php echo e($errors->first('phone')); ?></strong>
            </span>
        <?php endif; ?>
        <input type="password" name="password" placeholder="Enter Password">
        <?php if($errors->has('password')): ?>
            <span style="color:red;">
                <strong><?php echo e($errors->first('password')); ?></strong>
            </span>
        <?php endif; ?>
        <input type="password" name="password_confirmation" placeholder="Re-Enter Password">
        <?php if($errors->has('password_confirmation')): ?>
            <span style="color:red;">
                <strong><?php echo e($errors->first('password_confirmation')); ?></strong>
            </span>
        <?php endif; ?>
        <input type="submit" value="SIGN UP">
      </form>
    </div>
  </div>


  <!-- Register Section End -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('users.layout.loginMaster', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>