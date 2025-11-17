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
    ul.point-ul ol {
    list-style: disc;
}
   </style>
   <section class="relative table w-full items-center py-36 bg-top bg-no-repeat bg-cover" style="background-image: url('{{ url('images/' . $setting->banner) }}');">

            <div class="absolute inset-0 bg-gradient-to-b from-slate-900/60 via-slate-900/80 to-slate-900"></div>
            <div class="container relative">
                <div class="grid grid-cols-1 pb-8 text-center mt-10">
                    <h3 class="text-4xl leading-normal tracking-wider font-semibold text-white">Terms & Conditons</h3>
                </div><!--end grid-->
            </div><!--end container-->
            
            <div class="absolute text-center z-10 bottom-5 start-0 end-0 mx-3">
                <ul class="tracking-[0.5px] mb-0 inline-block">
                    <!--<li class="inline-block uppercase text-[13px] font-bold duration-500 ease-in-out text-white/50 hover:text-white"><a href="index.html">Travosy</a></li>-->
                    <li class="inline-block text-base text-white/50 mx-0.5 ltr:rotate-0 rtl:rotate-180"><i class="mdi mdi-chevron-right"></i></li>
                    <li class="inline-block uppercase text-[13px] font-bold duration-500 ease-in-out text-white" aria-current="page">Terms & Conditons</li>
                </ul>
            </div>
        </section><!--end section-->
        <!-- End Hero -->

        <!-- Start -->
        <section class="relative  py-16">
            <div class="container relative">
                <div class="grid md:grid-cols-12 grid-cols-1 items-center gap-6 relative">
                    <div class="md:col-span-12">
                        <div class="relative">
                                    <h1><b>Terms & Conditions</b></h1>
                                    <ul class="point-ul">
                                    {!! $tearms->details !!} 
                                </ul>


                        </div>
                    </div>

                </div>
            </div><!--end container-->



           
        </section><!--end section-->
        <!-- End -->

 
@endsection