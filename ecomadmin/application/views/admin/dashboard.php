<?php 
$user = $this->crud->selectDataByMultipleWhere('tbl_admin',array('id'=>$this->session->userdata("id"),));
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Dashboard</title>
      <?php $this->load->view('admin/include/allcss') ?>
   </head>
   <body>
      <div id="snackbar"><?php echo $this->session->flashdata('message'); ?></div>
     <?php if($this->session->flashdata('message')){ ?>
       <script>
         function myFunction() {
           var x = document.getElementById("snackbar");
           x.className = "show";
           setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
         }
         myFunction();
         </script>
  
   <?php } ?>
      <?php echo loder; ?>
      
      <div id="app" class="app app-header-fixed app-sidebar-fixed ">

         <?php $this->load->view('admin/include/header') ?>
         <?php $this->load->view('admin/include/sidebar') ?>
         


         
         <div id="content" class="app-content">
            <ol class="breadcrumb float-xl-end">
               <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
               <li class="breadcrumb-item active">Dashboard</li>
            </ol>
            <h1 class="page-header">Dashboard</h1>

            <div class="row">

               <div class="col-xl-12">
                  <canvas id="myChart" style="width:100%;"></canvas>
               </div>


               <div class="col-xl-3 col-md-6">
                  <div class="widget widget-stats bg-black">
                     <div class="stats-icon"><i class="fa fa-cog"></i></div>
                     <div class="stats-info">
                        <h4>Site Setting</h4>
                        <p>Site Setting</p>
                     </div>
                     <div class="stats-link">
                        <a href="<?php echo base_url('admin_con/site_setting/edit/1');?>">Go to Site Setting <i class="fa fa-arrow-circle-right"></i></a>
                     </div>
                  </div>
               </div>

               <div class="col-xl-3 col-md-6">
                  <div class="widget widget-stats bg-black">
                     <div class="stats-icon"><i class="fa fa-link"></i></div>
                     <div class="stats-info">
                        <h4>Catrgories</h4>
                        <p><?php echo $this->db->count_all('categories'); ?></p>
                     </div>
                     <div class="stats-link">
                        <a href="<?php echo base_url('admin_con/categories/listing');?>">Go to Catrgories <i class="fa fa-arrow-circle-right"></i></a>
                     </div>
                  </div>
               </div>
               <div class="col-xl-3 col-md-6">
                  <div class="widget widget-stats bg-black">
                     <div class="stats-icon"><i class="fa fa-users"></i></div>
                     <div class="stats-info">
                        <h4>Sub Categories</h4>
                        <p><?php echo $this->db->count_all('sub_categories'); ?></p>
                     </div>
                     <div class="stats-link">
                        <a href="<?php echo base_url('admin_con/sub_categories/listing');?>">Go to Sub Categories <i class="fa fa-arrow-circle-right"></i></a>
                     </div>
                  </div>
               </div>

               <div class="col-xl-3 col-md-6">
                  <div class="widget widget-stats bg-black">
                     <div class="stats-icon"><i class="fa fa-users"></i></div>
                     <div class="stats-info">
                        <h4>Products</h4>
                        <p><?php echo $this->db->count_all('product'); ?></p>
                     </div>
                     <div class="stats-link">
                        <a href="<?php echo base_url('admin_con/product/listing');?>">Go to Products <i class="fa fa-arrow-circle-right"></i></a>
                     </div>
                  </div>
               </div>
               <div class="col-xl-3 col-md-6">
                  <div class="widget widget-stats bg-black">
                     <div class="stats-icon"><i class="fa fa-users"></i></div>
                     <div class="stats-info">
                        <h4>Offer Banners</h4>
                        <p><?php echo $this->db->count_all('offer_banners'); ?></p>
                     </div>
                     <div class="stats-link">
                        <a href="<?php echo base_url('admin_con/offer_banners/listing');?>">Go to Offer Banners <i class="fa fa-arrow-circle-right"></i></a>
                     </div>
                  </div>
               </div>
               <div class="col-xl-3 col-md-6">
                  <div class="widget widget-stats bg-black">
                     <div class="stats-icon"><i class="fa fa-users"></i></div>
                     <div class="stats-info">
                        <h4>Deal Of Days</h4>
                        <p><?php echo $this->db->count_all('dela_of_day'); ?></p>
                     </div>
                     <div class="stats-link">
                        <a href="<?php echo base_url('admin_con/dela_of_day/listing');?>">Go to Deal Of Days <i class="fa fa-arrow-circle-right"></i></a>
                     </div>
                  </div>
               </div>
               <div class="col-xl-3 col-md-6">
                  <div class="widget widget-stats bg-black">
                     <div class="stats-icon"><i class="fa fa-users"></i></div>
                     <div class="stats-info">
                        <h4>Single Banner</h4>
                        <p><?php echo $this->db->count_all('singlebanner'); ?></p>
                     </div>
                     <div class="stats-link">
                        <a href="<?php echo base_url('admin_con/singlebanner/listing');?>">Go to Single Banner <i class="fa fa-arrow-circle-right"></i></a>
                     </div>
                  </div>
               </div>
               <div class="col-xl-3 col-md-6">
                  <div class="widget widget-stats bg-black">
                     <div class="stats-icon"><i class="fa fa-users"></i></div>
                     <div class="stats-info">
                        <h4>Testimonials</h4>
                        <p><?php echo $this->db->count_all('testimonials'); ?></p>
                     </div>
                     <div class="stats-link">
                        <a href="<?php echo base_url('admin_con/testimonials/listing');?>">Go to Testimonials <i class="fa fa-arrow-circle-right"></i></a>
                     </div>
                  </div>
               </div>
               <div class="col-xl-3 col-md-6">
                  <div class="widget widget-stats bg-black">
                     <div class="stats-icon"><i class="fa fa-users"></i></div>
                     <div class="stats-info">
                        <h4>Colors</h4>
                        <p><?php echo $this->db->count_all('color'); ?></p>
                     </div>
                     <div class="stats-link">
                        <a href="<?php echo base_url('admin_con/color/listing');?>">Go to Colors <i class="fa fa-arrow-circle-right"></i></a>
                     </div>
                  </div>
               </div>

               <div class="col-xl-3 col-md-6">
                  <div class="widget widget-stats bg-black">
                     <div class="stats-icon"><i class="fa fa-users"></i></div>
                     <div class="stats-info">
                        <h4>size</h4>
                        <p><?php echo $this->db->count_all('size'); ?></p>
                     </div>
                     <div class="stats-link">
                        <a href="<?php echo base_url('admin_con/size/listing');?>">Go to size <i class="fa fa-arrow-circle-right"></i></a>
                     </div>
                  </div>
               </div>

               <div class="col-xl-3 col-md-6">
                  <div class="widget widget-stats bg-black">
                     <div class="stats-icon"><i class="fa fa-users"></i></div>
                     <div class="stats-info">
                        <h4>Coupon</h4>
                        <p><?php echo $this->db->count_all('coupen_code'); ?></p>
                     </div>
                     <div class="stats-link">
                        <a href="<?php echo base_url('admin_con/coupen_code/listing');?>">Go to Coupon <i class="fa fa-arrow-circle-right"></i></a>
                     </div>
                  </div>
               </div>

               <div class="col-xl-3 col-md-6">
                  <div class="widget widget-stats bg-black">
                     <div class="stats-icon"><i class="fa fa-users"></i></div>
                     <div class="stats-info">
                        <h4>Slider</h4>
                        <p><?php echo $this->db->count_all('slider'); ?></p>
                     </div>
                     <div class="stats-link">
                        <a href="<?php echo base_url('admin_con/slider/listing');?>">Go to Slider <i class="fa fa-arrow-circle-right"></i></a>
                     </div>
                  </div>
               </div>
               <div class="col-xl-3 col-md-6">
                  <div class="widget widget-stats bg-black">
                     <div class="stats-icon"><i class="fa fa-users"></i></div>
                     <div class="stats-info">
                        <h4>Orders</h4>
                        <p><?php echo $this->db->count_all('finalorder'); ?></p>
                     </div>
                     <div class="stats-link">
                        <a href="<?php echo base_url('admin_con/finalorder/listing');?>">Go to Orders <i class="fa fa-arrow-circle-right"></i></a>
                     </div>
                  </div>
               </div>
               <div class="col-xl-3 col-md-6">
                  <div class="widget widget-stats bg-black">
                     <div class="stats-icon"><i class="fa fa-users"></i></div>
                     <div class="stats-info">
                        <h4>Blogs</h4>
                        <p><?php echo $this->db->count_all('blog'); ?></p>
                     </div>
                     <div class="stats-link">
                        <a href="<?php echo base_url('admin_con/blog/listing');?>">Go to Blogs <i class="fa fa-arrow-circle-right"></i></a>
                     </div>
                  </div>
               </div>
               <div class="col-xl-3 col-md-6">
                  <div class="widget widget-stats bg-black">
                     <div class="stats-icon"><i class="fa fa-users"></i></div>
                     <div class="stats-info">
                        <h4>Registration</h4>
                        <p><?php echo $this->db->count_all('registration'); ?></p>
                     </div>
                     <div class="stats-link">
                        <a href="<?php echo base_url('admin_con/registration/listing');?>">Go to Registration <i class="fa fa-arrow-circle-right"></i></a>
                     </div>
                  </div>
               </div>
               <div class="col-xl-3 col-md-6">
                  <div class="widget widget-stats bg-black">
                     <div class="stats-icon"><i class="fa fa-users"></i></div>
                     <div class="stats-info">
                        <h4>Contact Enquiry</h4>
                        <p><?php echo $this->db->count_all('contact'); ?></p>
                     </div>
                     <div class="stats-link">
                        <a href="<?php echo base_url('admin_con/contact/listing');?>">Go to Contact Enquiry <i class="fa fa-arrow-circle-right"></i></a>
                     </div>
                  </div>
               </div>

               
            </div>

            <div class="row justify-content-center">
             
               <div class="col-xl-4">                  
                  <div class="panel panel-inverse" data-sortable-id="index-10">
                     <div class="panel-heading">
                        <h4 class="panel-title">Calendar</h4>
                        <div class="panel-heading-btn">
                           <a href="javascript:;" class="btn btn-xs btn-icon btn-default" data-toggle="panel-expand"><i class="fa fa-expand"></i></a>
                           <a href="javascript:;" class="btn btn-xs btn-icon btn-success" data-toggle="panel-reload"><i class="fa fa-redo"></i></a>
                           <a href="javascript:;" class="btn btn-xs btn-icon btn-warning" data-toggle="panel-collapse"><i class="fa fa-minus"></i></a>
                           <a href="javascript:;" class="btn btn-xs btn-icon btn-danger" data-toggle="panel-remove"><i class="fa fa-times"></i></a>
                        </div>
                     </div>
                     <div class="panel-body">
                        <div id="datepicker-inline" class="datepicker-full-width overflow-y-scroll position-relative">
                           <div></div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>


         </div>
       
      </div>


         <?php $this->load->view('admin/include/footer') ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

      <script>
      const xValues = <?=$data_categories ?>;
      const yValues = <?=$chart_data ?>;
      const barColors = ["red", "green","blue","orange","brown"];

      new Chart("myChart", {
        type: "bar",
        data: {
          labels: xValues,
          datasets: [{
            backgroundColor: barColors,
            data: yValues
          }]
        },
        options: {
          legend: {display: false},
          title: {
            display: true,
            text: "World Wine Production 2018"
          }
        }
      });
      </script>

   </body>
</html>