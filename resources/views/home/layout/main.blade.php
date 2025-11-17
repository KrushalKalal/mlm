<!DOCTYPE html>
<html lang="en" class="light scroll-smooth" dir="ltr">
    
    <head>
        <meta charset="UTF-8">
        <title>Right Shadow</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta content="Tour & Travels Agency Tailwind CSS Template" name="description">
        <meta content="Tour, Travels, agency, business, corporate, tour packages, journey, trip, tailwind css, Admin, Landing" name="keywords">
        <meta name="author" content="Shreethemes">
        <meta name="website" content="https://shreethemes.in/">
        <meta name="email" content="support@shreethemes.in">
        <meta name="version" content="1.0.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <?php
            $setting = DB::table('website_settings')->first();
        ?>
        <link rel="shortcut icon" href="{{ url('images/' . $setting->logo) }}">

        <link href="{{url('user/assets/libs/swiper/css/swiper.min.css')}}" rel="stylesheet">
        <link href="{{url('user/assets/libs/tiny-slider/tiny-slider.css')}}" rel="stylesheet">
        <link href="{{url('user/assets/libs/js-datepicker/datepicker.min.css')}}" rel="stylesheet">
        <!-- Main Css -->
        <link href="{{url('user/assets/libs/%40mdi/font/css/materialdesignicons.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{url('user/assets/css/tailwind.min.css')}}" rel="stylesheet" type="text/css">
<style>
section.relative.table.w-full.items-center.py-36.bg-top.bg-no-repeat.bg-cover {
    background-size: 100% 100%!important;
}
a.logo {
    display: flex;
    align-items: center;
    column-gap: 10px;
}
.bg-black\/70 {
    background-color: transparent!important;
}
.from-slate-900\/60 {
    --tw-gradient-from: transparent!important;
}
.to-slate-900 {
    --tw-gradient-to: transparent!important;
}
.via-slate-900\/80 {
    --tw-gradient-to:transparent!important;
    --tw-gradient-stops: transparent!important;
}
h1.font-bold.text-white.lg\:leading-normal.leading-normal.text-4xl.lg\:text-6xl.mb-6.mt-5 {
    color: #c12828!important;
    background: #fff;
}
</style>

    </head>

    <body class="dark:bg-slate-900" style="margin-top: 75px;">
        
        @include('home.layout.header')
        @yield('container')
        @include('home.layout.footer')

        <!--<div class="fixed top-1/4 -left-2 z-50">-->
        <!--    <span class="relative inline-block rotate-90">-->
        <!--        <input type="checkbox" class="checkbox opacity-0 absolute" id="chk">-->
        <!--        <label class="label bg-slate-900 dark:bg-white shadow dark:shadow-gray-800 cursor-pointer rounded-full flex justify-between items-center p-1 w-14 h-8" for="chk">-->
        <!--            <i data-feather="moon" class="w-[18px] h-[18px] text-yellow-500"></i>-->
        <!--            <i data-feather="sun" class="w-[18px] h-[18px] text-yellow-500"></i>-->
        <!--            <span class="ball bg-white dark:bg-slate-900 rounded-full absolute top-[2px] left-[2px] w-7 h-7"></span>-->
        <!--        </label>-->
        <!--    </span>-->
        <!--</div>-->

        <div class="fixed top-[40%] -left-3 z-50">
            <a href="#" id="switchRtl">
                <!--<span class="py-1 px-3 relative inline-block rounded-b-md -rotate-90 bg-white dark:bg-slate-900 shadow-md dark:shadow dark:shadow-gray-800 font-semibold rtl:block ltr:hidden" >LTR</span>-->
                <!--<span class="py-1 px-3 relative inline-block rounded-b-md -rotate-90 bg-white dark:bg-slate-900 shadow-md dark:shadow dark:shadow-gray-800 font-semibold ltr:block rtl:hidden">RTL</span>-->
            </a>
        </div>

        <a href="#" onclick="topFunction()" id="back-to-top" class="back-to-top fixed hidden text-lg rounded-md z-10 bottom-5 end-5 size-8 text-center bg-red-500/10 hover:bg-red-500 text-red-500 hover:text-white justify-center items-center"><i class="mdi mdi-arrow-up"></i></a>
        <script src="{{url('user/assets/libs/swiper/js/swiper.min.js')}}"></script>
        <script src="{{url('user/assets/libs/tiny-slider/min/tiny-slider.js')}}"></script>
        <script src="{{url('user/assets/libs/js-datepicker/datepicker.min.js')}}"></script>
        <script src="{{url('user/assets/libs/feather-icons/feather.min.js')}}"></script>
        <script src="{{url('user/assets/js/plugins.init.js')}}"></script>
        <script src="{{url('user/assets/js/app.js')}}"></script>

    </body>

</html>
