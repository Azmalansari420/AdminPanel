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
               <div class="col-lg-12">
                  <div class="card m-b-15">
                     <div class="row card-body">
                        
                        <div class="col-6 form-group m-b-0">
                           <label>Select Type</label>
                           <select class=" form-control" required name="type">
                              <option value="1"  <?php if($EDITDATA[0]->type==1)echo 'selected'; ?>>Notification</option>
                              <option value="2" <?php if($EDITDATA[0]->type==2)echo 'selected'; ?>>App Notification</option>
                           </select>
                        </div>

                        <div class="col-6 form-group">
                           <label>Name </label>
                           <input type="text" class="form-control" name="title" value="<?=$EDITDATA[0]->title ?>">
                        </div>

                        <div class="col-6 form-group">
                           <label>Message </label>
                           <textarea rows="5" class="form-control" name="message" /><?=$EDITDATA[0]->message ?></textarea>
                        </div>


                        <div class="col-6 form-group m-b-0">
                           <label>Select Status</label>
                           <select class=" form-control" required name="status">
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
   </body>
</html>