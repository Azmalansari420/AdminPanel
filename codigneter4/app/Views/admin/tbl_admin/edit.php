<?php
$this->db = \Config\Database::connect();
?>
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
                        <div class="col-4 form-group ">
                            <label>Select Role</label>
                            <select class="form-control" required name="role">
                                <?php
                                $roleQuery = $this->db->table('role')->where('status', 1)->get();
                                $roles = $roleQuery->getResult(); 

                                foreach ($roles as $data) { ?>
                                    <option value="<?= $data->id ?>"><?= $data->name ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="col-4 form-group">
                           <label>UserName </label>
                           <input type="text" class="form-control" name="username" value="<?=$EDITDATA->username ?>" />
                        </div>

                        <div class="col-4 form-group">
                           <label>Password </label>
                           <input type="text" class="form-control" name="password" value="<?=$EDITDATA->password ?>" />
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