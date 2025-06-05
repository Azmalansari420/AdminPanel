@php
$currentUrl = url()->current();
$siteSetting = DB::table('site_setting')->where('id', 1)->first();
@endphp
{{-- <pre>{{print_r($currentUrl)}}</pre> --}}
<sidebar id="sidebar" class="app-sidebar">
   <div data-scrollbar="true" data-height="100%">
      <ul class="nav">
         <li class="nav-profile">
            <div class="profile-img11">
               <img src="{{url('')}}/public/media/uploads/site_setting/{{$siteSetting->logo}}" alt="{{env('website_name')}}" style="width: 100%;" onerror="this.src='{{url('public/media/uploads/not-found.jpg')}}'">
            </div>
           
         </li>
         
         
         <li class="nav-divider"></li>
         <li class="nav-header">Admin Panel</li>

         <li class="{{ $currentUrl == route('admin/dashboard') ? 'active' : '' }}">
            <a href="{{route('admin/dashboard')}}">
            <span class="nav-icon"><i class="fa fa-cog bg-black text-white"></i></span>
            <span class="nav-text">Dashboard</span>
            </a>
         </li>

         <li class="{{ $currentUrl == route('admin/site_setting/edit', ['id' => 1]) ? 'active' : '' }}">
            <a href="{{ route('admin/site_setting/edit', ['id' => 1]) }}">
               <span class="nav-icon"><i class="fa fa-cog bg-black text-white"></i></span>
               <span class="nav-text">Site Setting</span>
            </a>
         </li>

         <li class="{{ $currentUrl == route('admin/slider/list') ? 'active' : '' }}">
            <a href="{{ route('admin/slider/list') }}">
               <span class="nav-icon"><i class="fa fa-cog bg-black text-white"></i></span>
               <span class="nav-text">Slider</span>
            </a>
         </li>
         
         
         <li class="{{ $currentUrl == route('admin/contact/list') ? 'active' : '' }}">
            <a href="{{ route('admin/contact/list') }}">
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
            <a href="">
               <span class="nav-icon"><i class="fa fa-cog bg-gradient-purple text-white"></i></span>
               <span class="nav-text">Logout </span>
            </a>
         </li>
         <li class="nav-copyright">&copy; <?=date('Y'); ?> {{env('website_name')}}.<br> All Right Reserved</li>
      </ul>
   </div>
</sidebar>