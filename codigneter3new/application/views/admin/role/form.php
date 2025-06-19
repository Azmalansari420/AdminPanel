<!DOCTYPE html>
<html lang="en">
<title><?=$page_title ?></title>
   <?php $this->load->view('admin/include/allcss') ?>
   <body>
      <div id="app" class="app app-header-fixed app-sidebar-fixed">
         <?php $this->load->view('admin/include/topbar') ?>
         <?php $this->load->view('admin/include/sidebar') ?>
         <div id="content" class="app-content">
            <h1 class="page-header add-header"><?=$page_title ?> </h1>
            <form class="row" method="post" enctype="multipart/form-data" action="<?=base_url($formURL) ?>">
               <input type="hidden" name="id" value="<?=@$EDITDATA->id ?>">

               <div class="col-lg-8">
                  <div class="card m-b-15">
                     <div class="row card-body">
                        <div class="col-12 form-group">
                           <label>Role Name </label>
                           <input type="text" class="form-control" name="name" required  value="<?=@$EDITDATA->name ?>" />
                        </div>
                        <div class="col-lg-12 mb-4">
                           <div class="mb-lg-0 mb-3">
                              <h3 class="box-title">Role Access Matrix</h3>
                           </div>
                        </div>

                        <?php
                              $menuname = menuname();
                              $access_array = access_array();
                              $access1 = [];
                              $inner_access = [];
                              $main_access = [];

                              if(!empty($EDITDATA->role_access))
                               {
                                   $access = json_decode($EDITDATA->role_access);
                                   $main_access = $access->main_access;
                                   $inner_access = $access->inner_access;
                               }
                               foreach ($menuname as $key => $value) { 

                                $selected1 = '';
                                if(!empty($main_access)) if(in_array($key, $main_access)) $selected1 = 'checked';
                                ?>
                                <div class="col-lg-3">
                                    <input type="hidden" name="access_count[]" value="<?=$key ?>">
                                    <label class="btn btn-dark" style="width: 100%;">
                                       <input class="form-check-input" type="checkbox" name="main_access[]" value="<?=$key ?>" <?=$selected1 ?> > <?=$value ?></label>
                                    <ul>
                                        <?php foreach ($access_array as $key2 => $value2){ 
                                        $selected2 = '';
                                        if(!empty($inner_access[$key]))
                                        {
                                            if(in_array($key2, $inner_access[$key])) $selected2 = 'checked';
                                        }
                                        
                                            ?>
                                            <li>
                                                <label class="m-b-3 checkbox-success">
                                                    <input class="form-check-input" type="checkbox" name="inner_access<?=$key ?>[]" value="<?=$key2 ?>" <?=$selected2 ?> > <?=$value2 ?>
                                                </label>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            <?php } ?>
                     </div>
                  </div>
               </div>
               <div class="col-lg-4">
                  <div class="card m-b-15">
                     <div class="row card-body">
                        
                        <div class="col-12 form-group m-b-0">
                           <label>Select Status</label>
                           <select class="selectpicker  form-control" required name="status" data-style="btn-default" data-live-search="true" >
                              <option value="1"  <?= (isset($EDITDATA->status) && $EDITDATA->status == '1') ? 'selected' : '' ?>>Show</option>
                              <option value="0" <?= (isset($EDITDATA->status) && $EDITDATA->status == '0') ? 'selected' : '' ?>>Hide</option>
                           </select>
                        </div>
                        
                        <div class="col-12 form-group mt-4">
                           <button type="submit" name="submit" class="btn btn-purple"><?=$page_title ?></button>
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