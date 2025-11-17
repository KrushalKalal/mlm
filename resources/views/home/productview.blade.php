@extends('home.layout.main') 
@section('container')
<!-- Start Hero -->
  <?php
            $setting = DB::table('website_settings')->first();
        ?>
        
                <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

<style>
input#submit {
    width: 100%;
}
.feather.feather-mail.w-4.h-4.absolute.start-4 i {
    top: 12px!important;
    position: absolute;
    color: #130505;
    font-weight: 600;
}
.bank_conatin p {
    font-size: 14px;
    line-height: 20px;
    color: #000;
    /*text-transform: capitalize;*/
}
button.swal2-confirm.swal2-styled {
    background: red;
}
input#payment_receipt {
    width: 100%;
    max-width: 100%;
    padding: 3px 10px 3px 48px!important;
}
button.swal2-cancel.swal2-styled {
    background: red;
}
    .bank_details img.img-fluid {
    width: 100%;
    height: 403px!important;
    margin: 0 auto;
    }
    label.form-label.font-medium {
    font-size: 12px;
    line-height: 14px;
    color: #715555;
}
    .gap-5 {
    gap:0!important;
}

.bank_conatin h5 {
    color: #000!important;
    text-align: left;
    margin-top: 10px;
    margin-bottom: 0px;
    font-size: 18px;
}
.mobile {
    display: none;
}
@media (max-width: 767px){
.mobile {
    display: block;
}
.deckstop {
    display: none;
}
  .container.relative {

        padding: 0px 2px;
    }

}
</style>
        <section class="relative table w-full items-center py-36 bg-top bg-no-repeat bg-cover" style="background-image: url('{{ url('images/' . $setting->banner) }}');">
            <div class="absolute inset-0 bg-gradient-to-b from-slate-900/60 via-slate-900/80 to-slate-900"></div>
            <div class="container relative">
                <div class="grid grid-cols-1 pb-8 text-center mt-10">
                    <h3 class="text-3xl leading-normal tracking-wider font-semibold text-white">MY RIGHT SHADOW</h3>
                </div>
            </div>
            
            <div class="absolute text-center z-10 bottom-5 start-0 end-0 mx-3">
                <ul class="tracking-[0.5px] mb-0 inline-block">
                    <li class="inline-block uppercase text-[13px] font-bold duration-500 ease-in-out text-white/50 hover:text-white"><a href="#">Register Form</a></li>
                </ul>
            </div>
        </section>
        @if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
  <?php
            $setting = DB::table('website_settings')->first();
?>
        <section class="relative lg:pb-24 pb-16 md:mt-[84px] mt-[70px]">
            <div class="container relative ">
                <div class="md:flex">
                    <div class="lg:w-3/4 md:w-2/3 md:px-3 mt-6 md:mt-0">
                        <div class="p-6 rounded-md shadow dark:shadow-gray-800 bg-white dark:bg-slate-900">
                            <h5 class="text-lg font-semibold mb-4">Personal Detail :</h5>
                            <form method="POST" enctype="multipart/form-data" id="sposeridsys">
                            @csrf
                                <input type="hidden" name="package_id" value="{{$product->id}}">
                                <div class="grid lg:grid-cols-2 grid-cols-1 gap-5">

                                    <div>
                                        <label class="form-label font-medium">Full Name : <span class="text-red-600">*</span></label>
                                        <div class="form-icon relative mt-2">
                                             <div class="feather feather-mail w-4 h-4 absolute  start-4"><i class="fa fa-user"></i></div>
                                            <input type="text" class="ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-100 dark:border-gray-800 focus:ring-0" placeholder="First Name:" id="firstname" name="name" required>
                                        </div>
                                    </div>
                                        <!--<label class="form-label font-medium">Full Name : <span class="text-red-600">*</span></label>-->
                                        <!--<div class="form-icon relative mt-2">-->
                                        <!--    <i data-feather="user" class="w-4 h-4 absolute top-3 start-4"></i>-->
                                        <!--    <input type="text" class="ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-100 dark:border-gray-800 focus:ring-0" placeholder="First Name:" id="firstname" name="name" required>-->
                                        <!--</div>-->
                                    <div>
                                        <label class="form-label font-medium">Sponser Id: <span class="text-red-600">*</span></label>
                                        <div class="form-icon relative mt-2">
                                            <div class="feather feather-mail w-4 h-4 absolute  start-4"><i class="fa fa-id-badge"></i></div>
                                            <input type="text" class="ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-100 dark:border-gray-800 focus:ring-0" placeholder="Sponser Id" id="sponsor_id" onchange="checkusername();" name="sponsor_id" required>
                                            <span id="sponsor_id_name"></span>
                                        </div>
                                    </div>

                                    <div>
                                        <label class="form-label font-medium">Sponser Name:</label>
                                        <div class="form-icon relative mt-2">
                                            <div class="feather feather-mail w-4 h-4 absolute  start-4"><i class="fa fa-users"></i></div>
                                            <input type="text" id="sponsor_name" style="background: red;" class="ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-100 dark:border-gray-800 focus:ring-0" placeholder="Sponsor Name" name="sponser" readonly >
                                        </div>
                                    </div>

                                    <div>
                                        <label class="form-label font-medium">Phone : <span class="text-red-600">*</span></label>
                                        <div class="form-icon relative mt-2">
                                            <div class="feather feather-mail w-4 h-4 absolute  start-4"><i class="fas fa-phone"></i></div>
                                            <input name="mobile_no" id="mobile_no" type="text" class="ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-100 dark:border-gray-800 focus:ring-0" placeholder="Phone :" required>
                                        </div>
                                    </div>

                                    <div>
                                        <label class="form-label font-medium">Confirm Phone : <span class="text-red-600">*</span></label>
                                        <div class="form-icon relative mt-2">
                                            <div class="feather feather-mail w-4 h-4 absolute  start-4"> <i class="fas fa-phone"></i></div>
                                            <input name="confirm_phone" id="confirm_phone" type="text" class="ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-100 dark:border-gray-800 focus:ring-0" placeholder="Phone :" required>
                                        </div>
                                    </div>
                                   
                                    <div>
                                        <label class="form-label font-medium">Password: <span class="text-red-600">*</span></label>
                                        <div class="form-icon relative mt-2">
                                         <div class="feather feather-mail w-4 h-4 absolute  start-4">  <i class="fa fa-lock"></i></div>
                                                <input name="password" id="password" type="password" 
                                                class="ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-100 dark:border-gray-800 focus:ring-0" 
                                                placeholder="Enter Password" required>
                                        </div>
                                    </div>

                                    <div>
                                        <label class="form-label font-medium">Confirm Password: <span class="text-red-600">*</span></label>
                                        <div class="form-icon relative mt-2">
                                          <div class="feather feather-mail w-4 h-4 absolute  start-4"> <i class="fa fa-check"></i></div>
                                            <input name="password_confirmation" id="password_confirmation" type="password" 
                                                class="ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-100 dark:border-gray-800 focus:ring-0" 
                                                placeholder="Confirm Password" required>
                                        </div>
                                    </div>
                                     <div>
                                        <label class="form-label font-medium">Email address :</label>
                                        <div class="form-icon relative mt-2">
                                            <div class="feather feather-mail w-4 h-4 absolute  start-4"><i class="fa fa-envelope"></i></div>
                                            <input type="email" class="ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-100 dark:border-gray-800 focus:ring-0" placeholder="Email" id="email" name="email">
                                        </div>
                                    </div>
                                     </div>
                                    <div>
                                        <label class="form-label font-medium">Product Name : </label>
                                        <div class="form-icon relative mt-2">
                                           <div class="feather feather-mail w-4 h-4 absolute start-4"> <i class="fa fa-tag"></i></div>
                                            <input type="text" value="{{$product->name}}" name="product name" id="payment_receipt" type="file" class="ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-100 dark:border-gray-800 focus:ring-0"  readonly>
                                        </div>
                                    </div>
                                    <br>
                                     <p>Make the Payment for the Saree and send the Payment Proof to the what’s App no {{$setting->company_phone}} for Member ID Activation</p>
                               

                                    <!--<div>-->
                                    <!--    <label class="form-label font-medium">Upload Payment Screen Slip : (send payment slip to whatsapp {{$setting->company_phone}})</label>-->
                                        
                                    <!--    <div class="form-icon relative mt-2">-->
                                    <!--        <div class="feather feather-mail w-4 h-4 absolute start-4">-->
                                    <!--             <i class="fa fa-folder-open"></i>-->
                                    <!--        </div>-->
                                           
                                    <!--        <input type="file" name="payment_receipt" id="payment_receipt" type="file" class="ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-100 dark:border-gray-800 focus:ring-0"  required>-->
                                    <!--    </div>-->
                                    <!--</div>-->

<div class="deckstop">
                                    <input type="submit" id="submit" name="send" class="py-2 px-5 inline-block font-semibold tracking-wide align-middle duration-500 text-base text-center bg-red-500 text-white rounded-md mt-5 " value="Register">

</div>
                            </form>
                        </div>

                    </div>
                    <div class="bank_details">
                        <div class="img-qrcode">
                            <img src="{{ url('images/' . $setting->qr_code) }}" alt="" class="img-fluid">
                        </div>
                        <div class="bank_conatin">
                            <h5>Bank Details</h5>
                            <p>{!! $setting->bank_details !!}<p>
                                <br>
                            <p>UPI : {{$setting->upi}}</p>
                            <p>Company Name : {{$setting->company_name}}</p> 
                            <p>Company Email : {{$setting->company_email}}</p>  
                            <p>Company Website : {{$setting->company_website}}</p>   
                            <p>Company Address : {{$setting->company_address}}</p>
                            <p>Company Phone : {{$setting->company_phone}}</p>
                            
                        </div>
                    </div>
                    <div class="mobile">
             <input type="submit" id="submit" name="send" class="py-2 px-5 inline-block font-semibold tracking-wide align-middle duration-500 text-base text-center bg-red-500 text-white rounded-md mt-5" value="Save Changes">

                    </div>
                </div><!--end grid-->
            </div><!--end container-->
        </section><!--end section-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

<!--<div class="d-none">
     <form method="POST" enctype="multipart/form-data" action="{{ route('logincheckuser') }}" target="_blank">
        @csrf
        <input type="text" name="member_id" id="member_id_l" class="form-control" value="" placeholder="Enter username" aria-label="Username" aria-describedby="basic-addon1">
         <input type="password" name="password" class="form-control" value="" id="userpassword_l" placeholder="Enter password" aria-label="Username" aria-describedby="basic-addon1">
        <div class="contain">
            <input style="border: navajowhite; background: transparent; font-weight: 800;" id="loginbtn" type="submit" value="Access Account"/>
        </div>
      </form>      
</div>-->

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>

$(document).ready(function() {
    // ---------- Submit ----------- 
    $('#sposeridsys').submit(function(event) {
        event.preventDefault(); // Prevent the default form submission
        
        $("#submit").val("Please Wait..");

        // Create a FormData object to include files and other form fields
        var formData = new FormData(this);

        // Ensure the file is attached
        // var payment_receipt = document.getElementById('payment_receipt');
        // if (payment_receipt.files.length > 0) {
        //     formData.append("payment_receipt", payment_receipt.files[0]);
        // }

        $.ajax({
            url: '{{ route("checkout") }}',
            type: 'POST',
            data: formData,
            processData: false, // Prevent jQuery from processing the data
            contentType: false, // Let the server handle the content type
            success: function(response) {
               if (response.success === "true") 
               {
                    var htmltemp = '<h5>Name: ' + response.name + '</h5>' +
                                   '<h5>Member ID: ' + response.meid + '</h5>' +
                                   '<h5>Password: ' + response.pwd + '</h5>' +
                                   '<span><b></b></span>';
                    var url = "{{url('icon/useraccont.png')}}";

                    Swal.fire({
                        title: '<strong style="fontcolor:black;background-color:transparent !important;">Thank You For Registration</strong>',
                        imageUrl: url,
                        imageHeight: 150,
                        imageAlt: "Users",
                        html: htmltemp,
                        showCloseButton: true,
                        showCancelButton: true,
                        focusConfirm: false,
                        confirmButtonText: 'Login <i class="fa fa-sign-in"></i>',
                        confirmButtonAriaLabel: "Login",
                        cancelButtonText: 'OK',
                        cancelButtonAriaLabel: "Cancel"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $("#member_id_l").val(response.meid);
                            $("#userpassword_l").val(response.pwd);
                            $("#loginbtn").click();
                        }
                 
                    });
                } 
                else 
                {
                    Swal.fire({
                        title: "Error",
                        text: response.message || "An error occurred.",
                        icon: "error"
                    });
                }
            },
            error: function(xhr) {
                // ----- Handle Errors ----------- 
                alert('An error occurred: ' + xhr.responseText);
                $("#submit").val("Submit");
            }
        });
    });
    // ---------- Submit ----------- 
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
                    
                     $("#sponsor_name").val(response.users);
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

</script>

@endsection