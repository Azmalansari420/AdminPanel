<!DOCTYPE html>
<html lang="en">
   <title>View <?=$page_title ?></title>
   <?php $this->load->view('admin/include/allcss') ?>
   <body>
      <div id="app" class="app app-header-fixed app-sidebar-fixed">
         <?php $this->load->view('admin/include/topbar') ?>
         <?php $this->load->view('admin/include/sidebar') ?>
         <div id="content" class="app-content">
            <h1 class="page-header add-header">Add <?=$page_title ?> </h1>
            <form class="row" method="post" enctype="multipart/form-data" action="#">
               <div class="col-lg-8">
                  <div class="card m-b-15">
                     <div class="row card-body">
                        <div class="col-6 form-group">
                           <label>Title </label>
                           <input type="text" class="form-control" name="title" value="<?=$EDITDATA[0]->title ?>" disabled>
                        </div>

                        <div class="col-6 form-group">
                           <label>Sub Title </label>
                           <input type="text" class="form-control" name="sub_title" value="<?=$EDITDATA[0]->sub_title ?>" disabled>
                        </div>

                        <div class="col-12 form-group" >
                           <label>Content </label>
                           <textarea name="content" class="summernote form-control"><?=$EDITDATA[0]->content ?></textarea>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-lg-4">
                  <div class="card m-b-15">
                     <div class="row card-body">
                        <div class="col-12 form-group">
                           <label>Upload Image</label>
                           <input  type="hidden" class="form-control" name="oldimage" value="<?php echo $EDITDATA[0]->image; ?>">
                           <?php
                           if(!empty($EDITDATA[0]->image))
                              { ?>
                                 <br>
                           <img id="image-preview" src="<?php echo base_url($upload_path); ?><?php echo $EDITDATA[0]->image; ?>" alt="Image Preview" width="100px" >
                        <?php } ?>
                        </div>

                        <div class="col-12 form-group m-b-0">
                           <label>Select Status</label>
                           <select class=" form-control" required name="status" disabled>
                              <option value="1"  <?php if($EDITDATA[0]->status==1)echo 'selected'; ?>>Show</option>
                              <option value="0" <?php if($EDITDATA[0]->status==0)echo 'selected'; ?>>Hide</option>
                           </select>
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
   </body>
</html>