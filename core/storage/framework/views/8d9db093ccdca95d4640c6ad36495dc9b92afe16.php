<h3 class="text-center text-warning">Current Orders</h3>
<table class="table">
  <thead>
    <tr>
      <th style="">Title</th>
      <th style="">Description</th>
      <th style="">Messages</th>
    </tr>
  </thead>
  <tbody>
    <?php $__currentLoopData = $penOrders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $penOrder): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <tr>
        <td>
          <a style="text-decoration:underline;" href="<?php echo e(route('services.show',[$penOrder->service->id, Auth::user()->id])); ?>"><?php echo e((strlen($penOrder->service->service_title)>40) ? substr($penOrder->service->service_title, 0, 40) . '...' : $penOrder->service->service_title); ?></a>
        </td>
        <td>
          <p style="">
            <?php echo (strlen(strip_tags($penOrder->service->description))>120) ? substr(strip_tags($penOrder->service->description), 0, 100) . '...' : strip_tags($penOrder->service->description); ?>

          </p>
        </td>
        <td>
          <a href="<?php echo e(route('buyer.buyerToSellerMessages', $penOrder->id)); ?>" target="_blank" class="btn btn-warning">View</a>
        </td>
      </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </tbody>
</table>
<div class="row text-center">
  <?php echo e($penOrders->links()); ?>

</div>
