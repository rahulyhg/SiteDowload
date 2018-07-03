<h3 class="text-center text-warning">Current Orders</h3>
<table class="table">
  <thead>
    <tr>
      <th>Title</th>
      <th>Description</th>
      <th>Messages</th>
    </tr>
  </thead>
  <tbody>
    <?php $__currentLoopData = $currOrders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $currOrder): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <tr>
        <td>
          <a style="text-decoration:underline;" href="<?php echo e(route('services.show',[$currOrder->service->id, Auth::user()->id])); ?>"><?php echo e((strlen($currOrder->service->service_title)>40) ? substr($currOrder->service->service_title, 0, 40) . '...' : $currOrder->service->service_title); ?></a>
        </td>
        <td>
          <p style="">
            <?php echo (strlen(strip_tags($currOrder->service->description))>120) ? substr(strip_tags($currOrder->service->description), 0, 100) . '...' : strip_tags($currOrder->service->description); ?>

          </p>
        </td>
        <td>
          <a href="<?php echo e(route('buyer.buyerToSellerMessages', $currOrder->id)); ?>" target="_blank" class="btn btn-warning">View</a>
        </td>
      </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </tbody>
</table>
<div class="row text-center">
  <?php echo e($currOrders->links()); ?>

</div>
