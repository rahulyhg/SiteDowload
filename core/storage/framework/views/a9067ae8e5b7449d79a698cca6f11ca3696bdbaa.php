

<?php $__env->startSection('meta-ajax'); ?>
  <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
	
<?php $__env->stopSection(); ?>

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
                       <span class="caption-subject bold uppercase">Ads Management</span>
                    </div>
                    <div class="actions">
                       <a href="<?php echo e(route('admin.ad.create')); ?>" class="btn btn-success">Add New</a>
                    </div>
                 </div>
                 <div class="portlet-body">

                    <table class="table table-bordered">
                       <thead>
                          <tr>
                             <th>Ad Type</th>
                             <th>Add Size</th>
                             <th>Views</th>
                             <th>Action</th>
                          </tr>
                       </thead>
                       <tbody>
                          <?php $__currentLoopData = $ads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ad): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr id="row_17">
                               <td>
                                 <?php if($ad->type == 1): ?>
                                   <h3>Banner</h3>
                                 <?php elseif($ad->type == 2): ?>
                                   <h3>Script</h3>
                                 <?php endif; ?>
                               </td>
                               <td>
                                  <?php if($ad->size == 1): ?>
                                    <h6>300 X 250</h6>
                                  <?php elseif($ad->size == 2): ?>
                                    <h6>728 X 90</h6>
                                  <?php elseif($ad->size == 3): ?>
                                    <h6>300 X 600</h6>
                                  <?php endif; ?>
                               </td>
                               <td><label class="label label-success"><?php echo e($ad->views); ?></label></td>
                               <td>
                                  <a class="btn btn-sm btn-primary" onclick="showImageInModal(event, <?php echo e($ad->id); ?>)"><i class="fa fa-eye"></i> Show</a>
                                  <a class="btn btn-danger" data-id="17" href="#" data-toggle="modal" data-target="#advertise-delete-data<?php echo e($ad->id); ?>" id="advert_delete_btn">Delete</a>
                               </td>
                            </tr>
                            <!--advertise delete modal-->
                            <div class="modal fade" id="advertise-delete-data<?php echo e($ad->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                               <div class="" role="document">
                                  <div class="modal-content">
                                     <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Advertise Remove</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                        </button>
                                     </div>
                                     <div class="modal-body">
                                        <input type="hidden" id="addvertise_id" value="17" name="addvertise_id">
                                        <h3 class="text text-danger"><strong>Are Your Sure To Delete This Advertise ?</strong></h3>
                                     </div>
                                     <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <form style="display:inline-block;" action="<?php echo e(route('admin.ad.delete')); ?>" method="post">
                                          <?php echo e(csrf_field()); ?>

                                          <input type="hidden" name="adID" value="<?php echo e($ad->id); ?>">
                                          <button type="submit" class="btn red" id="delete_confirm">Confirm Delete</button>
                                        </form>

                                     </div>
                                  </div>
                               </div>
                            </div>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                       </tbody>
                    </table>
                 </div>
              </div>
           </div>
        </div>
     </div>
     <!-- END CONTENT BODY -->
  </div>
  <?php if ($__env->exists('admin.interfaceControl.Ad.showImageModal')) echo $__env->make('admin.interfaceControl.Ad.showImageModal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>


<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
  <script>
    function showImageInModal(e, adID) {
      e.preventDefault();
      var fd = new FormData();
      fd.append('adID', adID);
      $.get(
        '<?php echo e(route('admin.ad.showImage')); ?>',
        {
          adID: adID,
        },
        function(data) {
          $('#showImageModal').modal('show');
          if (data.script == null) {
            document.getElementById('adImage').style.display = 'block';
            document.getElementById('script').style.display = 'none';
            document.getElementById('adImage').src = '<?php echo e(asset('assets/users/ad_images')); ?>'+'/'+data.image;
          }
          if (data.image == null) {
            document.getElementById('script').style.display = 'block';
            document.getElementById('adImage').style.display = 'none';
            document.getElementById('script').innerHTML = data.script;
          }
          console.log(data);
        }
      );
    }
  </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>