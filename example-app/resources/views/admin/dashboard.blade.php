@if(session()->has('admin_id'))
    @php
        $user = DB::table('tbl_admin')->where('id', session('admin_id'))->first();
        $password = $user ? $user->password : 'No password found';
        $image = $user ? $user->image : 'default-image.jpg';
        $firstname = $user ? $user->first_name.' '.$user->last_name : 'default-image.jpg';
    @endphp    
@else
    <script>window.location = "{{ route('admin/logout') }}";</script>
@endif
<!DOCTYPE html>
<html lang="en">
<title>{{env('website_name')}}</title>
   @include('admin.include.allcss')  
   <body>
      <div id="app" class="app app-header-fixed app-sidebar-fixed">
      	@include('admin.include.topbar')  
      	@include('admin.include.sidebar')  


         <div id="content" class="app-content">
            <h1 class="page-header">
               Dashboard 
            </h1>
            <div class="row">

               <div class="col-xl-12 col-sm-12">
                  <div class="widget-card widget-card-inverse">

                     <div class="widget-card-col col-12 col-lg-12" style="height: 100px;">
                        <div class="widget-card-cover">
                           <div class="cover-bg"></div>
                        </div>
                        <div class="widget-card-content widget-hero bottom">
                           <h1>Welcome back, {{$firstname}}!</h1>
                           <p class="m-b-0">I am glad to see you back online. Today is a great day!</p>
                        </div>
                     </div>
                  </div>
               </div>

               <div class="col-xl-3 col-sm-6">
                  <a href="#" class="widget-stats widget-stats-inverse bg-gradient-purple m-b-15">
                     <div class="widget-stats-info">
                        <div class="widget-stats-title">TOTAL ENQUIRY</div>
                        <div class="widget-stats-value">
                           @php
                           $contactCount = DB::table('contact')->count();
                           @endphp
                           {{$contactCount}}
                        </div>
                        <div class="widget-stats-desc"><?=date('d-M-Y') ?></div>
                     </div>
                     <div class="widget-stats-icon">
                        <i class="fa fa-hand-pointer"></i>
                     </div>
                  </a>
               </div>
              
               



               

            </div>
         </div>
         <a href="#" data-click="scroll-top" class="btn-scroll-top fade"><i class="fa fa-arrow-up"></i></a>
      </div>

      	@include('admin.include.theams') 
      		@include('admin.include.allscript') 

      
   </body>
</html>