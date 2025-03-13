<!DOCTYPE html>
<html lang="en">
<title>Add <?=$page_title ?></title>
   <?php $this->load->view('admin/include/allcss') ?>
   <body>
      <div id="app" class="app app-header-fixed app-sidebar-fixed">
         <?php $this->load->view('admin/include/topbar') ?>
         <?php $this->load->view('admin/include/sidebar') ?>
         <div id="content" class="app-content">
            <h1 class="page-header add-header">Add <?=$page_title ?> </h1>
            <form class="row" method="post" enctype="multipart/form-data" action="#">
               
               <div class="col-lg-12">
                  <div class="card m-b-15">
                     <div class="row card-body">
                        
                        <div class="col-3 form-group m-b-0">
                           <label>Select Status</label>
                           <select class=" form-control" required name="game_id">
                              <option selected="">Select Game</option>
                              <?php 
                              $data1=$this->crud->selectDataByMultipleWhere('game',array('status'=>1,));
                               foreach($data1 as $data)
                               { ?>
                                 <option  value="<?php echo $data->id; ?>"> <?php echo $data->name; ?></option>
                              <?php } ?>
                           </select>
                        </div>

                        <div class="col-3 form-group">
                           <label>Number </label>
                           <input type="text" class="form-control" name="number">
                        </div>

                        <div class="col-3 form-group">
                           <label>Date </label>
                           <input type="text" class="form-control" name="create_on" value="<?=date('Y-m-d') ?>">
                        </div>

                        


                        <div class="col-3 form-group m-b-0">
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
      <?php $this->load->view('admin/include/theams') ?>
      <?php $this->load->view('admin/include/allscript') ?>
   </body>
</html>