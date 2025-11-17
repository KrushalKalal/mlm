<!doctype html>
<html lang="en">

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
    <!--<link href="{{url('admin/assets/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />-->
        
        <style>
        .auth-form-group-custom .form-control {
    line-height: 32px;
}
        /*.bank_list p {*/
        /*    width: 66%;*/
        /*}*/
        /*.bank_list {*/
        /*    display: flex;*/
        /*}*/
        .d {
            display: flex;
        }
        .d img {
            height: 70px;
        }
        .add_user_area {
            width: 100%;
            max-width: 957px;
            margin: 0 auto;
        }
        .bank_details img.img-fluid {
            width: 83%;
            height: 296px!important;
            margin: 0 auto;
            object-fit: fill;
            display: flex;
        }
        .img-qrcode {
            width: 90%;
        }
        .bank_conatin h5 {
            text-align: center;
            margin-top: 10px;
            color: #000;
            font-size: 22px;
            line-height: 30px;
            font-weight: 600;
        }
        .bank_details {
            padding: 17px 20px 10px 10px;
        }
        .bank_conatin p {
            font-size: 14px;
            margin-bottom: 4px;
        }
        .text-center.logo{
            display: flex;
            align-items: center;
            justify-content: center;
            column-gap: 10px;
        }
        
        /**/
              .bank_area 
        {display: flex;column-gap: 10px;
            
        }
        .bank_area .card-body{
            width:65%;
        }
        .bank_details img.img-fluid {
    width: 100%;

}

        .card-bank.details {
    width: 50%;
}
.tital_text h4 {
    color: #0b32e3;
    text-align: center;
    font-size: 24px;
}
.form-area {
    display: flex;
    column-gap: 10px;
}
.bank_conatin h5 {
    text-align: left;
}
   .mobile {
    display: none;
}
.deckstop {
    display: block;
}
button#submit {
    width: 100%;
}
.text-center.pt-3.mobile {
    padding: 10px;
}
.text-center.logo h4.font-size-18.mt-1 {
    color: green;
}
span#basic-addon3 {
    font-size: 12px!important;
    color: #fff;
}
.form-area i {
    color: #fff;
}
button#submit {
    background: yellow;
    border-color: yellow;
    color:#0#000!important;
}
span#basic-addon2 i {
    color: #fff;
}
span#basic-addon1 {
    color: #fff;
}
 @media (max-width: 767px){

          .bank_area {
    overflow-x: auto;
}
  
            
            .form-area {
    display: grid;
    column-gap: 10px;
}

            .add_user_area {

    height: 100vh;
}
                    .bank_area {
    display: inline-block;
    column-gap: 10px;
}
.card-bank.details {
    width: 100%;
}
.bank_area .card-body{
            width:100%;
        }
          
.img-qrcode {
    width: 100%;
}  
     .bank_area .card-body {
    width: 100%;
}
.bank_area {
    display: grid;
}
                   .mobile {
    display: block;
}
.deckstop {
    display: none;

          .bank_area {
    overflow-x: auto;
}
  
           .bank_conatin h5 {
    text-align: center;
} 
            .form-area {
    display: grid;
    column-gap: 10px;
}

            .add_user_area {

    height: 100vh;
}
                    .bank_area {
    display: inline-block;
    column-gap: 10px;
}
.card-bank.details {
    width: 100%;
}
.bank_area .card-body{
            width:100%;
        }
          
.img-qrcode {
    width: 100%;
}  


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
            <div class="col-lg-12 col-md-12 col-lg-12 col-xxl-12">
                <div class="card mb-0 add_user_area">
                 <div class="bank_area" style=" ">
                       <div class="card-body" style="">
                           <div class="tital_text">
                           <h4>RIGHT SHADOW</h4>
                        </div>
                        <div class="text-center logo">
                          <!--  <div class="d">
                                <a href="index.html" class="logo-dark">
                                    <img src="{{ url('images/' . $setting->logo) }}" alt="" height="20" class="auth-logo logo-dark mx-auto">
                                </a>
                                <a href="index.html" class="logo-light">
                                    <img src="assets/images/logo-light.png" alt="" height="20" class="auth-logo logo-light mx-auto">
                                </a>
                            </div>-->

                            @if(session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            
                            <h4 class="font-size-18 mt-1" style="color:green;">REGISTRATION</h4>
                        </div>

                        <div class="p-2 mt-1">
                            <div class="card-body" style="width:100%; background:green;">
                                <form method="POST" enctype="multipart/form-data" id="membersforms">
                            @csrf
                                <div class="text-danger">
                                         <span id="sponsor_id_name"></span>
                                    </div>
                                    <div class="form-area" style="">
                                        
                                         <div class="input-group auth-form-group-custom mb-3">
                                    <span class="input-group-text bg-primary bg-opacity-10 fs-16 " id="basic-addon3">
                                        <!--<i class="mdi mdi-account"></i>-->
                                        sponsor id
                                        </span>
                                    <input type="text" class="form-control" name="sponsor_id"  id="sponsor_id" onload="checkusername();" value="{{$user->member_id}}"  readonly placeholder="Enter Sponser Id" aria-label="email" aria-describedby="basic-addon3" readonly>
                                </div>
                                        <div class="input-group auth-form-group-custom mb-3">
                                    <span class="input-group-text bg-primary bg-opacity-10 fs-16 " id="basic-addon1">
                                        <!--<i class="mdi mdi-account"></i>-->
                                        sponsor name
                                        </span>
                                    <input type="text" class="form-control" placeholder="Enter Name" value="{{$user->name}}" aria-label="Name" readonly aria-describedby="basic-addon1" required>
                                    <div class="text-danger">
                                       
                                    </div>
                                </div>
                                        
                                    </div>
                                    
                                    
                                    <div class="form-area" style="">
                                 <div class="input-group auth-form-group-custom mb-3">
                                    <span class="input-group-text bg-primary bg-opacity-10 fs-16 " id="basic-addon1"><i class="mdi mdi-account"></i></span>
                                    <input type="text" class="form-control" name="name" placeholder="Enter Name" aria-label="Name" aria-describedby="basic-addon1" required="">
                                    <div class="text-danger">
                                         @error('name')
                                            <span>{{ $message }}</span>
                                        @enderror
                                    </div>
                                 </div>
                              </div>
                               

                             <div class="form-area" style="">
                                <div class="input-group auth-form-group-custom mb-3">
                                    <span class="input-group-text bg-primary bg-opacity-10 fs-16 " id="basic-addon1"><i class="mdi mdi-phone"></i></span>
                                    <input type="text" class="form-control" name="mobile_no" id="mobile_no"  placeholder="Enter Mobile No" aria-label="mobile_no" aria-describedby="basic-addon1" required pattern="^\d{10}$" maxlength="10" title="Please enter a 10-digit phone number" oninput="this.value=this.value.replace(/\D/g,'');">
                                 <div class="text-danger">
                                        @error('mobile_no')
                                            <span>{{ $message }}</span>
                                        @enderror
                                </div>
                                </div>
                                <div class="input-group auth-form-group-custom mb-3">
                                    <span class="input-group-text bg-primary bg-opacity-10 fs-16 " id="basic-addon1"><i class="mdi mdi-phone"></i></span>
                                    <input type="text" class="form-control" name="confirm_phone" id="confirm_phone" placeholder="Confirm Mobile No" aria-label="mobile_no" aria-describedby="basic-addon1" required pattern="^\d{10}$" maxlength="10" title="Please enter a 10-digit phone number" oninput="this.value=this.value.replace(/\D/g,'');">
                                </div>
                                    <script>
                                        document.getElementById('mobile_no').addEventListener('input', function(event) {
                                            const mobileNo = event.target.value;
                                            const errorDiv = document.getElementById('mobile_no_error');
                                            
                                            // Check if the input is not a number or has more than 10 digits
                                            if (!/^\d{10}$/.test(mobileNo)) {
                                                errorDiv.innerHTML = '<span>Please enter a valid 10-digit phone number.</span>';
                                            } else {
                                                errorDiv.innerHTML = '';  // Clear error message if valid
                                            }
                                        });
                                        
                                        document.getElementById('confirm_phone').addEventListener('input', function(event) {
                                            const mobileNo = event.target.value;
                                            const errorDiv = document.getElementById('mobile_no_error');
                                            
                                            // Check if the input is not a number or has more than 10 digits
                                            if (!/^\d{10}$/.test(mobileNo)) {
                                                errorDiv.innerHTML = '<span>Please enter a valid 10-digit phone number.</span>';
                                            } else {
                                                errorDiv.innerHTML = '';  // Clear error message if valid
                                            }
                                        });
                                    </script>
                                
                                     
                                </div>
                                
                                 <div class="form-area" style="">                               
                                
                                <!--<div class="input-group auth-form-group-custom mb-3">-->
                                <!--    <span class="input-group-text bg-primary bg-opacity-10 fs-16 " id="basic-addon1"><i class="mdi mdi-account-outline auti-custom-input-icon"></i></span>-->
                                <!--    <input type="text" class="form-control" name="city" placeholder="Enter City" aria-label="city" aria-describedby="basic-addon1" required>-->
                                <!--</div>-->
                                <!--<div class="text-danger">-->
                                <!--    @error('city')-->
                                <!--        <span>{{ $message }}</span>-->
                                <!--    @enderror-->
                                <!--</div>-->

                                <div class="input-group auth-form-group-custom mb-3">
                                    <span class="input-group-text bg-primary bg-opacity-10 fs-16" id="basic-addon2"><i class="mdi mdi-lock-outline auti-custom-input-icon"></i></span>
                                    <input type="password" class="form-control" id="userpassword" name="password" placeholder="Enter password" aria-label="Password" aria-describedby="basic-addon2" required>
                                     <div class="text-danger">
                                    @error('password')
                                        <span>{{ $message }}</span>
                                    @enderror
                                </div>
                                                                </div>

                                 <div class="input-group auth-form-group-custom mb-3">
                                    <span class="input-group-text bg-primary bg-opacity-10 fs-16" id="basic-addon2"><i class="mdi mdi-lock-outline"></i></span>
                                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Retype password" aria-label="Password" aria-describedby="basic-addon2" required>
                                </div>
                                

                                </div>
                                 <div class="form-area" style="">
                               
                                <div class="input-group auth-form-group-custom mb-3">
                                    <span class="input-group-text bg-primary bg-opacity-10 fs-16 " id="basic-addon1"><i class="mdi mdi-email"></i></span>
                                    <input type="email" class="form-control" name="email" placeholder="Enter Email" aria-label="Email" aria-describedby="basic-addon1" >
                                <div class="text-danger">
                                    @error('email')
                                        <span>{{ $message }}</span>
                                    @enderror
                                </div>
                                </div>
                         
                                <div class="input-group auth-form-group-custom mb-3">
                                    <span class="input-group-text bg-primary bg-opacity-10 fs-16 " id="basic-addon3">
                                        <i class="mdi mdi-cart"></i>
                                    </span>
                                    
                                    <!-- Dropdown Code -->
                                    <select class="form-control" name="package_id" id="dropdown_option" required>
                                        <!--<option value="" selected disabled>Choose an package</option>-->
                                        @foreach($package as $pack)
                                            <option value="{{$pack->id}}">{{$pack->name}} (Rs.{{$pack->mrp}})</option>
                                        @endforeach
                                    </select>
                                
                                    <div class="text-danger">
                                        @error('package_id')
                                            <span>{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                </div>
                                <!--<div class="input-group auth-form-group-custom mb-3">-->
                                <!--    <span class="input-group-text bg-primary bg-opacity-10 fs-16" id="basic-addon2"><i class="mdi mdi-upload"></i></span>-->
                                <!--    <input type="file" class="form-control" id="payment_receipt" name="payment_receipt" placeholder="Payment screenshort" required>-->
                                <!-- </div>-->
                                 
                               <p style="color:#fff;"> Make the Payment for the Saree and send the Payment Proof to the what’s App no {{$setting->company_phone}} for Member ID Activation</p>

                                <div class="text-danger">
                                    @error('payment_receipt')
                                        <span>{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="text-center pt-3 deckstop">
                                    <button class="btn btn-primary w-xl waves-effect waves-light" id="submit" type="submit">Register</button>
                                </div>
                                
                            </form>
                            </div>
                        </div>
                      
                    </div>
                    <div class="card-bank details" style="">
                         <div class="bank_details">
                        <div class="img-qrcode">
                            <img src="{{ url('images/' . $setting->qr_code) }}" alt="" class="img-fluid">
                        </div>
                        <div class="bank_conatin">
                            <h5>Bank Details</h5>
                            <div class="bank_list">
                                 <p>{!! $setting->bank_details !!}<p>
                                <span> UPI :</span> {{$setting->upi}}
                         
                            <p><span>Company Name :</span> {{$setting->company_name}}</p> 
                            <p><span>Company Email :</span> {{$setting->company_email}}</p>
                            </div>
                            <!--  <div class="bank_list">-->
                            <!--<p>Company Website : {{$setting->company_website}}</p>   -->
                            <!--<p>Company Address : {{$setting->company_address}}</p>-->
                            <!--</div>-->
                            <!--  <div class="bank_list">-->
                            <!--<p>Company Phone : {{$setting->company_phone}}</p>-->
                            <!--</div>-->
                        </div>
                    </div>
                     </div>
                     <div class="text-center pt-3 mobile">
                                    <button class="btn btn-primary w-xl waves-effect waves-light" onclick="onclicksys();" id="submit" type="submit">Register</button>
                                </div>
                                
                                
                 </div>
                   <div class="mt-5 text-center">
                            <p>©
                                <script>document.write(new Date().getFullYear())</script> Right Shadow. Crafted with <i class="mdi mdi-heart text-danger"></i> by Dit Software
                            </p>
                        </div>
                </div>
            </div>
        </div>
    </div>

<div class="d-none">
     <form method="POST" enctype="multipart/form-data" action="{{ route('logincheckuser') }}" target="_blank">
        @csrf
        <input type="text" name="member_id" id="member_id_l" class="form-control" value="" placeholder="Enter username" aria-label="Username" aria-describedby="basic-addon1">
         <input type="password" name="password" class="form-control" value="" id="userpassword_l" placeholder="Enter password" aria-label="Username" aria-describedby="basic-addon1">
        <div class="contain">
            <input style="border: navajowhite; background: transparent; font-weight: 800;" id="loginbtn" type="submit" value="Access Account"/>
        </div>
      </form>      
</div>

    <!-- JAVASCRIPT -->
    <script src="{{url('admin/assets/libs/jquery/jquery.min.js')}}"></script>
    <script src="{{url('admin/assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    
    <script src="{{url('admin/assets/libs/simplebar/simplebar.min.js')}}"></script>
    <script src="{{url('admin/assets/libs/node-waves/waves.min.js')}}"></script>

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
       
       <!-- JAVASCRIPT -->
<script src="{{url('admin/assets/libs/jquery/jquery.min.js')}}"></script>
<script src="{{url('admin/assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<script src="{{url('admin/assets/libs/simplebar/simplebar.min.js')}}"></script>
<script src="{{url('admin/assets/libs/node-waves/waves.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>

<script src="{{url('admin/assets/libs/sweetalert2/sweetalert2.min.js')}}"></script>

<script src="{{url('admin/assets/js/pages/sweet-alerts.init.js')}}"></script>


<script src="{{url('admin/assets/libs/apexcharts/apexcharts.min.js')}}"></script>

<script src="{{url('admin/assets/js/pages/dashboard.init.js')}}"></script>
<script src="{{url('admin/assets/js/jquery.blockUI.js')}}"></script>


<script src="{{url('admin/assets/js/app.js')}}"></script>



    <!------------------- Test ---------------------- -->
    <script src="{{ url('table/pages/plugins/lord-icon-2.1.0.js') }}"></script>
    <script src="{{ url('table/js/plugins.js') }}"></script>
    <script src="{{ url('table/datatables/dataTables.min.js') }}"></script>
    <script src="{{ url('table/js/tableToExcel.js') }}"></script>
    <script src="{{ url('table/js/select2.init.js') }}"></script>
    <script src="{{ url('table/css/chosen/chosen.jquery.js') }}"></script>
    <script src="{{ url('table/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ url('table/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ url('table/libs/feather-icons/feather.min.js') }}"></script>
    <script src="{{ url('table/js/pages/plugins/lord-icon-2.1.0.js') }}"></script>
    <script src="{{ url('table/js/plugins.js') }}"></script>
    <script src="{{ url('table/libs/prismjs/prism.js') }}"></script>
    <script src="{{ url('table/libs/list.js/list.min.js') }}"></script>
    <script src="{{ url('table/libs/list.pagination.js/list.pagination.min.js') }}"></script>
    <script src="{{ url('table/js/pages/listjs.init.js') }}"></script>
    <script src="{{ url('table/js/app.js') }}"></script>

<script src="{{ url('admin/assets/libs/block-ui/jquery.blockUI.js') }}"></script>

<script src="{{ url('admin/assets/js/pages/jquery.blockUI.init.js') }}"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
$(document).ready(function () {
    $(document).on("submit", "#membersforms", function (event) {
        event.preventDefault();
        $("#submit").val("Please Wait..");
 //       alert("1"); // Debugging

        var formData = new FormData(this);
        formData.append('_token', '{{ csrf_token() }}');

        $.ajax({
            url: '{{ route("checkout") }}',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                $("#submit").val("Submit");
                   $("#membersforms")[0].reset();
                if (response.success === "true") {
                             var htmltemp = '<h5>Name: ' + response.name + '</h5>' +
                                            '<h5>Member ID: ' + response.meid + '</h5>' +
                                            '<h5>Password: ' + response.pwd + '</h5>' +
                                            '<span><b></b></span>';
                             var url = "{{url('icon/useraccont.png')}}";
         
                             Swal.fire({
                                 title: '<strong style="color:black;background-color:transparent !important;">Thank You For Registration</strong>',
                                 imageUrl: url,
                                 imageHeight: 150,
                                 imageAlt: "Users",
                                 html: htmltemp,
                                 focusConfirm: false,
                                 confirmButtonText: 'Login <i class="fa fa-sign-in"></i>',
                                 confirmButtonAriaLabel: "Login",
                              }).then((result) => {
                                 if (result.isConfirmed) {
                                     $("#member_id_l").val(response.meid);
                                     $("#userpassword_l").val(response.pwd);
                                     $("#loginbtn").click();
                                 }
                                 else
                                 {
                                     gotourl();
                                 }
                             });
                         } else {
                             Swal.fire({
                                 title: "Error",
                                 text: response.message || "An error occurred.",
                                 icon: "error"
                             });
                         }
            },
            error: function (xhr, status, error) {
                $("#submit").val("Submit");
                Swal.fire("Error", "An unexpected error occurred: " + error, "error");
            }
        });
    });
    
    
        $("input[type='number']").on("keydown", function (e) {
            // Block arrow up (38) and arrow down (40)
            if (e.which === 38 || e.which === 40) {
                e.preventDefault();
            }
        });
});

function checkusername() {
    var sponsor_id = $("#sponsor_id").val();
    $.ajax({
        type: "POST",
        url: '{{ route("checksponsor_id") }}',
        data: {
            sponsor_id: sponsor_id,
            _token: '{{ csrf_token() }}'
        },
        success: function(response) {
            if (response.success == "true") {
                $("#sponsor_id_name")
                    .text("Sponser Name: " + response.users)
                    .css("color", "green");
            } else {
                  Swal.fire({
                        title: "Error",
                        text: response.message || "An error occurred.",
                        icon: "error"
                    });
            }
        },
        error: function(error) {
            console.error("Error occurred:", error);
        }
    });
}

function gotourl()
{
    window.loaction.href = "{{route('front.dashboard')}}";
}
function onclicksys()
{
    $("#submit").click();
}
</script>
</body>
</html>
