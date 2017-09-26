<?php
/**
 * Created by PhpStorm.
 * User: vu.huy.tuan
 * Date: 6/2/2017
 * Time: 4:44 PM
 */
?>

<?php $__env->startSection('content'); ?>
    <section class="content-header">
        <h1>
            Edit Product
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Product</a></li>
            <li class="active">Edit</li>
        </ol>
    </section>
    <section class="content ">
        <?php if(count($errors) >0): ?>
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="text-danger"><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        <?php endif; ?>
        <!-- enctype="multipart/form-data" class="dropzone dz-clickable" -->
        <form action="<?php echo e(url('admincp/product')); ?>" method="POST" enctype="multipart/form-data">
            <?php echo e(csrf_field()); ?>

            <div class="col-md-6">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Info</h3>
                    </div>
                    <div class="box-body ">
                        <div class="form-group col-md-12">
                            <label>Name</label>
                            <input type="text" name="txtName" class="form-control" value="<?php echo e(old('txtName')); ?>">
                        </div>
                        <!--
                        <div class="form-group col-md-12">
                            <label>Alias</label>
                            <input type="text" name="txtAlias" class="form-control"  value="<?php echo e(old('txtAlias')); ?>">
                        </div>
                        -->
                        <div class="form-group col-md-12">
                            <label>Desc</label>
                            <textarea name="txtDesc" class="form-control "><?php echo e(old('txtDesc')); ?></textarea>
                        </div>
                        <div class="form-group col-md-12">
                            <label>Content</label>
                            <textarea name="txtContent" class="form-control " id="editor1"><?php echo e(old('txtContent')); ?></textarea>
                        </div>
                        <div class="form-group col-md-12">
                            <label>Price</label>
                            <input name="txtPrice" class="form-control"
                                   value="<?php if(empty(old('txtPrice'))): ?> 0 <?php else: ?><?php echo e(old('txtPrice')); ?><?php endif; ?>">
                        </div>
                        <div class="form-group col-md-12">
                            <label>Category</label>
                            <select class="form-control" name="cate_id">
                                <option value="0">---</option>
                                <?php $__currentLoopData = $listCate; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($cate->id); ?>"
                                        <?php if($cate->id == old('cate_id')): ?>
                                        selected="selected"
                                        <?php endif; ?>
                                        ><?php echo e($cate->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">SEO Infomation</h3>
                    </div>
                    <div class="box-body">
                        <div class="form-group col-md-12">
                            SEO Title <input type="text" name="meta_title" class="form-control"  value="<?php echo e(old('meta_title')); ?>">
                            Meta Keywords <input type="text" name="meta_key" class="form-control"  value="<?php echo e(old('meta_key')); ?>">
                            Meta Description <input type="text" name="meta_desc" class="form-control"  value="<?php echo e(old('meta_desc')); ?>">

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="dropzone" id="my-dropzone" name="myDropzone">

                </div>
            </div>
            <div class="col-md-12">
                <div id="dropzone"></div>
                <div id="template-preview">
                    <div class="dz-preview dz-file-preview well" id="dz-preview-template">
                        <div class="dz-details">
                            <div class="dz-filename"><span data-dz-name></span></div>
                            <div class="dz-size" data-dz-size></div>
                        </div>
                        <div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress></span></div>
                        <div class="dz-success-mark"><span></span></div>
                        <div class="dz-error-mark"><span></span></div>
                        <div class="dz-error-message"><span data-dz-errormessage></span></div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <button type="submit" class="btn btn-success pull-right">
                    <i class="fa fa-save"></i>
                    <span>Save and back</span>
                </button>
            </div>
        </form>

    </section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-js-script'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('admin/dist/css/dropzone.css')); ?>">
    <script src="<?php echo e(asset('admin/dist/js/dropzone.js')); ?>"></script>
    <script type="text/javascript">
       Dropzone.options.myDropzone= {
           url: 'http://localhost/laravel5/public/admincp/uploadImg',
           headers: {
               'X-CSRF-TOKEN': '<?php echo csrf_token(); ?>'
           },
           //paramName: "file",
           //maxThumbnailFilesize: 5,
           //previewTemplate: drop,
           //previewsContainer: "#template-preview"
           autoProcessQueue: true,
           uploadMultiple: true,
           parallelUploads: 5,
           maxFiles: 10,
           maxFilesize: 5,
           acceptedFiles: ".jpeg,.jpg,.png,.gif",
           dictFileTooBig: 'Image is bigger than 5MB',
           addRemoveLinks: true,
           success: function(file, response){
               console.log(response);
           },
           removedfile: function(file) {
           var name = file.name;    
           name =name.replace(/\s+/g, '-').toLowerCase();    /*only spaces*/
            $.ajax({
                type: 'POST',
                url: 'http://localhost/laravel5/public/admincp/deleteImg',
                headers: {
                     'X-CSRF-TOKEN': '<?php echo csrf_token(); ?>'
                 },
                data: "id="+name,
                dataType: 'html',
                success: function(data) {
                    $("#msg").html(data);
                }
            });
          var _ref;
          if (file.previewElement) {
            if ((_ref = file.previewElement) != null) {
              _ref.parentNode.removeChild(file.previewElement);
            }
          }
          return this._updateMaxFilesReachedClass();
        },
        previewsContainer: null,
        hiddenInputContainer: "body",

           /*init: function() {
            this.on("addedfile", function(file) {
                // Create the remove button
                var removeButton = Dropzone.createElement("<button>Remove file</button>");
                // Capture the Dropzone instance as closure.
                var _this = this;
                // Listen to the click event
                removeButton.addEventListener("click", function(e) {
                    // Make sure the button click doesn't submit the form:
                    e.preventDefault();
                    e.stopPropagation();
                    // Remove the file preview.
                    _this.removeFile(file);
                    // If you want to the delete the file on the server as well,
                    // you can do the AJAX request here.
                });
                // Add the button to the file preview element.
                file.previewElement.appendChild(removeButton);
            });
        }*/
       }
       /*
       Dropzone.options.myDropzone = { // The camelized version of the ID of the form element
           url: '#',
           // The configuration we've talked about above
           autoProcessQueue: false,
           uploadMultiple: true,
           parallelUploads: 5,
           maxFiles: 5,
           maxFilesize: 2,
           addRemoveLinks: true,
           acceptedFiles: ".jpeg,.jpg,.png,.gif",

           // The setting up of the dropzone
           init: function() {
               var myDropzone = this;

               // First change the button to actually tell Dropzone to process the queue.
               this.element.querySelector("button[type=submit]").addEventListener("click", function(e) {
                   // Make sure that the form isn't actually being sent.
                   e.preventDefault();
                   e.stopPropagation();
                   myDropzone.processQueue();
               });

               // Listen to the sendingmultiple event. In this case, it's the sendingmultiple event instead
               // of the sending event because uploadMultiple is set to true.
               this.on("sendingmultiple", function() {
                   // Gets triggered when the form is actually being sent.
                   // Hide the success button or the complete form.
               });
               this.on("successmultiple", function(files, response) {
                   // Gets triggered when the files have successfully been sent.
                   // Redirect user or notify of success.
               });
               this.on("errormultiple", function(files, response) {
                   // Gets triggered when there was an error sending the files.
                   // Maybe show form again, and notify user of error
               });
           }
       }
       */
    </script>
    <style>
        .dropzone {
            border: 2px dashed #0087F7;
            border-radius: 5px;
            background: white;
        }
    </style>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>