<!DOCTYPE html>
<html lang="en">
   <title>Update <?=$page_title ?></title>
   <?php $this->load->view('admin/include/allcss') ?>
   <body>
      <div id="app" class="app app-header-fixed app-sidebar-fixed">
         <?php $this->load->view('admin/include/topbar') ?>
         <?php $this->load->view('admin/include/sidebar') ?>
         <div id="content" class="app-content">
            <h1 class="page-header add-header">Update <?=$page_title ?> </h1>
            <form class="row" method="post" enctype="multipart/form-data" action="#">
               <div class="col-lg-8">
                  <div class="card m-b-15">
                     <div class="row card-body">
                        
                        <div class="col-12 form-group">
                          <label>Click to Upload Multiple Image</label>
                          <input type="file" id="multi-image-input-2" multiple class="form-control mb-2" name="multiple_image_json[]">
                          <div id="multi-image-previews" style="display:flex;overflow: auto;">
                            <?php 
                           if(!empty($EDITDATA[0]->multiple_image_json))
                           {
                            $allimage = json_decode($EDITDATA[0]->multiple_image_json); 
                            foreach ($allimage as $key => $value) 
                              { 
                              ?>
                              <div class="image-preview old-image" style="display: grid; text-align: center;">
                                 <input type="hidden" name="oldmultiple_image_json[]" value="<?php echo $value; ?>">
                                 <img src="<?php echo base_url($upload_path); ?><?php echo $value; ?>" alt="Image Preview" width="75px">
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
                              $count = 1;
                              if(!empty($EDITDATA[0]->single_image))
                              {
                              $getall = json_decode($EDITDATA[0]->single_image);
                              foreach($getall as $key => $value)
                                 { ?>
                                <?php $this->load->view($add_more_url,array('value'=>$value)); ?>
                             <?php } } ?>
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
                              $data = array();
                              $count = 1;
                              
                              if(!empty($EDITDATA[0]->multiple_images))
                               {
                                   $all_multiple_images = json_decode($EDITDATA[0]->multiple_images);
                                   $count = count($all_multiple_images);
                               }

                               $i=0;
                               $iiii=0;
                               while($i<$count)
                               {
                                $data['i'] = $i;
                                if(!empty($all_multiple_images))
                                {
                                    $data['value'] = $all_multiple_images[$i];
                                }
                           
                                $this->load->view($add_more_multiple,$data); 
                                $i++;
                                $iiii++;
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
                           <select class="selectpicker form-control" required name="status" data-style="btn-default" data-live-search="true">
                              <option value="1"  <?php if($EDITDATA[0]->status==1)echo 'selected'; ?>>Show</option>
                              <option value="0" <?php if($EDITDATA[0]->status==0)echo 'selected'; ?>>Hide</option>
                           </select>
                        </div>
                        <div class="col-12 form-group mt-4">
                           <button type="submit" name="submit" class="btn btn-purple">Update <?=$page_title ?></button>
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
    $(document).on('click', '.remove-image', function() {
       $(this).parent('.image-preview').remove();
     });

     $('#multi-image-input-2').on('change', function() {
     var files = $(this)[0].files;
     var newImagePreviews = $('#new-image-previews');
     newImagePreviews.html('');
     $.each(files, function(i, file) {
       var reader = new FileReader();
       reader.onload = function(e) {
         newImagePreviews.append('<div class="image-preview new-image" style="display: grid; text-align: center;"><img src="' + e.target.result + '" alt="Image Preview" width="75px"><span class="remove-image">Remove</span></div>');
       };
       reader.readAsDataURL(file);
     });
   });


 /*single image add more*/


     $(document).ready(function() {
       var count = 1;
       $('#add-more-single-image-btn').click(function() {
           $.ajax({
               type: 'POST',
               url: '<?php echo base_url($load_more_singleimage); ?>',
               data: {count: count},
               success: function(data) {
                   $('#add-more-sinfle-image-field').append(data);
               }
           });
       });

       $(document).on('click', '.remove-btn', function() {
           $(this).parent().remove();
       });
   });

   /*multiple*/
       var i = <?=$iiii ?>;
     $(document).ready(function() {
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

       $(document).on('click', '.multi-remove-btn', function() {
           $(this).parent().remove();
       });
       $(document).on('click', '.multiple-remove-image', function() {
           $(this).parent().remove();
       });
   });








</script>

   </body>
</html>