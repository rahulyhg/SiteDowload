<?php $__env->startSection('meta-ajax'); ?>
<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
<?php $__env->stopSection(); ?>


<?php $__env->startPush('nic-editor-scripts'); ?>
  <script src="<?php echo e(asset('assets/admin/js/nic-edit/nicEdit.js')); ?>" type="text/javascript"></script>
  <script type="text/javascript">
    bkLib.onDomLoaded(function() {
          new nicEditor({iconsPath : "<?php echo e(asset('assets/admin/js/nic-edit/nicEditorIcons.gif')); ?>"}).panelInstance('description');
    });
  </script>
  <script type="text/javascript">
    bkLib.onDomLoaded(function() {
          new nicEditor({iconsPath : "<?php echo e(asset('assets/admin/js/nic-edit/nicEditorIcons.gif')); ?>"}).panelInstance('introToBuyer');
    });
  </script>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('styles'); ?>
  <style media="screen">
    .nicEdit-main{
      background-color: white;
      resize:vertical;
      margin: 0px !important;
    }
    input:not(.updateBtn) {
      margin: 0px !important;
      background-color: white !important;
    }
    .login-admin {
      padding:0px 100px;
    }    
    @media  screen and (max-width: 500px) {
      .login-admin {
        padding:0px;
      }
    }
  </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('title', 'Edit Service'); ?>

<?php $__env->startSection('content'); ?>

          <div class="login-admin">
            <div class="login-header">
              <h2 style="">Edit Service</span></h2>
            </div>
            <div class="login-form">
              <?php if(session()->has('success')): ?>
                <div class="alert alert-success" role="alert">
                  <?php echo e(session('success')); ?>

                </div>
              <?php endif; ?>
              <form name="editServiceFrom" onsubmit="updateService(event)" id="storeServiceForm" method="post" enctype="multipart/form-data">
                <?php echo e(csrf_field()); ?>

                <strong style="">Service Title *</strong><br>
                
                <input style="height:40px;" type="text" name="serviceTitle" placeholder="Service Title" value="<?php echo e($service->service_title); ?>">
                <span class="error-messages" style="color:red;"></span>
                <br><br>
                
                <strong style="">Price (in <?php echo e($gs->base_curr_text); ?>) *</strong><br>
                <input style="height:40px;" type="text" name="price" placeholder="Price in <?php echo e($gs->base_curr_text); ?>" value="<?php echo e($service->price); ?>">
                <span class="error-messages" style="color:red;"></span>
                <br><br>
                
                <strong style="">Category *</strong><br>
                <select class="" name="category" style="width:100%;height:40px;padding-left:35px;">
                  <option value="" disabled selected>Select a category</option>
                  <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php if($service->category_id == $category->id): ?>
                  <option value="<?php echo e($category->id); ?>" selected><?php echo e($category->name); ?></option>
                  <?php else: ?>
                  <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                  <?php endif; ?>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <span class="error-messages" style="color:red;"></span>
                <br><br>
                
                <strong style="">Maximum Days to Complete *</strong><br>
                <input style="height:40px;" type="text" name="maxDaysToComplete" placeholder="Maximum Days to Complete" value="<?php echo e($service->max_days); ?>">
                <span class="error-messages" style="color:red;"></span>
                <br><br>
                
                <strong style="">Image *</strong><br>
                <div id="serviceImagesShow">
                  <div class="">
                    <?php $__currentLoopData = $service->serviceImages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $serviceImage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <img src="<?php echo e(asset('assets/users/service_images/'.$serviceImage->image_name)); ?>" alt="" width="100">
                      <?php if(count($service->serviceImages) != 1): ?>
                        <i onclick="deleteServiceImage(<?php echo e($serviceImage->id); ?>)" style="cursor:pointer;" class="fa fa-close"></i>
                      <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </div>
                </div>
                <label class="btn btn-success" style="width:200px;cursor:pointer;margin-left:-2px;margin-top:5px;">
                  <input onchange="updateService(event)" id="" name="images[]" style="display:none;" type="file" multiple />Add Images
                </label>
                <div class="">
                  <p style="margin:0px;">[Choose maximum 3 images]</p>
                  <p style="margin:0px;">[Acceptable Formats: .png, .jpg, .jpeg]</p>
                </div>

                <p style="margin:0px;"><span class="error-messages" style="color:red;"></span></p>
                <span class="error-messages" style="color:red;"></span>
                <span class="error-messages" style="color:red;"></span>
                <br>
                
                <strong style="">Tags *</strong><br>
                <div id="tags">
                  
                  
                  <?php $__currentLoopData = $service->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <button style="margin-right:5px;" type="button" class="btn btn-primary"><?php echo e($tag->name); ?><i class="fa fa-close" style="margin-left:3px;" onclick="removeTag(event)"></i></button>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                
                <input id="tagInput" onkeypress="addTags(event,this.value)" type="text" style="height:40px;width:200px;" placeholder="Tags" value="">
                <span style="">[You can add maximum 5 tags]</span><br>
                <span class="error-messages" style="color:red;"></span>
                <br>
                
                <strong style="">Description *</strong><br>
                <textarea name="description" id="description" rows="10" cols="80" style="width:100%;"><?php echo $service->description; ?></textarea>
                <span class="error-messages" style="color:red;"></span>
                <br>
                
                <strong style="">Introductions to Buyer *</strong><br>
                <textarea name="introToBuyer" id="introToBuyer" rows="10" style="width:100%;"><?php echo $service->intro_to_buyer; ?></textarea>
                <span class="error-messages" style="color:red;"></span>
                <br>
                
                <input class="updateBtn" type="submit" name="submit" value="UPDATE">
              </form>
            </div>
          </div>

          <?php $__env->startComponent('users.components.success'); ?>
          <?php echo $__env->renderComponent(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
  <script>
      // tags for this service saving into a javascript array from  database...
      var serviceTags = <?php echo json_encode($service->tags); ?>;
      serviceTagNames = [];
      // taking only names of the tags into an array...
      for (var i = 0; i < serviceTags.length; i++) {
        serviceTagNames.push(serviceTags[i].name);
      }
      console.log(serviceTagNames);

      // taking the tag names of this service into an array...
      var tagsArr = serviceTagNames;


      // adding tags to UI dynamically and adding tags to 'tagsArr'...
      function addTags(e, tag) {
        if(e.keyCode == 13) {
          e.preventDefault();
          if(e.target.value.length != 0 && tagsArr.length != 5) {
            // =======Adding tags dynamically ========== //
            var tags = document.getElementById('tags');

            // creating button...
            var button = document.createElement('button');
            button.setAttribute('type', 'button');
            button.setAttribute('class', 'btn btn-primary');
            button.setAttribute('style', 'margin-right:5px');

            // adding button text to button...
            var buttonText = document.createTextNode(tag);
            button.appendChild(buttonText);

            // adding close icon to button...
            var closeIcon = document.createElement('i');
            closeIcon.setAttribute('class', 'fa fa-close');
            closeIcon.setAttribute('style', 'margin-left:3px');
            closeIcon.setAttribute('onclick', 'removeTag(event)');
            button.appendChild(closeIcon);

            // adding buttons under 'tags' div...
            tags.appendChild(button);
            // =======Adding tags dynamically ========== //
            document.getElementById('tagInput').value = '';
            console.log('Enter pressed');
            tagsArr.push(tag);
            console.log(tagsArr);
          }
        }

      }

      // function createDynamicTags(tag) {
      //
      // }


      // Removing tags from UI dynamically and removing from tagsArr...
      function removeTag(e) {
        for (var i = 0; i < tagsArr.length; i++) {
          if (tagsArr[i] == e.target.parentElement.innerText) {
              tagsArr.splice(i, 1);
              e.target.parentElement.remove();
              console.log(tagsArr);
              break;
          }
        }
      }

      // storing service to database...
      function updateService(e) {
        e.preventDefault();
        var storeServiceForm = document.getElementById('storeServiceForm');
        // getting description content...
        var descriptionElement = new nicEditors.findEditor('description');
        description = descriptionElement.getContent();
        // getting Introductions to buyer content...
        var introToBuyerElement = new nicEditors.findEditor('introToBuyer');
        introToBuyer = introToBuyerElement.getContent();
        var fd = new FormData(storeServiceForm);
        fd.append('serviceID', <?php echo e($service->id); ?>);
        fd.append('tags', JSON.stringify(tagsArr));
        fd.append('description', description);
        fd.append('introToBuyer', introToBuyer);
        // console.log(tagsArr);
        $.ajax({
          url: '<?php echo e(route('services.update')); ?>',
          type: 'POST',
          data: fd,
          contentType: false,
          processData: false,
          success: function(data) {
            console.log(data);

            var em = document.getElementsByClassName("error-messages");
            // after returning from the controller we are clearing the
            // previous error messages...
            for(i=0; i<em.length; i++) {
              em[i].innerHTML = '';
            }
            if(data == 'success') {
              $("#serviceImagesShow").load(location.href + " #serviceImagesShow");
              var snackbarSuccess = document.getElementById('snackbarSuccess');
              snackbarSuccess.innerHTML = "Service updated successfully!";
              snackbarSuccess.className = "show";
              setTimeout(function() {
                snackbarSuccess.className = snackbarSuccess.className.replace("show", "");
              }, 3000);
            }

            // Showing error messages in the HTML...
            if(typeof data.error != 'undefined') {
              if(typeof data.serviceTitle != 'undefined') {
                em[0].innerHTML = data.serviceTitle[0];
              }
              if(typeof data.price != 'undefined') {
                em[1].innerHTML = data.price[0];
              }
              if(typeof data.category != 'undefined') {
                em[2].innerHTML = data.category[0];
              }
              if(typeof data.maxDaysToComplete != 'undefined') {
                em[3].innerHTML = data.maxDaysToComplete[0];
              }
              if (typeof data.files != 'undefined') {
                em[4].innerHTML = data.files[0];
              }
              if (typeof data.fileCount != 'undefined') {
                em[5].innerHTML = data.fileCount[0];
              }
              if (typeof data.images != 'undefined') {
                em[6].innerHTML = data.images[0];
              }
              if(typeof data.tags != 'undefined') {
                em[7].innerHTML = data.tags[0];
              }
              if(typeof data.description != 'undefined') {
                em[8].innerHTML = data.description[0];
              }
              if(typeof data.introToBuyer != 'undefined') {
                em[9].innerHTML = data.introToBuyer[0];
              }
            }
          }
        });
      }

      function deleteServiceImage(serviceImageID) {
        console.log(serviceImageID);
        var fd = new FormData();
        fd.append('serviceImageID', serviceImageID);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
          url: '<?php echo e(route('sevices.deleteServiceImage')); ?>',
          type: 'POST',
          data: fd,
          contentType: false,
          processData: false,
          success: function(data) {
            if(data == 'success') {
              console.log(data);
              $("#serviceImagesShow").load(location.href + " #serviceImagesShow");
              var snackbarSuccess = document.getElementById('snackbarSuccess');
              snackbarSuccess.innerHTML = "Service updated successfully!";
              snackbarSuccess.className = "show";
              setTimeout(function() {
                snackbarSuccess.className = snackbarSuccess.className.replace("show", "");
              }, 3000);
            }
          }
        });
        // console.log(serviceImageID);
      }


  </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('users.layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>