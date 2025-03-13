
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
                        <div class="col-6 form-group">
                           <label>Title </label>
                           <input type="text" class="form-control" name="title" value="<?= esc($EDITDATA->title) ?>">
                        </div>

                        <div class="col-6 form-group">
                           <label>Sub Title </label>
                           <input type="text" class="form-control" name="sub_title" value="<?=$EDITDATA->sub_title ?>">
                        </div>

                        <div class="col-12 form-group">
                           <label>Content </label>
                           <textarea name="content" class="summernote form-control"><?=$EDITDATA->content ?></textarea>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-lg-4">
                  <div class="card m-b-15">
                     <div class="row card-body">
                        <div class="col-12 form-group">
                           <label>Click to Upload Image</label>
                           <input type="file" id="image-input" class="form-control" name="image">
                           <input  type="hidden" class="form-control" name="oldimage" value="<?php echo $EDITDATA->image; ?>">
                           <?php
                           if(!empty($EDITDATA->image))
                              { ?>
                           <img class="mt-2" id="image-preview" src="<?php echo base_url($upload_path); ?><?php echo $EDITDATA->image; ?>" alt="Image Preview" width="100px" >
                        <?php } ?>
                        </div>

                        <div class="col-12 form-group m-b-0">
                           <label>Select Status</label>
                           <select class=" form-control" required name="status">
                              <option value="1"  <?php if($EDITDATA->status==1)echo 'selected'; ?>>Show</option>
                              <option value="0" <?php if($EDITDATA->status==0)echo 'selected'; ?>>Hide</option>
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
      <?=view('admin/include/theams') ?>
      <?=view('admin/include/allscript') ?>
   </body>
</html>