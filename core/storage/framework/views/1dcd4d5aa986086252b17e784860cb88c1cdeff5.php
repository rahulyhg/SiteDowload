<?php $__env->startSection('body'); ?>
  <div class="page-content-wrapper">
     <div class="page-content" style="min-height:391px">
        <h3 class="page-title uppercase bold"> <i class="fa fa-desktop"></i> Voir toute les catégories</h3>
        <hr>
        <div class="row">
           <div class="col-md-12">
              <div class="portlet box blue">
                 <div class="portlet-title">
                    <div class="caption">
                       <i class="fa fa-list"></i>  Liste de toutes les catégories
                    </div>
                    <div class="actions">
                         PAGE <?php echo e($categories->currentPage()); ?> OF <?php echo e($categories->lastPage()); ?>

                    </div>
                 </div>
                 <div class="portlet-body">
                   <?php if($errors->any()): ?>
                       <div class="alert alert-danger">
                           <ul>
                               <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                   <li><?php echo e($error); ?></li>
                               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                           </ul>
                       </div>
                   <?php endif; ?>
                    <button class="btn btn-primary pull-right" type="button" name="button" data-toggle="modal" data-target="#addModal">Ajouter une Catégories</button>
                    <br><br>
                    <div class="table-scrollable">
                       <table class="table table-bordered table-hover">
                          <thead>
                             <tr>
                                <th> # </th>
                                <th> Nom </th>
                                <th> Actions </th>
                             </tr>
                          </thead>
                          <tbody>
                            <?php
                              $i = 0;
                            ?>
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="bold">
                               <td> <?php echo e(++$i); ?> </td>
                               <td>
                                  <h4 style="margin:0px;"><?php echo e($category->name); ?></h4>
                               </td>
                               <td>
                                  <button class="btn btn-warning" data-toggle="modal" data-target="#editModal<?php echo e($category->id); ?>">Editer</button>
                                  <button id="featureStatusBtn29" class="btn btn-danger" type="button" name="button" data-toggle="modal" data-target="#deleteModal<?php echo e($category->id); ?>">Supprimer</button>
                               </td>
                            </tr>
                            <?php if ($__env->exists('admin.categoryManagement.edit')) echo $__env->make('admin.categoryManagement.edit', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                            <?php if ($__env->exists('admin.categoryManagement.delete')) echo $__env->make('admin.categoryManagement.delete', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          </tbody>
                       </table>
                    </div>
                    <!-- print pagination -->
                    <div class="row">
                       <div class="text-center">
                          <?php echo e($categories->links()); ?>

                       </div>
                    </div>
                    <!-- row -->
                    <!-- END print pagination -->
                 </div>
              </div>
           </div>
        </div>
        <!-- ROW-->
     </div>
  </div>

  
  <?php if ($__env->exists('admin.categoryManagement.add')) echo $__env->make('admin.categoryManagement.add', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>