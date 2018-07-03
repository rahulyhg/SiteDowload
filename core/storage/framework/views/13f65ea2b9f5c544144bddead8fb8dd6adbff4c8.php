<?php $__env->startSection('title', 'Edit Profile'); ?>

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

<?php $__env->startPush('styles'); ?>
  <style media="screen">
    .login-admin {
      padding:0px 50px;
    }
    @media  screen and (max-width: 500px) {
      .login-admin {
        padding:0px;
      }
    }
  </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
  <!-- Register Section Start -->
  
          <div class="login-admin">
            <div class="login-header">
              <h2>Edit Profile</span></h2>
            </div>
            <div class="login-form">
              <?php if(session()->has('success')): ?>
                <div class="alert alert-success" role="alert">
                  <?php echo e(session('success')); ?>

                </div
              <?php endif; ?>
              <form action="<?php echo e(route('updateProfile')); ?>" method="post" enctype="multipart/form-data">
                <?php echo e(csrf_field()); ?>

                <?php echo method_field('PUT'); ?>
                <strong>Profile Picture:</strong><br>
                <label class="btn btn-success" style="width:200px;cursor:pointer;margin-left:-2px;margin-top:5px;">
                  <input id="proPic" name="proPic" style="display:none;" type="file" />Choose File
                </label>
                <?php if($errors->has('proPic')): ?>
                    <p>
                      <p style="color:red;">
                        <strong><?php echo e($errors->first('proPic')); ?></strong>
                      </p>
                    </p>
                <?php endif; ?>
                <br>
                <strong>First Name:</strong><br>
                <input type="text" name="firstname" placeholder="Firstname" value="<?php echo e($user->firstname); ?>">
                <?php if($errors->has('firstname')): ?>
                    <p style="color:red;">
                        <strong><?php echo e($errors->first('firstname')); ?></strong>
                    </p>
                <?php endif; ?>
                <strong>Last Name:</strong><br>
                <input type="text" name="lastname" placeholder="Lastname" value="<?php echo e($user->lastname); ?>">
                <?php if($errors->has('lastname')): ?>
                    <p style="color:red;">
                        <strong><?php echo e($errors->first('lastname')); ?></strong>
                    </p>
                <?php endif; ?>
                <br>
                <strong>Address:</strong><br>
                <input type="text" name="address" value="<?php echo e($user->address); ?>" placeholder="Address">
                <br>
                <strong>Zip Code:</strong><br>
                <input type="text" name="zip" value="<?php echo e($user->zip); ?>" placeholder="Zip Code">
                <br>
                <strong>Country:</strong><br>
                <input type="text" name="country" value="<?php echo e($user->country); ?>" placeholder="Country Name">
                <?php if($errors->has('country')): ?>
                    <p style="color:red;">
                        <strong><?php echo e($errors->first('country')); ?></strong>
                    </p>
                <?php endif; ?>
                <input type="submit" value="UPDATE PROFILE">
              </form>
            </div>
          </div>
        

  <!-- Register Section End -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('users.layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>