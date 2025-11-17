<?php
        $setting = DB::table('website_settings')->first();
?>
<style>
a.logo h3 {
    color: #fff!important;
    font-size: 15px!important;
    line-height: 24px;
}
#topnav .navbar-toggle .lines {
    background: #fff;
    width: 32px;
    padding: 10px;
    height: 32px!important;
}
#topnav .navbar-toggle.open span:last-child {
    top: 14px;
    left: 0;
}
#topnav .navbar-toggle.open span:first-child {
    top: 14px!important;
    left: 0px!important;
}
.banner_bg {
 margin-top: 77px;
}
.defaultscroll .is-sticky .tagline-height {
    background: #000!important;
}
.nav-sticky a.logo h3 {
    color: #fff!important;
}
li.has-submenu.parent-menu-item a {
    color: #fff!important;
}
#topnav {
    padding: 27px 10px;
    background: #000!important;
}
.copy-footer.border-t.border-slate-800 {
    padding: 15px;
}
.tagline-height {
    top: 0px!important;
}

a.logo img {
    display: block!important;
    height: 77px!important;
}
.nav-sticky a.logo h3 {
    font-size: 15px!important;
}
footer.footer.bg-dark-footer.relative.text-gray-200.dark\:text-gray-200 {
    padding: 10px;
}
img.mx-auto.rounded-3xl.shadow.dark\:shadow-gray-700.w-\[90\%\] {
    height: 436px;
    object-fit: fill;
    width: 100%!important;
}
img.mx-auto.rounded-3xl.shadow.dark\:shadow-gray-700.w-\[100\%\] {
    width: 100%;
}
#topnav {
    padding: 27px 10px;
}

#topnav.nav-sticky{
    
}
.footer a.logo h3 {
    color: #fff!important;
        font-size: 15px!important;

}
@media (max-width: 1024px){
    ul.navigation-menu.justify-end.nav-light {
    justify-content: center!important;
}
    .container {
    padding-right: 20PX!important;
    padding-left: 20PX!important;
}
    .nav-sticky a.logo h3 {
    color: #fff!important;
    font-size: 15px!important;
}
 #topnav .navigation-menu>li>a {

    padding-left: 11px;
    padding-right: 11px;

}

}
@media (max-width: 991px){
    .py-16 {
    padding-top: 4rem!important;
    padding-bottom: 4rem!important;
    padding: 15px;
}
#topnav .navbar-toggle .lines {
    margin-top: 0;
    margin-bottom: 0;
    height: AUTO;
}
 
#topnav {
    min-height:auto;
}

#topnav {
    background-color:#fff;
}
.swiper-slider-hero {
    height: 483px;
}
.slide-inner.absolute.end-0.top-0.w-full.h-full.slide-bg-image.flex.items-center.bg-center\; {
    height: 453px!important;
}
    #topnav .navigation-menu>li>a {
    padding-left: 10px;
    padding-right: 10px;
    font-size: 15px;

}

}

@media(min-width: 992px){
    #topnav .navigation-menu>li>a {
    padding-top: 0px!important;
    padding-bottom:0px!important;
        min-height: auto;

}

}
@media (max-width: 767px){
    #topnav .navbar-toggle span {
    height: 5px;
}
#topnav .navbar-toggle .lines {
    background: #fff;
    width: 40px;
    padding: 5px;
    height: 36px!important;
}
#topnav {
    padding: 27px 7px;
}
a.logo {
    margin-top: 5px;
}
li.has-submenu.parent-menu-item a {
    color: #000!important;
    padding: 7px 10px!important;
}
a.logo.responsive h3 {
    color: #000!important;
    font-size: 20px!important;
    line-height: 30px!important;
}

    #topnav .navigation-menu>li>a {
    padding-left: 10px;
    padding-right: 10px;
    font-size: 15px;

}

.swiper-slider-hero {
    height: 483px;
}
.slide-inner.absolute.end-0.top-0.w-full.h-full.slide-bg-image.flex.items-center.bg-center\; {
    height: 453px!important;
}

}
@media (max-width: 500px){
    .nav-sticky a.logo h3 {
    font-size: 15px;
}

.swiper-slider-hero {
    height: 483px!important;
}
.slide-inner.absolute.end-0.top-0.w-full.h-full.slide-bg-image.flex.items-center.bg-center\; {
    height: 453px!important;
}
    #topnav .navigation-menu>li>a {
    padding-left: 10px!important;
    padding-right: 10px!important;
    font-size: 15px;

}
}
</style>
    <div class="tagline bg-slate-900 d-none" style=" display: none; ">
        <div class="container relative">                
            <div class="grid grid-cols-1">
                <div class="flex items-center justify-between">
                    <ul class="list-none">
                        <li class="inline-flex items-center">
                            <!--<i data-feather="clock" class="text-red-500 size-4"></i>-->
                            <!--<span class="ms-2 text-slate-300">Mon-Sat: 9am to 6pm</span>-->
                        </li>
                        <li class="inline-flex items-center ms-2">
                            <i data-feather="map-pin" class="text-red-500 size-4"></i>
                            <span class="ms-2 text-slate-300">{{$setting->company_address}}</span>
                        </li>
                    </ul>

                    <ul class="list-none">
                        <li class="inline-flex items-center">
                            <i data-feather="mail" class="text-red-500 size-4"></i>
                            <a href="mailto:{{$setting->company_email}}" class="ms-2 text-slate-300 hover:text-slate-200">{{$setting->company_email}}</a>
                        </li>
                        <!--<li class="inline-flex items-center ms-2">-->
                        <!--    <ul class="list-none">-->
                        <!--        <li class="inline-flex mb-0"><a href="#!" class="text-slate-300 hover:text-red-500"><i data-feather="facebook" class="size-4 align-middle" title="facebook"></i></a></li>-->
                        <!--        <li class="inline-flex ms-2 mb-0"><a href="#!" class="text-slate-300 hover:text-red-500"><i data-feather="instagram" class="size-4 align-middle" title="instagram"></i></a></li>-->
                        <!--        <li class="inline-flex ms-2 mb-0"><a href="#!" class="text-slate-300 hover:text-red-500"><i data-feather="twitter" class="size-4 align-middle" title="twitter"></i></a></li>-->
                        <!--        <li class="inline-flex ms-2 mb-0"><a href="tel:+152534-468-854" class="text-slate-300 hover:text-red-500"><i data-feather="phone" class="size-4 align-middle" title="phone"></i></a></li>-->
                        <!--    </ul>-->
                        <!--</li>-->
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <nav id="topnav" class="defaultscroll is-sticky tagline-height">
            <div class="container relative">
                <!-- Logo container-->
                <a class="logo" href="{{route('home')}}">
                  
                    <!--<img src="{{ url('images/' . $setting->logo) }}" class=" dark:inline-block" alt="">-->
                    <h3>MY RIGHT SHADOW</h3>
                </a>
                 
                <!-- End Logo container-->

                <!-- Start Mobile Toggle -->
                <div class="menu-extras">
                    <div class="menu-item">
                        <a class="navbar-toggle" id="isToggle" onclick="toggleMenu()">
                            <div class="lines">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </a>
                    </div>
                </div>
                <!-- End Mobile Toggle -->

                <!--Login button Start-->
                <ul class="buy-button list-none mb-0">
                   
                    <!--<li class="dropdown inline-block relative ps-0.5">-->
                    <!--    <button data-dropdown-toggle="dropdown" class="dropdown-toggle items-center" type="button">-->
                    <!--        <span class="size-8 inline-flex items-center justify-center tracking-wide align-middle duration-500 text-base text-center rounded-md border border-red-500 bg-red-500 text-white"><img src="assets/images/client/16.jpg" class="rounded-md" alt=""></span>-->
                    <!--    </button>-->
                        <!-- Dropdown menu -->
                    <!--    <div class="dropdown-menu absolute end-0 m-0 mt-4 z-10 w-48 rounded-md overflow-hidden bg-white dark:bg-slate-900 shadow dark:shadow-gray-800 hidden" onclick="event.stopPropagation();">-->
                    <!--        <ul class="py-2 text-start">-->
                    <!--            <li>-->
                    <!--                <a href="user-profile.html" class="flex items-center font-medium py-2 px-4 dark:text-white/70 hover:text-red-500 dark:hover:text-white"><i data-feather="user" class="size-4 me-2"></i>Profile</a>-->
                    <!--            </li>-->
                    <!--            <li>-->
                    <!--                <a href="helpcenter.html" class="flex items-center font-medium py-2 px-4 dark:text-white/70 hover:text-red-500 dark:hover:text-white"><i data-feather="help-circle" class="size-4 me-2"></i>Helpcenter</a>-->
                    <!--            </li>-->
                    <!--            <li>-->
                    <!--                <a href="user-setting.html" class="flex items-center font-medium py-2 px-4 dark:text-white/70 hover:text-red-500 dark:hover:text-white"><i data-feather="settings" class="size-4 me-2"></i>Settings</a>-->
                    <!--            </li>-->
                    <!--            <li class="border-t border-gray-100 dark:border-gray-800 my-2"></li>-->
                    <!--            <li>-->
                    <!--                <a href="login.html" class="flex items-center font-medium py-2 px-4 dark:text-white/70 hover:text-red-500 dark:hover:text-white"><i data-feather="log-out" class="size-4 me-2"></i>Logout</a>-->
                    <!--            </li>-->
                    <!--        </ul>-->
                    <!--    </div>-->
                    <!--</li>-->
                    <!--end dropdown-->
                </ul>
                <!--Login button End-->

                <div id="navigation">
                    <!-- Navigation Menu-->
                    <ul class="navigation-menu justify-end nav-light">
                        <li class="has-submenu parent-menu-item">
                            <a href="{{route('home')}}">Home</a>
                        </li>

                        <li class="has-submenu parent-menu-item">
                            <a href="{{route('about')}}">About Us</a>
                        </li>

                        <li class="has-submenu parent-menu-item">
                            <a href="{{route('product')}}">Product</a>
                        </li>
                        
                        <li class="has-submenu parent-menu-item">
                            <a href="{{route('terms')}}">Terms & Conditons</a>
                        </li>

                        </li><li class="has-submenu parent-menu-item">
                            <a href="{{route('contact')}}">Contact Us</a>
                        </li>
                        
                         
                        <li class="has-submenu parent-menu-item">
                            <a href="{{route('front.login')}}">Login</a>
                        </li>
                        
                    </ul><!--end navigation menu-->
                </div><!--end navigation-->
            </div><!--end container-->
        </nav><!--end header-->