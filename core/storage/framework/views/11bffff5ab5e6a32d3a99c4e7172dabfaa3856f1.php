<h3 style="margin-top:10px;">Comments</h3>
<?php $__env->startPush('styles'); ?>
<style media="screen">
   .nicEdit-main {
   background-color: white;
   resize:vertical;
   margin: 0px !important;
   }
   .toggleComments {
   display: none;
   }
</style>
<?php $__env->stopPush(); ?>


<div id="commentsContainer" class="comments-container">
   <?php if(auth()->guard()->check()): ?>
   <form autocomplete="off" id="postSubmitFormId" onsubmit="submitPost(event, <?php echo e($user->id); ?>)" class="row" style="padding:0px 20px;" method="POST">
      <?php echo e(csrf_field()); ?>

      <input type="hidden" name="postedOnUserId" value="<?php echo e($user->id); ?>">
      <textarea name="content" id="postTextarea" style="width:100%;height:150px;"></textarea>
      <br>
      <div class="text-center">
         <input style="width:200px;" class="btn btn-primary" type="submit" name="" value="POST">
      </div>
   </form>
   <?php endif; ?>
   <br>
   <div id="postCommentContainer">
      
      <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      
      <div class="media well" id="postCommentContainer<?php echo e($post->id); ?>">
         <div class="comment-propic-container">
            <img src="<?php echo e(asset('assets/users/propics/'.$post->user->pro_pic)); ?>" class="media-object" style="width:45px;height:45px;border-radius:50%;">
         </div>
         <div class="media-body">
            <div id="post<?php echo e($post->id); ?>">
               <h4 class="media-heading"><span><?php echo e($post->user->firstname); ?> <?php echo e($post->user->lastname); ?></span> <small><i>Posted on <?php echo e($post->created_at); ?></i></small></h4>
               <p id="postContent<?php echo e($post->id); ?>" class="postContent"><?php echo $post->content; ?></p>
               <p>
                  <?php if(auth()->guard()->check()): ?>
                  <?php if(Auth::user()->id == $post->user->id): ?>
                  <a href="#" style="margin-right:10px;" onclick="showEditPostModal(event, <?php echo e($post->id); ?>)">Edit</a>
                  <a href="#" style="margin-right:10px;" onclick="deletePost(event, <?php echo e($post->id); ?>)">Delete</a>
                  <?php endif; ?>
                  <?php endif; ?>
                  <?php if(count($post->comments) > 1): ?>
                  <a href="#" onclick="toggleComments(event,<?php echo e($post->id); ?>)">View Previous Comments</a>
                  <?php endif; ?>
               </p>
               <!-- Edit Post Modal... -->
               <?php if ($__env->exists('users.profile.partials._edit-post')) echo $__env->make('users.profile.partials._edit-post', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
               <!-- Nested media object -->
               
               <?php if(count($post->comments) == 1): ?>
               
               <div class="media" id="comment<?php echo e($post->comments[0]->id); ?>">
                  <div class="comment-propic-container">
                     <img src="<?php echo e(asset('assets/users/propics/' . $post->comments[0]->user->pro_pic)); ?>" class="media-object" style="width:45px;height:45px;border-radius:50%;">
                  </div>
                  <div class="media-body">
                     <h4 class="media-heading"><span><?php echo e($post->comments[0]->user->firstname); ?> <?php echo e($post->comments[0]->user->lastname); ?></span> <small><i>Posted on February 19, 2016</i></small></h4>
                     <p style="color:black;" id="commentContent<?php echo e($post->comments[0]->id); ?>"><?php echo e($post->comments[0]->comment); ?></p>
                     <?php if(auth()->guard()->check()): ?>
                     <?php if(Auth::user()->id == $post->comments[0]->user->id): ?>
                     <p>
                        <a href="#" style="margin-right:10px;" onclick="showEditCommentModal(event, <?php echo e($post->comments[0]->id); ?>)">Edit</a>
                        <a href="#" style="margin-right:10px;" onclick="deleteComment(event, <?php echo e($post->comments[0]->id); ?>)">Delete</a>
                     </p>
                     <?php endif; ?>
                     <?php endif; ?>
                  </div>
               </div>
               
               <?php elseif(count($post->comments) > 1 && count($post->comments) != 0): ?>
               <div class="toggleComments" id="togglableComments<?php echo e($post->id); ?>">
                  <?php $__currentLoopData = $post->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  
                  <?php if(!$loop->last): ?>
                  
                  <div class="media" id="comment<?php echo e($comment->id); ?>">
                     <div class="comment-propic-container">
                        <img src="<?php echo e(asset('assets/users/propics/' . $comment->user->pro_pic)); ?>" class="media-object" style="width:45px;height:45px;border-radius:50%;">
                     </div>
                     
                     <div class="media-body">
                        <h4 class="media-heading"><span><?php echo e($comment->user->firstname); ?> <?php echo e($comment->user->lastname); ?></span> <small><i>Posted on February 19, 2016</i></small></h4>
                        <p style="color:black;" id="commentContent<?php echo e($comment->id); ?>"><?php echo e($comment->comment); ?></p>
                        <?php if(auth()->guard()->check()): ?>
                        <?php if(Auth::user()->id == $comment->user->id): ?>
                        <p>
                           <a href="#" style="margin-right:10px;" onclick="showEditCommentModal(event, <?php echo e($comment->id); ?>)">Edit</a>
                           <a href="#" style="margin-right:10px;" onclick="deleteComment(event, <?php echo e($comment->id); ?>)">Delete</a>
                        </p>
                        <?php endif; ?>
                        <?php endif; ?>
                     </div>
                  </div>
                  
                  <?php else: ?>
               </div>
               
               <div class="media" id="comment<?php echo e($comment->id); ?>">
                  <div class="comment-propic-container">
                     <img src="<?php echo e(asset('assets/users/propics/' . $comment->user->pro_pic)); ?>" class="media-object" style="width:45px;height:45px;border-radius:50%;">
                  </div>
                  
                  <div class="media-body">
                     <h4 class="media-heading"><span><?php echo e($comment->user->firstname); ?> <?php echo e($comment->user->lastname); ?></span> <small><i>Posted on February 19, 2016</i></small></h4>
                     <p style="color:black;" id="commentContent<?php echo e($comment->id); ?>"><?php echo e($comment->comment); ?></p>
                     <?php if(auth()->guard()->check()): ?>
                     <?php if(Auth::user()->id == $comment->user->id): ?>
                     <p>
                        <a href="#" style="margin-right:10px;" onclick="showEditCommentModal(event, <?php echo e($comment->id); ?>)">Edit</a>
                        <a href="#" style="margin-right:10px;" onclick="deleteComment(event, <?php echo e($comment->id); ?>)">Delete</a>
                     </p>
                     <?php endif; ?>
                     <?php endif; ?>
                  </div>
               </div>
               <?php endif; ?>
               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
               <?php endif; ?>
            </div>
            <?php if(auth()->guard()->check()): ?>
            <form autocomplete="off" method="post" onsubmit="storeComment(event, <?php echo e($post->id); ?>)" id="commentForm<?php echo e($post->id); ?>">
               <?php echo e(csrf_field()); ?>

               <input type="hidden" name="postID" value="<?php echo e($post->id); ?>" />
               <input type="text" name="comment" value="" style="width:95%;color:black;" required>
            </form>
            <?php endif; ?>
         </div>
      </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
   </div>
   <div class="row text-center">
      <?php echo e($posts->links()); ?>

   </div>
</div>
<?php if ($__env->exists('users.profile.partials._edit-comment')) echo $__env->make('users.profile.partials._edit-comment', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php if(auth()->guard()->check()): ?>

<?php $__env->startPush('scripts'); ?>
<script>
   function submitPost(e, userID) {
     e.preventDefault();
     var postSubmitForm = document.getElementById('postSubmitFormId');
     var fd = new FormData(postSubmitForm);
     // getting post content...
     $.ajaxSetup({
         headers: {
             'X-CSRF-Token': $('meta[name=_token]').attr('content')
         }
     });
     // if()
     $.ajax({
       url: '<?php echo e(route('posts.store')); ?>',
       type: 'POST',
       data: fd,
       contentType: false,
       processData: false,
       success: function(data) {
         if(data == "success") {
           document.getElementById('postSubmitFormId').reset();
           $("#postCommentContainer").load(location.href + " #postCommentContainer");
         }
       }
     });
   }
</script>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
   function storeComment(e, postID) {
       e.preventDefault();
       var form = document.getElementById('commentForm'+postID);
       var fd = new FormData(form);
       $.ajax({
         url: '<?php echo e(route('comments.store')); ?>',
         type: 'POST',
         data: fd,
         contentType: false,
         processData: false,
         success: function(data) {
             document.getElementById('commentForm'+postID).reset();
             $("#post"+postID).append("<div class='media' id='comment"+data.id+"'><div class='comment-propic-container'><img src='<?php echo e(asset('assets/users/propics/'. Auth::user()->pro_pic)); ?>' class='media-object' style='width:45px;height:45px;border-radius:50%;'></div><div class='media-body'><h4 class='media-heading'><span><?php echo e(Auth::user()->firstname); ?> <?php echo e(Auth::user()->lastname); ?></span> <small><i>Posted on February 19, 2016</i></small></h4><p style='color:black;' id='commentContent"+data.id+"'>"+data.comment+"</p><p><a href='#' style='margin-right:10px;' onclick='showEditCommentModal(event, "+data.id+")'>Edit</a><a href='#' style='margin-right:10px;' onclick='deleteComment(event, "+data.id+")'>Delete</a></p></div></div>");
         }
       });
   }
</script>
<?php $__env->stopPush(); ?>


<?php $__env->startPush('scripts'); ?>
<script>
   function showEditPostModal(e, postID) {
     e.preventDefault();
     var fd = new FormData();
     fd.append('postID', postID);
     $.ajaxSetup({
         headers: {
             'X-CSRF-Token': $('meta[name=_token]').attr('content')
         }
     });
     $.ajax({
        url: '<?php echo e(route('posts.edit')); ?>',
        type: 'POST',
        data: fd,
        contentType: false,
        processData: false,
        success: function(data) {
            $("#EditPostModal").modal('show');
            document.getElementById('postID').value = data.id;
            document.getElementById('editPostTextarea').value = data.content;
            console.log(data);
        }
     });
   }
</script>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
   function showEditCommentModal(e, commentID) {
     e.preventDefault();
     // $.get(
     //     '/freelancing-site/comments/edit/'+commentID,
     //     function(data) {
     //         $("#EditCommentModal").modal('show');
     //         document.getElementById('commentID').value = data.id;
     //         document.getElementById('editCommentInput').value = data.comment;
     //         console.log(data);
     //     }
     // );
     var fd = new FormData();
     fd.append('commentID', commentID);
     $.ajaxSetup({
         headers: {
             'X-CSRF-Token': $('meta[name=_token]').attr('content')
         }
     });
     $.ajax({
       url: '<?php echo e(route('comments.edit')); ?>',
       type: 'POST',
       data: fd,
       contentType: false,
       processData: false,
       success: function(data) {
         $("#EditCommentModal").modal('show');
         document.getElementById('commentID').value = data.id;
         document.getElementById('editCommentInput').value = data.comment;
         console.log(data);
       }
     })
   }
</script>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
   function deleteComment(e, commentID) {
     e.preventDefault();
     var fd = new FormData();
     fd.append('commentID', commentID);
     $.ajaxSetup({
         headers: {
             'X-CSRF-Token': $('meta[name=_token]').attr('content')
         }
     });
     $.ajax({
       url: '<?php echo e(route('comments.delete')); ?>',
       type: 'POST',
       data: fd,
       contentType: false,
       processData: false,
       success: function(data) {
           if(data == 'success') {
             $("#comment"+commentID).remove();
           }
       }
     })
   }
</script>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
   function deletePost(e, postID) {
     e.preventDefault();
     var fd = new FormData();
     fd.append('postID', postID);
     $.ajaxSetup({
         headers: {
             'X-CSRF-Token': $('meta[name=_token]').attr('content')
         }
     });
     $.ajax({
        url: '<?php echo e(route('posts.delete')); ?>',
        type: 'POST',
        data: fd,
        contentType: false,
        processData: false,
        success: function(data) {
           if(data == 'success') {
              $("#postCommentContainer"+postID).remove();
            }
        }
     })
   }
</script>
<?php $__env->stopPush(); ?>
<?php endif; ?>

<?php $__env->startPush('scripts'); ?>
<script>
   function toggleComments(e,postID) {
     e.preventDefault();
     $("#togglableComments"+postID).toggle();
   }
</script>
<?php $__env->stopPush(); ?>
