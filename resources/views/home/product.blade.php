@extends('home.layout.main') 
@section('container')
  <?php
            $setting = DB::table('website_settings')->first();
        ?>
<style>
section.relative.table.w-full.items-center.py-36.bg-top.bg-no-repeat.bg-cover {
    background-size: 100% 100%!important;
}
    .product_images  img {
    height: 235px;
    width: 100%;
    object-fit: fill;
}


/*29-10-24*/

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
 </style>
    <section class="relative table w-full items-center py-36 bg-top bg-no-repeat bg-cover" style="background-image: url('{{ url('images/' . $setting->banner) }}');">
        <div class="absolute inset-0 bg-gradient-to-b from-slate-900/60 via-slate-900/80 to-slate-900"></div>
        <div class="container relative">
            <div class="grid grid-cols-1 pb-8 text-center mt-10">
                <h3 class="text-4xl leading-normal tracking-wider font-semibold text-white">Product</h3>
            </div><!--end grid-->
        </div><!--end container-->
        
        <div class="absolute text-center z-10 bottom-5 start-0 end-0 mx-3">
            <ul class="tracking-[0.5px] mb-0 inline-block">
                <!-- <li class="inline-block uppercase text-[13px] font-bold duration-500 ease-in-out text-white/50 hover:text-white"><a href="index.html">Travosy</a></li> -->
                <li class="inline-block text-base text-white/50 mx-0.5 ltr:rotate-0 rtl:rotate-180"><i class="mdi mdi-chevron-right"></i></li>
                <li class="inline-block uppercase text-[13px] font-bold duration-500 ease-in-out text-white" aria-current="page">Product</li>
            </ul>
        </div>
    </section><!--end section-->
    <!-- End Hero -->

    <!-- Start -->
    <section class="relative  py-16">
        <div class="container relative">
            <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-6">
                @foreach($product as $p)
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
            </div><!--end grid-->
        </div><!--end container-->
    </section><!--end section-->
    <!-- End -->
@endsection