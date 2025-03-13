
<!DOCTYPE html>
<html lang="en">
<title>Access Denied</title>
   <?=view('admin/include/allcss') ?>
   <body>
      <div id="app" class="app app-header-fixed app-sidebar-fixed">
         <?=view('admin/include/topbar') ?>
         <?=view('admin/include/sidebar') ?>
         <div id="content" class="app-content">
            <h1 class="page-header add-header">Access Denied </h1>
            <form class="row" method="post" enctype="multipart/form-data" action="#">
               <div class="col-lg-12">
                  <div class="card m-b-15">
                     <div class="row card-body">
                        <div class="col-12 form-group text-center">
                           <div class="panel panel-inverse">
                              <h2>You Don't Have Access</h2>
                           </div>
                           <a href="<?=base_url('admin/dashboard') ?>" class="btn btn-primary w-100px text-bg-black" >Click to Dashboard</a>
                        </div>
                     </div>
                  </div>
               </div>
              
            </form>
         </div>
         <a href="#" data-click="scroll-top" class="btn-scroll-top fade"><i class="fa fa-arrow-up"></i></a>
      </div>
      <?=view('admin/include/theams') ?>
       <?=view('admin/include/allscript') ?>
   </body>
</html>