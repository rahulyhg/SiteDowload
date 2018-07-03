

<?php $__env->startSection('title', 'Login'); ?>

<?php $__env->startPush('styles'); ?>
    <style media="screen">
        .login-admin1 {
          padding:0px 100px;
        }
        @media  screen and (max-width: 500px) {
            .login-admin1 {
                padding: 0px 10px;
            }
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
  <!-- Login Section Start -->

    <div class="login-admin login-admin1" style="">
      <div class="login-header">
        <h2>Existing <span>customer</span></h2>
      </div>
      <div class="login-form">
        <form action="<?php echo e(route('login')); ?>" method="post">
          <?php echo e(csrf_field()); ?>

          <input type="text" name="username" value="<?php echo e(old('username')); ?>" placeholder="Enter Username" >
          <?php if($errors->has('username')): ?>
              <span style="color: red;">
                  <strong><?php echo e($errors->first('username')); ?></strong>
              </span>
          <?php endif; ?>
          <input type="password" name="password" placeholder="Password">
          <?php if($errors->has('password')): ?>
              <span style="color: red;">
                  <strong><?php echo e($errors->first('password')); ?></strong>
              </span>
          <?php endif; ?>
          <input type="submit" value="Login">

          
          <a href="<?php echo e(route('users.showEmailForm')); ?>">Forgot my password</a>
          
        </form>
      </div>
      
      </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('users.layout.loginMaster', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>