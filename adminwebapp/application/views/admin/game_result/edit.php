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
                        <div class="col-3 form-group m-b-0">
                           <label>Select Status</label>
                           <select class=" form-control" required name="game_id">
                              <option selected="">Select Game</option>
                              <?php 
                              $data1=$this->crud->selectDataByMultipleWhere('game',array('status'=>1,));
                               foreach($data1 as $data)
                               { ?>
                                 <option <?php if($data->id==$EDITDATA[0]->game_id) echo 'selected' ?> value="<?php echo $data->id; ?>"> <?php echo $data->name; ?></option>
                              <?php } ?>
                           </select>
                        </div>

                        <div class="col-3 form-group">
                           <label>Number </label>
                           <input type="text" class="form-control" name="number" value="<?php echo $EDITDATA[0]->number; ?>">
                        </div>

                        <div class="col-3 form-group">
                           <label>Date </label>
                           <input type="text" class="form-control" name="create_on" value="<?php echo $EDITDATA[0]->create_on; ?>">
                        </div>

                        
                        <div class="col-3 form-group m-b-0">
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