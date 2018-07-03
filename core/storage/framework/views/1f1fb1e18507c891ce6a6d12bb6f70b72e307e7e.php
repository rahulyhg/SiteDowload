<?php $__env->startSection('meta-ajax'); ?>
  <meta name="_token" content="<?php echo e(csrf_token()); ?>" />
<?php $__env->stopSection(); ?>



<?php $__env->startPush('styles'); ?>
  <style media="screen">
      .rating-propic-container {
        width:60px;
        float:left;
        margin-right:10px;
        height:60px;
      }
      .comment-propic-container {
        float: left;
        margin-right: 10px;
      }
  </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('title', 'Profile'); ?>

<?php $__env->startSection('content'); ?>
  <div class="content-container">
      <ul class="nav nav-tabs">
          <li class="active"><a data-toggle="tab" href="#services">Mes annonces</a></li>
          <li><a data-toggle="tab" href="#ratings">Évaluations</a></li>
          <li><a data-toggle="tab" href="#comments">Commentaires</a></li>
      </ul>
      <div class="tab-content">
          <div id="services" class="tab-pane fade in active">
              <?php if ($__env->exists('users.profile.partials._services')) echo $__env->make('users.profile.partials._services', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
          </div>
          <div id="ratings" class="tab-pane fade">
              <?php if ($__env->exists('users.profile.partials._ratings')) echo $__env->make('users.profile.partials._ratings', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
          </div>
          <div id="comments" class="tab-pane fade">
              <?php if ($__env->exists('users.profile.partials._comments')) echo $__env->make('users.profile.partials._comments', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
          </div>
      </div>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('users.layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>