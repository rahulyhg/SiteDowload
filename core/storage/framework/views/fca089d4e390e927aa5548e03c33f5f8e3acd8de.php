

<?php $__env->startSection('meta-ajax'); ?>
<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('body'); ?>
  <div class="page-content-wrapper">
     <div class="page-content" style="min-height:394px">
        <h3 class="page-title uppercase bold"> <i class="fa fa-desktop"></i> View ALL Services</h3>
        <hr>
        <div class="row">
           <div class="col-md-12">
              <div class="portlet box blue">
                 <div class="portlet-title">
                    <div class="caption">
                       <i class="fa fa-list"></i>  FEATURED SERVICES LIST
                    </div>
                    <div class="actions">
                       PAGE <?php echo e($featuredServices->currentPage()); ?> OF <?php echo e($featuredServices->lastPage()); ?>

                    </div>
                 </div>
                 <?php if(count($featuredServices) == 0): ?>
                 <div class="portlet-body">
                    <h1 class="text-center"> NO RESULT FOUND !</h1>
                    <!-- print pagination -->
                    <div class="row">
                       <div class="text-center">
                          <ul class="pagination">
                          </ul>
                       </div>
                    </div>
                    <!-- row -->
                    <!-- END print pagination -->
                 </div>
                 <?php else: ?>
                 <div class="portlet-body">
                    <div class="table-scrollable">
                       <table class="table table-bordered table-hover">
                          <thead>
                             <tr>
                                <th> # </th>
                                <th> Title </th>
                                <th> Description </th>
                                <th> Actions </th>
                             </tr>
                          </thead>
                          <tbody>
                              <?php
                                $i=0;
                              ?>
                             <?php $__currentLoopData = $featuredServices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                             <tr class="bold">
                                <td> <?php echo e(++$i); ?> </td>
                                <td> <h4 style="margin:0px;"><a class="title" href="<?php echo e(route('services.show', [$service->id, $service->user->id])); ?>"><?php echo e(strlen($service->service_title) > 20 ? substr($service->service_title, 0, 20) . '...' : $service->service_title); ?></a></h4> </td>
                                <td> <p><?php echo e((strlen(strip_tags($service->description)) > 50) ? substr(strip_tags($service->description), 0, 50) . '...' : strip_tags($service->description)); ?></p> </td>
                                <td>
                                  <button id="hideShowBtn<?php echo e($service->id); ?>" class="btn btn-danger" type="button" name="button" onclick="showHideGig(event,<?php echo e($service->id); ?>)"><?php echo e($service->show==1?'Hide':'Show'); ?></button>
                                  <button id="featureStatusBtn<?php echo e($service->id); ?>" class="btn btn-success" type="button" name="button" onclick="changeFeatureStatus(event,<?php echo e($service->id); ?>)"><?php echo e($service->feature==1?'Unfeature':'Feature'); ?></button>
                                </td>
                             </tr>
                             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          </tbody>
                       </table>
                    </div>
                    <!-- print pagination -->
                    <div class="row">
                       <div class="text-center">
                          <?php echo e($featuredServices->links()); ?>

                       </div>
                    </div>
                    <!-- row -->
                    <!-- END print pagination -->
                 </div>
                 <?php endif; ?>
              </div>
           </div>
        </div>
        <!-- ROW-->
     </div>
  </div>
<?php $__env->stopSection(); ?>

<?php if ($__env->exists('admin.gigManagement.partials.ajaxFunc')) echo $__env->make('admin.gigManagement.partials.ajaxFunc', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php echo $__env->make('admin.layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>