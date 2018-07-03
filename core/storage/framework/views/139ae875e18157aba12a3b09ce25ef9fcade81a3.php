<?php $__env->startSection('body'); ?>
<div class="page-content-wrapper">
    <div class="page-content">

        <h3 class="page-title uppercase bold"> <?php echo e($data['page_title']); ?></h3>
        <hr>
        <div class="portlet light bordered">
            <div class="portlet-body">
                <form class="" action="<?php echo e(route('admin.UpdateGenSetting')); ?>" method="post">
                    <?php echo e(csrf_field()); ?>

                    <div class="row">
                        <div class="col-md-12">
                            <label><strong>* WEBSITE TITLE</strong></label>
                            <input name="websiteTitle" type="text" class="form-control input-lg" value="<?php echo e($Gset->website_title); ?>">
                            <?php if($errors->has('websiteTitle')): ?>
                              <span style="color:red;"><?php echo e($errors->first('websiteTitle')); ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <br>
                    <br>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            <label><strong>* SITE BASE COLOR CODE (without #)</strong></label>
                            <input name="baseColorCode" style="background-color: #<?php echo e($Gset->base_color_code); ?>;" type="text" class="form-control" value="<?php echo e($Gset->base_color_code); ?>">
                            <?php if($errors->has('baseColorCode')): ?>
                              <span style="color:red;"><?php echo e($errors->first('baseColorCode')); ?></span>
                            <?php endif; ?>
                        </div>
                        <div class="col-md-4">
                            <label><strong>* SITE SECONDARY COLOR CODE (without #)</strong></label>
                            <input name="secColorCode" style="background-color: #<?php echo e($Gset->sec_color_code); ?>;" type="text" class="form-control" value="<?php echo e($Gset->sec_color_code); ?>">
                            <?php if($errors->has('secColorCode')): ?>
                              <span style="color:red;"><?php echo e($errors->first('secColorCode')); ?></span>
                            <?php endif; ?>
                        </div>
                        <div class="col-md-4">
                            <label><strong>* Reference Commission (%)</strong></label>
                            <input name="reference_commission" type="text" class="form-control" value="<?php echo e($Gset->ref_com); ?>">
                            <?php if($errors->has('reference_commission')): ?>
                              <span style="color:red;"><?php echo e($errors->first('reference_commission')); ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <br>
                    <br>
                  
                    <br>
                    <div class="row">
                        <div class="col-lg-4">
                            <label><strong>REGISTRATION</strong></label>
                            <input name="registration" type="checkbox" data-toggle="toggle" data-width="100%" data-onstyle="success" data-offstyle="danger" <?php echo e($Gset->registration == 1 ? 'checked' : ''); ?>>
                        </div>
                        <div class="col-lg-4">
                            <label><strong>EMAIL VERIFICATION</strong></label>
                            <input name="emailVerification" type="checkbox" data-toggle="toggle" data-width="100%" data-onstyle="success" data-offstyle="danger" <?php echo e($Gset->email_verification == 0 ? 'checked' : ''); ?>>
                        </div>
                        <div class="col-lg-4">
                            <label><strong>SMS VERIFICATION</strong></label>
                            <input name="smsVerification" type="checkbox" data-toggle="toggle" data-width="100%" data-onstyle="success" data-offstyle="danger" <?php echo e($Gset->sms_verification == 0 ? 'checked' : ''); ?>>
                        </div>
                    </div>
                    <br>
                    <br>
                    <br>
                    <div class="row">
                        
                        <div class="col-lg-4">
                            <label><strong>EMAIL NOTIFICATION</strong></label>
                            <input name="emailNotification" type="checkbox" data-toggle="toggle" data-width="100%" data-onstyle="success" data-offstyle="danger" data-onstyle="success" data-offstyle="danger" <?php echo e($Gset->email_notification == 1 ? 'checked' : ''); ?>>
                        </div>
                        <div class="col-lg-4">
                            <label><strong>SMS NOTIFICATION</strong></label>
                            <input name="smsNotification" type="checkbox" data-toggle="toggle" data-width="100%" data-onstyle="success" data-offstyle="danger" <?php echo e($Gset->sms_notification == 1 ? 'checked' : ''); ?>>
                        </div>
                    </div>
                    <br>
                    <br>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary btn-block btn-lg">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>