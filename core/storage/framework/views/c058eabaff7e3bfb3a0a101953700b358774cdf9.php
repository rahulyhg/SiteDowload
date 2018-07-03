<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <?php echo $__env->yieldContent('meta-ajax'); ?>
      <title><?php echo e($gs->website_title); ?> | <?php echo $__env->yieldContent('title'); ?></title>
      <!--Favicon add-->
      <link rel="shortcut icon" type="image/png" href="<?php echo e(asset('assets/users/interfaceControl/logoIcon/icon.jpg')); ?>">
      <!--bootstrap Css-->
      <link href="<?php echo e(asset('assets/users/css/bootstrap.min.css')); ?>" rel="stylesheet">
      <!--font-awesome Css-->
      <link href="<?php echo e(asset('assets/users/css/font-awesome.min.css')); ?>" rel="stylesheet">
      <!-- Lightcase  Css-->
      <link href="<?php echo e(asset('assets/users/css/lightcase.css')); ?>" rel="stylesheet">
      <!--WOW Css-->
      <link href="<?php echo e(asset('assets/users/css/animate.min.css')); ?>" rel="stylesheet">
      <!--Slick Slider Css-->
      <link href="<?php echo e(asset('assets/users/css/slick.css')); ?>" rel="stylesheet">
      <!--Slick Nav Css-->
      <link href="<?php echo e(asset('assets/users/css/slicknav.min.css')); ?>" rel="stylesheet">
      <!--Swiper  Css-->
      <link href="<?php echo e(asset('assets/users/css/swiper.min.css')); ?>" rel="stylesheet">
      <!--Style Css-->
      <link href="<?php echo e(asset('assets/users/css/style.css')); ?>" rel="stylesheet">
      <!--Responsive Css-->
      <link href="<?php echo e(asset('assets/users/css/responsive.css')); ?>" rel="stylesheet">
      <link rel="stylesheet" href="<?php echo e(asset('assets/users/css/style.css')); ?>">
      
      <link href="<?php echo e(url('/')); ?>/assets/admin/css/themes/base-color.php?color=<?php echo e($gs->base_color_code); ?>&secColor=<?php echo e($gs->sec_color_code); ?>" rel="stylesheet">
      <link rel="stylesheet" href="<?php echo e(asset('assets/users/css/scrollbar.css')); ?>">
      <link rel="stylesheet" href="<?php echo e(asset('assets/admin/css/sweetalert.css')); ?>">
      <script src="<?php echo e(asset('assets/users/js/jquery.js')); ?>"></script>
      <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
      <link rel="stylesheet" href="<?php echo e(asset('assets/users/css/multi-item-slide.css')); ?>">
      <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
      <script src="<?php echo e(asset('assets/users/js/multi-item-slide.js')); ?>"></script>
      <script src="<?php echo e(asset('assets/admin/js/sweetalert.js')); ?>"></script>

      <?php echo $__env->yieldPushContent('styles'); ?>
      <?php echo $__env->yieldPushContent('scripts'); ?>
      <?php echo $__env->yieldPushContent('nic-editor-scripts'); ?>

      <style media="screen">
         .search-bar {
            padding: 30px 0px;
         }
      </style>
      
   </head>
   <body  data-spy="scroll">
      <!-- End Preload -->

      <!--support bar  top end-->
      <!--main menu section start-->
      <nav class="main-menu wow slideInRight" data-wow-duration="2s">
         <div class="container">
            <div class="row">
               <div class="col-md-3">
                  <div class="logo">
                     <a href="<?php echo e(route('users.home')); ?>"><img src="<?php echo e(asset('assets/users/interfaceControl/logoIcon/logo.jpg')); ?>" style="max-height:60px;"></a>
                  </div>
               </div>

               <div class="col-md-offset-1 col-md-3 col-xs-8 col-xs-offset-2 search-bar">
                 <!-- <form class="" action="<?php echo e(route('users.searchServices')); ?>" method="get">
                    <input placeholder="Search Services Here..." class="form-control" type="text" name="searchTerm" value="">
                 </form> -->
              </div>

               <div class="col-md-5 text-right">
                  <ul id="header-menu" class="header-navigation">

                     
                     <?php if(auth()->guard()->check()): ?>
                     <li>
                        <a class="page-scroll" href="#">
                        Contrats <i class="fa fa-angle-down"></i>
                        </a>
                        <ul class="mega-menu mega-menu1 mega-menu2 menu-postion-2">
                           <li class="mega-list mega-list1">
                              <a class="page-scroll" href="<?php echo e(route('buyer.myShopping')); ?>">Mes achats</a>
                           </li>
                        </ul>
                     </li>
                     <?php endif; ?>
                     <?php if(auth()->guard()->check()): ?>
                     <li>
                        <a class="page-scroll" href="#">
                        Seller <i class="fa fa-angle-down"></i>
                        </a>
                        <ul class="mega-menu mega-menu1 mega-menu2 menu-postion-2">
                           <li class="mega-list mega-list1">
                              <a class="page-scroll" href="<?php echo e(route('services.create')); ?>">Sell a service</a>
                              <a class="page-scroll" href="<?php echo e(route('services.index')); ?>">Manage Services</a>
                              <a class="page-scroll" href="<?php echo e(route('seller.manageSales')); ?>">Manage Sales</a>
                           </li>
                        </ul>
                     </li>
                     <?php endif; ?>
                     <li>
                        <a class="page-scroll" href="#">
                        <?php if(auth()->guard()->check()): ?>
                        <?php echo e(Auth::user()->username); ?> <i class="fa fa-angle-down"></i>
                        <?php endif; ?>
                        <?php if(auth()->guard()->guest()): ?>
                        Nous Rejoindre <i class="fa fa-angle-down"></i>
                        <?php endif; ?>
                        </a>
                        <?php if(auth()->guard()->guest()): ?>
                        <ul class="mega-menu mega-menu1 mega-menu2 menu-postion-4">
                           <li class="mega-list mega-list1">
                              <a class="page-scroll" href="<?php echo e(route('login')); ?>">connexion</a>
                              <a class="page-scroll" href="<?php echo e(route('register')); ?>">inscription</a>
                           </li>
                        </ul>
                        <?php endif; ?>
                        <?php if(auth()->guard()->check()): ?>
                        <ul class="mega-menu mega-menu1 mega-menu2 menu-postion-4">
                           <li class="mega-list mega-list1">
                              <a class="page-scroll" href="<?php echo e(route('users.profile', Auth::user()->id)); ?>">Profile</a>
                              <a class="page-scroll" href="<?php echo e(route('addFund')); ?>">Add Fund</a>
                              <a class="page-scroll" href="<?php echo e(route('withdrawMoney')); ?>">Withdraw Money</a>
                              <a class="page-scroll" href="<?php echo e(route('editProfile')); ?>">Edit Profile</a>
                              <a class="page-scroll" href="<?php echo e(route('editPassword')); ?>">Change Password</a>
                              <a style="cursor:pointer;" class="page-scroll" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Deconnexion</a>
                              <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                 <?php echo csrf_field(); ?>
                              </form>
                           </li>
                        </ul>
                        <?php endif; ?>
                     </li>
                  </ul>
               </div>
            </div>
         </div>
      </nav>

      <div class="clearfix"></div>
      <div class="bet-section">
         <div class="container">
            <div class="row">

               <div class="col-sm-8 col-md-offset-2">
                  <?php echo $__env->yieldContent('content'); ?>
               </div>

            </div>
         </div>
      </div>
      </div>
      <!-- Modal Alert for Login -->
      <div class="modal fade" id="login_alert" role="dialog">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title"> <i class="fa fa-bell"></i> Login Alert!</h4>
               </div>
               <div class="modal-body">
                  <p>Please login to place bet</p>
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-info pull-left" data-dismiss="modal">Close</button>
                  <a href="http://localhost/bet_ver_09/login" class="btn btn-success pull-right">Login</a>
               </div>
            </div>
         </div>
      </div>
      <!-- Online Section End -->
      <div class="clearfix"></div>
      <div class="clearfix"></div>

      <!--end payment method section start-->
      <!--footer area start-->
      <footer id="contact" class="footer-area">
         <!--footer area start-->
         <div class="footer-bottom">

            <div class="container">
               <div class="row">
                  <div class="col-md-4 col-sm-12 wow fadeInLeft" data-wow-duration="3s">
                     <p class="copyright-text">
                     </p>
                  </div>
                  <div class="col-md-4 col-sm-9 wow bounceInDown" data-wow-duration="3s">
                     <p class="copyright-text">
                        <?php echo $gs->footer; ?>

                     </p>
                  </div>
                  <div class="col-md-4 col-sm-3 wow fadeInRight" data-wow-duration="3s">
                  </div>
               </div>
            </div>
         </div>
         <!-- <div id="back-to-top" class="scroll-top back-to-top" data-original-title="" title="" >
            <i class="fa fa-angle-up"></i>
         </div> -->
      </footer>
      <!--Google Map APi Key-->
      <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAHzPSV2jshbjI8fqnC_C4L08ffnj5EN3A"></script>
      <!--jquery script load-->
      <script src="<?php echo e(asset('assets/users/js/jquery.js')); ?>"></script>
      <script src="<?php echo e(asset('assets/users/js/bootstrap.min.js')); ?>"></script>
      <!-- Gmap Load Here -->
      <script src="<?php echo e(asset('assets/users/js/gmaps.js')); ?>"></script>
      <!-- Highlight script load-->
      <script src="<?php echo e(asset('assets/users/js/highlight.min.js')); ?>"></script>
      <!--Jquery Ui Slider script load-->
      <script src="<?php echo e(asset('assets/users/js/jquery-ui-slider.min.js')); ?>"></script>
      <!--Circleful Js File Load-->
      <script src="<?php echo e(asset('assets/users/js/jquery.circliful.js')); ?>"></script>
      <!--CounterUp script load-->
      <script src="<?php echo e(asset('assets/users/js/jquery.counterup.min.js')); ?>"></script>
      <!-- Ripples  script load-->
      <script src="<?php echo e(asset('assets/users/js/jquery.ripples-min.js')); ?>"></script>
      <!--Slick Nav Js File Load-->
      <script src="<?php echo e(asset('assets/users/js/jquery.slicknav.min.js')); ?>"></script>
      <!--Lightcase Js File Load-->
      <script src="<?php echo e(asset('assets/users/js/lightcase.js')); ?>"></script>
      <!--RainDrops script load-->
      <script src="<?php echo e(asset('assets/users/js/raindrops.js')); ?>"></script>
      <!--Easing script load-->
      <script src="<?php echo e(asset('assets/users/js/easing-min.js')); ?>"></script>
      <!--Slick Slider Js File Load-->
      <script src="<?php echo e(asset('assets/users/js/slick.min.js')); ?>"></script>
      <!--Swiper script load-->
      <script src="<?php echo e(asset('assets/users/js/swiper.min.js')); ?>"></script>
      <!--WOW script load-->
      <script src="<?php echo e(asset('assets/users/js/wow.min.js')); ?>"></script>
      <!--WayPoints script load-->
      <script src="<?php echo e(asset('assets/users/js/waypoints.min.js')); ?>"></script>
      <!--Marquee script load-->
      <script src="<?php echo e(asset('assets/users/js/marquee.js')); ?>"></script>
      <!--Main js file load-->
      <script src="<?php echo e(asset('assets/js/main.js')); ?>"></script>
      <script>
         var mobile = (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent));
         hljs.initHighlightingOnLoad();
         hljs.configure({useBR: true});
         jQuery('#raindrops').raindrops({color:'#fff',canvasHeight:5});
         jQuery('#raindrops-green').raindrops({color:'#2ecc71 ',canvasHeight:5});
      </script>
      <script>
         $(document).ready(function() {
                 $('div.headlines marquee').marquee('pointer').mouseover(function () {
              $(this).trigger('stop');
            }).mouseout(function () {
              $(this).trigger('start');
            }).mousemove(function (event) {
              if ($(this).data('drag') == true) {
                this.scrollLeft = $(this).data('scrollX') + ($(this).data('x') - event.clientX);
              }
            }).mousedown(function (event) {
              $(this).data('drag', true).data('x', event.clientX).data('scrollX', this.scrollLeft);
            }).mouseup(function () {
              $(this).data('drag', false);
            });
         });
      </script>
      <?php if(session('alert')): ?>
        <script type="text/javascript">
                $(document).ready(function(){
                    swal("Sorry!", "<?php echo e(session('alert')); ?>", "error");
                });
        </script>
      <?php endif; ?>
   </body>
</html>
