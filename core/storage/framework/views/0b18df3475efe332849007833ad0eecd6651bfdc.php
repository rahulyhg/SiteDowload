

<?php $__env->startSection('body'); ?>
  <div class="page-content-wrapper">
     <div class="page-content" style="min-height:361px">
        <h3 class="page-title uppercase bold">Paramètres de contact</h3>
        <hr>
        <div class="row">
           <div class="col-md-12">
              <!-- BEGIN SAMPLE FORM PORTLET-->
              <div class="portlet light bordered">
                 <div class="portlet-body form">
                    <?php if($errors->any()): ?>
                        <div class="alert alert-danger">
                            <ul>
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo e($error); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                    <form class="form-horizontal" action="<?php echo e(route('admin.contact.update')); ?>" method="post" role="form">
                       <?php echo e(csrf_field()); ?>

                       <div class="form-body">
                          <div class="form-group">
                             <label class="col-md-12 "><strong style="text-transform: uppercase;">EMAIL</strong></label>
                             <div class="col-md-12">
                                <input class="form-control input-lg" name="email" value="<?php echo e($gs->email); ?>" type="text">
                             </div>
                          </div>
                          <div class="form-group">
                             <label class="col-md-12 "><strong style="text-transform: uppercase;">mobile</strong></label>
                             <div class="col-md-12">
                                <input class="form-control input-lg" name="phone" value="<?php echo e($gs->phone); ?>" type="text">
                             </div>
                          </div>
                          <div class="row">
                             <div class="col-md-12">
                                <button type="submit" class="btn blue btn-block btn-lg">mettre à jour</button>
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