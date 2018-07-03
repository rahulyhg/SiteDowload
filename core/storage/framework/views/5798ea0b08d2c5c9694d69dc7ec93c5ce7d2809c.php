

<?php $__env->startSection('body'); ?>
  <div class="page-content-wrapper">
     <!-- BEGIN CONTENT BODY -->
     <div class="page-content" style="min-height:560px">
        <!-- BEGIN PAGE HEADER-->
        <div class="row">
           <div class="col-md-12">
              <div class="portlet light bordered">
                 <div class="portlet-title">
                    <div class="caption font-red-sunglo">
                       <i class="lotn-settings font-red-sunglo"></i>
                       <span class="caption-subject bold uppercase">Ads Create</span>
                    </div>
                 </div>
                 <?php if($errors->any()): ?>
                     <div class="alert alert-danger">
                         <ul>
                             <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                 <li><?php echo e($error); ?></li>
                             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                         </ul>
                     </div>
                 <?php endif; ?>

                 <div class="portlet-body">
                    <form action="<?php echo e(route('admin.ad.store')); ?>" method="POST" enctype="multipart/form-data">
                      <?php echo e(csrf_field()); ?>

                       <div class="form-group">
                          <label for="add_type"> Select Advertisement Type</label>
                          <select name="type" class="form-control" id="add_type" onchange="changeForm(this.value)">
                             
                             <option value="1">Banner</option>
                             <option value="2">Script</option>
                          </select>
                       </div>
                       <div class="form-group">
                          <label for="add_size"> Select Advertisement Size</label>
                          <select name="size" class="form-control" id="add_size">
                             
                             <option value="1">300x250</option>
                             <option value="2">728x90</option>
                             <option value="3">300x600</option>
                          </select>
                       </div>
                       <div id="urlBannerDiv">
                          <div class="form-group"><label for="redirect_url"> Redirect Url</label><input type="text" name="redirect_url" placeholder="http://thesoftking.com" class="form-control"></div>
                          <div class="form-group"><label for="add_picture">Banner</label><input type="file" name="banner"></div>
                       </div>
                       <div id="scriptDiv" style="display:none;">
                         <div class="form-group">
                           <label for="script"> Script</label>
                           <textarea name="script" id="script" cols="30" rows="10" class="form-control" placeholder="Script will be here"></textarea>
                         </div>
                       </div>
                       <div class="form-group">
                          <input type="submit" class="btn btn-success" value="Save">
                       </div>
                    </form>
                 </div>
              </div>
           </div>
        </div>
     </div>
     <!-- END CONTENT BODY -->
  </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
  <script>
    function changeForm(adType) {
      console.log(adType);
      if(adType == 1) {
        document.getElementById('scriptDiv').style.display = 'none';
        document.getElementById('urlBannerDiv').style.display = 'block';
      } else {
        document.getElementById('scriptDiv').style.display = 'block';
        document.getElementById('urlBannerDiv').style.display = 'none';
      }
    }
  </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>