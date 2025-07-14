

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
                  <h3 class="m-b-20"><span>Sign In</span></h3>                  
                  <form action="#" method="POST" >
                     <div class="form-group">
                        <label>Username <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="username" required  placeholder="Username">
                     </div>
                     <div class="form-group">
                        <label>Password <span class="text-danger">*</span></label>
                        <input type="password" class="form-control" placeholder="Password" name="password" required  />
                     </div>
                     <?php
                     if(captcha_validation== true)
                     { ?>
                     <div class="m-b-30">
                        <div class="g-recaptcha" data-sitekey="<?=g_captcha_site_key ?>"></div>
                     </div>
                  <?php } ?>
                     <div class="d-flex align-items-center">
                        <button type="submit" name="submit" class="btn btn-primary width-150 btn-rounded">Sign In</button>
                        <a href="<?=base_url('admin/forget_password') ?>" class="m-l-10">Forgot password?</a>
                     </div>
                  </form>
                 
               </div>
            </div>
            <a href="#" data-click="scroll-top" class="btn-scroll-top fade"><i class="fa fa-arrow-up"></i></a>
         </div>
         
 <?php $this->load->view('admin/include/allscript') ?>
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>




      </body>
   </html>