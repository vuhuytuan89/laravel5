<?php
/**
 * Created by PhpStorm.
 * User: vu.huy.tuan
 * Date: 6/15/2017
 * Time: 3:32 PM
 */
?>
<div class="col-md-12">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Upload Multiple Images using dropzone.js and Laravel</h1>
                <form method="POST" action="http://demo.itsolutionstuff.com/dropzone/store" accept-charset="UTF-8" enctype="multipart/form-data" class="dropzone dz-clickable" id="image-upload">
                    <div>
                        <h3>Upload Multiple Image By Click On Box</h3>
                    </div>
                <div class="dz-default dz-message"><span>Drop files here to upload</span></div></form>
            </div>
        </div>
    </div>
</div>
<script src="http://demo.itsolutionstuff.com/plugin/jquery.js"></script>
<link rel="stylesheet" href="http://demo.itsolutionstuff.com/plugin/bootstrap-3.min.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/min/dropzone.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.2.0/min/dropzone.min.js"></script>
<script type="text/javascript">
    Dropzone.options.imageUpload = {
        maxFilesize         :       1,
        acceptedFiles: ".jpeg,.jpg,.png,.gif"
    };
</script>