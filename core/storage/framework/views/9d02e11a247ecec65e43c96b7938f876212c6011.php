

<?php $__env->startSection('body'); ?>
  <div class="page-content-wrapper">
     <div class="page-content" style="min-height:394px">
        <h3 class="page-title uppercase bold"> <i class="fa fa-desktop"></i> View ALL USERS</h3>
        <hr>
        <div class="row">
           <div class="col-md-12">
              <div class="portlet box blue">
                 <div class="portlet-title">
                    <div class="caption">
                       <i class="fa fa-list"></i>  ALL USERS LIST
                    </div>
                    <div class="actions">
                       PAGE <?php echo e($users->currentPage()); ?> OF <?php echo e($users->lastPage()); ?>

                    </div>
                 </div>
                 <?php if(count($users) == 0): ?>
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
                                <th> NAME </th>
                                <th> EMAIL </th>
                                <th> MOBILE </th>
                                <th> BALANCE </th>
                                <th> COUNTRY </th>
                                <th> DETAILS </th>
                             </tr>
                          </thead>
                          <tbody>
                              <?php
                                $i=0;
                              ?>
                             <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                             <tr class="bold">
                                <td> <?php echo e(++$i); ?> </td>
                                <td> <?php echo e($user->username); ?> </td>
                                <td> <?php echo e($user->email); ?> </td>
                                <td> <?php echo e($user->phone); ?> </td>
                                <td> <?php echo e($user->balance); ?> USD </td>
                                <td> <?php echo e($user->country); ?> </td>
                                <td><a target="_blank" href="<?php echo e(route('admin.userDetails', $user->id)); ?>" class="btn btn-success btn-md">
                                   <i class="fa fa-desktop"></i> VIEW DETAILS</a>
                                </td>
                             </tr>
                             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          </tbody>
                       </table>
                    </div>
                    <!-- print pagination -->
                    <div class="row">
                       <div class="text-center">
                          <?php echo e($users->links()); ?>

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

<?php echo $__env->make('admin.layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>