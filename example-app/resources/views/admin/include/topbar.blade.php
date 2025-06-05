@if(session()->has('admin_id'))
    @php
        $user = DB::table('tbl_admin')->where('id', session('admin_id'))->first();
        $password = $user ? $user->password : 'No password found';
        $image = $user ? $user->image : 'default-image.jpg';
        $firstname = $user ? $user->first_name : 'default-image.jpg';
    @endphp    
@else
    <script>window.location = "{{ route('admin/logout') }}";</script>
@endif
<header id="header" class="app-header">
            <button type="button" class="navbar-toggle navbar-toggle-minify" data-click="sidebar-minify">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>
            <div class="navbar-header">
               <a href="{{url('')}}" target="_blank" class="navbar-brand">{{env('website_name')}}</a>
               <button type="button" class="navbar-toggle" data-click="sidebar-toggled">
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
               </button>
            </div>
            <ul class="navbar-nav navbar-right" style="align-items: end;">
               
               <!-- <li class="nav-item dropdown">
                  <a href="#" data-toggle="dropdown" data-display="static" class="nav-link">
                  <i class="far fa-bell nav-icon"></i>
                  <span class="nav-label">3</span>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-right dropdown-menu-lg pt-0 pb-0">
                     <li class="dropdown-header"><a href="#" class="dropdown-close">&times;</a>Today</li>
                     <li class="dropdown-message">
                        <a href="#">
                           <div class="icon"><i class="fab fa-apple bg-primary"></i></div>
                           <div class="info">
                              <h4 class="title">App Store <span class="time">Just now</span></h4>
                              <p class="desc">Your iOS application has been approved</p>
                           </div>
                        </a>
                     </li>
                  </ul>
               </li> -->

             
               <li class="nav-item dropdown">
                  <a href="#" data-toggle="dropdown" data-display="static" class="nav-link">
                  <span class="nav-img online">
                  <img src="{{ url('public/media/uploads') }}/{{ $image }}" alt onerror="this.src='{{url('public/media/uploads/not-found.jpg')}}'">
                  </span>
                  <span class="d-none d-md-block">{{$firstname}} <b class="caret"></b></span>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right">
                     <a class="dropdown-item" href="{{route('admin/profile_update')}}">Edit Profile</a>
                     <div class="dropdown-divider"></div>
                     <a class="dropdown-item" href="{{ route('admin/logout') }}">Log Out</a>
                  </div>
               </li>
            </ul>
        
         </header>