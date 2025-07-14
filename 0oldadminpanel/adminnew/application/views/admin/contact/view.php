<!DOCTYPE html>
<html lang="en">
   <title>View <?=$page_title ?></title>
   <?php $this->load->view('admin/include/allcss') ?>
   <body>
      <div id="app" class="app app-header-fixed app-sidebar-fixed">
         <?php $this->load->view('admin/include/topbar') ?>
         <?php $this->load->view('admin/include/sidebar') ?>
         <div id="content" class="app-content">
            <h1 class="page-header add-header">View <?=$page_title ?> </h1>
            <form class="row" method="post" enctype="multipart/form-data" action="#">
               <div class="col-lg-12">
                  <div class="card m-b-15">
                     <div class="row card-body">
                        <div class="col-6 form-group">
                           <label>Name </label>
                           <input type="text" class="form-control" name="name" value="<?=$EDITDATA[0]->name ?>" disabled>
                        </div>
                        <div class="col-6 form-group">
                           <label>Email </label>
                           <input type="text" class="form-control" name="name" value="<?=$EDITDATA[0]->email ?>" disabled>
                        </div>
                        <div class="col-6 form-group">
                           <label>Mobile </label>
                           <input type="text" class="form-control" name="name" value="<?=$EDITDATA[0]->mobile ?>" disabled>
                        </div>
                        <div class="col-6 form-group">
                           <label>Subject </label>
                           <input type="text" class="form-control" name="name" value="<?=$EDITDATA[0]->subject ?>" disabled>
                        </div>

                        

                        <div class="col-12 form-group" >
                           <label>Message </label>
                           <textarea name="content" class="summernote form-control"><?=$EDITDATA[0]->message ?></textarea>
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