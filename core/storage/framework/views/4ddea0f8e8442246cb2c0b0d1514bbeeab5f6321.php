<h3 style="margin-top:10px;">Ratings</h3>
<?php $__currentLoopData = $ratings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rating): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <div class="well">
    <div class="media">
        <div class="media-middle rating-propic-container">
            <img style="height:100%;width:100%;border-radius:50%;" src="<?php echo e(asset('assets/users/propics/'.$rating->pro_pic)); ?>" class="media-object">
        </div>
        <div class="media-body">
          <h4 class="media-heading"><?php echo e($rating->firstname); ?> <?php echo e($rating->lastname); ?></h4>
          <p><?php echo e($rating->rating); ?></p>
        </div>
    </div>
  </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<div class="row text-center">
  <?php echo e($ratings->links()); ?>

</div>
