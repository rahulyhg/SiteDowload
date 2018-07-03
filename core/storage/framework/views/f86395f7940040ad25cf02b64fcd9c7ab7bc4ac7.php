<h3 style="margin-top:10px;">Services</h3>
<div class="services-container">
  <div class="row">
    <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div class="col-md-4">
        <div class="panel">
          <div class="panel-heading">
              <img src="<?php echo e(asset('assets/users/service_images/' . $service->serviceImages()->first()->image_name)); ?>" alt="">
          </div>
          <div class="panel-body">
            <h5><a href="<?php echo e(route('services.show', [$service->id, $user->id])); ?>"><?php echo e((strlen($service->service_title) > 35) ? substr($service->service_title, 0, 35) . '...' : $service->service_title); ?></a></h5>
            <p>
                <span class="pull-left"><small><?php echo e($user->username); ?></small></span>
                <span class="pull-right"><small><?php echo e($service->price); ?><?php echo e($gs->base_curr_symbol); ?></small></span>
            </p>
          </div>
        </div>
      </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </div>
  <div class="row text-center">
    <?php echo e($services->links()); ?>

  </div>
</div>
