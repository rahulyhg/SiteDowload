<?php $__env->startSection('meta-ajax'); ?>
  <meta name="_token" content="<?php echo e(csrf_token()); ?>" />
<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
  <style media="screen">
      .content-container {
        padding:0px 5px;
      }

      .content-container a {
        cursor: pointer;
        text-decoration: underline;
      }

      option {
        color: black;
      }
  </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('title', 'Manage Services'); ?>

<?php $__env->startSection('content'); ?>
    <div class="content-container table-responsive" id="contentContainer">
        <h1>Manage Services</h1>
        <hr>
        <table class="table ">
          <thead>
            <tr>
              <th scope="col"></th>
              <th scope="col">Title</th>
              <th></th>
              <th></th>
              <th></th>
              <th scope="col">Active Sales</th>
              <th scope="col">Complete Sales</th>
              <th scope="col">Status</th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody>
            <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <td>
                  <img style="width:80px;height:60px;" src="<?php echo e(asset('assets/users/service_images/' . $service->serviceImages()->first()->image_name)); ?>" alt="">
                </td>
                <td colspan="4">
                  <h4><a class="title" href="<?php echo e(route('services.show', [$service->id, $user->id])); ?>"><?php echo e(strlen($service->service_title) > 20 ? substr($service->service_title, 0, 20) . '...' : $service->service_title); ?></a></h4>
                  <p><?php echo e((strlen(strip_tags($service->description)) > 50) ? substr(strip_tags($service->description), 0, 50) . '...' : strip_tags($service->description)); ?></p>
                  <p><a href="<?php echo e(route('services.edit', $service->id)); ?>">Edit</a></p>
                </td>
                <td><?php echo e($service->orders()->where('status', 1)->count()); ?></td>
                <td><?php echo e($service->orders()->where('status', 2)->count()); ?></td>
                <td><?php echo e($service->status == 1 ? 'Active' : 'Inactive'); ?></td>
                <td>
                  <input class="service-status" type="checkbox" name="" value="<?php echo e($service->id); ?>" onchange="setServiceIDsArray()">
                </td>
              </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </tbody>
        </table>
    </div>

    <span class="pull-right">
      With Selected
      <select class="form-control form-control-sm" id="statusSelect">
        <option selected disabled>Select an option</option>
        <option value="active">Active</option>
        <option value="inactive">Inactive</option>
      </select>
      <button onclick="updateStatus()" style="border-radius:5px;margin-top:5px;" type="button" class="btn btn-primary pull-right" name="button">GO</button>
    </span>
    <p style="clear:both;"></p>
    <div class="row text-center">
      <?php echo e($services->links()); ?>

    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
  <script>
    var serviceIDArr = [];

    function setServiceIDsArray() {
      var serviceIDs = [];
      var serviceStatusCheckboxes = document.getElementsByClassName('service-status');
      for(i=0; i<serviceStatusCheckboxes.length; i++) {
        // console.log(serviceStatusCheckboxes[i].checked);
        if(serviceStatusCheckboxes[i].checked == true) {
          serviceIDs.push(serviceStatusCheckboxes[i].value);
        }
      }
      // console.log(serviceIDs);
      serviceIDArr = serviceIDs;
      // console.log(serviceIDArr);
    }

    function updateStatus() {
      var fd = new FormData();
      fd.append('serviceIDs', JSON.stringify(serviceIDArr));
      fd.append('serviceStatus', document.getElementById('statusSelect').value);
      $.ajaxSetup({
          headers: {
              'X-CSRF-Token': $('meta[name=_token]').attr('content')
          }
      });
      $.ajax({
        url: '<?php echo e(route('services.statusUpdate')); ?>',
        type: 'POST',
        data: fd,
        contentType: false,
        processData: false,
        success: function(data) {
          if(data == "success") {
            serviceIDArr = [];
            $("#contentContainer").load(location.href + " #contentContainer");
            console.log(data);
          }
        }
      });
    }
  </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('users.layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>