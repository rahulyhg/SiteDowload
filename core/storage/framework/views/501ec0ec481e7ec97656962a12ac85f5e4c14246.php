<?php $__env->startSection('body'); ?>
  <div class="page-content-wrapper">
     <div class="page-content" style="min-height:361px">
        <h3 class="page-title uppercase bold"> Profile Management</h3>
        <hr>
        <div class="row">
           <div class="col-md-12">
              <div class="portlet light bordered">
                 <div class="portlet-body form">
                    <form class="form-horizontal" action="<?php echo e(route('admin.updateProfile', $admin->id)); ?>" method="post">
                       <?php echo e(csrf_field()); ?>

                       <input type="hidden" name="adminID" value="<?php echo e($admin->id); ?>">
                       <div class="form-body">
                          <div class="form-group">
                             <label class="col-md-3 control-label"><strong>FULL NAME</strong></label>
                             <div class="col-md-6">
                                <input class="form-control input-lg" name="name" value="<?php echo e($admin->name); ?>" placeholder="Your Full Name" type="text">
                                <?php if($errors->has('name')): ?>
                                  <p style="margin:0px;" class="text-danger"><?php echo e($errors->first('name')); ?></p>
                                <?php endif; ?>
                             </div>
                          </div>
                          <div class="form-group">
                             <label class="col-md-3 control-label"><strong>EMAIL</strong></label>
                             <div class="col-md-6">
                                <input class="form-control input-lg" name="email" value="<?php echo e($admin->email); ?>" placeholder="Your Email" type="email">
                                <?php if($errors->has('email')): ?>
                                  <p style="margin:0px;" class="text-danger"><?php echo e($errors->first('email')); ?></p>
                                <?php endif; ?>
                             </div>
                          </div>
                          <div class="form-group">
                             <label class="col-md-3 control-label"><strong>MOBILE</strong></label>
                             <div class="col-md-6">
                                <input class="form-control input-lg" name="phone" value="<?php echo e($admin->phone); ?>" placeholder="Your Mobile Number" type="text">
                                <?php if($errors->has('phone')): ?>
                                  <p style="margin:0px;" class="text-danger"><?php echo e($errors->first('phone')); ?></p>
                                <?php endif; ?>
                             </div>
                          </div>
                          <div class="row">
                             <div class="col-md-offset-3 col-md-6">
                                <button type="submit" class="btn blue btn-block">UPDATE</button>
                             </div>
                          </div>
                       </div>
                    </form>
                 </div>
              </div>
           </div>
        </div>
        <!---ROW-->
     </div>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>