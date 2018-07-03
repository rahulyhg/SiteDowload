

<?php $__env->startSection('body'); ?>
<div class="page-content-wrapper">
   <div class="page-content" style="min-height:536px">
      <h3 class="page-title uppercase bold"> <i class="fa fa-desktop"></i> Deposit Log</h3>
      <hr>
      <div class="row">
         <div class="col-md-12">
            <div class="portlet box blue">
               <div class="portlet-title">
                  <div class="caption">
                     <i class="fa fa-list"></i>  Deposit Log
                  </div>
                  <div class="actions">
                     PAGE <?php echo e($data['deposits']->currentPage()); ?> OF <?php echo e($data['deposits']->lastPage()); ?>

                  </div>
               </div>
               <div class="portlet-body">
                 <?php if(count($data['deposits']) == 0): ?>
                   <h1>NO DATA FOUND!</h1>
                 <?php else: ?>
                   <div class="table-scrollable">
                      <table class="table table-bordered table-hover">
                         <thead>
                            <tr>
                               <th> # </th>
                               <th> METHOD </th>
                               <th> USER </th>
                               <th> AMOUNT </th>
                               <th> CHARGE </th>
                               <th> TIME </th>
                               <th> STATUS</th>
                            </tr>
                         </thead>
                         <tbody>
                           <?php
                             $i = 0;
                           ?>
                           <?php $__currentLoopData = $data['deposits']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $deposit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                           <tr class="warning">
                              <td> <?php echo e(++$i); ?> </td>
                              <td> <?php echo e($deposit->gateway->name); ?> </td>
                              <td><?php echo e($deposit->user->username); ?></td>
                              <td class="bold"> <?php echo e($deposit->amount); ?> <?php echo e($gs->base_curr_text); ?> </td>
                              <td class="bold"> <?php echo e(($deposit->amount - $deposit->wc_amount)); ?> <?php echo e($gs->base_curr_text); ?> </td>
                              <td> <?php echo e($deposit->created_at->format('l jS \\of F Y h:i:s A')); ?>  </td>
                              <td> <?php echo e($deposit->status == 0? 'incomplete' : 'complete'); ?> </td>
                           </tr>
                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                         </tbody>
                      </table>
                   </div>
                 <?php endif; ?>

                  <!-- print pagination -->
                  <div class="row">
                     <div class="text-center">
                        <?php echo e($data['deposits']->links()); ?>

                     </div>
                  </div>
                  <!-- row -->
                  <!-- END print pagination -->
               </div>
            </div>
         </div>
      </div>
      <!-- ROW-->
   </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>