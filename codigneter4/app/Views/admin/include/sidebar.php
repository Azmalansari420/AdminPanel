<?php
activityRecord();

$db = \Config\Database::connect();
$currentURI = uri_string();
$siteSetting = $db->table('site_setting')->where('id', 1)->get()->getRow();
?>
<sidebar id="sidebar" class="app-sidebar">
   <div data-scrollbar="true" data-height="100%">
      <ul class="nav">
         <li class="nav-profile">
            <div class="profile-img11">
               <img src="<?=base_url('uploads/site_setting/'.$siteSetting->logo) ?>" alt="<?=env("APP_NAME") ?>" style="width: 100%;">
            </div>
           
         </li>
         
         
         <li class="nav-divider"></li>
         <li class="nav-header">Admin Panel</li>

         <li class="<?= ($currentURI == 'admin/dashboard') ? 'active' : ''; ?>">
            <a href="<?php echo base_url('admin/dashboard'); ?>">
            <span class="nav-icon"><i class="fa fa-cog bg-black text-white"></i></span>
            <span class="nav-text">Dashboard</span>
            </a>
         </li>

         <li class="<?php if($currentURI==('admin/site_setting/edit_page/1')) echo 'active'; ?>">
            <a href="<?php echo base_url('admin/site_setting/edit_page/1'); ?>">
               <span class="nav-icon"><i class="fa fa-cog bg-black text-white"></i></span>
               <span class="nav-text">Site Setting</span>
            </a>
         </li>

         <li class="<?= ($currentURI == 'admin/slider') ? 'active' : ''; ?>">
             <a href="<?= base_url('admin/slider'); ?>">
                 <span class="nav-icon"><i class="fa fa-cog bg-black text-white"></i></span>
                 <span class="nav-text">Slider</span>
             </a>
         </li>
         
         
         
         <li class="<?= ($currentURI == 'admin/contact') ? 'active' : ''; ?>">
            <a href="<?php echo base_url('admin/contact');?>">
               <span class="nav-icon"><i class="fa fa-cog bg-black text-white"></i></span>
               <span class="nav-text">Contact Enquiry</span>
            </a>
         </li>

         

         <!-- <li class="has-sub">
            <a href="#">
            <span class="nav-icon"><i class="fa fa-cog bg-gradient-orange text-white"></i></span>
            <span class="nav-text">Forms</span>
            <span class="nav-caret"><b class="caret"></b></span>
            </a>
            <ul class="nav-submenu">
               <li class="active"><a href="add.php"><span class="nav-text">Add</span></a></li>
               <li><a href="list.php"><span class="nav-text">Table</span></a></li>
            </ul>
         </li> -->

         
       
         <li class="nav-divider"></li>
         <li class="">
            <a href="<?php echo base_url('admin/logout');?>">
               <span class="nav-icon"><i class="fa fa-cog bg-gradient-purple text-white"></i></span>
               <span class="nav-text">Logout </span>
            </a>
         </li>
         <li class="nav-copyright">&copy; <?=date('Y'); ?> <?=env("APP_NAME") ?>.<br> All Right Reserved</li>
      </ul>
   </div>
</sidebar>