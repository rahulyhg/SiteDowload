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
      <link rel="stylesheet" href="<?php echo e(asset('assets/users/css/style.css')); ?>">
      <!--Responsive Css-->
      <link href="<?php echo e(asset('assets/users/css/responsive.css')); ?>" rel="stylesheet">
      
      <link href="<?php echo e(url('/')); ?>/assets/admin/css/themes/base-color.php?color=<?php echo e($gs->base_color_code); ?>&secColor=<?php echo e($gs->sec_color_code); ?>" rel="stylesheet">
      <script src="<?php echo e(asset('assets/users/js/jquery.js')); ?>"></script>
      <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
      <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
      <link rel="stylesheet" href="<?php echo e(asset('assets/users/css/multi-item-slide.css')); ?>">
      <link rel="stylesheet" href="<?php echo e(asset('assets/users/css/scrollbar.css')); ?>">
      <script src="<?php echo e(asset('assets/users/js/multi-item-slide.js')); ?>"></script>
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
      <div class="animation-element">
         <!-- End Pre-Loader -->
         <!--support bar  top start-->
         <div class="support-bar-top wow slideInLeft" data-wow-duration="2s" id="raindrops-green">
            <div class="container">
               <div class="row">
                  <div class="col-md-6">
                     <div class="contact-info">
                        <span style="color:white;margin-right:10px;"><i class="fa fa-envelope email" aria-hidden="true"></i> <?php echo e($gs->email); ?></span>
                        <span style="color:white;"><i class="fa fa-phone" aria-hidden="true"></i> <?php echo e($gs->phone); ?></span>
                     </div>
                  </div>
                  <div class="col-md-6 text-right bounceIn">
                     <div class="contact-admin">
                        <?php if(auth()->guard()->guest()): ?>
                        <a href="<?php echo e(route('login')); ?>"><i class="fa fa-user"></i> LOGIN </a>
                        <a href="<?php echo e(route('register')); ?>"><i class="fa fa-user-plus"></i> REGISTER</a>
                        <?php endif; ?>
                        <div class="support-bar-social-links">
                          <?php $__currentLoopData = $socials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $social): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <a href="<?php echo e($social->url); ?>"><i class="fa fa-<?php echo e($social->fontawesome_code); ?>" aria-hidden="true"></i></a>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                           
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
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
                  <form class="" action="<?php echo e(route('users.searchServices')); ?>" method="get">
                     <input placeholder="Search Services Here..." class="form-control" type="text" name="searchTerm" value="">
                  </form>
               </div>

               <div class="col-md-5 text-right">
                  <ul id="header-menu" class="header-navigation">
                     <li><a href="<?php echo e(route('users.home')); ?>">Home</a></li>
                     
                     <?php if(auth()->guard()->check()): ?>
                     <li>
                        <a class="page-scroll" href="#">
                        Buyer <i class="fa fa-angle-down"></i>
                        </a>
                        <ul class="mega-menu mega-menu1 mega-menu2 menu-position-5 buyer-dropdown">
                           <li class="mega-list mega-list1">
                              <a class="page-scroll" href="<?php echo e(route('buyer.myShopping')); ?>">My Shopping</a>
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
                        Account <i class="fa fa-angle-down"></i>
                        <?php endif; ?>
                        </a>
                        <?php if(auth()->guard()->guest()): ?>
                        <ul class="mega-menu mega-menu1 mega-menu2 menu-postion-4">
                           <li class="mega-list mega-list1">
                              <a class="page-scroll" href="<?php echo e(route('login')); ?>">Login</a>
                              <a class="page-scroll" href="<?php echo e(route('register')); ?>">Register</a>
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
                              <a style="cursor:pointer;" class="page-scroll" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
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
      <div>
         <?php echo $__env->yieldContent('carousel'); ?>
      </div>
      <div class="clearfix"></div>
      <div class="bet-section">
         <div style="padding:0px 20px;">
            <div class="row">


               <div class="col-sm-12">
                 <div class="col-sm-10">
                   <?php echo $__env->yieldContent('content'); ?>
                 </div>
                 <div class="col-sm-2">
                    <aside class="right">
                      <?php
                        $smallAd = show_ad(1);
                      ?>
                      <div class="widget-content">
                         <div class="panel-advertise">
                           <?php if($smallAd[0]->type == 1): ?>
                              <a onclick="increaseAdView(<?php echo e($smallAd[0]->id); ?>)" href="<?php echo e($smallAd[0]->url); ?>" target="_blank">
                               <img style="width:100%;" src="<?php echo e(asset('assets/users/ad_images/'.$smallAd[0]->image)); ?>" alt="addvertisement-02">
                              </a>
                           <?php else: ?>
                              <?php echo $smallAd[0]->script; ?>

                           <?php endif; ?>
                         </div>
                      </div>
                      <div class="widget-content">
                         <div class="widget__title card__header card__header--has-btn">
                            <div class="widget_title1">
                               <h4>Services</h4>
                            </div>
                         </div>
                         <marquee scrollamount="5" onmouseover="this.stop()" onmouseout="this.start()" direction = "up" style="height:350px;overflow:hidden;">
                           <div class="widget__content card__content widget_list">
                              <?php $__currentLoopData = $featuredGigs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $featuredGig): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="side-category-item">
                                   <p style="margin:0px;"><a href="<?php echo e(route('services.show', ['id'=>$featuredGig->id, 'userID'=>$featuredGig->user->id])); ?>"><b><?php echo e($featuredGig->service_title); ?></b></a></p>
                                   <h5> <span class="label label-primary pull-right">Featured</span> <span class="label label-danger pull-right">Price: <?php echo e($featuredGig->price); ?> <?php echo e($gs->base_curr_symbol); ?></span></h5>
                                </div>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                           </div>
                         </marquee>
                      </div>


                       <div class="widget-content">
                          <div class="widget__title card__header card__header--has-btn">
                             <div class="widget_title1">
                                <h4>Categories</h4>
                             </div>
                          </div>
                          <div style="height:500px;overflow-y:scroll;" class="widget__content card__content widget_list">
                             <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                               <div class="side-category-item">
                                  <a href="<?php echo e(route('users.servicesAccoordingToCat', $category->id)); ?>"><b><?php echo e($category->name); ?></b></a>
                               </div>
                             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          </div>
                       </div>
                       <?php
                       $longAd = show_ad(3);
                       ?>
                       
                       <div class="widget-content">
                          <div class="panel-advertise">
                             <?php if($longAd[0]->type == 1): ?>
                                <a onclick="increaseAdView(<?php echo e($longAd[0]->id); ?>)" href="<?php echo e($longAd[0]->url); ?>" target="_blank">
                                   <img style="width:100%;" src="<?php echo e(asset('assets/users/ad_images/'.$longAd[0]->image)); ?>" alt="addvertisement-02">
                                </a>
                             <?php else: ?>
                                <?php echo $longAd[0]->script; ?>

                             <?php endif; ?>
                          </div>
                       </div>
                    </aside>
                 </div>
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
      <!--payment method section start-->
      <section class="client-section client-section1 section-padding">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="section-header wow zoomInDown" data-wow-duration="2s">
                     <h2>PAYMENT <span> WE ACCEPT</span></h2>
                     <p><img src="<?php echo e(asset('assets/users/interfaceControl/logoIcon/icon.jpg')); ?>" alt="icon"></p>
                  </div>
                  <!-- section-heading -->
                  <div class="section-wrapper">
                     <div class="client-list">
                        <!-- Swiper -->
                        <div class="carousel slide row" data-ride="carousel" data-type="multi" data-interval="2000" id="fruitscarousel">

                            <div class="carousel-inner">
                              <?php $__currentLoopData = $gateways; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gateway): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($loop->first): ?>
                                <div class="item active">
                                    <div class="col-sm-2 col-xs-12">
                                      <img src="<?php echo e(asset('assets/users/img/gateway/' . $gateway->gateimg)); ?>" alt="">
                                    </div>
                                </div>
                                <?php else: ?>
                                <div class="item">
                                    <div class="col-sm-2 col-xs-12">
                                      <img src="<?php echo e(asset('assets/users/img/gateway/' . $gateway->gateimg)); ?>" alt="">
                                    </div>
                                </div>
                                <?php endif; ?>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>

                            <a class="left carousel-control" href="#fruitscarousel" data-slide="prev"><i class="glyphicon glyphicon-chevron-left"></i></a>
                            <a class="right carousel-control" href="#fruitscarousel" data-slide="next"><i class="glyphicon glyphicon-chevron-right"></i></a>

                        </div>
                        <!-- client container -->
                     </div>
                     <!-- client list-->
                  </div>
                  <!-- swiper wrapper -->
               </div>
            </div>
            <!-- row -->
         </div>
         <!-- container -->
      </section>
      <!--end payment method section start-->
      <!--footer area start-->
      <footer id="contact" class="footer-area">
         <!--footer area start-->
         <div class="footer-bottom">
            <div class="footer-support-bar">
               <!-- Footer Support List Start -->
               <div class="footer-support-list">
                  <ul>
                     <?php $__currentLoopData = $supports; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $support): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                       <li class="wow bounceInDown" data-wow-duration="1s" data-wow-delay="1s">
                          <div class="footer-thumb"><i class="fa fa-<?php echo e($support->fontawesome_code); ?>"></i></div>
                          <div class="footer-content">
                             <p><?php echo e($support->title); ?></p>
                          </div>
                       </li>
                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </ul>
               </div>
               <!-- Footer Support End -->
            </div>
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
         <div id="back-to-top" class="scroll-top back-to-top" data-original-title="" title="" >
            <i class="fa fa-angle-up"></i>
         </div>
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
      
      <script>
         function increaseAdView(adID) {
            var fd = new FormData();
            fd.append('adID', adID);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-Token': $('meta[name=_token]').attr('content')
                }
            });
            $.ajax({
               url: '<?php echo e(route('admin.ad.increaseAdView')); ?>',
               type: 'POST',
               data: fd,
               contentType: false,
               processData: false,
               success: function(data) {
                  console.log(data);
               }
            });
         }
      </script>
   </body>
</html>
