@extends('home.layout.main') 
@section('container')
 <?php
            $setting = DB::table('website_settings')->first();
        ?>
        
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

        <style>
        .content h5 {
    text-align: left;
}
.text-center.px-6 {
    column-gap: 21px;
    display: flex;
    align-items: center;
    border-bottom: 1px solid #eee;
    padding-bottom: 10px;
    padding-top: 10px;
    background: #eee;
    margin-bottom: 10px;
    border-radius: 10px;
}  
.contact-box {
    background: #000;
    height: 60px;
    width: 60px;
}
.contact-box i {
    color: #fff;
    font-size: 20px;
    padding:20px!important;
}

@media (max-width: 767px){
    .content {
    text-align: left;
}
  
.relative {
    position: relative!important;
    padding: 6px 20px;
}
section.relative.py-16 .container {
    padding-right: 0PX!important;
    padding-left: 0PX!important;
}
.text-center.px-6 {
    column-gap: 10px;
}
.relative.text-transparent {
    padding: 0;
    margin-bottom: 16px;
}
}
</style>
 <!-- Start Hero -->
         <section class="relative table w-full items-center py-36 bg-top bg-no-repeat bg-cover" style="background-image: url('{{ url('images/' . $setting->banner) }}');">
            <div class="absolute inset-0 bg-gradient-to-b from-slate-900/60 via-slate-900/80 to-slate-900"></div>
            <div class="container relative">
                <div class="grid grid-cols-1 pb-8 text-center mt-10" >
                    <h3 class="text-4xl leading-normal tracking-wider font-semibold text-white">Contact Us</h3>
                </div><!--end grid-->
            </div><!--end container-->
            
            <div class="absolute text-center z-10 bottom-5 start-0 end-0 mx-3">
                <ul class="tracking-[0.5px] mb-0 inline-block">
                    <li class="inline-block uppercase text-[13px] font-bold duration-500 ease-in-out text-white/50 hover:text-white"><a href="#"></a></li>
                    <li class="inline-block text-base text-white/50 mx-0.5 ltr:rotate-0 rtl:rotate-180"><i class="mdi mdi-chevron-right"></i></li>
                    <li class="inline-block uppercase text-[13px] font-bold duration-500 ease-in-out text-white" aria-current="page">Contact Us</li>
                </ul>
            </div>
        </section><!--end section-->
<!-- Google Map -->



    <div class="container-fluid relative mt-20">
            <div class="grid grid-cols-1">
                <div class="w-full leading-[0] border-0">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7831.697549211997!2d77.0003067257033!3d11.04996259590684!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ba85805c95634bd%3A0x78ca1d924cbec033!2sGanapathi%20Maanagar%2C%20Coimbatore%2C%20Tamil%20Nadu!5e0!3m2!1sen!2sin!4v1735889741321!5m2!1sen!2sin" style="border:0; width:100%;" class="w-full h-[500px]" allowfullscreen></iframe>
                </div>
            </div><!--end grid-->
        </div><!--end container-->
        <!-- Google Map -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <!-- Start Section-->
        <section class="relative py-16">
            <div class="container">
                <div class="grid md:grid-cols-12 grid-cols-1 gap-6">
                    <div class="lg:col-span-6 md:col-span-6" style="">
                        <!--<img src="{{url('user/assets/images/travel-train-station.svg')}}" class="w-full max-w-[500px] mx-auto" alt="">-->
                        <div>
                         <div class="text-center px-6">
                        <div class="relative text-transparent">
                            <div class="contact-box">
                                <i class="fas fa-phone"></i>
                            </div>
                        </div>

                        <div class="content">
                            <h5 class="h5 text-lg font-semibold">Phone</h5>
                            <!--<p class="text-slate-400 mt-3">The phrasal sequence of the is now so that many campaign and benefit</p>-->
                            
                            <div class="mt-1">
                                <a href="tel:+152534-468-854" class="text-red-500 font-medium">{{$setting->company_phone}}</a>
                            </div>
                        </div>
                    </div>

                    <div class="text-center px-6">
                        <div class="relative text-transparent">
                             <div class="contact-box">
                                    <i class="fas fa-envelope"></i>
                            </div>
                        </div>

                        <div class="content ">
                            <h5 class="h5 text-lg font-semibold">Email</h5>
                            <!--<p class="text-slate-400 mt-3">The phrasal sequence of the is now so that many campaign and benefit</p>-->
                            
                            <div class="mt-1">
                                <a href="mailto:contact@example.com" class="text-red-500 font-medium">{{$setting->company_email}}</a>
                            </div>
                        </div>
                    </div>

                    <div class="text-center px-6">
                        <div class="relative text-transparent">
                            <div class="contact-box">
                               <i class="fas fa-map-marker-alt"></i>
                            </div>
                        </div>

                        <div class="content ">
                            <h5 class="h5 text-lg font-semibold">Location</h5>
                            <!--<p class="text-slate-400 mt-3">{{$setting->company_address}}</p>-->
                            
                            <div class="mt-1">
                                <a class="text-red-500 font-medium">{{$setting->company_address}}</a>
                            </div>
                        </div>
                    </div>
                    </div>
</div>
                    <div class="lg:col-span-6 md:col-span-6">
                        <div class="lg:ms-5">
                            <div class="bg-white dark:bg-slate-900 rounded-md shadow dark:shadow-gray-800 p-6">
                                <h3 class="mb-3 text-2xl leading-normal font-semibold">Get in touch !</h3>
                                
                                <form method="post" action="{{route('contact.store')}}">
                                    @csrf
                                    <p class="mb-0" id="error-msg"></p>
                                    <div id="simple-msg"></div>
                                    <div class="grid lg:grid-cols-12 grid-cols-1 gap-3">
                                        <div class="lg:col-span-6">
                                            <label for="name" class="font-semibold">Your Name:</label>
                                            <input name="name" id="name" type="text" class="mt-2 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-100 dark:border-gray-800 focus:ring-0" placeholder="Name :" required>
                                        </div>
        
                                        <div class="lg:col-span-6">
                                            <label for="email" class="font-semibold">Your Email:</label>
                                            <input name="email" id="email" type="email" class="mt-2 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-100 dark:border-gray-800 focus:ring-0" placeholder="Email :" required>
                                        </div>

                                        <div class="lg:col-span-12">
                                            <label for="subject" class="font-semibold">Your Question:</label>
                                            <input name="question" id="subject" class="mt-2 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-100 dark:border-gray-800 focus:ring-0" placeholder="Subject :" required>
                                        </div>
    
                                        <div class="lg:col-span-12">
                                            <label for="comments" class="font-semibold">Your Comment:</label>
                                            <textarea name="comment" id="comments" class="mt-2 w-full py-2 px-3 h-18 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-100 dark:border-gray-800 focus:ring-0" placeholder="Message :" required></textarea>
                                        </div>
                                    </div>
                                    <button type="submit"  class="py-2 px-5 inline-block tracking-wide align-middle duration-500 text-base text-center bg-red-500 text-white rounded-md mt-2">Send Message</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--end container-->
            
            <div class="container  mt-16">
                <div class="grid grid-cols-1 lg:grid-cols-3 md:grid-cols-2 gap-6">
                   
                </div><!--end grid-->
            </div><!--end container-->
        </section><!--end section-->
        <!-- End Section-->
@endsection