<?php $__env->startPush('styles'); ?>
<style media="screen">
#snackbarSuccess {
    visibility: hidden;
    min-width: 250px;
    margin-left: -125px;
    background-color: green;
    color: #fff;
    text-align: center;
    border-radius: 2px;
    padding: 16px;
    position: fixed;
    z-index: 1;
    left: 50%;
    top: 30px;
    font-size: 17px;
}

#snackbarSuccess.show {
    visibility: visible;
    -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
    animation: fadein 0.5s, fadeout 0.5s 2.5s;
}

@-webkit-keyframes fadein {
    from {top: 0; opacity: 0;}
    to {top: 30px; opacity: 1;}
}

@keyframes  fadein {
    from {top: 0; opacity: 0;}
    to {top: 30px; opacity: 1;}
}

@-webkit-keyframes fadeout {
    from {top: 30px; opacity: 1;}
    to {top: 0; opacity: 0;}
}

@keyframes  fadeout {
    from {top: 30px; opacity: 1;}
    to {top: 0; opacity: 0;}
}
</style>
<?php $__env->stopPush(); ?>

<div id="snackbarSuccess">
  <?php echo e($slot); ?>

</div>
