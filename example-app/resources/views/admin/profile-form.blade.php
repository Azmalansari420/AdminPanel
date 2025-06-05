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
            <form class="row" method="post" enctype="multipart/form-data" action="{{route('admin/profile_form')}}">
            	 @csrf
               <div class="col-lg-8">
                  <div class="card m-b-15">
                     <div class="row card-body">
                        <div class="col-6 form-group">
                           <label>First Name </label>
                           <input type="text" class="form-control" name="first_name" value="<?php echo $EDITDATA[0]->first_name; ?>">
                        </div>
                        <div class="col-6 form-group">
                           <label>Last Name </label>
                           <input type="text" class="form-control" name="last_name" value="<?php echo $EDITDATA[0]->last_name; ?>">
                        </div>
                        <div class="col-6 form-group">
                           <label>Username <span class="text-danger">*</span></label>
                           <input type="text" class="form-control" required name="username" value="<?php echo $EDITDATA[0]->username; ?>">
                        </div>

                        <div class="col-6 form-group">
                           <label>Password <span class="text-danger">*</span></label>
                           <input type="text" class="form-control" name="password" value="<?php echo $EDITDATA[0]->password; ?>"/>
                        </div>

                        <div class="col-6 form-group">
                           <label>Contact Number</label>
                           <input type="number" class="form-control" name="mobile" value="<?php echo $EDITDATA[0]->mobile; ?>"/>
                        </div>
                        <div class="col-6 form-group">
                           <label>Email</label>
                           <input type="email" class="form-control" name="email" value="<?php echo $EDITDATA[0]->email; ?>"/>
                        </div>

                        <div class="col-6 form-group">
                           <label>Gender</label>
                           <input type="text" class="form-control" name="gender" value="<?php echo $EDITDATA[0]->gender; ?>"/>
                        </div>

                        <div class="col-6 form-group">
                           <label>Date Of Birth</label>
                           <input type="text" class="form-control" name="dob" value="<?php echo $EDITDATA[0]->dob; ?>"/>
                        </div>

                        <div class="col-6 form-group">
                           <label>Marital Status</label>
                           <input type="text" class="form-control" name="martial" value="<?php echo $EDITDATA[0]->martial; ?>"/>
                        </div>

                        <div class="col-6 form-group">
                           <label>Age</label>
                           <input type="text" class="form-control" name="age" value="<?php echo $EDITDATA[0]->age; ?>"/>
                        </div>

                        <div class="col-6 form-group">
                           <label>Country</label>
                           <input type="text" class="form-control" name="country" value="<?php echo $EDITDATA[0]->country; ?>"/>
                        </div>
                        
                        <div class="col-6 form-group">
                           <label>State</label>
                           <input type="text" class="form-control" name="state" value="<?php echo $EDITDATA[0]->state; ?>"/>
                        </div>

                        <div class="col-12 form-group">
                           <label>Address </label>
                           <textarea name="address" class="form-control"><?php echo $EDITDATA[0]->address; ?></textarea>
                        </div>

                     </div>
                  </div>
               </div>

               <div class="col-lg-4">
                  <div class="card m-b-15">
                     <div class="row card-body">
                        <div class="col-12 form-group">
                           <label>Click to Upload Image</label>
                           <input id="image-input"  type="file" name="image" class="form-control">
                           <br>
                           <img id="image-preview" src="{{url('public/media/uploads')}}/{{$EDITDATA[0]->image}}" alt="Image Preview" width="100px">
                            <input id="image-preview"  type="hidden" class="form-control" name="oldimage" value="{{$EDITDATA[0]->image}}">
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