


<?php $__env->startPush('nic-editor-scripts'); ?>
  <script src="<?php echo e(asset('assets/admin/js/nic-edit/nicEdit.js')); ?>" type="text/javascript"></script>
  <script type="text/javascript">
    bkLib.onDomLoaded(function() {
          new nicEditor({iconsPath : "<?php echo e(asset('assets/admin/js/nic-edit/nicEditorIcons.gif')); ?>"}).panelInstance('footerTextArea');
    });
  </script>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('body'); ?>
  <div class="page-content-wrapper">
     <div class="page-content" style="min-height:392px">
        <h3 class="page-title uppercase bold">set Footer text</h3>
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
                    <form class="form-horizontal" action="<?php echo e(route('admin.footer.update')); ?>" method="post" role="form">
                      <?php echo e(csrf_field()); ?>

                       <div class="form-body">
                          <div class="form-group">
                             <label class="col-md-12"><strong style="text-transform: uppercase;">TEXT</strong></label>
                             <div class="col-md-12">
                                <textarea id="footerTextArea" style="width:100%;" class="form-control" name="footer" rows="8" cols="80"><?php echo $footer->footer; ?></textarea>
                             </div>
                          </div>
                          <br>
                          <div class="row">
                             <div class="col-md-12">
                                <button type="submit" class="btn blue btn-block btn-lg">UPDATE</button>
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