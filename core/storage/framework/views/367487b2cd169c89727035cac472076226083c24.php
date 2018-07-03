<?php $__env->startSection('body'); ?>
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">


  <div class="page-content-wrapper">
     <div class="page-content" style="min-height:361px">
        <h3 class="page-title uppercase bold"> Dashboard <small>Statistics</small></h3>
        <hr>
        <div class="row">
           <div class="col-md-12">
               <div class="portlet box blue">
                   <div class="portlet-title">
                       <div class="caption uppercase bold"><i class="fas fa-chart-line"></i> Withdraw Chart </div>
                   </div>
                   <div class="portlet-body">
                       <div class="row">
                           <div class="col-md-12">
                               <div id="myfirstchart" style="height: 250px;"></div>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
        </div>
        <?php

           $trans = \App\Withdraw::orderBy('id', 'desc')->take(10)->get();


           $main_chart_data = "[";

           foreach ($trans as $index => $data)
           {
            $main_chart_data .= "{ year: '".date('Y-m-d', strtotime($data->created_at))."' , value:  ".abs($data->amount)."  }".",";
           }

           $main_chart_data .= "]";





       ?>
        <div class="row">
           <div class="col-md-12">
              <div class="portlet box blue">
                 <div class="portlet-title">
                    <div class="caption">
                       <i class="fa fa-users"></i> USERS STATISTICS
                    </div>
                 </div>
                 <div class="portlet-body text-center">
                    <div class="row">
                       <!-- START -->
                       <a href="<?php echo e(route('admin.allUsers')); ?>">
                          <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12" style="margin-bottom: 20px;">
                             <div class="dashboard-stat blue">
                                <div class="visual">
                                   <i class="fa fa-users"></i>
                                </div>
                                <div class="details">
                                   <div class="number">
                                      <span data-counter="counterup" data-value="<?php echo e(\App\User::count()); ?>"><?php echo e(\App\User::count()); ?></span>
                                   </div>
                                   <div class="desc uppercase"> TOTAL  USERS</div>
                                </div>
                             </div>
                          </div>
                       </a>
                       <!-- END -->
                       <!-- START -->
                       <a href="<?php echo e(route('admin.bannedUsers')); ?>">
                          <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12" style="margin-bottom: 20px;">
                             <div class="dashboard-stat red">
                                <div class="visual">
                                   <i class="fa fa-times"></i>
                                </div>
                                <div class="details">
                                   <div class="number">
                                      <span data-counter="counterup" data-value="<?php echo e(\App\User::where('status', 'blocked')->count()); ?>"><?php echo e(\App\User::where('status', 'blocked')->count()); ?></span>
                                   </div>
                                   <div class="desc uppercase"> BANNED  USERS </div>
                                </div>
                             </div>
                          </div>
                       </a>
                       <!-- END -->
                       <!-- START -->
                       <a href="<?php echo e(route('admin.verifiedUsers')); ?>">
                          <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12" style="margin-bottom: 20px;">
                             <div class="dashboard-stat green">
                                <div class="visual">
                                   <i class="fa fa-check"></i>
                                </div>
                                <div class="details">
                                   <div class="number">
                                      <span data-counter="counterup" data-value="<?php echo e(\App\User::where('email_verified', 1)->where('sms_verified', 1)->count()); ?>"><?php echo e(\App\User::where('email_verified', 1)->where('sms_verified', 1)->count()); ?></span>
                                   </div>
                                   <div class="desc uppercase"> Verified  USERS </div>
                                </div>
                             </div>
                          </div>
                       </a>
                       <!-- END -->
                       <!-- START -->
                       <a href="<?php echo e(route('admin.mobileUnverifiedUsers')); ?>">
                          <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12" style="margin-bottom: 20px;">
                             <div class="dashboard-stat yellow">
                                <div class="visual">
                                   <i class="fa fa-mobile"></i>
                                </div>
                                <div class="details">
                                   <div class="number">
                                      <span data-counter="counterup" data-value="<?php echo e(\App\User::where('sms_verified', 0)->count()); ?>"><?php echo e(\App\User::where('sms_verified', 0)->count()); ?></span>
                                   </div>
                                   <div class="desc uppercase"> Mobile Unverified Users </div>
                                </div>
                             </div>
                          </div>
                       </a>
                       <!-- END -->
                       <!-- START -->
                       <a href="<?php echo e(route('admin.emailUnverifiedUsers')); ?>">
                          <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12" style="margin-bottom: 20px;">
                             <div class="dashboard-stat yellow">
                                <div class="visual">
                                   <i class="fa fa-envelope"></i>
                                </div>
                                <div class="details">
                                   <div class="number">
                                      <span data-counter="counterup" data-value="<?php echo e(\App\User::where('email_verified', 0)->count()); ?>"><?php echo e(\App\User::where('email_verified', 0)->count()); ?></span>
                                   </div>
                                   <div class="desc uppercase"> Email Unverified Users </div>
                                </div>
                             </div>
                          </div>
                       </a>
                       <!-- END -->
                       <!-- START -->
                       <a href="<?php echo e(route('gigManagement.allGigs')); ?>">
                          <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12" style="margin-bottom: 20px;">
                             <div class="dashboard-stat yellow">
                                <div class="visual">
                                   <i class="fa fa-tasks"></i>
                                </div>
                                <div class="details">
                                   <div class="number">
                                      <span data-counter="counterup" data-value="<?php echo e(\App\Service::count()); ?>"><?php echo e(\App\Service::count()); ?></span>
                                   </div>
                                   <div class="desc uppercase"> Total Services </div>
                                </div>
                             </div>
                          </div>
                       </a>
                       <!-- END -->
                    </div>
                 </div>
              </div>
           </div>
        </div>

  </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
  <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
  <script>
      $(document).ready(function () {
          new Morris.Bar({
              element: 'myfirstchart',
              data: <?php echo $main_chart_data  ?>,
              xkey: 'year',
              ykeys: ['value'],
              // chart.
              labels: ['Value']
          });
      });
  </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>