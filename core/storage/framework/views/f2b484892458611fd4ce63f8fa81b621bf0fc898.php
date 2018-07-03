<?php $__env->startPush('styles'); ?>
  <style media="screen">

    .content-container {
      padding:0px 50px;
    }

    @media  screen and (max-width: 500px) {
      .content-container {
        padding:0px 0px;
      }

    }

  </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('meta-ajax'); ?>
	<meta name="_token" content="<?php echo e(csrf_token()); ?>" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('title', 'Service Details'); ?>

<?php $__env->startSection('servicePrice'); ?>
  <div class="widget-content">
     <div class="widget__title card__header card__header--has-btn">
        <div class="widget_title1">
           <h4>Price</h4>
        </div>
     </div>
     <div class="widget__content card__content">
        <div class="bet-winer-sidebar">
          <div class="panel-body selected-bet-user">
          </div>
          <div class="panel-footer user-bet-footer">
             <div class="right">
                Service Price
                <span id="total_bet_amount"><b><?php echo e($service->price); ?> </b></span> <?php echo e($gs->base_curr_symbol); ?>

             </div>
             <div class="left">
                <input type="hidden" id="total_amount" name="total_amount" value="">
                <button type="button" class="btn btn-success btn-sm" onclick="placeOrder(<?php echo e($service->id); ?>)">Order Now</button>
             </div>
           </div>
        </div>
     </div>
  </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
  <div class="content-container">
      <h1 style=""><?php echo e($service->service_title); ?></h1>
      <div class="">
        <?php if(count($service->serviceImages) == 1): ?>
          <img src="<?php echo e(asset('assets/users/service_images/' . $service->serviceImages->first()->image_name)); ?>" alt="">
        <?php else: ?>
          <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
              <?php for($i=0; $i < count($service->serviceImages); $i++): ?>
                <li data-target="#carousel-example-generic" data-slide-to="<?php echo e($i); ?>" <?php echo e($i==0 ? 'class="active"' : ''); ?>></li>
              <?php endfor; ?>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
              <?php $__currentLoopData = $service->serviceImages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $serviceImage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="item <?php echo e(($loop->first) ? 'active' : ''); ?>">
                  <img style="width:100%" src="<?php echo e(asset('assets/users/service_images/' . $serviceImage->image_name)); ?>" alt="...">
                </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            <!-- Controls -->
            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
              <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
              <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
        <?php endif; ?>
      </div><br>
      <div class="">
        <p style="">
          <strong>Category: </strong>
          <?php echo e($service->category->name); ?>

        </p>
        <p style="">
          <strong>Tags: </strong>
          <?php $__currentLoopData = $service->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <span class="badge"><?php echo e($tag->name); ?></span>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </p>
        <p style=""><strong>Maximum Days to Complete: </strong><?php echo e($service->max_days); ?> days</p>
        <div class="jumbotron">
          <h2 class="text-center">Description</h2>
          <p><?php echo $service->description; ?></p>
        </div>
        <?php if(auth()->guard()->check()): ?>
          <?php if(Auth::user()->id != $service->user->id): ?>
            <div class="row text-center">
              <p><strong>Price: </strong><?php echo e($service->price); ?> <?php echo e($gs->base_curr_symbol); ?></p>
              <button type="button" class="btn btn-danger btn-lg" onclick="placeOrder(<?php echo e($service->id); ?>)">Order Now</button>
            </div><br>
          <?php endif; ?>
        <?php endif; ?>

        <div class="fb-comments" data-href="<?php echo e(url()->current()); ?>" data-numposts="5"></div>

      </div>
  </div>
<?php $__env->stopSection(); ?>


<?php $__env->startComponent('users.components.balanceShortage'); ?>
<?php echo $__env->renderComponent(); ?>
<?php $__env->startComponent('users.components.success'); ?>
<?php echo $__env->renderComponent(); ?>

<?php $__env->startPush('scripts'); ?>
  <?php if(auth()->guard()->check()): ?>
    <script>
        function placeOrder(serviceID) {
          var fd = new FormData();
          fd.append('serviceID', serviceID);
          $.ajaxSetup({
              headers: {
                  'X-CSRF-Token': $('meta[name=_token]').attr('content')
              }
          });
          // console.log(token + ' ' + serviceID);
          var c = confirm('Are you sure you want to place this order?');

          if(c == true) {
            $.ajax({
              url: '<?php echo e(route('buyer.placeOrder')); ?>',
              type: 'POST',
              data: fd,
              contentType: false,
              processData: false,
              success: function(data) {
                // if user balance runs into shortage...
                console.log(data);
                if(typeof data.balance != 'undefined') {
                  var snackbar = document.getElementById('snackbar');
                  snackbar.innerHTML = "You don't have enough balance to buy this Gig!";
                  snackbar.className = "show";
                  setTimeout(function(){ snackbar.className = snackbar.className.replace("show", ""); }, 3000);
                }
                 // if order is placed successfully...
                else {
                  var url = "<?php echo e(route('buyer.contactOrder')); ?>/" + data;
                  var snackbarSuccess = document.getElementById('snackbarSuccess');
                  snackbarSuccess.innerHTML = "Order has been placed successfully!";
                  snackbarSuccess.className = "show";
                  setTimeout(function() {
                    snackbarSuccess.className = snackbarSuccess.className.replace("show", "");
                  }, 3000);
                  window.location.href = url;
                }
              }
            });
          }

        }
    </script>
  <?php endif; ?>
  <?php if(auth()->guard()->guest()): ?>
    <script>
      function placeOrder(serviceID) {
        window.location = '<?php echo e(route('login')); ?>';
      }
    </script>
  <?php endif; ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('users.layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>