<?php
        $setting = DB::table('website_settings')->first();
?>
<header id="page-topbar">
        <div class="navbar-header">
<style>
#topnav {
    background-color: #000;
}
.top-icon i {
    font-size: 37px;
    line-height: 39px;
    color: #636E82;
}
.top-icon {
    width: 48px;
    height: 48px;
    background-color: var(--bs-body-bg);
}
/*    .top_manus p {*/
/*    margin-bottom: 0;*/
/*}*/
/*.top_manus h4 {*/
/*    text-align: end;*/
/*}*/
/*.top_manus p {*/
/*    margin-bottom: 0;*/
/*    width: 100%;*/
/*}*/
</style>
            <!-- Logo -->

            <!-- Start Navbar-Brand -->
            <div class="navbar-logo-box">
                <a href="index.html" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="{{ url('images/' . $setting->logo) }}" alt="logo-sm-dark">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ url('images/' . $setting->logo) }}" alt="logo-dark" 
                    </span>
                </a>

                <a href="index.html" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="{{ url('images/' . $setting->logo) }}" alt="logo-sm-light" height="20">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ url('images/' . $setting->logo) }}" alt="logo-light" height="18">
                    </span>
                </a>

                <button type="button" class="btn btn-sm top-icon sidebar-btn" id="sidebar-btn">
                    <i class="mdi mdi-menu-open align-middle fs-40"></i>
                </button>
            </div>
            <!-- End navbar brand -->
<?php
                               $currentHour = date('H');  
                               
                                if ($currentHour >= 5 && $currentHour < 12) {
                                    $greeting = "Good Morning";
                                } elseif ($currentHour >= 12 && $currentHour < 17) {
                                    $greeting = "Good Afternoon";
                                } else {
                                    $greeting = "Good Evening";
                                }
                        
                            
                            ?>
            <!-- Start menu -->
            <div class="d-flex justify-content-between px-3 ms-auto">

                <div class="d-flex align-items-center gap-2">
                    <!-- Start Profile -->
                    <div class="dropdown d-inline-block">
                        <!--<button type="button" class="btn btn-sm top-icon p-0" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
                        <!--    <img class="rounded avatar-2xs p-0" src="assets/images/users/avatar-6.png" alt="Header Avatar">-->
                        <!--</button>-->
                        <div class="top_manus" id="topManus">
                            <h4 class="fs-16 fw-semibold mb-1 mb-md-2" style=" text-align: end;">{{ $greeting }}, <span class="text-primary">{{Auth::user()->name}}({{Auth::user()->member_id}})</span></h4>
                            <p>Mobile Number : {{Auth::user()->mobile_no}} | Sponser ID & Name : {{Auth::user()->sponsor_id}} - {{Auth::user()->name}} | Joining Date : {{date("d-M-Y",strtotime(Auth::user()->created_at))}}</p>
                        </div>
                        <div class="dropdown-menu dropdown-menu-wide dropdown-menu-end dropdown-menu-animated overflow-hidden py-0">
                            <div class="card border-0">
                                <div class="card-header bg-primary rounded-0">
                                    <div class="rich-list-item w-100 p-0">
                                        <div class="rich-list-prepend">
                                            <div class="avatar avatar-label-light avatar-circle">
                                                <div class="avatar-display"><i class="fa fa-user-alt"></i></div>
                                            </div>
                                        </div>
                                        <div class="rich-list-content">
                                            <h3 class="rich-list-title text-white">{{ Auth::user()->name }}</h3>
                                            <span class="rich-list-subtitle text-white">{{ Auth::user()->email }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body p-0">
                                    <div class="grid-nav grid-nav-flush grid-nav-action grid-nav-no-rounded">
                                        <div class="grid-nav-row">
                                            <a href="apps-contact.html" class="grid-nav-item">
                                                <div class="grid-nav-icon"><i class="far fa-address-card"></i></div>
                                                <span class="grid-nav-content">Profile</span>
                                            </a>
                                            <a href="#!" class="grid-nav-item">
                                                <div class="grid-nav-icon"><i class="far fa-comments"></i></div>
                                                <span class="grid-nav-content">Messages</span>
                                            </a>
                                            <a href="#!" class="grid-nav-item">
                                                <div class="grid-nav-icon"><i class="far fa-clone"></i></div>
                                                <span class="grid-nav-content">Activities</span>
                                            </a>
                                        </div>
                                        <div class="grid-nav-row">
                                            <a href="#!" class="grid-nav-item">
                                                <div class="grid-nav-icon"><i class="far fa-calendar-check"></i></div>
                                                <span class="grid-nav-content">Tasks</span>
                                            </a>
                                            <a href="#!" class="grid-nav-item">
                                                <div class="grid-nav-icon"><i class="far fa-sticky-note"></i></div>
                                                <span class="grid-nav-content">Notes</span>
                                            </a>
                                            <a href="#!" class="grid-nav-item">
                                                <div class="grid-nav-icon"><i class="far fa-bell"></i></div>
                                                <span class="grid-nav-content">Notification</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer card-footer-bordered rounded-0"><a href="auth-login.html" class="btn btn-label-danger">Sign out</a></div>
                            </div>
                        </div>
                    </div>
                    <!-- End Profile -->
                </div>
            </div>
            <!-- End menu -->
        </div>
    </header>