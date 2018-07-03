<?php $__env->startSection('body'); ?>
  <div class="page-content-wrapper">
     <div class="page-content" style="min-height:361px">
        <h3 class="page-title uppercase bold"> <i class="fa fa-money"></i> add / substruct balance</h3>
        <hr>
        <div class="row">
           <div class="col-md-8">
              <div class="portlet box blue">
                 <div class="portlet-title">
                    <div class="caption uppercase bold">
                       <i class="fa fa-cog"></i>   add / substruct balance to <?php echo e($user->username); ?>

                    </div>
                 </div>
                 <div class="portlet-body">
                    <form action="<?php echo e(route('admin.updateUserBalance')); ?>" method="post">
                      <?php echo e(csrf_field()); ?>

                      <input type="hidden" name="userID" value="<?php echo e($user->id); ?>">
                       <div class="row uppercase">
                          <div class="col-md-5">
                             <div class="form-group">
                                <label class="col-md-12"><strong>OPERATION</strong></label>
                                <div class="col-md-12">
                                   <input name="operation" type="checkbox" data-toggle="toggle" data-height="46" data-width="100%" data-onstyle="success" data-offstyle="danger" data-on="ADD MONEY" data-off="SUBTRACT MONEY" <?php echo e((old('operation')=='on')?'checked':''); ?>>
                                </div>
                             </div>
                          </div>
                          <div class="col-md-7">
                             <div class="form-group">
                                <label class="col-md-12"><strong>Amount</strong></label>
                                <div class="col-md-12">
                                   <div class="input-group mb15">
                                      <input class="form-control input-lg" name="amount" type="text" value="<?php echo e(old('amount')); ?>">
                                      <span class="input-group-addon">USD</span>
                                   </div>
                                   <?php if($errors->has('amount')): ?>
                                     <p class="text-danger"><?php echo e($errors->first('amount')); ?></p>
                                   <?php endif; ?>
                                </div>
                             </div>
                          </div>
                       </div>
                       <!-- row -->
                       <div class="row uppercase">
                          <div class="col-md-12">
                             <div class="form-group">
                                <label class="col-md-12"><strong>Message</strong></label>
                                <div class="col-md-12">
                                   <textarea name="message" rows="2" class="form-control" placeholder="if any"><?php echo e(old('message')); ?></textarea>
                                </div>
                             </div>
                          </div>
                       </div>
                       <!-- row -->
                       <br><br>
                       <div class="row uppercase">
                          <div class="col-md-12">
                             <button type="submit" class="btn btn-success btn-lg btn-block"> SUBMIT </button>
                          </div>
                       </div>
                       <!-- row -->
                    </form>
                 </div>
              </div>
           </div>
           <div class="col-md-4">
              <div class="portlet box green">
                 <div class="portlet-title">
                    <div class="caption uppercase bold">
                       <i class="fa fa-money"></i>  CURRENT BALANCE
                    </div>
                 </div>
                 <div class="portlet-body uppercase text-center">
                    <h1>CURRENT BALANCE OF <br> <strong><?php echo e($user->username); ?></strong></h1>
                    <br>
                    <h1><strong><?php echo e($user->balance); ?> <?php echo e($gs->base_curr_text); ?></strong></h1>
                 </div>
              </div>
           </div>
        </div>
        <!-- ROW-->
     </div>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>