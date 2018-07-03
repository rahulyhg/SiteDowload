<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="_token" content="<?php echo e(csrf_token()); ?>" />
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
      <link rel="stylesheet" href="<?php echo e(asset('assets/users/css/scrollbar.css')); ?>">
      <link rel="stylesheet" href="<?php echo e(asset('assets/users/css/multi-item-slide.css')); ?>">
      <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
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
      <?php echo $gs->comment_script; ?>

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



               <div class="col-md-9 text-right">
                  <ul id="header-menu" class="header-navigation buyer-dropdown">
                     
                     <?php if(auth()->guard()->check()): ?>
                     <li>
                        <a class="page-scroll" href="#">
                        Achats <i class="fa fa-angle-down"></i>
                        </a>
                        <ul class="mega-menu mega-menu1 mega-menu2 ">
                           <li class="mega-list mega-list1">
                              <a class="page-scroll" href="<?php echo e(route('buyer.myShopping')); ?>">contrats achetés</a>
                           </li>
                        </ul>
                     </li>
                     <?php endif; ?>
                     <?php if(auth()->guard()->check()): ?>
                     <li>
                        <a class="page-scroll" href="#">
                        annonces <i class="fa fa-angle-down"></i>
                        </a>
                        <ul class="mega-menu mega-menu1 mega-menu2 menu-postion-2">
                           <li class="mega-list mega-list1">
                              <a class="page-scroll" href="<?php echo e(route('services.create')); ?>">Créer une annonce</a>
                              <a class="page-scroll" href="<?php echo e(route('services.index')); ?>">Gérer mes annonces</a>
                              <a class="page-scroll" href="<?php echo e(route('seller.manageSales')); ?>">contrats vendu</a>
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
                              <a class="page-scroll" href="<?php echo e(route('login')); ?>">Login</a>
                              <a class="page-scroll" href="<?php echo e(route('register')); ?>">Register</a>
                           </li>
                        </ul>
                        <?php endif; ?>
                        <?php if(auth()->guard()->check()): ?>
                        <ul class="mega-menu mega-menu1 mega-menu2 menu-postion-4">
                           <li class="mega-list mega-list1">
                              <a class="page-scroll" href="<?php echo e(route('users.profile', Auth::user()->id)); ?>">Profil</a>
                              <a class="page-scroll" href="<?php echo e(route('addFund')); ?>">Créditer mon compte</a>
                              <a class="page-scroll" href="<?php echo e(route('withdrawMoney')); ?>">Récuperer mes crédits</a>
                              <a class="page-scroll" href="<?php echo e(route('editProfile')); ?>">éditer profil</a>
                              <a class="page-scroll" href="<?php echo e(route('editPassword')); ?>">modifier mot de passe</a>
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
               <div class="col-sm-2">
                  <aside class="widget card widget--sidebar widget-standings left">
                    
                    <div class="widget-content">
                      <div class="widget__content card__content extar-margin">
                        <div class="panel-group" id="accordion">
                             <div class="panel">
                                  <div class="panel-heading side-events-item">
                                    <div class="">
                                      <div>
                                          <img style="display:block;margin:auto;" src="<?php echo e(asset('assets/users/propics/'.$user->pro_pic)); ?>" alt="">
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
                                             <strong><i class="fa fa-plus" aria-hidden="true"></i> Date d'inscription</strong> <?php echo e($user->created_at); ?>

                                           </p>
                                       </div>
                                    </div>
                                   </div>
                              </div>
                              <div class="panel">
                                   <div class="panel-heading side-events-item">
                                     <div class="">
                                       <div id="balanceID">
                                           <p style="margin:0px;">
                                             <strong><i class="fa fa-money" aria-hidden="true"></i> Crédit</strong> <?php echo e($user->balance); ?> <?php echo e($gs->base_curr_symbol); ?>

                                           </p>
                                       </div>
                                    </div>
                                   </div>
                              </div>
                              <!-- <div class="panel">
                                   <div class="panel-heading side-events-item">
                                     <div class="">
                                       <div>
                                           <p style="margin:0px;">
                                             <strong><i class="fa fa-thumbs-o-up"></i> Evaluation Positive</strong> <?php echo e(App\Order::where('seller_id', $user->id)->where('like', 1)->count()); ?>

                                           </p>
                                       </div>
                                    </div>
                                   </div>
                              </div> -->
                              <!-- <div class="panel">
                                   <div class="panel-heading side-events-item">
                                     <div class="">
                                       <div>
                                           <p style="margin:0px;">
                                             <strong><i class="fa fa-thumbs-o-down"></i> Evaluation Negative </strong> <?php echo e(App\Order::where('seller_id', $user->id)->where('like', 0)->count()); ?>

                                           </p>
                                       </div>
                                    </div>
                                   </div>
                              </div> -->
                              <?php if(auth()->guard()->check()): ?>
                              <!-- <div class="panel">
                                   <div class="panel-heading side-events-item">
                                     <div class="">
                                       <div>
                                           <p style="margin:0px;word-wrap: break-word;">
                                             <strong><i class="fa fa-link"></i> Referel Link</strong>
                                             <?php echo e(url('/') . "/refer/".$user->username.'/register'); ?>

                                           </p>
                                       </div>
                                    </div>
                                   </div>
                              </div> -->
                              <?php endif; ?>
                        </div>
                      </div>
                    </div>
                    
                     <?php
                       $longAd = show_ad(3);
                     ?>
                     
                     <div class="widget-content">
                       <!-- <div class="panel-advertise">
                          <?php if(!empty($longAd[0])): ?>
                              <?php if($longAd[0]->type == 1): ?>
                                 <a onclick="increaseAdView(<?php echo e($longAd[0]->id); ?>)" href="<?php echo e($longAd[0]->url); ?>" target="_blank">
                                  <img style="width:100%;" src="<?php echo e(asset('assets/users/ad_images/'.$longAd[0]->image)); ?>" alt="addvertisement-02">
                                 </a>
                              <?php else: ?>
                                 <div onclick="increaseAdView(<?php echo e($longAd[0]->id); ?>)"><?php echo $longAd[0]->script; ?></div>
                              <?php endif; ?>
                          <?php endif; ?>
                       </div> -->
                    </div>
                    
                    <div class="widget-content">
                       <div class="panel-advertise">
                          <?php if(!empty($longAd[1])): ?>
                              <?php if($longAd[1]->type == 1): ?>
                                 <a onclick="increaseAdView(<?php echo e($longAd[1]->id); ?>)" href="<?php echo e($longAd[1]->url); ?>" target="_blank">
                                  <img style="width:100%;" src="<?php echo e(asset('assets/users/ad_images/'.$longAd[1]->image)); ?>" alt="addvertisement-02">
                                 </a>
                              <?php else: ?>
                                 <div onclick="increaseAdView(<?php echo e($longAd[1]->id); ?>)"><?php echo $longAd[1]->script; ?></div>
                              <?php endif; ?>
                          <?php endif; ?>
                       </div>
                    </div>
                  </aside>
               </div>
               <div class="col-sm-8">
                  <?php echo $__env->yieldContent('content'); ?>
               </div>
               <div class="col-sm-2">
                  <aside class="right">

                     <?php echo $__env->yieldContent('servicePrice'); ?>
                     
                     <?php
                       $smallAd = show_ad(1);
                     ?>
                     <div class="widget-content">
                        <!-- <div class="panel-advertise">
                          <?php if(!empty($smallAd[0])): ?>
                              <?php if($smallAd[0]->type == 1): ?>
                                 <a onclick="increaseAdView(<?php echo e($smallAd[0]->id); ?>)" href="<?php echo e($smallAd[0]->url); ?>" target="_blank">
                                   <img style="width:100%;" src="<?php echo e(asset('assets/users/ad_images/'.$smallAd[0]->image)); ?>" alt="addvertisement-02">
                                 </a>
                              <?php else: ?>
                                  <div onclick="increaseAdView(<?php echo e($smallAd[0]->id); ?>)"><?php echo $smallAd[0]->script; ?></div>
                              <?php endif; ?>
                          <?php endif; ?>
                        </div> -->
                     </div>

                     


                      
                      <div class="widget-content">
                         <div class="widget__title card__header card__header--has-btn">
                            <div class="widget_title1">
                               <h4>Categories</h4>
                            </div>
                         </div>
                         <div class="widget__content card__content widget_list categories">
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <div class="side-category-item">
                                 <a href="<?php echo e(route('users.servicesAccoordingToCat', $category->id)); ?>"><b><?php echo e($category->name); ?></b></a>
                              </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                         </div>
                      </div>
                  </aside>
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

      <!--end payment method section start-->
      <!--footer area start-->
      <footer id="contact" class="footer-area">
         <!--footer area start-->
         <div class="footer-bottom">
            <div class="footer-support-bar">
               <!-- Footer Support List Start -->

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
