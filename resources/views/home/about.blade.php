@extends('home.layout.main') 
@section('container')
   <!-- Start Hero -->
        <?php
            $setting = DB::table('website_settings')->first();
        ?>
   <style>
       p.text-slate-400.max-w-xl.mb-6 {
        text-align: justify;
    }
   </style>
   <section class="relative table w-full items-center py-36 bg-top bg-no-repeat bg-cover" style="background-image: url('{{ url('images/' . $setting->banner) }}');">

            <div class="absolute inset-0 bg-gradient-to-b from-slate-900/60 via-slate-900/80 to-slate-900"></div>
            <div class="container relative">
                <div class="grid grid-cols-1 pb-8 text-center mt-10">
                    <h3 class="text-4xl leading-normal tracking-wider font-semibold text-white">About Us</h3>
                </div><!--end grid-->
            </div><!--end container-->
            
            <div class="absolute text-center z-10 bottom-5 start-0 end-0 mx-3">
                <ul class="tracking-[0.5px] mb-0 inline-block">
                    <!--<li class="inline-block uppercase text-[13px] font-bold duration-500 ease-in-out text-white/50 hover:text-white"><a href="index.html">Travosy</a></li>-->
                    <li class="inline-block text-base text-white/50 mx-0.5 ltr:rotate-0 rtl:rotate-180"><i class="mdi mdi-chevron-right"></i></li>
                    <li class="inline-block uppercase text-[13px] font-bold duration-500 ease-in-out text-white" aria-current="page">About Us</li>
                </ul>
            </div>
        </section><!--end section-->
        <!-- End Hero -->

        <!-- Start -->
        <section class="relative  py-16">
            <div class="container relative">
                <div class="grid md:grid-cols-12 grid-cols-1 items-center gap-6 relative">
                    <div class="md:col-span-6">
                        <div class="relative">
                            @if($abouts != null)
                            <img src="{{ url('images/' . $abouts->image) }}" class="mx-auto rounded-3xl shadow dark:shadow-gray-700 w-[100%]" alt="">
                            @endif
                        </div>
                    </div>

                    <div class="md:col-span-6">
                        <div class="lg:ms-8">
                            <h3 class="mb-6 md:text-3xl text-2xl md:leading-normal leading-normal font-semibold">@if($abouts != null){{$abouts->title}} @endif</h3>

                            <p class="text-slate-400 max-w-xl mb-6">@if($abouts != null) {{ $abouts->message }} @endif</p>

                             </div>
                    </div>

                    <div class="absolute bottom-0 start-1/3 -z-1">
                        <img src="{{url('user/assets/images/map-plane-big.png')}}" class="lg:w-[600px] w-96" alt="">
                    </div>
                </div>
            </div><!--end container-->



           
        </section><!--end section-->
        <!-- End -->

 
@endsection