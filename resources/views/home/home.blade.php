@extends('home.layout.main') 
@section('container')
<!-- Hero Start -->
  <!-- Preloader -->
  <div id="preloader">
    <div class="logo-container">
      <div class="spinner"></div>
      <!--<h1>Right Shadow...</h1>-->
      <a class="logo" href="http://ditsolution.in/public">
                  
                    <img src="http://ditsolution.in/public/images/1732801210_logo.jpg" class=" dark:inline-block" alt="">
                    <h3>Right Shadow</h3>
                </a>
    </div>
  </div>
  
  <style>
  #topnav {
    background-color: #000!important;
}

  section.users-area {
    padding-bottom: 50px;
    padding-top: 5px;
    margin-bottom: 50px;
}
      /* Preloader Styling */
#preloader {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: linear-gradient(135deg, #fff, #fff);
  display: flex;
  justify-content: center;
  align-items: center;
  z-index: 9999;
  animation: fadeOut 1s ease-out forwards;
  animation-delay: 2s;
}

.logo-container {
  text-align: center;
  padding:10px;
}

.spinner {
    width: 50px;
    height: 50px;
    border: 6px solid rgba(255, 255, 255, 0.3);
    border-top: 6px solid #ef4444;
    border-radius: 50%;
    animation: spin 1s linear infinite;
    margin-bottom: 20px;
    text-align: center;
    margin-left: 40%;
      padding:10px;

}
.logo-container a.logo img{
       display: block!important;
    height: 264px!important; 
      animation: fadeInText 1s ease-in-out forwards;
  animation-delay: 0.5s;
  opacity: 0;
    padding:10px;

}


.logo-container a.logo h3{
      /*color: #ef4444!important;*/
  font-size: 40px!important;
  opacity: 0;
  animation: fadeInText 1s ease-in-out forwards;
  animation-delay: 0.5s;
  opacity: 0;
}
/*.logo-container h1 {*/
/*  color: #ef4444;*/
/*  font-family: 'Arial', sans-serif;*/
/*  font-size: 1.5rem;*/
/*  opacity: 0;*/
/*  animation: fadeInText 1s ease-in-out forwards;*/
/*  animation-delay: 0.5s;*/
/*}*/

/* Hide Content Initially */
#content {
  display: none;
}

/* Animations */
@keyframes spin {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(360deg);
  }
}

@keyframes fadeOut {
  100% {
    opacity: 0;
    visibility: hidden;
  }
}


@keyframes fadeInText {
  100% {
    opacity: 1;
  }
}

  </style>
  
  
 <style>
 p.text-slate-400.max-w-xl.mb-6 {
    text-align: justify;
}
 img.mx-auto.rounded-3xl.shadow.dark\:shadow-gray-700.w-\[90\%\] {
    height: 436px;
    object-fit: fill;
}
 .banner_bg{
     padding-top:200px;
      padding-bottom:150px;
      margin-bottom:50px;
 }

p.text-slate-400.media {
    min-height: 79px;
}
.grid_single_imag img {
    width: 100%;
    height: 700px;
    object-fit: fill;
}
.product_images  img {
    height: 267px;
    object-fit: fill!important;
    width: 100%;
    max-width: 267px;
}
.relative.product_images.overflow-hidden.rounded-t-md.shadow.dark\:shadow-gray-700.mx-3.mt-3 {
    box-shadow: 0 19px 38px rgba(0,0,0,0.30), 0 15px 12px rgba(0,0,0,0.22)!important;
    padding: 27px;
}
.slide-inner.absolute.end-0.top-0.w-full.h-full.slide-bg-image.flex.items-center.bg-center\; {
    height: 520px!important;
    width: 100%!important;
    background-size: 100% 100%;
    object-fit: cover!important;
}
.banner-img img {
    height: 400px;
    object-fit: fill;
    width: 100%;
}

#tns1-iw {
margin-bottom:54px;
}
.pt-name a {
    border: 1px solid #a17f7ff5;
    padding: 4px 10px!important;
    font-size: 15px!important;
    margin-left: 14px;
}
/*29-10-24*/
.bg_product {
    background: #f1f1f1;
    padding: 10px 30px 40px 30px;
}
.all_div {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding:12px;
}
.mrp {
    display: flex;
    column-gap: 7px;
}
.mrp h5 {
    font-size: 16px!important;
    line-height: 20px;
}
.mrp h6 {
    font-size: 13px!important;
    line-height: 20px;
}

.tiny-three-item img{
      width:100%;
    height:500px;  
}
.about-oneimg{
      margin-bottom: 100px;
    display: inline-block;
}
section.mobile_revers {
    display: none;
}
@media (max-width: 767px){
    .product_images  img {
    max-width: 100%;
}
    section.mobile_revers {
    display: block;
}
    section.dekstop {
    display: none;
}
    .nav-sticky a.logo h3 {
    font-size: 15px;
    color:#fff!important;
}
a.py-2.px-5.inline-block.tracking-wide.align-middle.duration-500.text-base.text-center.bg-red-500.text-white.rounded-md {
    margin: 0 auto!important;
    width: 100%;
    max-width: 189px!important;
    display: flex!important;
    text-align: center;
}
h3.mb-6.md\:text-3xl.text-2xl.md\:leading-normal.leading-normal.font-semibold {
    margin-top: 10px;
}
}
@media (max-width: 500px){
    .nav-sticky a.logo h3 {
    font-size: 15px;
}
.swiper-slider-hero {
    height: 483px!important;
}
a.logo {
    display: grid;
    align-items: center;
    column-gap: 10px;
    justify-content: center;
}
}
 </style>

<section class="banner_bg relative" style="background-image: url('{{ url('images/' . $sliders->image) }}'); background-size: 102% 100%; background-repeat: no-repeat; background-position: center;">
               <div class="absolute inset-0 bg-black/70"></div>

    <div class="container relative">

                                <div class="grid grid-cols-1">
                                    <div class="text-center">
                                        <!--<img src="{{ url('images/' . $setting->logo) }}" class="mx-auto w-[300px]" alt="">-->
                                        <h1 class="font-bold text-white lg:leading-normal leading-normal text-4xl lg:text-6xl mb-6 mt-5">{{$sliders->text1}}</h1>
                                        <p class="text-white/70 text-xl max-w-xl mx-auto">{{$sliders->text2}}</p>
                                    </div>
                                </div>
                            </div>
    
</section>        
        
        
        
        
          @if($abouts != null)
            <section>
                          <div class="container relative">
                <div class="grid md:grid-cols-12 grid-cols-1 items-center gap-6 relative">
                    <div class="md:col-span-5">
                        <div class="relative">
                            <img src="{{ url('images/' . $abouts->image) }}" class="mx-auto rounded-3xl shadow dark:shadow-gray-700 w-[90%]" alt="">
                        </div>
                    </div>

                    <div class="md:col-span-7">
                        <div class="lg:ms-8">
                            <h3 class="mb-6 md:text-3xl text-2xl md:leading-normal leading-normal font-semibold">{{$abouts->title}}</h3>

                            <p class="text-slate-400 max-w-xl mb-6">{{$abouts->message}}</p>

                            <a href="{{route('about')}}" class="py-2 px-5 inline-block tracking-wide align-middle duration-500 text-base text-center bg-red-500 text-white rounded-md">Read More <i class="mdi mdi-chevron-right align-middle ms-0.5"></i></a>
                        </div>
                    </div>

                    <div class="absolute bottom-0 start-1/3 -z-1">
                        <img src="{{url('user/assets/images/map-plane-big.png')}}" class="lg:w-[600px] w-96" alt="">
                    </div>
                </div>
            </div>

          </section>
            @endif
            
       
            <!--<section class="relative  py-16">-->
            <!--    <div class="container relative">-->
            <!--        <div class="grid md:grid-cols-12 grid-cols-1 items-center gap-6 relative">-->
            <!--            <div class="md:col-span-12">-->
            <!--                <div class="relative">-->
            <!--                        <div class="grid_single_imag ">-->
                                       
            <!--                            <img src="{{url('user/assets/images/Right Shadow3.jpg')}}" class="mx-auto rounded-3xl shadow dark:shadow-gray-700 w-[100%]" alt="">-->
            <!--                        </div>   -->
    
            <!--                </div>-->
            <!--            </div>-->
    
            <!--        </div>-->
            <!--    </div>-->
            <!--</section>-->

            
        <section class="relative mt-10 overflow-hidden">
            
            <div class="container relative ">
                <div class="grid grid-cols-1 pb-8 text-center ">
                    <h3 class="mb-6 md:text-3xl text-2xl md:leading-normal leading-normal font-semibold"> Our Product</h3>

                    <p class="text-slate-400 max-w-xl mx-auto">Premium-quality, stylish, and comfortable clothing designed to match your unique style.</p>
                </div>

                <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 mt-6 gap-6">
                    @php
                        $i = 0;
                    @endphp
                    @foreach($product as $p)
                    @php
                        ++$i;
                    @endphp
                        <div class="group rounded-md shadow dark:shadow-gray-700">
                          <div class="bg_product">
                              <div class="pt-name">
                                   <a href="{{ route('productdetails', $p->id) }}" class="text-lg  p-2 font-medium hover:text-red-500 duration-500 ease-in-out">{{$p->name}}</a>
</div>
                                <a href="{{ route('productdetails', $p->id) }}">
                                <div class="relative product_images overflow-hidden rounded-t-md shadow dark:shadow-gray-700 mx-3 mt-3">
                                    <img src="{{ url('images/' . $p->image) }}" class="scale-125 group-hover:scale-100 duration-500" alt="">
                                    <div class="absolute top-0 start-0 p-4">
                                    
                                    </div>
                                </div>
                            </a>
                          </div>
    
                            <div class="">
                                
                        <div class="all_div border-t  border-slate-100 dark:border-gray-800">
                                <div class="mrp pt-1  ">
                                
                                     <h6 class="text-lg font-medium text-red-500"><i class="fas fa-rupee-sign"></i>{{$p->mrp}}</h6>
                                     <!--<h5 class="text-lg font-medium text-red-500"><i class="fas fa-rupee-sign"></i>{{$p->discount_price}}</h5>-->

                                     </div>
                                     <div class="product_d">
                                  <a href="{{ route('productdetails', $p->id) }}" class="text-slate-400 hover:text-red-500">Checkout Now <i class="mdi mdi-arrow-right"></i></a>

                                     </div>
                        </div>    
                            </div>
                        </div>
                    @endforeach
                </div>
                @if($i > 3)
                <div class="mt-6 text-center">
                    <a href="{{route('product')}}" class="text-slate-400 hover:text-red-500 inline-block">See More Products <i class="mdi mdi-arrow-right align-middle"></i></a>
                </div>
                @endif
            </div>
             </section>
            
<!--            <section class="relative  py-16">-->
<!--            <div class="container relative">-->
<!--                <div class="grid md:grid-cols-12 grid-cols-1  gap-6 relative"> -->
<!--                    <div class="md:col-span-6">-->
<!--                        <div class="relative">-->
<!--                            <div class="banner-img">-->
<!--                          <img src="{{url('user/assets/images/Right Shadow5.jpg')}}" class="lg:w-[600px] w-96" alt="">-->

<!--                            </div>-->
                             
<!--                      </div>-->
<!--                    </div>-->

<!--                    <div class="md:col-span-6">-->
<!--                        <div class="lg:ms-8">-->
<!--                            <div class="banner-img">-->

<!--                       <img src="{{url('user/assets/images/Right Shadow6.jpg')}}" class="lg:w-[600px] w-96" alt="">-->
<!--</div>-->
<!--                      </div>-->
<!--                    </div>-->

                  
<!--                </div>-->
<!--            </div><!--end container-->
<!-- </section>-->
 
             <?php
             $user = Auth::user();
             ?>
          @if($abouts != null)
                   <section class="dekstop mt-8">
                          <div class="container relative">
                <div class="grid md:grid-cols-12 grid-cols-1 items-center gap-6 relative">
                    <div class="md:col-span-5">
                        <div class="relative">
                            <img src="{{ url('images2/' . $abouts->image2) }}" class="mx-auto rounded-3xl shadow dark:shadow-gray-700 w-[90%]" alt="">
                        </div>
                    </div>

                    <div class="md:col-span-7">
                        <div class="lg:ms-8">
                            <h3 class="mb-6 md:text-3xl text-2xl md:leading-normal leading-normal font-semibold">{{$abouts->title2}}</h3>

                            <p class="text-slate-400 max-w-xl mb-6">{{$abouts->message2}}</p>
                            @if($user == null)
                            <a href="{{route('home')}}" class="py-2 px-5 inline-block tracking-wide align-middle duration-500 text-base text-center bg-red-500 text-white rounded-md">Login <i class="mdi mdi-chevron-right align-middle ms-0.5"></i></a>
                            @endif
                        </div>
                    </div>

                    <div class="absolute bottom-0 start-1/3 -z-1">
                        <img src="{{url('user/assets/images/map-plane-big.png')}}" class="lg:w-[600px] w-96" alt="">
                    </div>
                </div>
            </div>

          </section>
          
                    <section class="mobile_revers mt-8">
                          <div class="container relative">
                <div class="grid md:grid-cols-12 grid-cols-1 items-center gap-6 relative">
                     <div class="relative">
                            <img src="{{ url('images2/' . $abouts->image2) }}" class="mx-auto rounded-3xl shadow dark:shadow-gray-700 w-[90%]" alt="">
                        </div>
                    <div class="md:col-span-7">
                        <div class="lg:ms-8">
                            <h3 class="mb-6 md:text-3xl text-2xl md:leading-normal leading-normal font-semibold">{{$abouts->title2}}</h3>

                            <p class="text-slate-400 max-w-xl mb-6">{{$abouts->message2}}</p>
                            @if($user == null)
                            <a href="{{route('home')}}" class="py-2 px-5 inline-block tracking-wide align-middle duration-500 text-base text-center bg-red-500 text-white rounded-md">Login <i class="mdi mdi-chevron-right align-middle ms-0.5"></i></a>
                            @endif
                        </div>
                    </div>
                

                    <div class="absolute bottom-0 start-1/3 -z-1">
                        <img src="{{url('user/assets/images/map-plane-big.png')}}" class="lg:w-[600px] w-96" alt="">
                    </div>
                </div>
            </div>

          </section>
          
          <!--SECOND-->
                    <section class="dekstop mt-8">
                    
                          <div class="container relative">
                <div class="grid md:grid-cols-12 grid-cols-1 items-center gap-6 relative">
                      <div class="md:col-span-7">
                        <div class="lg:ms-8">
                            <h3 class="mb-6 md:text-3xl text-2xl md:leading-normal leading-normal font-semibold">{{$abouts->title3}}</h3>

                            <p class="text-slate-400 max-w-xl mb-6">{{$abouts->message3}}</p>
                            @if($user == null)
                            <a href="{{route('home')}}" class="py-2 px-5 inline-block tracking-wide align-middle duration-500 text-base text-center bg-red-500 text-white rounded-md">Login <i class="mdi mdi-chevron-right align-middle ms-0.5"></i></a>
                            @endif
                        </div>
                    </div>
                  

                       <div class="md:col-span-5">
                        <div class="relative">
                            <img src="{{ url('images3/' . $abouts->image3) }}" class="mx-auto rounded-3xl shadow dark:shadow-gray-700 w-[90%]" alt="">
                        </div>
                    </div>
                  
                    <div class="absolute bottom-0 start-1/3 -z-1">
                        <img src="{{url('user/assets/images/map-plane-big.png')}}" class="lg:w-[600px] w-96" alt="">
                    </div>
                </div>
            </div>

          </section>
          
                               <section class="mobile_revers mt-8">
                    
                          <div class="container relative">
                <div class="grid md:grid-cols-12 grid-cols-1 items-center gap-6 relative">
                     <div class="md:col-span-5">
                        <div class="relative">
                            <img src="{{ url('images3/' . $abouts->image3) }}" class="mx-auto rounded-3xl shadow dark:shadow-gray-700 w-[90%]" alt="">
                        </div>
                    </div>
                      <div class="md:col-span-7">
                        <div class="lg:ms-8">
                            <h3 class="mb-6 md:text-3xl text-2xl md:leading-normal leading-normal font-semibold">{{$abouts->title3}}</h3>

                            <p class="text-slate-400 max-w-xl mb-6">{{$abouts->message3}}</p>
                            @if($user == null)
                            <a href="{{route('home')}}" class="py-2 px-5 inline-block tracking-wide align-middle duration-500 text-base text-center bg-red-500 text-white rounded-md">Login <i class="mdi mdi-chevron-right align-middle ms-0.5"></i></a>
                            @endif
                        </div>
                    </div>
                  

                      
                  
                    <div class="absolute bottom-0 start-1/3 -z-1">
                        <img src="{{url('user/assets/images/map-plane-big.png')}}" class="lg:w-[600px] w-96" alt="">
                    </div>
                </div>
            </div>

          </section>

          
            <!--third-->
                    <section class="dekstop">
                          <div class="container relative">
                <div class="grid md:grid-cols-12 grid-cols-1 items-center gap-6 relative">
                    
                    <div class="md:col-span-5">
                        <div class="relative">
                            <img src="{{ url('images4/' . $abouts->image4) }}" class="mx-auto rounded-3xl shadow dark:shadow-gray-700 w-[90%]" alt="">
                        </div>
                    </div>
                      <div class="md:col-span-7">
                          <div class="absolute bottom-0 start-1/3 -z-1">
                        <img src="{{url('user/assets/images/map-plane-big.png')}}" class="lg:w-[600px] w-96" alt="">
                    </div>
                        <div class="lg:ms-8">
                            <h3 class="mb-6 md:text-3xl text-2xl md:leading-normal leading-normal font-semibold">{{$abouts->title4}}</h3>

                            <p class="text-slate-400 max-w-xl mb-6">{{$abouts->message4}}</p>
                             @if($user == null)
                            <a href="{{route('home')}}" class="py-2 px-5 inline-block tracking-wide align-middle duration-500 text-base text-center bg-red-500 text-white rounded-md">Login <i class="mdi mdi-chevron-right align-middle ms-0.5"></i></a>
                            @endif
                        </div>
                    </div>


                  
                  
                </div>
            </div>

          </section>
                      <section class="mobile_revers mt-8">
                          <div class="container relative">
                <div class="grid md:grid-cols-12 grid-cols-1 items-center gap-6 relative">
                <div class="md:col-span-5">
                        <div class="relative">
                            <img src="{{ url('images4/' . $abouts->image4) }}" class="mx-auto rounded-3xl shadow dark:shadow-gray-700 w-[90%]" alt="">
                        </div>
                    </div>
                    <div class="md:col-span-7">
                        <div class="lg:ms-8">
                            <h3 class="mb-6 md:text-3xl text-2xl md:leading-normal leading-normal font-semibold">{{$abouts->title4}}</h3>

                            <p class="text-slate-400 max-w-xl mb-6">{{$abouts->message4}}</p>
                             @if($user == null)
                            <a href="{{route('home')}}" class="py-2 px-5 inline-block tracking-wide align-middle duration-500 text-base text-center bg-red-500 text-white rounded-md">Login <i class="mdi mdi-chevron-right align-middle ms-0.5"></i></a>
                            @endif
                        </div>
                    </div>
                     

                    <div class="absolute bottom-0 start-1/3 -z-1">
                        <img src="{{url('user/assets/images/map-plane-big.png')}}" class="lg:w-[600px] w-96" alt="">
                    </div>
                </div>
            </div>
                      </section>
            <!--fourth-->
                    <section class="dekstop">
                          <div class="container relative">
                <div class="grid md:grid-cols-12 grid-cols-1 items-center gap-6 relative">
                  <div class="md:col-span-7">
                        <div class="lg:ms-8">
                            <h3 class="mb-6 md:text-3xl text-2xl md:leading-normal leading-normal font-semibold">{{$abouts->title5}}</h3>

                            <p class="text-slate-400 max-w-xl mb-6">{{$abouts->message5}}</p>
                            @if($user == null)
                            <a href="{{route('home')}}" class="py-2 px-5 inline-block tracking-wide align-middle duration-500 text-base text-center bg-red-500 text-white rounded-md">Login<i class="mdi mdi-chevron-right align-middle ms-0.5"></i></a>
                            @endif
                        </div>
                    </div>
                       <div class="md:col-span-5">
                        <div class="relative">
                            <img src="{{ url('images5/' . $abouts->image5) }}" class="mx-auto rounded-3xl shadow dark:shadow-gray-700 w-[90%]" alt="">
                        </div>
                    </div>
                    
                  
                    <div class="absolute bottom-0 start-1/3 -z-1">
                        <img src="{{url('user/assets/images/map-plane-big.png')}}" class="lg:w-[600px] w-96" alt="">
                    </div>
                </div>
            </div>

          </section>
          <section class="mobile_revers mt-8">
                          <div class="container relative">
                <div class="grid md:grid-cols-12 grid-cols-1 items-center gap-6 relative">
                     <div class="md:col-span-5">
                        <div class="relative">
                            <img src="{{ url('images5/' . $abouts->image5) }}" class="mx-auto rounded-3xl shadow dark:shadow-gray-700 w-[90%]" alt="">
                        </div>
                    </div>
                  <div class="md:col-span-7">
                        <div class="lg:ms-8">
                            <h3 class="mb-6 md:text-3xl text-2xl md:leading-normal leading-normal font-semibold">{{$abouts->title5}}</h3>

                            <p class="text-slate-400 max-w-xl mb-6">{{$abouts->message5}}</p>
                            @if($user == null)
                            <a href="{{route('home')}}" class="py-2 px-5 inline-block tracking-wide align-middle duration-500 text-base text-center bg-red-500 text-white rounded-md">Login<i class="mdi mdi-chevron-right align-middle ms-0.5"></i></a>
                            @endif
                        </div>
                    </div>
                      
                    
                  
                    <div class="absolute bottom-0 start-1/3 -z-1">
                        <img src="{{url('user/assets/images/map-plane-big.png')}}" class="lg:w-[600px] w-96" alt="">
                    </div>
                </div>
            </div>

          </section>
          
          
  <!--5-->
                      <section class="dekstop">
                          <div class="container relative">
                <div class="grid md:grid-cols-12 grid-cols-1 items-center gap-6 relative">
                    <div class="md:col-span-5">
                        <div class="relative">
                            <img src="{{ url('images6/' . $abouts->image6) }}" class="mx-auto rounded-3xl shadow dark:shadow-gray-700 w-[90%]" alt="">
                        </div>
                    </div>

                    <div class="md:col-span-7">
                        <div class="lg:ms-8">
                            <h3 class="mb-6 md:text-3xl text-2xl md:leading-normal leading-normal font-semibold">{{$abouts->title6}}</h3>

                            <p class="text-slate-400 max-w-xl mb-6">{{$abouts->message6}}</p>
                            @if($user == null)
                            <a href="{{route('home')}}" class="py-2 px-5 inline-block tracking-wide align-middle duration-500 text-base text-center bg-red-500 text-white rounded-md">Login <i class="mdi mdi-chevron-right align-middle ms-0.5"></i></a>
                            @endif
                        </div>
                    </div>

                    <div class="absolute bottom-0 start-1/3 -z-1">
                        <img src="{{url('user/assets/images/map-plane-big.png')}}" class="lg:w-[600px] w-96" alt="">
                    </div>
                </div>
            </div>

          </section>
                     <section class="mobile_revers mt-8">
                          <div class="container relative">
                <div class="grid md:grid-cols-12 grid-cols-1 items-center gap-6 relative">
                   
                           <div class="md:col-span-5">
                        <div class="relative">
                            <img src="{{ url('images6/' . $abouts->image6) }}" class="mx-auto rounded-3xl shadow dark:shadow-gray-700 w-[90%]" alt="">
                        </div>
                    </div>
                    <div class="md:col-span-7">
                        <div class="lg:ms-8">
                            <h3 class="mb-6 md:text-3xl text-2xl md:leading-normal leading-normal font-semibold">{{$abouts->title6}}</h3>

                            <p class="text-slate-400 max-w-xl mb-6">{{$abouts->message6}}</p>
                            @if($user == null)
                            <a href="{{route('home')}}" class="py-2 px-5 inline-block tracking-wide align-middle duration-500 text-base text-center bg-red-500 text-white rounded-md">Login <i class="mdi mdi-chevron-right align-middle ms-0.5"></i></a>
                            @endif
                        </div>
                    </div>
                        
                    <div class="absolute bottom-0 start-1/3 -z-1">
                        <img src="{{url('user/assets/images/map-plane-big.png')}}" class="lg:w-[600px] w-96" alt="">
                    </div>
                </div>
            </div>
                      </section>

            @endif
 
 
            <br>
            <section class="users-area"  style="background-color: #eee;">
            <div class="container relative "  >
                <div class="grid grid-cols-1 pb-6 text-center">
                    <h3 class="mb-6 md:text-3xl text-2xl md:leading-normal leading-normal font-semibold">What Our Users Say</h3>

                    <p class="text-slate-400 max-w-xl mx-auto">Exceptional quality and style! The clothing fits perfectly and feels amazing.</p>
                </div>

                <div class="grid grid-cols-1 mt-6">
                    <div class="tiny-three-item">
                        @foreach($testimonial as $t)
                        <div class="tiny-slide text-center">
                            <div class="cursor-e-resize">
                                <div class="content relative rounded shadow dark:shadow-gray-700 m-2 p-6 bg-white dark:bg-slate-900 before:content-[''] before:absolute before:start-1/2 before:-bottom-[4px] before:box-border before:border-8 before:rotate-[45deg] before:border-t-transparent before:border-e-white dark:before:border-e-slate-900 before:border-b-white dark:before:border-b-slate-900 before:border-s-transparent before:shadow-testi dark:before:shadow-gray-700 before:origin-top-left">
                                    <i class="mdi mdi-format-quote-open mdi-48px text-red-500"></i>
                                    <p class="text-slate-400 media">" {{$t->message}} "</p>
                                  
                                </div>
                                
                                <div class="text-center mt-5">
                                    <img src="{{ url('images/' . $t->image) }}" class="size-14 rounded-full shadow-md dark:shadow-gray-700 mx-auto" alt="">
                                    <h6 class="mt-2 font-semibold">{{$t->name}}</h6>
                                    <!--<span class="text-slate-400 text-sm">{{$t->designation}}</span>-->
                                </div>
                            </div>
                        </div>
                        @endforeach
                        
                    </div>
                </div>
            </div>
            
            


        </section>
        
          <script>
    // script.js

document.addEventListener("DOMContentLoaded", () => {
  const preloader = document.getElementById("preloader");
  const content = document.getElementById("content");

  // Hide preloader and show content after 2.5 seconds
  setTimeout(() => {
    preloader.style.display = "none";
    content.style.display = "block";
  }, 2500);
});

    </script>
        
@endsection