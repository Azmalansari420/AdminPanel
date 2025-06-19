<!DOCTYPE html>
<html lang="en">
<title> <?=$page_title ?></title>
   <?php $this->load->view('admin/include/allcss') ?>
   <body>
      <div id="app" class="app app-header-fixed app-sidebar-fixed">
         <?php $this->load->view('admin/include/topbar') ?>
         <?php $this->load->view('admin/include/sidebar') ?>
         <div id="content" class="app-content">
            <h1 class="page-header add-header"> <?=$page_title ?> </h1>
            <form class="row" method="post" enctype="multipart/form-data" action="<?=base_url($formURL) ?>">

               <input type="hidden" name="id" value="<?=@$EDITDATA->id ?>">
               <div class="col-lg-8">
                  <div class="card m-b-15">
                     <div class="row card-body">

                        <div class="col-12 form-group">
                            <label>Click to Upload Multiple Image</label>
                            <input type="file" id="multi-image-input" multiple class="form-control mb-2" name="multiple_image_json[]">

                            <div id="multi-image-previews" style="display:flex; overflow: auto;">
                                <?php 
                                if (!empty($EDITDATA->multiple_image_json)) {
                                    $allimage = json_decode($EDITDATA->multiple_image_json); 
                                    foreach ($allimage as $value) { ?>
                                        <div class="image-preview old-image" style="display: grid; text-align: center;">
                                            <input type="hidden" name="oldmultiple_image_json[]" value="<?= $value ?>">
                                            <img src="<?= base_url($upload_path . $value) ?>" alt="Image Preview" width="75px">
                                            <span class="remove-image">Remove</span>
                                        </div>
                                <?php } } ?>
                                <div id="new-image-previews" style="display:contents;"></div>
                            </div>
                        </div>


                        <div class="col-12 text-center">
                           <h3>Add More With Single Image</h3>
                        </div>

                        <div class="col-md-12">
                           <div class="row" id="add-more-sinfle-image-field">
                              <?php
                              if (!empty($EDITDATA->single_image)) {
                                 $getall = json_decode($EDITDATA->single_image);
                                 foreach ($getall as $key => $value) {
                                    $this->load->view($add_more_url, ['value' => $value]);
                                 }
                              } else {
                                 // Show one empty block for "Add" case
                                 $this->load->view($add_more_url);
                              }
                              ?>
                           </div>
                           <div class="col-md-12 text-right">
                              <input type="button" class="btn btn-sm btn-secondary" id="add-more-single-image-btn" value="Add More">
                           </div>
                        </div>


                        <span style="border-bottom: 1px solid red;width: 100%;margin: 30px 0;"></span>

                        <div class="col-12 text-center">
                           <h3>Add More With Multiple Image</h3>
                        </div>

                        <div class="col-md-12">
                           <div class="row" id="add-more-multiple-image-field">
                              <?php
                              if (!empty($EDITDATA->multiple_images)) {
                                 $all_multiple_images = json_decode($EDITDATA->multiple_images);
                                 $i = 0;
                                 foreach ($all_multiple_images as $value) {
                                    $this->load->view($add_more_multiple, ['value' => $value, 'i' => $i]);
                                    $i++;
                                 }
                              } else {
                                 // Show one empty block for "Add" case
                                 $this->load->view($add_more_multiple, ['i' => 0]);
                              }
                              ?>
                           </div>
                           <div class="col-md-12 text-right">
                              <input type="button" class="btn btn-sm btn-secondary" id="add-more-multiple-image-btn" value="Add More">
                           </div>
                        </div>














                     </div>
                  </div>
               </div>
               <div class="col-lg-4">
                  <div class="card m-b-15">
                     <div class="row card-body">
                        <div class="col-12 form-group m-b-0">
                           <label>Select Status</label>
                           <select class="selectpicker  form-control" required name="status" data-style="btn-default" data-live-search="true" >
                              <option value="1" selected>Show</option>
                              <option value="0">Hide</option>
                           </select>
                        </div>
                        <div class="col-12 form-group mt-4">
                           <button type="submit" name="submit" class="btn btn-purple"> <?=$page_title ?></button>
                        </div>
                     </div>
                  </div>
               </div>
            </form>
         </div>
         <a href="#" data-click="scroll-top" class="btn-scroll-top fade"><i class="fa fa-arrow-up"></i></a>
      </div>
      <?php $this->load->view('admin/include/theams') ?>
      <?php $this->load->view('admin/include/allscript') ?>

<script>
   /*single image add more*/

   $(document).ready(function () {
      var count = 1;

      $('#add-more-single-image-btn').click(function () {
         $.ajax({
            type: 'POST',
            url: '<?= base_url($load_more_singleimage); ?>',
            data: { count: count },
            success: function (data) {
               $('#add-more-sinfle-image-field').append(data);
               count++;
            }
         });
      });

      $(document).on('click', '.remove-btn', function () {
         $(this).closest('.card-body').remove();
      });
   });





   /*multiple image add more*/

   $(document).ready(function() {
    var i = 1;
    $('#add-more-multiple-image-btn').click(function() {
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url($load_more_multiimage); ?>',
            data: {i: i},
            success: function(data) {
                $('#add-more-multiple-image-field').append(data);
                i++;
            }
        });
    });

    // FIXED: Remove the entire multiple image block
    $(document).on('click', '.multi-remove-btn', function() {
        $(this).closest('.card-body').remove();
    });

    // Optional: also allow removal of individual preview images
    $(document).on('click', '.multiple-remove-image', function() {
        $(this).closest('.col-3').remove();
    });
});







   
</script>












   </body>
</html>