
<!DOCTYPE html>
<html lang="en">
   <title>Update <?=$page_title ?></title>
   <?=view('admin/include/allcss') ?>
   <body>
      <div id="app" class="app app-header-fixed app-sidebar-fixed">
         <?=view('admin/include/topbar') ?>
         <?=view('admin/include/sidebar') ?>
         <div id="content" class="app-content">
            <h1 class="page-header add-header">Update <?=$page_title ?> </h1>
            <form class="row" method="post" enctype="multipart/form-data" action="<?=base_url($update_page.$EDITDATA->id) ?>">
               <div class="col-lg-8">
                  <div class="card m-b-15">
                     <div class="row card-body">

                        <div class="col-4 form-group">
                           <label>Mobile </label>
                           <input type="text" class="form-control" name="mobile" value="<?= esc($EDITDATA->mobile) ?>">
                        </div>
                        <div class="col-4 form-group">
                           <label>Alt Mobile </label>
                           <input type="text" class="form-control" name="alt_mobile" value="<?= esc($EDITDATA->alt_mobile) ?>">
                        </div>
                        <div class="col-4 form-group">
                           <label>Whatsapp Mobile </label>
                           <input type="text" class="form-control" name="whatsapp_no" value="<?= esc($EDITDATA->whatsapp_no) ?>">
                        </div>

                        <div class="col-6 form-group">
                           <label>Email </label>
                           <input type="text" class="form-control" name="email" value="<?=$EDITDATA->email ?>">
                        </div>
                        <div class="col-6 form-group">
                           <label>Alt Email </label>
                           <input type="text" class="form-control" name="alt_email" value="<?=$EDITDATA->alt_email ?>">
                        </div>

                        <div class="col-12 form-group">
                           <label>Address </label>
                           <textarea name="address" class="form-control"><?=$EDITDATA->address ?></textarea>
                        </div>
                        
                        <div class="col-6 form-group">
                           <label>Facebook </label>
                           <input type="text" class="form-control" name="facebook" value="<?=$EDITDATA->facebook ?>">
                        </div>
                        <div class="col-6 form-group">
                           <label>Twitter </label>
                           <input type="text" class="form-control" name="twitter" value="<?=$EDITDATA->twitter ?>">
                        </div>
                        <div class="col-6 form-group">
                           <label>Instagram </label>
                           <input type="text" class="form-control" name="instagram" value="<?=$EDITDATA->instagram ?>">
                        </div>
                        <div class="col-6 form-group">
                           <label>Youtube </label>
                           <input type="text" class="form-control" name="youtube" value="<?=$EDITDATA->youtube ?>">
                        </div>
                        <div class="col-12 form-group">
                           <label>Map </label>
                           <textarea rows="10" name="map" class="form-control"><?=$EDITDATA->map ?></textarea>
                        </div>

                     </div>
                  </div>
               </div>
               <div class="col-lg-4">
                  <div class="card m-b-15">
                     <div class="row card-body">
                        <div class="col-12 form-group">
                           <label>Click to Upload Image</label>
                           <input type="file" id="image-input" class="form-control" name="logo">
                           <input  type="hidden" class="form-control" name="oldlogo" value="<?php echo $EDITDATA->logo; ?>">
                           <?php
                           if(!empty($EDITDATA->logo))
                              { ?>
                           <img class="mt-2" id="image-preview" src="<?php echo base_url($upload_path); ?><?php echo $EDITDATA->logo; ?>" alt="Image Preview" width="100px" >
                        <?php } ?>
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
      <?=view('admin/include/theams') ?>
      <?=view('admin/include/allscript') ?>
   </body>
</html>