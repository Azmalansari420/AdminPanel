<!DOCTYPE html>
<html lang="en">
<title>Add <?=$page_title ?></title>
   <?=view('admin/include/allcss') ?>
   <body>
      <div id="app" class="app app-header-fixed app-sidebar-fixed">
         <?=view('admin/include/topbar') ?>
         <?=view('admin/include/sidebar') ?>
         <div id="content" class="app-content">
            <h1 class="page-header add-header">Add <?=$page_title ?> </h1>
            <form class="row" method="post" enctype="multipart/form-data" action="<?=base_url($add_new_entryURL) ?>">
               <div class="col-lg-8">
                  <div class="card m-b-15">
                     <div class="row card-body">

                        <div class="col-12 form-group">
                           <label>Click to Upload Multiple Image</label>
                           <input type="file" id="multi-image-input" multiple class="form-control mb-2" name="multiple_image_json[]">
                           <div id="multi-image-previews" style="display:flex;overflow: auto;"></div>
                        </div>

                        <div class="col-12 text-center">
                           <h3>Add More With Single Image</h3>
                        </div>

                        <div class="col-md-12">
                           <div class="row" id="add-more-sinfle-image-field">
                                <?=view('admin/multipleimage/add-single-image') ?>
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
                                 $count = 1; 
                                 $i=0;
                                 while($i<$count)
                                 {
                                    $data['i'] = $i; 
                                    echo view('admin/multipleimage/add-multiple-image',array('i'=>$i));
                                     $i++; 
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
                           <select class=" form-control" required name="status">
                              <option value="1" selected>Show</option>
                              <option value="0">Hide</option>
                           </select>
                        </div>
                        <div class="col-12 form-group mt-4">
                           <button type="submit" name="submit" class="btn btn-purple">Add <?=$page_title ?></button>
                        </div>
                     </div>
                  </div>
               </div>
            </form>
         </div>
         <a href="#" data-click="scroll-top" class="btn-scroll-top fade"><i class="fa fa-arrow-up"></i></a>
      </div>
      <?=view('admin/include/theams') ?>
      <?=view('admin/include/allscript') ?>
   </body>
</html>

<script>
   /*single image add more*/

   $(document).ready(function() {
       var count = 1;
       $('#add-more-single-image-btn').click(function() {
           $.ajax({
               type: 'POST',
               url: '<?php echo base_url("admin/multipleimage/load_more_singleimage"); ?>',

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



   /*multiple image add more*/

   $(document).ready(function() {
       var i = 1;
       $('#add-more-multiple-image-btn').click(function() {
           $.ajax({
               type: 'POST',
               url: '<?php echo base_url("admin/multipleimage/load_more_multiimage"); ?>',
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
   });


</script>