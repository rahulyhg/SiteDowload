

<?php $__env->startSection('body'); ?>
<div class="page-content-wrapper">
   <div class="page-content" style="min-height:361px">
      <h3 class="page-title uppercase bold"> <i class="fa fa-desktop"></i> Withdraw Log - Pending</h3>
      <hr>
      <div class="row">
         <div class="col-md-12">
            <div class="portlet box green">
               <div class="portlet-title">
                  <div class="caption">
                     <i class="fa fa-list"></i>  Withdraw Log - Pending
                  </div>
                  <div class="actions">
                     PAGE <?php echo e($withdraws->currentPage()); ?> OF <?php echo e($withdraws->lastPage()); ?>

                  </div>
               </div>
               <div class="portlet-body">
                 <?php if(count($withdraws) == 0): ?>
                   <h1 class="text-center"> NO RESULT FOUND !</h1>
                 <?php else: ?>
                   <table class="table table-bordered" style="width:100%;">
                     <thead>
                       <tr>
                         <th>#</th>
                         <th>METHOD</th>
                         <th>USER</th>
                         <th>AMOUNT</th>
                         <th>CHARGE</th>
                         <th>TIME</th>
                         <th>TRX #</th>
                         <th>STATUS</th>
                         <th>DETAILS</th>
                       </tr>
                     </thead>
                     <tbody>
                       <?php
                         $i = 0;
                       ?>
                       <?php $__currentLoopData = $withdraws; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $withdraw): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                       <tr>
                         <td><?php echo e(++$i); ?></td>
                         <td><?php echo e($withdraw->withdrawMethod->name); ?></td>
                         <td><?php echo e($withdraw->user->username); ?></td>
                         <td><?php echo e($withdraw->amount); ?> <?php echo e($gs->base_curr_text); ?></td>
                         <td><?php echo e($withdraw->charge); ?> <?php echo e($gs->base_curr_text); ?></td>
                         <td><?php echo e($withdraw->created_at->format('l jS \\of F Y h:i:s A')); ?></td>
                         <td><?php echo e($withdraw->trx); ?></td>
                         <td><?php echo e($withdraw->status); ?></td>
                         <td>
                           <a target="_blank" class="btn btn-warning" href="<?php echo e(route('withdrawLog.show', $withdraw->id)); ?>">Details</a>
                         </td>
                       </tr>
                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                     </tbody>
                   </table>
                 <?php endif; ?>

                  <!-- print pagination -->
                  <div class="row">
                     <div class="text-center">
                        <?php echo e($withdraws->links()); ?>

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