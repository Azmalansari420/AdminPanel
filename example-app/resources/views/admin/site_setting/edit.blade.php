<!DOCTYPE html>
<html lang="en">
<title>{{$page_title}}</title>
   @include('admin.include.allcss')
   <body>
      <div id="app" class="app app-header-fixed app-sidebar-fixed">
      	@include('admin.include.session-toster') 
         @include('admin.include.topbar')  
      	 @include('admin.include.sidebar')  
         <div id="content" class="app-content">
            <h1 class="page-header add-header"><?php echo $page_title; ?></h1>
            <form class="row" method="post" enctype="multipart/form-data" action="{{ route('admin.site_setting.update', ['id' => $EDITDATA[0]->id ?? 1]) }}">
            	 @csrf
               <div class="col-lg-8">
                  <div class="card m-b-15">
                     <div class="row card-body">
                        <div class="col-6 form-group">
                           <label>Mobile </label>
                           <input type="text" class="form-control" name="mobile" value="<?php echo $EDITDATA[0]->mobile; ?>">
                        </div>
                        <div class="col-6 form-group">
                           <label>Alt Mobile</label>
                           <input type="text" class="form-control" name="alt_mobile" value="<?php echo $EDITDATA[0]->alt_mobile; ?>">
                        </div>
                        <div class="col-6 form-group">
                           <label>Email <span class="text-danger">*</span></label>
                           <input type="text" class="form-control" required name="email" value="<?php echo $EDITDATA[0]->email; ?>">
                        </div>

                        <div class="col-6 form-group">
                           <label>Alt Email <span class="text-danger">*</span></label>
                           <input type="text" class="form-control" name="alt_email" value="<?php echo $EDITDATA[0]->alt_email; ?>"/>
                        </div>

                        <div class="col-12 form-group">
                           <label>Address </label>
                           <textarea name="address" class="form-control"><?php echo $EDITDATA[0]->address; ?></textarea>
                        </div>

                        <div class="col-6 form-group">
                           <label>Facebook</label>
                           <input type="text" class="form-control" name="facebook" value="<?php echo $EDITDATA[0]->facebook; ?>"/>
                        </div>
                        <div class="col-6 form-group">
                           <label>Instagram</label>
                           <input type="text" class="form-control" name="instagram" value="<?php echo $EDITDATA[0]->instagram; ?>"/>
                        </div>

                        <div class="col-6 form-group">
                           <label>Twitter</label>
                           <input type="text" class="form-control" name="twitter" value="<?php echo $EDITDATA[0]->twitter; ?>"/>
                        </div>

                        <div class="col-6 form-group">
                           <label>Youtube</label>
                           <input type="text" class="form-control" name="youtube" value="<?php echo $EDITDATA[0]->youtube; ?>"/>
                        </div>

                        <div class="col-12 form-group">
                           <label>Map </label>
                           <textarea name="map" rows="6" class="form-control"><?php echo $EDITDATA[0]->map; ?></textarea>
                        </div>
                        

                     </div>
                  </div>
               </div>

               <div class="col-lg-4">
                  <div class="card m-b-15">
                     <div class="row card-body">
                        <div class="col-12 form-group">
                           <label>Click to Upload Image</label>
                           <input id="image-input"  type="file" name="logo" class="form-control">
                           <br>
                           <img id="image-preview" src="{{url('public/media/uploads/site_setting/')}}/{{$EDITDATA[0]->logo}}" alt="Image Preview" width="100px" onerror="this.src='{{url('public/media/uploads/not-found.jpg')}}'">
                            <input id="image-preview"  type="hidden" class="form-control" name="oldlogo" value="{{$EDITDATA[0]->logo}}">
                        </div>
                        
                        <div class="col-12 form-group mt-4">
                           <button type="submit" name="submit" class="btn btn-purple">Submit</button>
                        </div>
                        </form>
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