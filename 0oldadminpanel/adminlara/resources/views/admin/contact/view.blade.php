<!DOCTYPE html>
<html lang="en">
   <title>View <?=$page_title ?></title>
   @include('admin.include.allcss')
   <body>
      <div id="app" class="app app-header-fixed app-sidebar-fixed">
         @include('admin.include.session-toster') 
         @include('admin.include.topbar')  
         @include('admin.include.sidebar')

         <div id="content" class="app-content">
            <h1 class="page-header add-header">View <?=$page_title ?> </h1>
            <form class="row" method="post" enctype="multipart/form-data" action="">
               @csrf
               <div class="col-lg-12">
                  <div class="card m-b-15">
                     <div class="row card-body">
                        <div class="col-6 form-group">
                           <label>Name </label>
                           <input type="text" class="form-control" name="title" value="{{$EDITDATA->name}}">
                        </div>

                        <div class="col-6 form-group">
                           <label>Email </label>
                           <input type="text" class="form-control" name="sub_title" value="{{$EDITDATA->email}}">
                        </div>
                        <div class="col-6 form-group">
                           <label>Mobile </label>
                           <input type="text" class="form-control" name="title" value="{{$EDITDATA->mobile}}">
                        </div>

                        <div class="col-6 form-group">
                           <label>Subject </label>
                           <input type="text" class="form-control" name="sub_title" value="{{$EDITDATA->subject}}">
                        </div>

                        <div class="col-12 form-group">
                           <label>Message </label>
                           <textarea name="content" class="summernote form-control">{{$EDITDATA->message}}</textarea>
                        </div>
                     </div>
                  </div>
               </div>
              
            </form>
         </div>
         <a href="#" data-click="scroll-top" class="btn-scroll-top fade"><i class="fa fa-arrow-up"></i></a>
      </div>
      @include('admin.include.theams') 
      @include('admin.include.allscript')
   </body>
</html>