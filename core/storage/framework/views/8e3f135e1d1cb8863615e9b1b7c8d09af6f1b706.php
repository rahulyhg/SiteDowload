<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title><?php echo e($gs->website_title); ?> - Admin</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php echo $__env->yieldContent('meta-ajax'); ?>
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <!--Favicon add-->
    <link rel="shortcut icon" type="image/png" href="<?php echo e(asset('assets/users/interfaceControl/logoIcon/icon.jpg')); ?>">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(asset('assets/admin/css/font-awesome.min.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(asset('assets/admin/css/bootstrap.min.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(asset('assets/admin/css/components-rounded.min.css')); ?>" rel="stylesheet" id="style_components" type="text/css" />
    <link href="<?php echo e(asset('assets/admin/css/plugins.min.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(asset('assets/admin/css/layout.min.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(asset('assets/admin/css/darkblue.min.css')); ?>" rel="stylesheet" type="text/css" id="style_color" />
    <link href="<?php echo e(asset('assets/admin/css/datatables.min.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(asset('assets/admin/css/datatables.bootstrap.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(asset('assets/admin/css/bootstrap-modal-bs3patch.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(asset('assets/admin/css/bootstrap-modal.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(asset('assets/admin/css/bootstrap-toggle.min.css')); ?>" rel="stylesheet">
    <script src="<?php echo e(asset('assets/admin/js/sweetalert.js')); ?>"></script>
    <link rel="stylesheet" href="<?php echo e(asset('assets/admin/css/sweetalert.css')); ?>">
    <?php echo $__env->yieldPushContent('styles'); ?>
    <?php echo $__env->yieldPushContent('nic-editor-scripts'); ?>
</head>
<body class="page-header-fixed page-sidebar-closed-hide-logo">
    <div class="page-header navbar navbar-fixed-top">
        <div class="page-header-inner ">
            <div class="page-logo">
                <a href="<?php echo e(route('admin.dashboard')); ?>">
                    <img src="<?php echo e(asset('assets/users/interfaceControl/logoIcon/logo.jpg')); ?>" alt="logo" class="logo-default" style="width: 160px; height: 20px;"> </a>
                    <div class="menu-toggler sidebar-toggler"> </div>
                </div>

                <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse"> </a>

                <div class="top-menu">
                    <ul class="nav navbar-nav pull-right">
                        <li class="dropdown dropdown-user">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                <span class="username"> <?php echo e(Auth::guard('admin')->user()->username); ?>  </span>
                                <i class="fa fa-angle-down"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-default">
                                <li><a href="<?php echo e(route('admin.editPassword')); ?>"><i class="fa fa-cog"></i> Change Password </a></li>
                                <li><a href="<?php echo e(route('admin.editProfile', Auth::user()->id)); ?>"><i class="fa fa-user"></i> Profile Management </a></li>
                                <li><a href="<?php echo e(route('admin.logout')); ?>"><i class="fa fa-sign-out"></i> Log Out </a></li>
                            </ul>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
        <div class="clearfix"> </div>
        <div class="page-container">
            <div class="page-sidebar-wrapper">
                <div class="page-sidebar navbar-collapse collapse">
                    <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">

                        <!-- <li class="sidebar-toggler-wrapper hide">
                            <div class="sidebar-toggler"> </div>


</li> -->

<li class="nav-item start <?php if(request()->path() == 'admin/Dashboard'): ?> active open <?php endif; ?>">
    <a href="<?php echo e(route('admin.dashboard')); ?>" class="nav-link "><i class="fa fa-home"></i><span class="title">Dashboard</span></a>
</li>


                        <li class="nav-item start
                        <?php if(request()->path() == 'admin/categoryManagement/index'): ?> active open
                        <?php endif; ?>">
                            <a href="<?php echo e(route('admin.category.index')); ?>" class="nav-link "><i class="fa fa-tags"></i><span class="title">Category Management</span></a>
                        </li>

                        <li class="nav-item

                            <?php if(request()->path() == 'admin/gigManagement/allGigs'): ?> active open
                            <?php elseif(request()->path() == 'admin/gigManagement/hiddenGigs'): ?> active open
                            <?php elseif(request()->path() == 'admin/gigManagement/featuredGigs'): ?> active open
                            <?php endif; ?>">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="fa fa-tasks"></i>
                                <span class="title">Services Management</span><span class="arrow"></span>
                            </a>

                            <ul class="sub-menu">

                                <li class="nav-item">
                                    <a href="<?php echo e(route('gigManagement.allGigs')); ?>" class="nav-link "><i class="fa fa-tasks"></i><span class="title">All Services</span></a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo e(route('gigManagement.hiddenGigs')); ?>" class="nav-link "><i class="fa fa-tasks"></i><span class="title">Hidden Services</span></a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo e(route('gigManagement.featuredGigs')); ?>" class="nav-link "><i class="fa fa-tasks"></i><span class="title">Featured Services</span></a>
                                </li>

                            </ul>
                        </li>

                        <li class="nav-item start
                        <?php if(request()->path() == 'admin/gateways'): ?> active open
                        <?php endif; ?>">
                            <a href="<?php echo e(route('admin.gateways')); ?>" class="nav-link "><i class="fa fa-credit-card"></i><span class="title">Gateways</span></a>
                        </li>

                        <li class="nav-item start
                        <?php if(request()->path() == 'admin/depositLog'): ?> active open
                        <?php endif; ?>">
                            <a href="<?php echo e(route('admin.depositLog')); ?>" class="nav-link "><i class="fa fa-download" aria-hidden="true"></i><span class="title">Deposit Log</span></a>
                        </li>

                        <li class="nav-item
                            <?php if(request()->path() == 'admin/withdrawLog'): ?> active open
                            <?php elseif(request()->path() == 'admin/withdrawMethod'): ?> active open
                            <?php elseif(request()->path() == 'admin/successLog'): ?> active open
                            <?php elseif(request()->path() == 'admin/refundedLog'): ?> active open
                            <?php elseif(request()->path() == 'admin/pendingLog'): ?> active open
                            <?php endif; ?>">
                            <a href="javascript:;" class="nav-link nav-toggle"><i class="fa fa-upload"></i>
                                <span class="title">Withdraw Money</span><span class="arrow"></span></a>

                                <ul class="sub-menu">

                                    <li class="nav-item">
                                        <a href="<?php echo e(route('admin.withdrawMethod')); ?>" class="nav-link"><i class="fa fa-cog"></i> Withdraw Method</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?php echo e(route('admin.withdrawLog')); ?>" class="nav-link"><i class="fa fa-desktop"></i> Withdraw Log </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?php echo e(route('admin.withdrawMoney.pendingLog')); ?>" class="nav-link"><i class="fa fa-desktop"></i> Pending Requests Log</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?php echo e(route('admin.withdrawMoney.successLog')); ?>" class="nav-link"><i class="fa fa-desktop"></i> Success Log</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?php echo e(route('admin.withdrawMoney.refundedLog')); ?>" class="nav-link"><i class="fa fa-desktop"></i> Refunded Log</a>
                                    </li>

                                </ul>
                            </li>

                            <li class="nav-item start
                            <?php if(request()->path() == 'admin/interfaceControl/Ad/index'): ?> active open
                            <?php endif; ?>">
                                <a href="<?php echo e(route('admin.ad.index')); ?>" class="nav-link "><i class="fa fa-buysellads"></i><span class="title">Advertisement</span></a>
                            </li>

                            <li class="nav-item
                                <?php if(request()->path() == 'admin/userManagement/allUsers'): ?> active open
                                <?php elseif(request()->path() == 'admin/userManagement/bannedUsers'): ?> active open
                                <?php elseif(request()->path() == 'admin/userManagement/verifiedUsers'): ?> active open
                                <?php elseif(request()->path() == 'admin/userManagement/mobileUnverifiedUsers'): ?> active open
                                <?php elseif(request()->path() == 'admin/userManagement/emailUnverifiedUsers'): ?> active open
                                <?php endif; ?>">
                                <a href="javascript:;" class="nav-link nav-toggle"><i class="fa fa-user" aria-hidden="true"></i></i>
                                    <span class="title">Users Management</span><span class="arrow"></span></a>

                                    <ul class="sub-menu">

                                        <li class="nav-item">
                                            <a href="<?php echo e(route('admin.allUsers')); ?>" class="nav-link"><i class="fa fa-user" aria-hidden="true"></i> All Users</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="<?php echo e(route('admin.bannedUsers')); ?>" class="nav-link"><i class="fa fa-times"></i> Banned Users </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="<?php echo e(route('admin.verifiedUsers')); ?>" class="nav-link"><i class="fa fa-check"></i> Verified Users </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="<?php echo e(route('admin.mobileUnverifiedUsers')); ?>" class="nav-link"><i class="fa fa-mobile"></i> Mobile Unverified </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="<?php echo e(route('admin.emailUnverifiedUsers')); ?>" class="nav-link"><i class="fa fa-envelope"></i> E-mail Unverified </a>
                                        </li>

                                    </ul>
                                </li>

                                <li class="nav-item
                                <?php if(request()->path() == 'admin/interfaceControl/logoIcon/index'): ?> active open
                                <?php elseif(request()->path() == 'admin/interfaceControl/slider/index'): ?> active open
                                <?php elseif(request()->path() == 'admin/interfaceControl/contact/index'): ?> active open
                                <?php elseif(request()->path() == 'admin/interfaceControl/support/index'): ?> active open
                                <?php elseif(request()->path() == 'admin/interfaceControl/footer/index'): ?> active open
                                <?php elseif(request()->path() == 'admin/interfaceControl/social/index'): ?> active open
                                <?php elseif(request()->path() == 'admin/interfaceControl/fbComments/index'): ?> active open
                                <?php endif; ?>">
                                   <a href="javascript:;" class="nav-link nav-toggle"><i class="fa fa-desktop"></i>
                                   <span class="title">Interface Control</span><span class="arrow"></span></a>
                                   <ul class="sub-menu">
                                      <li class="nav-item">
                                         <a href="<?php echo e(route('admin.logoIcon.index')); ?>" class="nav-link"><i class="fa fa-cogs"></i> Logo+icon Setting</a>
                                      </li>
                                      <li class="nav-item">
                                         <a href="<?php echo e(route('admin.slider.index')); ?>" class="nav-link"><i class="fa fa-cogs"></i> Slider Setting</a>
                                      </li>
                                      <li class="nav-item">
                                         <a href="<?php echo e(route('admin.support.index')); ?>" class="nav-link"><i class="fa fa-cogs"></i> Support Setting</a>
                                      </li>
                                      <li class="nav-item">
                                         <a href="<?php echo e(route('admin.footer.index')); ?>" class="nav-link"><i class="fa fa-cogs"></i> Footer Text</a>
                                      </li>
                                      <li class="nav-item">
                                         <a href="<?php echo e(route('admin.social.index')); ?>" class="nav-link"><i class="fa fa-cogs"></i> Social Setting</a>
                                      </li>
                                      <li class="nav-item">
                                         <a href="<?php echo e(route('admin.contact.index')); ?>" class="nav-link"><i class="fa fa-cogs"></i> Contact Setting</a>
                                      </li>
                                      <li class="nav-item">
                                         <a href="<?php echo e(route('admin.fbComment.index')); ?>" class="nav-link"><i class="fa fa-cogs"></i> Comment Script</a>
                                      </li>
                                   </ul>
                                </li>

                                <li class="nav-item

                                        <?php if(request()->path() == 'admin/GeneralSetting'): ?> active open
                                        <?php elseif(request()->path() == 'admin/EmailSetting'): ?> active open
                                        <?php elseif(request()->path() == 'admin/SmsSetting'): ?> active open
                                    <?php endif; ?>">
                                    <a href="javascript:;" class="nav-link nav-toggle"><i class="fa fa-bars"></i>
                                        <span class="title">Website Control</span><span class="arrow"></span></a>

                                        <ul class="sub-menu">

                                            <li class="nav-item">
                                                <a href="<?php echo e(route('admin.GenSetting')); ?>" class="nav-link"><i class="fa fa-cogs"></i> General Setting </a>
                                            </li>

                                            <li class="nav-item">
                                                <a href="<?php echo e(route('admin.EmailSetting')); ?>" class="nav-link"><i class="fa fa-envelope"></i> Email Setting </a>
                                            </li>

                                            <li class="nav-item">
                                                <a href="<?php echo e(route('admin.SmsSetting')); ?>" class="nav-link"><i class="fa fa-mobile"></i> SMS Setting </a>
                                            </li>

                                        </ul>
                                    </li>

                        </ul>
                    </div>
                </div>


                <?php echo $__env->yieldContent('body'); ?>



            </div>
            <div class="page-footer">
                <div class="page-footer-inner"> <?php echo e(date("Y")); ?> &copy; <?php echo e($data['sitename']); ?></div>
                <div class="scroll-to-top">
                    <i class="icon-arrow-up"></i>
                </div>
            </div>


            <?php echo $__env->yieldPushContent('scripts'); ?>


            <!-- JavaScripts -->
            <script src="<?php echo e(asset('assets/admin/js/jquery.min.js')); ?>" type="text/javascript"></script>
            <script src="<?php echo e(asset('assets/admin/js/bootstrap.min.js')); ?>" type="text/javascript"></script>
            <script src="<?php echo e(asset('assets/admin/js/js.cookie.min.js')); ?>" type="text/javascript"></script>
            <script src="<?php echo e(asset('assets/admin/js/bootstrap-hover-dropdown.min.js')); ?>" type="text/javascript"></script>
            <script src="<?php echo e(asset('assets/admin/js/jquery.slimscroll.min.js')); ?>" type="text/javascript"></script>
            <script src="<?php echo e(asset('assets/admin/js/jquery.blockui.min.js')); ?>" type="text/javascript"></script>
            <script src="<?php echo e(asset('assets/admin/js/app.min.js')); ?>" type="text/javascript"></script>
            <script src="<?php echo e(asset('assets/admin/js/layout.min.js')); ?>" type="text/javascript"></script>
            <script src="<?php echo e(asset('assets/admin/js/jquery.waypoints.min.js')); ?>" type="text/javascript"></script>
            <script src="<?php echo e(asset('assets/admin/js/jquery.counterup.min.js')); ?>" type="text/javascript"></script>
            <script src="<?php echo e(asset('assets/admin/js/datatable.js')); ?>" type="text/javascript"></script>
            <script src="<?php echo e(asset('assets/admin/js/datatables.min.js')); ?>" type="text/javascript"></script>
            <script src="<?php echo e(asset('assets/admin/js/datatables.bootstrap.js')); ?>" type="text/javascript"></script>
            <script src="<?php echo e(asset('assets/admin/js/table-datatables-buttons.min.js')); ?>" type="text/javascript"></script>
            <script src="<?php echo e(asset('assets/admin/js/bootstrap-modalmanager.js')); ?>" type="text/javascript"></script>
            <script src="<?php echo e(asset('assets/admin/js/bootstrap-modal.js')); ?>" type="text/javascript"></script>
            <script src="<?php echo e(asset('assets/admin/js/bootstrap-toggle.min.js')); ?>"></script>

           <?php echo $__env->yieldContent('script'); ?>






<?php if(session('success')): ?>
<script type="text/javascript">
        $(document).ready(function(){
            swal("Success!", "<?php echo e(session('success')); ?>", "success");
        });
</script>
<?php endif; ?>

<?php if(session('alert')): ?>
<script type="text/javascript">
        $(document).ready(function(){
            swal("Sorry!", "<?php echo e(session('alert')); ?>", "error");
        });
</script>
<?php endif; ?>



        </body>
        </html>
