

<?php $__env->startSection('content'); ?>
<div class="row">



<form action="https://secure.paypal.com/cgi-bin/webscr" method="post" id="myform">
<!--<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" id="myform">-->
<input type="hidden" name="cmd" value="_xclick" />
<input type="hidden" name="business" value="<?php echo e($paypal['sendto']); ?>" />
<input type="hidden" name="cbt" value="<?php echo e($gnl->website_title); ?>" />
<input type="hidden" name="currency_code" value="USD" />
<input type="hidden" name="quantity" value="1" />
<input type="hidden" name="item_name" value="Add Money To <?php echo e($gnl->website_title); ?> Account" />
<input type="hidden" name="custom" value="<?php echo e($paypal['track']); ?>" />
<input type="hidden" name="amount"  value="<?php echo e($paypal['amount']); ?>" />
<input type="hidden" name="return" value="<?php echo e(route('addFund')); ?>"/>
<input type="hidden" name="cancel_return" value="<?php echo e(route('addFund.success')); ?>" />
<input type="hidden" name="notify_url" value="<?php echo e(route('ipn.paypal')); ?>" />

</form>
<script>
document.getElementById("myform").submit();
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('users.layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>