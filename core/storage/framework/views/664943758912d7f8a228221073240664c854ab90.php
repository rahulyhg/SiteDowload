<?php $__env->startSection('title', 'Seller to buyer message'); ?>

<?php $__env->startSection('meta-ajax'); ?>
  <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
	
<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
  <style media="screen">

  </style>
<?php $__env->stopPush(); ?>


<style media="screen">
.chat-box-container {
  border:1px solid #d5d5d5;
  height: 500px;
  overflow-y:scroll;
  overflow-x: hidden;
  position:relative;
}
.buyer-message {
  float: left;
  background-color: #c6e2ff;
  border-radius:10px;
  color:black;
  padding:20px;
  max-width:480px;
}
.seller-message {
  background-color: #4080ff;
  border-radius:10px;
  color:white;
  padding:20px;
  max-width:480px;
}
#acceptRejectProject {
  padding: 10px 50px;
  /* position: absolute; */
  position:absolute;
  top:0px;
  left:0px;
  right:0px;
  /* z-index: 1; */
}
#acceptRejectProject i, .delivery-icons {
  padding:10px;
  border-radius:50%;
  font-size: 20px;
  cursor: pointer;
}
.all-messages {
  padding:20px 30px;
  position: relative;

}
</style>

<?php $__env->startSection('content'); ?>
	<div id="app">
    <div id="ChatBoxScrollableDivContainer">
      <div class="" style="padding:20px 40px;">
        <div id="chatBoxContainer" class="row chat-box-container">
          
          <?php if($orderStatus == 0): ?>
            <div id="acceptRejectProject" class="row bg-primary">
              <div class="col-xs-6">
                <i onclick="acceptProject(<?php echo e($orderID); ?>)" style="background-color:green;" class="fa fa-check pull-left" aria-hidden="true"></i>
                <span class="pull-left" style="margin-top:10px;">Accept Project</span>
              </div>
              <div class="col-xs-6">
                <i onclick="rejecetProject(<?php echo e($orderID); ?>)" style="background-color:red;" class="fa fa-close pull-right"></i>
                <span class="pull-right" style="margin-top:10px;">Reject Project</span>
              </div>
            </div>
          <?php endif; ?>

          
          <div id="allMessages" class="row all-messages" style="<?php echo e(($orderStatus == 0) ? 'top:50px;' : 'top:0px;'); ?>">
            <?php $__currentLoopData = $uoms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $uom): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($uom->message_type == 'introToBuyer') continue; ?>

            
            <?php if($uom->type=='buyer'): ?>
            <div class="" style="float:left;">
              <img src="<?php echo e(asset('assets/users/propics/'.$uom->user->pro_pic)); ?>" alt="" width="60" style="float:left;margin-right: 10px;border-radius: 50%;">
              <div class="buyer-message" style="">
                
                <?php if(!empty($uom->user_message)): ?>
                  <?php echo e($uom->user_message); ?>

                <?php endif; ?>
                
                <?php if(!empty($uom->original_file_name)): ?>
                  <?php
                    $png = strpos($uom->original_file_name, 'png');
                    $jpg = strpos($uom->original_file_name, 'jpg');
                    $jpeg = strpos($uom->original_file_name, 'jpeg');
                    $gif = strpos($uom->original_file_name, 'gif');
                  ?>
                  <a download="<?php echo e($uom->original_file_name); ?>" target="_blank" style="color:black;text-decoration:underline;" href="<?php echo e(asset('assets/users/buyer_message_files/'.$uom->file_name)); ?>"><?php echo e($uom->original_file_name); ?></a>
                  <br>
                  
                  <?php if($png!=false ||  $jpg!= false ||  $jpeg!=false || $gif!=false): ?>
                    <img src="<?php echo e(asset('assets/users/buyer_message_files/'.$uom->file_name)); ?>" alt="" width="150">
                  <?php endif; ?>
                <?php endif; ?>
              </div>
            </div>
            <p style="clear:both;"></p>
            <?php endif; ?>


            
            <?php if($uom->type=='seller'): ?>
            <div style="float:right;">
              <div class="seller-message">
                
                <?php if($uom->message_type == 'delivery'): ?>
                  <a download="<?php echo e($uom->original_file_name); ?>" target="_blank" style="color:white;text-decoration:underline;" href="<?php echo e(asset('assets/users/seller_messages_files/'.$uom->file_name)); ?>"><?php echo e($uom->original_file_name); ?></a>
                  <br>
                  <i class="fa fa-check" aria-hidden="true"></i> <small style="color:white;">Awating acceptance...</small>
                  </div>
                  </div>
                  <p style="clear:both;"></p>
                  <?php continue; ?>
                <?php endif; ?>
                
                <?php if(!empty($uom->user_message)): ?>
                  <?php echo e($uom->user_message); ?>

                <?php endif; ?>
                
                <?php if(!empty($uom->original_file_name)): ?>
                  <?php
                    $png = strpos($uom->original_file_name, 'png');
                    $jpg = strpos($uom->original_file_name, 'jpg');
                    $jpeg = strpos($uom->original_file_name, 'jpeg');
                    $gif = strpos($uom->original_file_name, 'gif');
                  ?>
                  <a download="<?php echo e($uom->original_file_name); ?>" target="_blank" style="color:white;text-decoration:underline;" href="<?php echo e(asset('assets/users/seller_messages_files/'.$uom->file_name)); ?>"><?php echo e($uom->original_file_name); ?></a>
                  <br>
                  
                  <?php if($png!=false ||  $jpg!= false ||  $jpeg!=false || $gif!=false): ?>
                    <img src="<?php echo e(asset('assets/users/seller_messages_files/'.$uom->file_name)); ?>" alt="" width="150">
                  <?php endif; ?>
                <?php endif; ?>
              </div>
            </div>
            <p style="clear:both;"></p>
            <?php endif; ?>

            
            <?php if($uom->message_type == 'taken'): ?>
            <small class="bg-warning" style="color:black;display:block;margin:auto;width:260px;padding:20px;">You have <?php echo e($uom->user_message); ?></small>
            <p style="clear:both;"></p>
            <?php endif; ?>

            
            <?php if($uom->message_type == 'delivery_date'): ?>
            <small class="bg-warning text-center" style="color:black;display:block;margin:auto;width:260px;padding:20px;"><strong><?php echo e($uom->user_message); ?></strong></small>
            <p style="clear:both;"></p>
            <?php endif; ?>

  					
  					<?php if($uom->message_type == 'acceptedDelivery'): ?>
  					<small class="bg-warning text-center" style="color:black;display:block;margin:auto;width:260px;padding:20px;"><?php echo e($buyerFirstName); ?> <?php echo e($buyerLastName); ?> have <?php echo e($uom->user_message); ?></small>
  					<p style="clear:both;"></p>
  					<?php endif; ?>

  					
  					<?php if($uom->message_type == 'rejectedDelivery'): ?>
  					<div class="bg-warning text-center" style="color:black;display:block;margin:auto;width:260px;padding:20px;">
  						<?php echo e($buyerFirstName); ?> <?php echo e($buyerLastName); ?> have <?php echo e($uom->user_message); ?><br>
  						<?php if(empty($uom->deliveryRevision->revision_status)): ?>
  							<div id="revisionDecision">
  								<strong>Will you give a revision?</strong>
  								<i style="background-color:green;color:white;" class="fa fa-check pull-left delivery-icons" onclick="revisionAccepted(<?php echo e($uom->order_id); ?>, <?php echo e($uom->id); ?>)" aria-hidden="true"></i>
  								<span style="color:black;margin-top:10px;" class="pull-left">Yes</span>
  								<span style="color:black;margin-top:10px;" class="pull-right">No</span>
  								<i onclick="revisionRejected(<?php echo e($orderID); ?>, <?php echo e($uom->id); ?>)" style="background-color:red;color:white" class="fa fa-close pull-right delivery-icons"></i>
  							</div>
  						<?php endif; ?>
  						<p style="clear:both;"></p>
  					</div><br>
  					<?php endif; ?>

  					
  					<?php if($uom->message_type == 'notTaken'): ?>
  					<small class="bg-warning text-center" style="color:black;display:block;margin:auto;width:260px;padding:20px;">You have <?php echo e($uom->user_message); ?></small>
  					<p style="clear:both;"></p>
  					<?php endif; ?>

  					
  					<?php if($uom->message_type == 'revisionAccepted'): ?>
  					<small class="bg-warning text-center" style="color:black;display:block;margin:auto;width:260px;padding:20px;">You are <?php echo e($uom->user_message); ?></small>
  					<p style="clear:both;"></p>
  					<?php endif; ?>

  					
  					<?php if($uom->message_type == 'revisionRejected'): ?>
  					<small class="bg-warning text-center" style="color:black;display:block;margin:auto;width:260px;padding:20px;">You have <?php echo e($uom->user_message); ?></small>
  					<p style="clear:both;"></p>
  					<?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
        </div>
      </div>
    </div>

      <br>
      <div class="row" style="padding:0px 40px;">
        <form id="sellerToBuyerMessagesFormId" class="" method="post" onsubmit="submitSellerMessage(event)">
          <?php echo e(csrf_field()); ?>

          <div class="form-group">
            <textarea class="form-control" name="message" rows="5" cols="80" placeholder="Write your message here..."></textarea>
          </div>
          <input type="hidden" name="orderID" value="<?php echo e($orderID); ?>">
          <div class="row">
            <div class="col-md-10" style="">
              <input title="check this before send attachments if you want to submit project" type="checkbox" name="delivery" value="requirement"> Deliver Project
              <label class="btn btn-outline-success" style="cursor:pointer;"><input onchange="submitSellerMessage(event)" id="achImage" name="attachment" style="display:none;" type="file" /><i class="fa fa-paperclip" aria-hidden="true" style="font-size:20px;"></i></label>
            </div>
            <div class="col-md-2">
              <input type="submit" class="btn btn-success pull-right" name="" value="send">
            </div>
          </div>
        </form>
        <strong id="attachmentTypeErr" style="color:red;"></strong><br>
        <strong id="attachment" style="color:red;"></strong>
      </div>

      <?php $__env->startComponent('users.components.success'); ?>
      <?php echo $__env->renderComponent(); ?>
	</div>
  <script src="<?php echo e(asset('core/public/js/app.js')); ?>"></script>
<?php $__env->stopSection(); ?>


<?php $__env->startPush('scripts'); ?>
  <script>
    window.onload = function () {
      var elem = document.getElementById('chatBoxContainer');
      elem.scrollTop = elem.scrollHeight;
    }

    function submitSellerMessage(e) {
      e.preventDefault();
      var form = document.getElementById("sellerToBuyerMessagesFormId");
      var fd = new FormData(form);
      $.ajax({
        url: '<?php echo e(route('seller.messageStore')); ?>',
        type: 'POST',
        data: fd,
        contentType: false,
        processData: false,
        success: function(data) {
          console.log(data);

          // after returning from the controller we are clearing the
          // previous error messages...
          document.getElementById('attachmentTypeErr').innerHTML = '';

          if (data == "success") {
            form.reset();
            $("#ChatBoxScrollableDivContainer").load(location.href + " #ChatBoxScrollableDivContainer", function() {
              var elem = document.getElementById('chatBoxContainer');
              elem.scrollTop = elem.scrollHeight;
            });
            // $.get('/freelancing-site/event');
            $.get('<?php echo e(route('chatEvent')); ?>');
          }
          // Showing error messages in the HTML...
          if(typeof data.error != 'undefined') {
            form.reset();
            if(typeof data.attachmentType != 'undefined') {
              document.getElementById('attachmentTypeErr').innerHTML = data.attachmentType[0];
            }
          }
        }
      });
    }
  </script>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
	
	<script>
	    function acceptProject(orderID) {
	      var fd = new FormData();
	      fd.append('orderID', orderID);
	      $.ajaxSetup({
	          headers: {
	              'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
	          }
	      });
	      if(confirm('Are you sure, you want to reject this project?')) {
	        $.ajax({
	          url: '<?php echo e(route('seller.acceptProject')); ?>',
	          type: 'POST',
	          data: fd,
	          contentType: false,
	          processData: false,
	          success: function(data) {
	            console.log(data);
	            if (data == "success") {
	              var snackbarSuccess = document.getElementById('snackbarSuccess');
	              snackbarSuccess.innerHTML = 'Order is accepted!';
	              snackbarSuccess.className = "show";
	              setTimeout(function() {
	                snackbarSuccess.className = snackbarSuccess.className.replace("show", "");
	              }, 3000);
	              $("#ChatBoxScrollableDivContainer").load(location.href + " #ChatBoxScrollableDivContainer", function() {
	                // $('#acceptRejectProject').remove();
                  // document.getElementById('allMessages').style.top = '0px';
	                var elem = document.getElementById('chatBoxContainer');
	                elem.scrollTop = elem.scrollHeight;
                  // firing event using pusher...
                  // $.get('/freelancing-site/event');
                  $.get('<?php echo e(route('chatEvent')); ?>');
	              });
	            }
	          }
	        });
	      }
	    }
	</script>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
	<script>
		function rejecetProject(orderID) {
			var fd = new FormData();
			fd.append('orderID', orderID);
			$.ajaxSetup({
					headers: {
							'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
					}
			});
			var c = confirm("Are you sure, you want to rejecet this project?");
			if(c == true) {
				console.log(orderID);
				$.ajax({
					url: '<?php echo e(route('seller.rejectProject')); ?>',
					type: 'POST',
					data: fd,
					contentType: false,
					processData: false,
					success: function(data) {
						console.log(data);
						if(data == "success") {
							var snackbarSuccess = document.getElementById('snackbarSuccess');
							snackbarSuccess.innerHTML = 'Order is rejected!';
							snackbarSuccess.className = "show";
							setTimeout(function() {
								snackbarSuccess.className = snackbarSuccess.className.replace("show", "");
							}, 3000);
							$("#ChatBoxScrollableDivContainer").load(location.href + " #ChatBoxScrollableDivContainer", function() {
								// $('#acceptRejectProject').remove();
                // document.getElementById('allMessages').style.top = '0px';
								var elem = document.getElementById('chatBoxContainer');
								elem.scrollTop = elem.scrollHeight;
                // firing event using pusher...
                // $.get('/freelancing-site/event');
                $.get('<?php echo e(route('chatEvent')); ?>');
							});
						}
					}
				});
			}
		}
	</script>
<?php $__env->stopPush(); ?>


<?php $__env->startPush('scripts'); ?>
	<script>
		function revisionAccepted(orderID, uomID) {
			var fd = new FormData();
			fd.append('orderID', orderID);
			fd.append('uomID', uomID);
			$.ajaxSetup({
					headers: {
							'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
					}
			});
			if (confirm('Are you sure, you want to give a revision?')) {
				$.ajax({
					url: '<?php echo e(route('seller.revisionAccepted')); ?>',
					type: 'POST',
					data: fd,
					contentType: false,
					processData: false,
					success: function(data) {
						console.log(data);
						if(data == "success") {
							document.getElementById('revisionDecision').style.display = 'none';
							$("#ChatBoxScrollableDivContainer").load(location.href + " #ChatBoxScrollableDivContainer", function() {
								var elem = document.getElementById('chatBoxContainer');
								elem.scrollTop = elem.scrollHeight;
                // firing event using pusher...
                // $.get('/freelancing-site/event');
                $.get('<?php echo e(route('chatEvent')); ?>');
							});
						}
					}
				});
			}
		}
	</script>
<?php $__env->stopPush(); ?>


<?php $__env->startPush('scripts'); ?>
	<script>
		function revisionRejected(orderID, uomID) {
			var fd = new FormData();
			fd.append('orderID', orderID);
			fd.append('uomID', uomID);
			$.ajaxSetup({
					headers: {
							'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
					}
			});
			if (confirm('Are you sure, you will reject this revision?')) {
				$.ajax({
					url: '<?php echo e(route('seller.revisionRejected')); ?>',
					type: 'POST',
					data: fd,
					contentType: false,
					processData: false,
					success: function(data) {
						console.log(data);
						if(data == "success") {
							document.getElementById('revisionDecision').style.display = 'none';
							$("#ChatBoxScrollableDivContainer").load(location.href + " #ChatBoxScrollableDivContainer", function() {
								var elem = document.getElementById('chatBoxContainer');
								elem.scrollTop = elem.scrollHeight;
                // firing event using pusher...
                // $.get('/freelancing-site/event');
                $.get('<?php echo e(route('chatEvent')); ?>');
							});
						}
					}
				});
			}
		}
	</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('users.layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>