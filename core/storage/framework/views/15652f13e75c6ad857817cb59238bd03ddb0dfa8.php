<?php $__env->startSection('title', 'Withdraw Money'); ?>

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
  <div class="table-border table-responsive">
    <table class="table table-bordered ">
      <thead>
        <tr>
          <th>Nom</th>
          <th>Limite/Trx</th>
          <th>Charge/Trx</th>
          <th>Temps de traitement</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php $__currentLoopData = $wms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $wm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
           <td id="method<?php echo e($wm->id); ?>"><?php echo e($wm->name); ?></td>
           <td><b><?php echo e($wm->min_limit); ?> </b> TO <b><?php echo e($wm->max_limit); ?> <?php echo e($gs->base_curr_text); ?></b></td>
           <td><b><?php echo e($wm->fixed_charge); ?> </b> + <b><?php echo e($wm->percentage_charge); ?> % <?php echo e($gs->base_curr_text); ?></b></td>
           <td><b><?php echo e($wm->process_time); ?></b></td>
           <td>
              <button onclick="showWithdrawMoneyModal(<?php echo e($wm->id); ?>, document.getElementById('method<?php echo e($wm->id); ?>').innerHTML)" type="button" class="btn btn-warning">Récupérer</button>
           </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </tbody>
    </table>
  </div>

  
  <?php if ($__env->exists('users.withdrawMoney.requestWithdraw')) echo $__env->make('users.withdrawMoney.requestWithdraw', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('users.layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>