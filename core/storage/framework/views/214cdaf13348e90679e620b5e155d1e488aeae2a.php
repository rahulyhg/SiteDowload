<?php $__env->startPush('styles'); ?>
  <style media="screen">
  .service-image-container {
    float:left;
    margin-right:10px;
  }
  .media-heading {
    display: inline-block;
  }
  .media-heading-price-container {
    color: white;
  }
  .service-description {
    color: black;
    padding:0px;
  }
  .username {
    padding:0px;
    text-align:right;
  }
  .description-username-container {
    padding:0px;
  }
  @media  screen and (max-width: 500px) {
    .single-service {
      padding: 0px 0px !important;
    }

  }
  </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('meta-ajax'); ?>
	<meta name="_token" content="<?php echo e(csrf_token()); ?>" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('title', 'Home'); ?>


<?php $__env->startSection('carousel'); ?>
  <div style="" id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">

      <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="item <?php if($loop->first): ?> active <?php endif; ?>">
          <img style="width:100%;" src="<?php echo e(asset('assets/users/interfaceControl/slider_images/'.$slider->image)); ?>" alt="Los Angeles" style="width:100%;">
          <div class="carousel-caption">
            <h1 style="color:white;"><?php echo e($slider->bold_text); ?></h1>
            <h4 style="color:white;"><?php echo e($slider->small_text); ?></h4>
          </div>
        </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
  <div class="widget__title card__header card__header--has-btn">
     <div class="widget_title1">
        <h4>All Services</h4>
     </div>
  </div>
  <br><br>

  <div class="list-group">
    <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div class="media single-service" style="padding:0px 40px;">
        <div class="service-image-container">
          <a href="#">
            <img style="width:80px;height:80px;" class="media-object" src="<?php echo e(asset('assets/users/service_images/'.$service->serviceImages()->first()->image_name)); ?>" alt="...">
            <?php if($service->feature == 1): ?>
              <h5><span style="display:block;" class="label label-primary">Featured</span></h5>
            <?php endif; ?>
          </a>
        </div>
        <div class="media-body">
          <div class="media-heading-price-container">
            <h2 class="media-heading"><a href="<?php echo e(route('services.show', [$service->id, $service->user->id])); ?>" class="text-primary"><?php echo (strlen($service->service_title)>40) ? substr($service->service_title, 0, 40) . '...' : $service->service_title; ?></a></h2>
            <small class="pull-right text-danger"><strong><?php echo e($service->price); ?> <?php echo e($gs->base_curr_symbol); ?></strong></small>
          </div>
          <p style="clear:both;"></p>
          <div class="col-md-12 description-username-container">
            <p class="service-description col-md-10">
              <?php echo (strlen(strip_tags($service->description))>120) ? substr(strip_tags($service->description), 0, 120) . '...' : strip_tags($service->description); ?>

            </p>
            <small class="col-md-2 username"><strong><a class="text-danger" href="<?php echo e(route('users.profile', $service->user->id)); ?>"><?php echo e($service->user->username); ?></a></strong></small>
          </div>
          <div class="row">
            <div class="col-md-6">
              <button style="margin-right:10px;" class="btn btn-sm btn-primary pull-left" type="button" name="button"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> <?php echo e(count($service->orders()->where('like', 1)->get())); ?></button>
              <button class="btn btn-sm btn-warning pull-left" type="button" name="button"><i class="fa fa-thumbs-o-down" aria-hidden="true"></i> <?php echo e(count($service->orders()->where('like', 0)->get())); ?></button>
            </div>
            <div class="col-md-6">
              <button class="btn btn-danger btn-sm pull-right" class="pull-right" onclick="placeOrder(<?php echo e($service->id); ?>)">
                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                Order Now
              </button>
            </div>
          </div>
        </div>
        <?php if(!$loop->last): ?>
        <hr>
        <?php endif; ?>
      </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <div class="row">
      <div class="text-center">
        <?php echo e($services->links()); ?>

      </div>
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
                  console.log(url);
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

<?php echo $__env->make('users.layout.homeMaster', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>