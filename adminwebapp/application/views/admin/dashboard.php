<!DOCTYPE html>
<html lang="en">
<title><?=website_name ?></title>
   <?php $this->load->view('admin/include/allcss') ?>
   <body>
      <div id="app" class="app app-header-fixed app-sidebar-fixed">
      <?php $this->load->view('admin/include/topbar') ?>
      <?php $this->load->view('admin/include/sidebar') ?>
         

         


         <div id="content" class="app-content">
            <h1 class="page-header">
               Dashboard 
            </h1>
            <div class="row">

               
             <!--   <div class="col-xl-3 col-sm-6">
                  <a href="" class="widget-stats widget-stats-inverse bg-gradient-purple m-b-15">
                     <div class="widget-stats-info">
                        <div class="widget-stats-title">Un-Read Orders</div>
                        <div class="widget-stats-value">
                           44
                        </div>
                     </div>
                     <div class="widget-stats-icon">
                        <i class="fa fa-hand-pointer"></i>
                     </div>
                  </a>
               </div> -->
              
          



               <div class="col-xl-12 col-sm-12">
                  <div class="widget-card widget-card-inverse">

                     <div class="widget-card-col col-12 col-lg-12" style="height: 100px;">
                        <div class="widget-card-cover" style="background-image: url(<?=base_url() ?>media/admin/img/dashboard-cover.jpg);">
                           <div class="cover-bg"></div>
                        </div>
                        <div class="widget-card-content widget-hero bottom">
                           <h1>Welcome back, Admin!</h1>
                           <p class="m-b-0">I am glad to see you back online. Today is a great day!</p>
                        </div>
                     </div>
                  </div>
               </div>

            </div>
         </div>
         <a href="#" data-click="scroll-top" class="btn-scroll-top fade"><i class="fa fa-arrow-up"></i></a>
      </div>

       <?php $this->load->view('admin/include/theams') ?>
       <?php $this->load->view('admin/include/allscript') ?>

      
   </body>
</html>