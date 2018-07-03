

<?php $__env->startSection('title', 'Add Fund'); ?>

<?php $__env->startSection('profile-info'); ?>
  
  <div class="widget-content">
    <div class="widget__content card__content extar-margin">
      <div class="panel-group" id="accordion">
           <div class="panel">
                <div class="panel-heading side-events-item">
                  <div class="">
                    <div>
                        <img style="display:block;margin:auto;" src="<?php echo e(asset('assets/users/propics/' . $user->pro_pic)); ?>" alt="">
                    </div>
                 </div>
                </div>
            </div>
            <div class="panel">
                 <div class="panel-heading side-events-item">
                   <div class="">
                     <div>
                         <h2 style="color:white;margin:0px;"><a style="text-decoration:underline;" href="<?php echo e(route('users.profile', $user->id)); ?>"><?php echo e($user->username); ?></a></h2>
                     </div>
                  </div>
                 </div>
            </div>
            <div class="panel">
                 <div class="panel-heading side-events-item">
                   <div class="">
                     <div>
                         <p style="margin:0px;">
                           <strong><i class="fa fa-plus" aria-hidden="true"></i> Join Date</strong> Apr 22, 2018
                         </p>
                     </div>
                  </div>
                 </div>
            </div>
            <div class="panel">
                 <div class="panel-heading side-events-item">
                   <div class="">
                     <div>
                         <p style="margin:0px;">
                           <strong><i class="fa fa-star" aria-hidden="true"></i> Buyer Rating</strong> 90%
                         </p>
                     </div>
                  </div>
                 </div>
            </div>
            <div class="panel">
                 <div class="panel-heading side-events-item">
                   <div class="">
                     <div>
                         <p style="margin:0px;">
                           <strong><i class="fa fa-thumbs-o-up"></i> Positive Rating</strong> 9
                         </p>
                     </div>
                  </div>
                 </div>
            </div>
            <div class="panel">
                 <div class="panel-heading side-events-item">
                   <div class="">
                     <div>
                         <p style="margin:0px;">
                           <strong><i class="fa fa-thumbs-o-down"></i> Negative Rating</strong> 1
                         </p>
                     </div>
                  </div>
                 </div>
            </div>
            <div class="panel">
                 <div class="panel-heading side-events-item">
                   <div class="">
                     <div>
                         <p style="margin:0px;">
                           <strong><i class="fa fa-eye" aria-hidden="true"></i> Last Seen</strong> Today
                         </p>
                     </div>
                  </div>
                 </div>
            </div>
      </div>
    </div>
  </div>
  
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
  <div class="row">
      <?php if($errors->any()): ?>
          <div class="alert alert-danger">
              <ul>
                  <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <li><?php echo e($error); ?></li>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </ul>
          </div>
      <?php endif; ?>

      <?php $__currentLoopData = $gateways; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gateway): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <div class="col-md-4">
              <div class="panel panel-primary">
                  <div class="panel-heading">
                      <h4 class="text-center" style="text-transform:uppercase;color:white;margin-top:10px;"><?php echo e($gateway->name); ?></h4>
                  </div>
                  <div class="panel-body">
                      <img src="<?php echo e(asset('assets/users/img/gateway/' . $gateway->gateimg)); ?>" alt="">
                  </div>
                  <div class="panel-footer">
                      <button class="btn btn-primary btn-block" data-toggle="modal" data-target="#amountModal<?php echo e($gateway->id); ?>">Select</button>
                  </div>
              </div>
          </div>
          <!-- Modal -->
          <div id="amountModal<?php echo e($gateway->id); ?>" class="modal fade" role="dialog">
              <div class="modal-dialog">

                  <!-- Modal content-->
                  <div class="modal-content">
                      <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title">Add Fund</h4>
                      </div>
                      <div class="modal-body">
                          <form id="depositFormId" class="" method="post" action="<?php echo e(route('depositPreview')); ?>">
                              <?php echo e(csrf_field()); ?>

                              <input type="hidden" name="gateway" value="<?php echo e($gateway->id); ?>">
                              <input type="hidden" name="minamo" value="<?php echo e($gateway->minamo); ?>">
                              <input type="hidden" name="maxamo" value="<?php echo e($gateway->maxamo); ?>">
                              <div class="form-group">
                                  <label for="usr">Amount you want to add to your account:</label>
                                  <div class="input-group">
                                    <input type="text" name="amount" class="form-control" placeholder="">
                                    <span class="input-group-addon"><?php echo e($gs->base_curr_text); ?></span>
                                  </div>
                              </div>
                              <div class="form-group">
                                  <input class="btn btn-primary btn-block" type="submit" name="" value="Preview">
                              </div>
                          </form>
                          <script>

                          </script>
                      </div>
                      <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      </div>
                  </div>

              </div>
          </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </div>


  
<?php $__env->stopSection(); ?>

<?php echo $__env->make('users.layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>