


<?php $__env->startSection('body'); ?>
<div class="page-content-wrapper">
    <div class="page-content">

        <h3 class="page-title uppercase bold"> <?php echo e($data['page_title']); ?></h3>
        <hr>
        <div class="col-md-12">
            <!-- BEGIN SAMPLE TABLE PORTLET-->
            <div class="portlet box green">
                <div class="portlet-title">
                    <div class="caption">
                    <i class="fa fa-bookmark"></i>Short Code</div>
                </div>
                <div class="portlet-body">
                    <div class="table-scrollable">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th> # </th>
                                    <th> CODE </th>
                                    <th> DESCRIPTION </th>
                                </tr>
                            </thead>
                            <tbody>


                                <tr>
                                    <td> 1 </td>
                                    <td> <pre>{{message}}</pre> </td>
                                    <td> Details Text From Script</td>
                                </tr>

                                <tr>
                                    <td> 2 </td>
                                    <td> <pre>{{name}}</pre> </td>
                                    <td> Users Name. Will Pull From Database and Use in EMAIL text</td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- END SAMPLE TABLE PORTLET-->
        </div>

        <div class="col-md-12">
            <!-- BEGIN SAMPLE FORM PORTLET-->
            <div class="portlet light bordered">

            <div class="portlet-body form">
                <form class="form-horizontal" action="<?php echo e(route('admin.UpdateSmsSetting')); ?>" method="post">
                    <?php echo e(csrf_field()); ?>

                    <div class="form-body">

                        <div class="form-group">
                            <div class="col-md-12">
                                <label class="control-label"><strong style="text-transform: uppercase;">SMS API</strong><br></label>
                            </div>
                            <div class="col-md-12">
                              <textarea class="form-control" id="smsApi" name="smsApi" rows="3" cols="80" style="width:100%;"><?php echo e($smsApi); ?></textarea>
                              <?php if($errors->has('smsApi')): ?>
                                <span style="color:red;"><?php echo e($errors->first('smsApi')); ?></span>
                              <?php endif; ?>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <button type="submit" class="btn blue btn-block btn-lg">UPDATE</button>
                            </div>
                        </div>


                    </div>
                </form>
                </div>
            </div>
        </div>
        <p style="clear:both;"></p>

    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>