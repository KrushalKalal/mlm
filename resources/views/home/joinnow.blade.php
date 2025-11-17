@extends('home.layout.main') 
@section('container')

 <!-- Start Hero -->
 <section class="relative table w-full items-center py-36 bg-[url('../../assets/images/bg/cta.html')] bg-top bg-no-repeat bg-cover">
    <div class="absolute inset-0 bg-gradient-to-b from-slate-900/60 via-slate-900/80 to-slate-900"></div>
    <div class="container relative">
        <div class="grid grid-cols-1 pb-8 text-center mt-10">
            <h3 class="text-4xl leading-normal tracking-wider font-semibold text-white">Join Now</h3>
        </div><!--end grid-->
    </div><!--end container-->
    
    <div class="absolute text-center z-10 bottom-5 start-0 end-0 mx-3">
        <ul class="tracking-[0.5px] mb-0 inline-block">
            <li class="inline-block uppercase text-[13px] font-bold duration-500 ease-in-out text-white/50 hover:text-white"><a href="index.html">Travosy</a></li>
            <li class="inline-block text-base text-white/50 mx-0.5 ltr:rotate-0 rtl:rotate-180"><i class="mdi mdi-chevron-right"></i></li>
            <li class="inline-block uppercase text-[13px] font-bold duration-500 ease-in-out text-white" aria-current="page">Join Now</li>
        </ul>
    </div>
</section><!--end section-->



<!-- Google Map -->
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<!-- Start Section-->
<section class="relative lg:py-24 py-16">
    <div class="container">
        <div class="grid md:grid-cols-12 grid-cols-1 items-center gap-6">
            <div class="lg:col-span-12 md:col-span-6">
                <div class="lg:ms-5">
                    <div class="bg-white dark:bg-slate-900 rounded-md shadow dark:shadow-gray-800 p-6">
                        <h3 class="mb-6 text-2xl leading-normal font-semibold">Join Now ssssssssssssss!</h3>
                        
                        <form method="post" id="joinnow">
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

                                <div class="lg:col-span-6">
                                    <label for="mobile" class="font-semibold">Your Mobile No:</label>
                                    <input name="mobile" id="mobile" type="number" class="mt-2 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-100 dark:border-gray-800 focus:ring-0" placeholder="Email :" required>
                                </div>


                                <div class="lg:col-span-6">
                                    <label for="sponsor_id" class="font-semibold">Your Sponsor No:</label>
                                    <input name="sponsor_id" id="sponsor_id" type="number" class="mt-2 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-100 dark:border-gray-800 focus:ring-0" placeholder="Email :" required>
                                    <span id="geterror"></span>
                                </div>


                                <div class="lg:col-span-6">
                                    <label for="state" class="font-semibold">Your State:</label>
                                    <input name="state" id="state" type="state" class="mt-2 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-100 dark:border-gray-800 focus:ring-0" placeholder="Email :" required>
                                </div>


                                <div class="lg:col-span-6">
                                    <label for="city" class="font-semibold">Your City:</label>
                                    <input name="city" id="city" type="text" class="mt-2 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-100 dark:border-gray-800 focus:ring-0" placeholder="Email :" required>
                                </div>

                                <div class="lg:col-span-6">
                                    <label for="pin_code" class="font-semibold">Your Pincode:</label>
                                    <input name="pin_code" id="pin_code" type="number" class="mt-2 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-100 dark:border-gray-800 focus:ring-0" placeholder="Email :" required>
                                </div>


                                <div class="lg:col-span-12">
                                    <label for="comments" class="font-semibold">Your Address:</label>
                                    <textarea name="comment" id="comments" class="mt-2 w-full py-2 px-3 h-28 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-100 dark:border-gray-800 focus:ring-0" placeholder="Message :" required></textarea>
                                </div>

                            </div>
                            <button type="submit"  class="py-2 px-5 inline-block tracking-wide align-middle duration-500 text-base text-center bg-red-500 text-white rounded-md mt-2">Join Now</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div><!--end container-->
</section><!--end section-->
<!-- End Section-->

@endsection