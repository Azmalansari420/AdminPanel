      

<!DOCTYPE html>
   <html lang="en">
      <head>
         <title><?=env("APP_NAME") ?></title>
         <?=view('admin/include/allcss') ?>
      </head>
      
      <body>
         <div id="app" class="app app-full-height app-without-header">
            <div class="login">
               <div class="login-cover"></div>
               <div class="login-content">
                  <div class="login-brand">
                     <a href="<?=base_url() ?>" target="_blank"><?=env("APP_NAME") ?></a>
                  </div>
                  <?php if (session()->getFlashdata('error')) : ?>
                      <div class="alert alert-danger">
                          <?= session()->getFlashdata('error') ?>
                      </div>
                  <?php endif; ?>
                  <h3 class="m-b-20"><span>Sign In</span></h3>                  
                  <form action="<?=base_url('admin/login') ?>" method="POST" >
                     <div class="form-group">
                        <label>Username <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="username" required  placeholder="Username">
                     </div>
                     <div class="form-group">
                        <label>Password <span class="text-danger">*</span></label>
                        <input type="password" class="form-control" placeholder="Password" name="password" required  />
                     </div>
                    
                     <div class="d-flex align-items-center">
                        <button type="submit" name="submit" class="btn btn-primary width-150 btn-rounded">Sign In</button>
                        <a href="<?=base_url('admin/forget_password') ?>" class="m-l-10">Forgot password?</a>
                     </div>
                  </form>
                 
               </div>
            </div>
            <a href="#" data-click="scroll-top" class="btn-scroll-top fade"><i class="fa fa-arrow-up"></i></a>
         </div>
         
 <?=view('admin/include/allscript') ?>





      </body>
   </html>