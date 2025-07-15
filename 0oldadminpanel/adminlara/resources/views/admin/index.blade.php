<!DOCTYPE html>
   <html lang="en">
      <head>
         <title>{{env('website_name')}}</title>
         @include('admin.include.allcss')  
      </head>
      
      <body>
         <div id="app" class="app app-full-height app-without-header">
            <div class="login">

               <div class="login-cover"></div>
               <div class="login-content">
                  @if($errors->any())            
                    @foreach($errors->all() as $error)
                    <div class="alert alert-danger">{{ $error }}</div>
                    @endforeach
                  @endif
                  <div class="login-brand">
                     <a href="{{url('')}}" target="_blank">{{env('website_name')}}</a>
                  </div>
                  <h3 class="m-b-20"><span>Sign In</span></h3>                  
                  <form action="{{ route('admin.adminlogin') }}" method="post">
                        @csrf
                     <div class="form-group">
                        <label>Username <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="username" required  placeholder="Username">
                     </div>
                     <div class="form-group">
                        <label>Password <span class="text-danger">*</span></label>
                        <input type="password" class="form-control" placeholder="Password" name="password" required  />
                     </div>
                     
                     <div class="d-flex align-items-center">
                        <button type="submit" name="submit" class="btn btn-primary width-150 btn-rounded">Sign In</button>
                        <a href="" class="m-l-10">Forgot password?</a>
                     </div>
                  </form>
                 
               </div>
            </div>
            <a href="#" data-click="scroll-top" class="btn-scroll-top fade"><i class="fa fa-arrow-up"></i></a>
         </div>
         
         @include('admin.include.allscript') 




      </body>
   </html>