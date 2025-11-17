<!doctype html>
<html lang="en">


<!-- Mirrored from codebucks.in/clivax/layout/auth-register.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 25 Oct 2024 13:43:09 GMT -->
<head>

    <meta charset="utf-8" />
    <title>Right Shadow</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Codebucks" name="author" />
    <!-- App favicon -->
    <?php
        $setting = DB::table('website_settings')->first();
    ?>
    <link rel="shortcut icon" href="{{ url('images/' . $setting->logo) }}">

    
    <!-- dark layout js -->
    <script src="{{url('admin/assets/js/pages/layout.js')}}"></script>

    <!-- Bootstrap Css -->
    <link href="{{url('admin/assets/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{url('admin/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- simplebar css -->
    <link href="{{url('admin/assets/libs/simplebar/simplebar.min.css')}}" rel="stylesheet">
    <!-- App Css-->
    <link href="{{url('admin/assets/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />
<style>
    .logo-dark img {
    height: 132px!important;
    object-fit: cover!important;
}
section.relative.table.w-full.items-center.py-36.bg-top.bg-no-repeat.bg-cover {
    background-size: 100% 100%!important;
}
</style>
</head>

<body>
    <?php
        $setting = DB::table('website_settings')->first();
    ?>
    <div class="container-fluid authentication-bg overflow-hidden">
        <div class="bg-overlay"></div>
        <div class="row align-items-center justify-content-center min-vh-100">
            <div class="col-10 col-md-6 col-lg-4 col-xxl-3">
                <div class="card mb-0">
                    <div class="card-body">
                     <div class="link-home">
                            <a href="{{route('home')}}">HOME</a>
                        </div>
                        <div class="text-center">
                            <div>
                                <a href="{{route('front.dashboard')}}" class="logo-dark">
                                    <img src="{{ url('images/' . $setting->logo) }}" alt="" height="20" class="auth-logo logo-dark mx-auto">
                                </a>
                                <a href="index.html" class="logo-light">
                                    <img src="{{ url('images/' . $setting->logo) }}" alt="" height="20" class="auth-logo logo-light mx-auto">
                                </a>
                            </div>

                            @if(session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            
                            <h4 class="font-size-18 mt-1">Login Your Account</h4>
                        </div>

                        <div class="p-2 mt-3">
                        <form method="POST" enctype="multipart/form-data" action="{{ route('logincheck') }}">
                            @csrf
                                <div class="input-group auth-form-group-custom mb-3">
                                    <span class="input-group-text bg-primary bg-opacity-10 fs-16 " id="basic-addon1"><i class="mdi mdi-account-outline auti-custom-input-icon"></i></span>
                                    <input type="text" name="email" class="form-control" placeholder="Enter username" aria-label="Username" aria-describedby="basic-addon1">
                                </div>
                                @error('email')
                                    <span>{{ $message }}</span>
                                @enderror

                                <div class="input-group auth-form-group-custom mb-3">
                                    <span class="input-group-text bg-primary bg-opacity-10 fs-16" id="basic-addon2"><i class="mdi mdi-lock-outline auti-custom-input-icon"></i></span>
                                    <input type="password" name="password" class="form-control" id="userpassword" placeholder="Enter password" aria-label="Username" aria-describedby="basic-addon1">
                                </div>
                                
                                @error('password')
                                    <span>{{ $message }}</span>
                                @enderror

                                <!--<div class="mb-sm-5">
                                    <div class="form-check float-sm-start">
                                        <input type="checkbox" class="form-check-input" id="customControlInline">
                                        <label class="form-check-label" for="customControlInline">Remember me</label>
                                    </div>
                                    <div class="float-sm-end">
                                        <a href="auth-recoverpw.html" class="text-muted"><i class="mdi mdi-lock me-1"></i> Forgot your password?</a>
                                    </div>
                                </div>-->

                                <div class="pt-2 text-center">
                                    <button class="btn btn-primary w-xl waves-effect waves-light" type="submit">Log In</button>
                                </div>

                                <!-- <div class="mt-3 text-center">
                                    <p class="mb-0">Don't have an account ? <a href="#" class="fw-medium text-primary"> Register </a> </p>
                                </div> -->
                            </form>
                        </div>
                        <div class="mt-2 text-center">
                             <p>©
                                <script>document.write(new Date().getFullYear())</script> Right Shadow. Crafted with <i class="mdi mdi-heart text-danger"></i> by Dit Software
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- JAVASCRIPT -->
    <script src="{{url('admin/assets/libs/jquery/jquery.min.js')}}"></script>
    <script src="{{url('admin/assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{url('admin/assets/libs/metismenu/metisMenu.min.js')}}"></script>
    <script src="{{url('admin/assets/libs/simplebar/simplebar.min.js')}}"></script>
    <script src="{{url('admin/assets/libs/node-waves/waves.min.js')}}"></script>

    <script src="{{url('admin/assets/js/app.js')}}"></script>

</body>


<!-- Mirrored from codebucks.in/clivax/layout/auth-register.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 25 Oct 2024 13:43:09 GMT -->
</html>
