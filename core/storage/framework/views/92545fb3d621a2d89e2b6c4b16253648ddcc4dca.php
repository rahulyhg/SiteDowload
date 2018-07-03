<?php $__env->startPush('styles'); ?>
  <style media="screen">
    input:not(.updateBtn) {
      background-color: white !important;
    }
    .login-admin {
      padding:0px 100px;
    }
    @media  screen and (max-width: 500px) {
      .login-admin {
        padding:0px;
      }
    }
  </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('title', 'Password Change'); ?>

<?php $__env->startSection('profile-info'); ?>
  
  <div class="widget-content">
    <div class="widget__content card__content extar-margin">
      <div class="panel-group" id="accordion">
           <div class="panel">
                <div class="panel-heading side-events-item">
                  <div class="">
                    <div>
                        <img style="display:block;margin:auto;" src="<?php echo e(asset('assets/users/propics/' . $user->pro_pic)); ?>" alt="">
                    </div>
                 </div>
                </div>
            </div>
            <div class="panel">
                 <div class="panel-heading side-events-item">
                   <div class="">
                     <div>
                         <h2 style="color:white;margin:0px;"><a style="text-decoration:underline;" href="<?php echo e(route('users.profile', $user->id)); ?>"><?php echo e($user->username); ?></a></h2>
                     </div>
                  </div>
                 </div>
            </div>
            <div class="panel">
                 <div class="panel-heading side-events-item">
                   <div class="">
                     <div>
                         <p style="margin:0px;">
                           <strong><i class="fa fa-plus" aria-hidden="true"></i> Join Date</strong> Apr 22, 2018
                         </p>
                     </div>
                  </div>
                 </div>
            </div>
            <div class="panel">
                 <div class="panel-heading side-events-item">
                   <div class="">
                     <div>
                         <p style="margin:0px;">
                           <strong><i class="fa fa-star" aria-hidden="true"></i> Buyer Rating</strong> 90%
                         </p>
                     </div>
                  </div>
                 </div>
            </div>
            <div class="panel">
                 <div class="panel-heading side-events-item">
                   <div class="">
                     <div>
                         <p style="margin:0px;">
                           <strong><i class="fa fa-thumbs-o-up"></i> Positive Rating</strong> 9
                         </p>
                     </div>
                  </div>
                 </div>
            </div>
            <div class="panel">
                 <div class="panel-heading side-events-item">
                   <div class="">
                     <div>
                         <p style="margin:0px;">
                           <strong><i class="fa fa-thumbs-o-down"></i> Negative Rating</strong> 1
                         </p>
                     </div>
                  </div>
                 </div>
            </div>
            <div class="panel">
                 <div class="panel-heading side-events-item">
                   <div class="">
                     <div>
                         <p style="margin:0px;">
                           <strong><i class="fa fa-eye" aria-hidden="true"></i> Last Seen</strong> Today
                         </p>
                     </div>
                  </div>
                 </div>
            </div>
      </div>
    </div>
  </div>
  
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
  <!-- Change Password Form START -->
  
          <div class="login-admin">
            <div class="login-header">
              <h2>Changer de mot de passe</h2>
            </div>
            <div class="login-form">
              <?php if(session()->has('success')): ?>
                <div class="alert alert-success" role="alert">
                  <?php echo e(session('success')); ?>

                </div>
              <?php endif; ?>
              <form action="<?php echo e(route('updatePassword')); ?>" method="POST">
                <?php echo e(csrf_field()); ?>

                <?php echo method_field('PUT'); ?>
                <input type="password" name="old_password" placeholder="Ancien mot de passe">
                <?php if($errors->has('old_password')): ?>
                    <span style="color:red;">
                        <strong><?php echo e($errors->first('old_password')); ?></strong>
                    </span>
                <?php else: ?>
                    <?php if($errors->first('oldPassMatch')): ?>
                        <span style="color:red;">
                            <strong><?php echo e("Old password doesn't match with the existing password!"); ?></strong>
                        </span>
                    <?php endif; ?>
                <?php endif; ?>

                <input type="password" name="password" placeholder="Nouveau Mot de passe">
                <?php if($errors->has('password')): ?>
                    <span style="color:red;">
                        <strong><?php echo e($errors->first('password')); ?></strong>
                    </span>
                <?php endif; ?>
                <input type="password" name="password_confirmation" placeholder="Confirmer Mot de passe">
                <input class="updateBtn" type="submit" value="Mettre à jour">
              </form>
            </div>
          </div>
        

  <!-- Change Password Form END -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('users.layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>