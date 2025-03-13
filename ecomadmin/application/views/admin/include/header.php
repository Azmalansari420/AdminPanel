 <?php 
  $user = $this->crud->selectDataByMultipleWhere('tbl_admin',array('id'=>$this->session->userdata("id"),));
  ?>
<div id="header" class="app-header">
            <div class="navbar-header">
               <a href="<?php echo base_url(); ?>" target="_blank" class="navbar-brand"><span class="navbar-logo"></span> <b><?php echo website_name; ?></b></a>
               <button type="button" class="navbar-mobile-toggler" data-toggle="app-sidebar-mobile">
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               </button>
            </div>
            <div class="navbar-nav">
               <!-- ----notification---- -->
              <!--  <div class="navbar-item dropdown">
                  <a href="#" data-bs-toggle="dropdown" class="navbar-link dropdown-toggle icon">
                  <i class="fa fa-bell"></i>
                  <span class="badge">5</span>
                  </a>
                  <div class="dropdown-menu media-list dropdown-menu-end">
                     <div class="dropdown-header">NOTIFICATIONS (5)</div>
                     <a href="javascript:;" class="dropdown-item media">
                        <div class="media-left">
                           <i class="fa fa-bug media-object bg-gray-500"></i>
                        </div>
                        <div class="media-body">
                           <h6 class="media-heading">Server Error Reports <i class="fa fa-exclamation-circle text-danger"></i></h6>
                           <div class="text-muted fs-10px">3 minutes ago</div>
                        </div>
                     </a>
                     <div class="dropdown-footer text-center">
                        <a href="javascript:;" class="text-decoration-none">View more</a>
                     </div>
                  </div>
               </div> -->

               <div class="navbar-item navbar-user dropdown">
                  <a href="#" class="navbar-link dropdown-toggle d-flex align-items-center" data-bs-toggle="dropdown">
                  <img src="<?php echo base_url(); ?>media/uploads/<?php echo $user[0]->image; ?>" alt="" />
                  <span>
                  <span class="d-none d-md-inline"><?php echo $user[0]->first_name; ?></span>
                  <b class="caret"></b>
                  </span>
                  </a>
                  <div class="dropdown-menu dropdown-menu-end me-1">
                     <a href="<?php echo base_url('admin_con/edit_profile/edit'); ?>" class="dropdown-item">Edit Profile</a>
                     
                     <div class="dropdown-divider"></div>
                     <a href="<?php echo base_url('admin/logout'); ?>" class="dropdown-item">Log Out</a>
                  </div>
               </div>
            </div>
         </div>
         <!-- Azmal Ansari-- -->