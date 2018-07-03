<h3 class="text-center text-warning">Contrat vendu</h3>
<table class="table">
  <thead>
    <tr>
      <th>Titre</th>
      <th>Description</th>
      <th>Messages</th>
    </tr>
  </thead>
  <tbody>
    <?php $__currentLoopData = $comOrders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comOrder): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <tr>
        <td>
          <a style="text-decoration:underline;" href="<?php echo e(route('services.show',[$comOrder->service->id, Auth::user()->id])); ?>"><?php echo e((strlen($comOrder->service->service_title)>40) ? substr($comOrder->service->service_title, 0, 40) . '...' : $comOrder->service->service_title); ?></a>
        </td>
        <td>
          <p>What is Lorem Ipsum?Lorem Ipsum is simply dum...</p>
        </td>
        <td>
          <a href="<?php echo e(route('seller.sellerToBuyerMessages', $comOrder->id)); ?>" target="_blank" class="btn btn-warning">View</a>
        </td>
      </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </tbody>
</table>
<div class="row text-center">
  <?php echo e($comOrders->links()); ?>

</div>
