<?php
$user = $this->crud->selectDataByMultipleWhere('tbl_admin',array('id'=>$this->session->userdata("id"),));
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Lock Screen</title>
      <?php $this->load->view('admin/include/allcss') ?>

   </head>
   <body>
       <?php echo loder; ?> 
      <div id="app" class="app app-header-fixed app-sidebar-fixed ">

         
         <div id="content" class="">

           
               <form  class="row" method="post" enctype="multipart/form-data" action="#">
                    <input type="hidden" name="username" value="<?php echo $user[0]->username; ?>">
               

                  <div class="col-lg-12">
                      <div class="card border-0 mb-4">
                        <div class="card-header h6 mb-0 bg-none p-3 text-center">
                           <i class="fa fa-fa fa-lg fa-fw text-dark text-opacity-50 me-1"></i> Lock Screen
                        </div>
                        <div class="card-body" style="margin: 0 auto;">
                           <div class="row">


                              <div class="col-lg-12 mb-4 text-center">
                                 <div class="mb-lg-0 mb-3 ">
                                    <h2>Hi ! <?php echo $user[0]->first_name; ?></h2>
                                 <p>Enter your password to access the admin.</p>
                                 </div>
                              </div>

                              <div class="col-lg-12 mb-4 text-center">
                                 <div class="mb-lg-0 mb-3 ">
                                    <img src="<?php echo base_url(); ?>media/uploads/<?php echo $user[0]->image; ?>" class="img-fluid" style="height: 100px;border-radius: 50%;">
                                 </div>
                              </div>
                               <span class="flash-message"><?php echo $this->session->flashdata('message') ?></span>
                              <div class="col-lg-12 mb-4">
                                 <div class="mb-lg-0 mb-3">
                                    <label class="form-label">Password</label>
                                    <input type="text" class="form-control" name="password" >
                                 </div>
                              </div>
                              <div class="col-lg-12 mb-4 text-center">
                                 <div class="mb-lg-0 mb-3">
                                    <button class="btn btn-primary d-block" type="submit" name="submit">
                                      Login
                                   </button>
                                 </div>
                              </div>

                              
                             
                           </div>
                        </div>
                     </div>                  
                  </div>
               </form>
           
         </div>
       
      </div>



   <?php $this->load->view('admin/include/footer') ?>

   </body>
</html>