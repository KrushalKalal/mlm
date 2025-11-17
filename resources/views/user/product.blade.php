@extends('admin.layout.main') 

@section('container')
<div class="page-content">
    <style>
    a.text-lg.p-2.font-medium.hover\:text-red-500.duration-500.ease-in-out {
    font-size: 27px;
    line-height: 30px;
}
a.text-slate-700.hover\:text-red-500 {
    font-size: 23px;
    line-height: 30px;
}
        .main-content .content {
    margin-top: 35px;
}
.main-content .content {
    margin-top: 23px;
}
.receipt_list {
    justify-content: space-between;
    display: flex;
}
.receipt_list p {
    width: 50%;
    margin-bottom: 0px;
    border-right: 1px solid #e1e1e1;
    display: flex;
    column-gap: 10px;
}
.receipt_list p span{
    width: 45%;
     padding: 10px; 
;
}
/**/

.header.mb-4 h1 {
    font-size: 17px;
    border: 1px solid #f5f5f5;
    padding: 7px 10px;
    width: 44%;
    text-align: center;
    line-height: 20px;
    border-radius: 5px;
}
.receipt_list {
    border-top: 1px solid #f5f5f5;
    margin-bottom: 10px;
    border-bottom: 1px solid #f5f5f5;
}
.relative.product_images.overflow-hidden img {
    height: 243px;
    width: 100%;
    object-fit: fill;
}
.all_div {
    display: flex;
    align-items: center;
    padding: 20px 10px;
    justify-content: space-between;
    
}
.pt-name {
    padding: 10px 0px;
}

    </style>
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Product Details</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Product Details</a></li>
                        <li class="breadcrumb-item active">Product Details</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center mb-3">
         @foreach($product as $p)
      <div class="col-xl-4 col-sm-12" >
          
          
          
                        <div class="group rounded-md shadow dark:shadow-gray-700 ">
                          <div class="bg_product">
                              <div class="pt-name ">
                                   <a href="{{ route('user.adduser') }}" class="text-lg  p-2 font-medium hover:text-red-500 duration-500 ease-in-out">{{$p->name}}</a>
                               </div>
                                <a href="{{ route('user.adduser') }}" target="_blank">
                                <div class="relative product_images overflow-hidden">
                                    <img src="{{ url('images/' . $p->image) }}" class="scale-125 group-hover:scale-100 duration-500" alt="">
                                    <!--<div class="absolute top-0 start-0 p-4">-->
                                     
                                    <!--</div>-->
                                </div>
                            </a>
                          </div>
    
                            <div class="">
                                
                                       <div class="all_div">
                                <div class="mrp pt-1  ">
                                
                                     <h3 class="text-lg font-medium text-red-500"><i class="fas fa-rupee-sign"></i>{{$p->mrp}}</h3>
                                     <!--<h5 class="text-lg font-medium text-red-500"><i class="fas fa-rupee-sign"></i>{{$p->discount_price}}</h5>-->

                                     </div>
                                     <div class="product_d">
                                  <a href="{{ route('user.adduser') }}" target="_blank" class="text-slate-700 hover:text-red-500">Checkout Now <i class="mdi mdi-arrow-right"></i></a>

                                     </div>
                        </div>    
                            </div>
                        </div>

          
      </div>
                          @endforeach

       <!--- <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <div class="container">
                  
                        
                        <div class="content">
                            <div class="">
                              <section class="relative  py-16">
        <div class="container relative">
            <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-6">
                @foreach($product as $p)
                        <div class="group rounded-md shadow dark:shadow-gray-700">
                          <div class="bg_product">
                              <div class="pt-name">
                                   <a href="{{ route('user.adduser') }}" class="text-lg  p-2 font-medium hover:text-red-500 duration-500 ease-in-out">{{$p->name}}</a>
                               </div>
                                <a href="{{ route('user.adduser') }}">
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
                                     <h5 class="text-lg font-medium text-red-500"><i class="fas fa-rupee-sign"></i>{{$p->discount_price}}</h5>

                                     </div>
                                     <div class="product_d">
                                  <a href="{{ route('user.adduser') }}" class="text-slate-400 hover:text-red-500">Checkout Now <i class="mdi mdi-arrow-right"></i></a>

                                     </div>
                        </div>    
                            </div>
                        </div>
                    @endforeach
            </div>
        </div>
    </section>
                            
                            <br>
                            <br>
                          
                           </div>
                         
                           
                        </div>
                     
                    </div>
                </div>
            </div>
        </div>-->
    </div>             
</div>
@endsection



