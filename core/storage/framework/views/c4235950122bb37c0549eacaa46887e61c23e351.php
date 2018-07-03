

<?php $__env->startSection('meta-ajax'); ?>
  <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
	
<?php $__env->stopSection(); ?>


<?php $__env->startSection('body'); ?>
<div class="page-content-wrapper">
   <div class="page-content" style="min-height:536px">
      <h3 class="page-title  uppercase bold"> Withdraw Method Management
         <button type="button" class="btn btn-primary  btn-md pull-right edit_button" data-toggle="modal" data-target="#addModal" data-act="Add New" data-name="" data-id="0">
         <i class="fa fa-plus"></i>  ADD NEW
         </button>
      </h3>
      <hr>
      <div id="wmsContainerID">
          <?php if($errors->any()): ?>
              <div class="alert alert-danger">
                  <ul>
                      <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <li><?php echo e($error); ?></li>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </ul>
              </div>
          <?php endif; ?>

         <div class="row">
            <div class="col-md-12">
               <!-- BEGIN EXAMPLE TABLE PORTLET-->
               <div class="portlet light bordered">
                  <div class="portlet-body">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>Name</th>
                          <th>Limit/Trx</th>
                          <th>Charge/Trx</th>
                          <th>Process Time</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $__currentLoopData = $data['wms']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $wm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                           <td><?php echo e($wm->name); ?></td>
                           <td><b><?php echo e($wm->min_limit); ?> </b> TO <b><?php echo e($wm->max_limit); ?> <?php echo e($gs->base_curr_text); ?></b></td>
                           <td><b><?php echo e($wm->fixed_charge); ?> </b> + <b><?php echo e($wm->percentage_charge); ?> %</b></td>
                           <td><b><?php echo e($wm->process_time); ?></b></td>
                           <td>
                              <button type="button" class="btn purple btn-sm edit_button" data-toggle="modal" data-target="#myModal" data-act="Edit" data-ptm="2-4" data-cp="2" data-cd="1" data-max="10000" data-min="100" data-name="bKash" data-id="1" onclick="showEditModal(<?php echo e($wm->id); ?>)">
                              <i class="fa fa-edit"></i> EDIT
                              </button>
                              <button id="enableDisableBtnID<?php echo e($wm->id); ?>" type="button" class="btn btn-danger btn-sm delete_button" data-toggle="modal" data-target="#DelModal" data-id="1" onclick="enableDisableWM(<?php echo e($wm->id); ?>)"><?php echo e(($wm->deleted==1)?'Enable':'Disable'); ?></button>
                           </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </tbody>
                    </table>
                  </div>
               </div>
               <!-- END EXAMPLE TABLE PORTLET-->
            </div>
         </div>
         <!-- ROW-->
      </div>

   </div>
   <!-- END CONTENT BODY -->
</div>



<?php if ($__env->exists('admin.WithdrawMoney.withdrawMethod.partials._add')) echo $__env->make('admin.WithdrawMoney.withdrawMethod.partials._add', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>


<?php if ($__env->exists('admin.WithdrawMoney.withdrawMethod.partials._delete')) echo $__env->make('admin.WithdrawMoney.withdrawMethod.partials._delete', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>


<?php if ($__env->exists('admin.WithdrawMoney.withdrawMethod.partials._edit')) echo $__env->make('admin.WithdrawMoney.withdrawMethod.partials._edit', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>