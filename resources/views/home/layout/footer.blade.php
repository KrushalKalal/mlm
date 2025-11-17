      <!-- Footer Start -->
        <?php
            $setting = DB::table('website_settings')->first();
        ?>
        <footer class="footer bg-dark-footer relative text-gray-200 dark:text-gray-200">    
            <div class="container relative">
                <div class="grid grid-cols-12">
                    <div class="col-span-12">
                        <div class="py-[60px] px-0">
                            <div class="grid md:grid-cols-12 grid-cols-1 gap-6">
                             
                                
                                <div class="lg:col-span-3 md:col-span-12">
                                       <div class="footer">
                                    <a class="logo" href="{{route('home')}}">
                                    <!--<img src="{{ url('images/' . $setting->logo) }}" class=" dark:inline-block" alt="">-->
                                    <h3>My Right Shadow</h3>
                                </a>
                                </div>
                                <style>
                                .footer-img {
                                display: flex;
                                column-gap: 29px;
                            }
                            .footer1 img {
                                            height: 74px;
                                            width: 100%;
                                            max-width: 200px;
                                            border-radius: 6px;
                                        }
                                      .footer h3 {
                                            font-size: 21px;
                                        }
                                </style>
                                    <!--<a href="#" class="text-[22px] focus:outline-none">-->
                                    <!--    <img src="assets/images/logo-light.png" alt="">-->
                                    <!--</a>-->
                                    <p class="mt-6 text-gray-300">Premium-quality, stylish, and comfortable clothing designed to match your unique style.</p>
                                    <!--<ul class="list-none mt-6">-->
                                    <!--    <li class="inline"><a href="https://1.envato.market/travosy" target="_blank" class="size-8 inline-flex items-center justify-center tracking-wide align-middle text-base border border-gray-800 dark:border-slate-800 rounded-md hover:bg-red-500 hover:text-white text-slate-300"><i data-feather="shopping-cart" class="size-4 align-middle" title="Buy Now"></i></a></li>-->
                                    <!--    <li class="inline"><a href="https://dribbble.com/shreethemes" target="_blank" class="size-8 inline-flex items-center justify-center tracking-wide align-middle text-base border border-gray-800 dark:border-slate-800 rounded-md hover:bg-red-500 hover:text-white text-slate-300"><i data-feather="dribbble" class="size-4 align-middle" title="dribbble"></i></a></li>-->
                                    <!--    <li class="inline"><a href="http://linkedin.com/company/shreethemes" target="_blank" class="size-8 inline-flex items-center justify-center tracking-wide align-middle text-base border border-gray-800 dark:border-slate-800 rounded-md hover:bg-red-500 hover:text-white text-slate-300"><i data-feather="linkedin" class="size-4 align-middle" title="Linkedin"></i></a></li>-->
                                    <!--    <li class="inline"><a href="https://www.facebook.com/shreethemes" target="_blank" class="size-8 inline-flex items-center justify-center tracking-wide align-middle text-base border border-gray-800 dark:border-slate-800 rounded-md hover:bg-red-500 hover:text-white text-slate-300"><i data-feather="facebook" class="size-4 align-middle" title="facebook"></i></a></li>-->
                                    <!--    <li class="inline"><a href="https://www.instagram.com/shreethemes/" target="_blank" class="size-8 inline-flex items-center justify-center tracking-wide align-middle text-base border border-gray-800 dark:border-slate-800 rounded-md hover:bg-red-500 hover:text-white text-slate-300"><i data-feather="instagram" class="size-4 align-middle" title="instagram"></i></a></li>-->
                                    <!--    <li class="inline"><a href="https://x.com/shreethemes" target="_blank" class="size-8 inline-flex items-center justify-center tracking-wide align-middle text-base border border-gray-800 dark:border-slate-800 rounded-md hover:bg-red-500 hover:text-white text-slate-300"><i data-feather="twitter" class="size-4 align-middle" title="twitter"></i></a></li>-->
                                    <!--    <li class="inline"><a href="mailto:support@shreethemes.in" class="size-8 inline-flex items-center justify-center tracking-wide align-middle text-base border border-gray-800 dark:border-slate-800 rounded-md hover:bg-red-500 hover:text-white text-slate-300"><i data-feather="mail" class="size-4 align-middle" title="email"></i></a></li>-->
                                    <!--</ul><!--end icon-->
                                </div>

                                <div class="lg:col-span-3 md:col-span-4">
                                    <div class="lg:ms-8">
                                        <h5 class="tracking-[1px] text-gray-100 font-semibold">{{$setting->company_name}}</h5>
                                        <h5 class="tracking-[1px] text-gray-100 mt-6">{{$setting->username}}</h5>

                                        <div class="flex mt-4">
                                            <i data-feather="map-pin" class="size-4 text-red-500 me-2 mt-1"></i>
                                            <div class="">
                                                <h6 class="text-gray-300">{{$setting->company_address}}</h6>
                                            </div>
                                        </div>

                                        <div class="flex mt-4">
                                            <i data-feather="mail" class="size-4 text-red-500 me-2 mt-1"></i>
                                            <div class="">
                                                <a href="mailto:{{$setting->company_email}}" class="text-slate-300 hover:text-slate-400 duration-500 ease-in-out">{{$setting->company_email}}</a>
                                            </div>
                                        </div>
                        
                                        <div class="flex mt-4">
                                            <i data-feather="phone" class="size-4 text-red-500 me-2 mt-1"></i>
                                            <div class="">
                                                <a href="tel:+152534-468-854" class="text-slate-300 hover:text-slate-400 duration-500 ease-in-out">{{$setting->company_phone}}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div><!--end col-->
                
                                <div class="lg:col-span-3 md:col-span-4">
                                    <div class="lg:ms-8">
                                        <h5 class="tracking-[1px] text-gray-100 font-semibold">Company</h5>
                                        <ul class="list-none footer-list mt-6">
                                            <li class="mt-[10px]"><a href="{{route('home')}}" class="text-gray-300 hover:text-gray-400 duration-500 ease-in-out"><i class="mdi mdi-chevron-right"></i> Home</a></li>
                                            <li><a href="{{route('about')}}" class="text-gray-300 hover:text-gray-400 duration-500 ease-in-out"><i class="mdi mdi-chevron-right"></i> About us</a></li>
                                            <li class="mt-[10px]"><a href="{{route('product')}}" class="text-gray-300 hover:text-gray-400 duration-500 ease-in-out"><i class="mdi mdi-chevron-right"></i> Product</a></li>
                                            <li class="mt-[10px]"><a href="{{route('contact')}}" class="text-gray-300 hover:text-gray-400 duration-500 ease-in-out"><i class="mdi mdi-chevron-right"></i> contact us</a></li>
                                            <li class="mt-[10px]"><a href="{{route('terms')}}" class="text-gray-300 hover:text-gray-400 duration-500 ease-in-out"><i class="mdi mdi-chevron-right"></i> Terms & Conditons</a></li>
                                        </ul>
                                    </div>
                                </div><!--end col-->
                                <div class="lg:col-span-3 md:col-span-4">
                                  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7831.697549211997!2d77.0003067257033!3d11.04996259590684!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ba85805c95634bd%3A0x78ca1d924cbec033!2sGanapathi%20Maanagar%2C%20Coimbatore%2C%20Tamil%20Nadu!5e0!3m2!1sen!2sin!4v1735889741321!5m2!1sen!2sin" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                </div>
    
                                <!--<div class="lg:col-span-3 md:col-span-4">-->
                                <!--    <h5 class="tracking-[1px] text-gray-100 font-semibold">Newsletter</h5>-->
                                <!--    <p class="mt-6">Sign up and receive the latest tips via email.</p>-->
                                <!--    <form>-->
                                <!--        <div class="grid grid-cols-1">-->
                                <!--            <div class="my-3">-->
                                <!--                <label class="form-label">Write your email <span class="text-red-600">*</span></label>-->
                                <!--                <div class="form-icon relative mt-2">-->
                                <!--                    <i data-feather="mail" class="size-4 absolute top-3 start-4"></i>-->
                                <!--                    <input type="email" class="ps-12 rounded w-full py-2 px-3 h-10 bg-gray-800 border-0 text-gray-100 focus:shadow-none focus:ring-0 placeholder:text-gray-200 outline-none" placeholder="Email" name="email" required="">-->
                                <!--                </div>-->
                                <!--            </div>-->
                                        
                                <!--            <button type="submit" id="submitsubscribe" name="send" class="py-2 px-5 inline-block font-semibold tracking-wide align-middle duration-500 text-base text-center bg-red-500 text-white rounded-md">Subscribe</button>-->
                                <!--        </div>-->
                                <!--    </form>-->
                                <!--</div><!--end col-->
                            </div><!--end grid-->
                        </div><!--end col-->
                    </div>
                </div><!--end grid-->
            </div><!--end container-->

            <div class="copy-footer border-t border-slate-800">
                <div class="container relative text-center">
                    <div class="grid grid-cols-1">
                        <div class="text-center">
                            <p class="mb-0">© <script>document.write(new Date().getFullYear())</script> Right Shadow. Design with <i class="mdi mdi-heart text-red-600"></i> by <a href="{{route('home')}}" target="_blank" class="text-reset">Dit Software</a>.</p>
                        </div>
                    </div><!--end grid-->
                </div><!--end container-->
            </div>
        </footer><!--end footer-->