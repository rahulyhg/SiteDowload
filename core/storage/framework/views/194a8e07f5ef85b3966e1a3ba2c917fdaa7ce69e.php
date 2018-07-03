<?php $__env->startSection('title', 'My Shopping'); ?>

<?php $__env->startSection('content'); ?>
  <div class="shopping-container">
    <ul class="nav nav-tabs">
      <li class="active"><a data-toggle="tab" href="#completed">Contrats achetés <span class="badge"><?php echo e(\App\Order::where('status', 2)->where('buyer_id', Auth::user()->id)->count()); ?></span></a></li>
      <li><a data-toggle="tab" href="#corders">Contrats en cours <span class="badge"><?php echo e(\App\Order::where('status', 1)->where('buyer_id', Auth::user()->id)->count()); ?></span></a></li>
      <li><a data-toggle="tab" href="#porders">Contrats en attente <span class="badge"><?php echo e(\App\Order::where('status', 0)->where('buyer_id', Auth::user()->id)->count()); ?></span></a></li>
      <li><a data-toggle="tab" href="#rejorders">Contrats rejetés <span class="badge"><?php echo e(\App\Order::where('status', -1)->where('buyer_id', Auth::user()->id)->count()); ?></span></a></li>
    </ul>

    <div class="tab-content" style="padding-top:20px;">
      <div id="completed" class="tab-pane fade in active">
        <?php if ($__env->exists('users.shopping.partials._completedOrders')) echo $__env->make('users.shopping.partials._completedOrders', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
      </div>
      <div id="corders" class="tab-pane fade">
        <?php if ($__env->exists('users.shopping.partials._currentOrders')) echo $__env->make('users.shopping.partials._currentOrders', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
      </div>
      <div id="porders" class="tab-pane fade">
        <?php if ($__env->exists('users.shopping.partials._pendingOrders')) echo $__env->make('users.shopping.partials._pendingOrders', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
      </div>
      <div id="rejorders" class="tab-pane fade">
        <?php if ($__env->exists('users.shopping.partials._rejectedOrders')) echo $__env->make('users.shopping.partials._rejectedOrders', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
      </div>
    </div>
  </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('users.layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>