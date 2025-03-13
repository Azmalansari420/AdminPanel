<?php
$currentURL = current_url();
$sitesetting = $this->crud->fetchdatabyid('1','site_setting');
?>
<sidebar id="sidebar" class="app-sidebar">
   <div data-scrollbar="true" data-height="100%">
      <ul class="nav">
         <li class="nav-profile">
            <div class="profile-img11 text-center">
               <img src="<?php echo base_url(); ?>media/uploads/site_setting/<?php echo $sitesetting[0]->logo; ?>" alt="<?=website_name ?>" style="width: 50%;">
            </div>
           
         </li>
         
         
         <li class="nav-divider"></li>
         <li class="nav-header">Admin Panel</li>

         <li class="<?php if($currentURL==base_url('admin/dashboard')) echo 'active'; ?>">
            <a href="<?php echo base_url('admin/dashboard'); ?>">
            <span class="nav-icon"><i class="fa fa-home bg-black text-white"></i></span>
            <span class="nav-text">Dashboard</span>
            </a>
         </li>

         <li class="<?php if($currentURL==base_url('admin_con/site_setting/edit/1')) echo 'active'; ?>">
            <a href="<?php echo base_url('admin_con/site_setting/edit/1'); ?>">
               <span class="nav-icon"><i class="fa fa-cog bg-black text-white"></i></span>
               <span class="nav-text">Site Setting</span>
            </a>
         </li>

         <li class="<?php if($currentURL==base_url('admin_con/slider/listing')) echo 'active'; ?>">
            <a href="<?php echo base_url('admin_con/slider/listing');?>">
               <span class="nav-icon"><i class="fa fa-sliders-h bg-black text-white"></i></span>
               <span class="nav-text">Slider</span>
            </a>
         </li>

         <li class="<?php if($currentURL==base_url('admin_con/qrcode/listing')) echo 'active'; ?>">
            <a href="<?php echo base_url('admin_con/qrcode/listing');?>">
               <span class="nav-icon"><i class="fa fa-qrcode bg-black text-white"></i></span>
               <span class="nav-text">QR Code</span>
            </a>
         </li>

         <li class="nav-divider"></li>
         <li class="nav-header">Sub Admin</li>

         <li class="<?php if($currentURL==base_url('admin_con/role/listing')) echo 'active'; ?>">
            <a href="<?php echo base_url('admin_con/role/listing');?>">
               <span class="nav-icon"><i class="fa fa-wrench bg-black text-white"></i></span>
               <span class="nav-text">Create Role</span>
            </a>
         </li>

         <li class="<?php if($currentURL==base_url('admin_con/tbl_admin/listing')) echo 'active'; ?>">
            <a href="<?php echo base_url('admin_con/tbl_admin/listing');?>">
               <span class="nav-icon"><i class="fa fa-user-astronaut bg-black text-white"></i></span>
               <span class="nav-text">Assign Role</span>
            </a>
         </li>

         <li class="<?php if($currentURL==base_url('admin_con/users/listing')) echo 'active'; ?>">
            <a href="<?php echo base_url('admin_con/users/listing');?>">
               <span class="nav-icon"><i class="fa fa-user-check bg-black text-white"></i></span>
               <span class="nav-text">Users</span>
            </a>
         </li>



         <li class="nav-divider"></li>
         <li class="nav-header">Wallet</li>

         <li class="<?php if($currentURL==base_url('admin_con/add_point_request/listing')) echo 'active'; ?>">
            <a href="<?php echo base_url('admin_con/add_point_request/listing');?>">
               <span class="nav-icon"><i class="fa fa-wallet bg-black text-white"></i></span>
               <span class="nav-text">Add Point Request</span>
            </a>
         </li>
         <li class="<?php if($currentURL==base_url('admin_con/withdraw_request/listing')) echo 'active'; ?>">
            <a href="<?php echo base_url('admin_con/withdraw_request/listing');?>">
               <span class="nav-icon"><i class="fa fa-wallet bg-black text-white"></i></span>
               <span class="nav-text">Withdraw Request</span>
            </a>
         </li>


         <li class="nav-divider"></li>
         <li class="nav-header">Games</li>

         <li class="<?php if($currentURL==base_url('admin_con/game/listing')) echo 'active'; ?>">
            <a href="<?php echo base_url('admin_con/game/listing');?>">
               <span class="nav-icon"><i class="fa fa-bell bg-black text-white"></i></span>
               <span class="nav-text">Games</span>
            </a>
         </li>

         <li class="<?php if($currentURL==base_url('admin_con/game_bet/listing')) echo 'active'; ?>">
            <a href="<?php echo base_url('admin_con/game_bet/listing');?>">
               <span class="nav-icon"><i class="fa fa-bell bg-black text-white"></i></span>
               <span class="nav-text">Games Bets</span>
            </a>
         </li>

         

         <li class="<?php if($currentURL==base_url('admin_con/game_result/listing')) echo 'active'; ?>">
            <a href="<?php echo base_url('admin_con/game_result/listing');?>">
               <span class="nav-icon"><i class="fa fa-bell bg-black text-white"></i></span>
               <span class="nav-text">Games Result</span>
            </a>
         </li>




         <li class="<?php if($currentURL==base_url('admin_con/notification/listing')) echo 'active'; ?>">
            <a href="<?php echo base_url('admin_con/notification/listing');?>">
               <span class="nav-icon"><i class="fa fa-bell bg-black text-white"></i></span>
               <span class="nav-text">Notification</span>
            </a>
         </li>


         <li class="has-sub">
            <a href="#">
            <span class="nav-icon"><i class="fa fa-cog bg-gradient-orange text-white"></i></span>
            <span class="nav-text">Policy & Content</span>
            <span class="nav-caret"><b class="caret"></b></span>
            </a>
            <ul class="nav-submenu">
               <li class="active"><a href="<?php echo base_url('admin_con/content/edit/1'); ?>"><span class="nav-text">About Us</span></a></li>
               <li class="active"><a href="<?php echo base_url('admin_con/content/edit/2'); ?>"><span class="nav-text">Privacy Policy</span></a></li>
               <li class="active"><a href="<?php echo base_url('admin_con/content/edit/3'); ?>"><span class="nav-text">How to Play</span></a></li>
               <li class="active"><a href="<?php echo base_url('admin_con/content/edit/4'); ?>"><span class="nav-text">Home Note</span></a></li>
               <li class="active"><a href="<?php echo base_url('admin_con/content/edit/5'); ?>"><span class="nav-text">Headline</span></a></li>
               <li class="active"><a href="<?php echo base_url('admin_con/content/edit/6'); ?>"><span class="nav-text">Help Box 1</span></a></li>
               <li class="active"><a href="<?php echo base_url('admin_con/content/edit/7'); ?>"><span class="nav-text">Help Box 2</span></a></li>
            </ul>
         </li> 

        
         
       
         <li class="nav-divider"></li>
         <li class="<?php if($currentURL==base_url('admin_con/contact/listing')) echo 'active'; ?>">
            <a href="<?php echo base_url('admin_con/contact/listing');?>">
               <span class="nav-icon"><i class="fa fa-envelope bg-black text-white"></i></span>
               <span class="nav-text">App Enquiry</span>
            </a>
         </li>
         <li class="">
            <a href="<?php echo base_url('admin/logout');?>">
               <span class="nav-icon"><i class="fa fa-sign-out-alt bg-gradient-red text-white"></i></span>
               <span class="nav-text">Logout </span>
            </a>
         </li>
         <li class="nav-copyright">&copy; <?=date('Y'); ?> <?=website_name ?>. All Right Reserved</li>
      </ul>
   </div>
</sidebar>