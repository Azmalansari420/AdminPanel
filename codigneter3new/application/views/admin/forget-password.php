

<!DOCTYPE html>
   <html lang="en">
      <head>
         <title><?=website_name ?></title>
         <?php $this->load->view('admin/include/allcss') ?>
      </head>
      
      <body>
         <div id="app" class="app app-full-height app-without-header">
            <div class="login">
               <div class="login-cover"></div>
               <div class="login-content">
                  <div class="login-brand">
                     <a href="<?=base_url() ?>" target="_blank"><?=website_name ?></a>
                  </div>
                  <h3 class="m-b-20"><span>Forgot Password</span></h3>                  
                  <form action="<?=base_url('Admin/forget_password') ?>" method="POST" >
                     <div class="form-group">
                        <label>Enter Your Email <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="email" required  placeholder="Enter Your Email">
                     </div>
                     
                     <div class="d-flex align-items-center">
                        <button type="submit" name="submit" class="btn btn-primary width-150 btn-rounded">Submit</button>
                        <a href="<?=base_url('admin') ?>" class="m-l-10">Back to Login</a>
                     </div>
                  </form>
                 
               </div>
            </div>
            <a href="#" data-click="scroll-top" class="btn-scroll-top fade"><i class="fa fa-arrow-up"></i></a>
         </div>
         
 <?php $this->load->view('admin/include/allscript') ?>




      </body>
   </html>