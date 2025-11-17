@extends('admin.layout.main') 
@section('container')
<script>
    function validateForm(event) {
        const input1 = document.getElementById('c_bank_ac').value;
        const input2 = document.getElementById('bank_ac').value;
        const input3 = document.getElementById('password').value;
        const input4 = document.getElementById('c_password').value;

        if (input1 !== input2) {
            event.preventDefault(); // Prevent form submission
            Swal.fire({
            title: "Some thing Went Worng",
            text: "Your Bank Account Is Not Matched",
            icon: "error"
            });
        }

        if (input3 !== input4) {
            event.preventDefault(); // Prevent form submission
            Swal.fire({
            title: "Some thing Went Worng",
            text: "Your Password Is Not Matched",
            icon: "error"
            });
        }
    }
</script>
<div class="page-content">
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if($errors->any())
        <div class="alert alert-success">
            {{ implode('', $errors->all(':message')) }}
        </div>
    @endif
    <div class="row">
        <div class="col-xl-12">
    
            <div class="card">
                <div class="card-header card-header-bordered">
                    <h3 class="card-title">Personal Details</h3>
                    <div class="card-addon">
                        <div class="nav nav-lines card-nav" id="card1-tab">
                            {{-- <a class="nav-item nav-link " id="card1-home-tab" data-bs-toggle="tab" href="#card1-home">Personal Details</a>
                            <a class="nav-item nav-link" id="card1-profile-tab" data-bs-toggle="tab" href="#card1-profile">Contact Details</a> --}}
                            <a class="nav-item nav-link active" id="card1-kyc-tab" data-bs-toggle="tab" href="#card1-kyc">KYC Details </a>
                            <a class="nav-item nav-link " id="card1-contact-tab" data-bs-toggle="tab" href="#card1-contact">Banking Details </a>
                            {{-- <a class="nav-item nav-link" id="card1-nom-tab" data-bs-toggle="tab" href="#card1-nom">Nominee Details </a> --}}
                            <a class="nav-item nav-link" id="card1-kyc-tab" data-bs-toggle="tab" href="#card1-pass">Change Password</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                <form method="POST" enctype="multipart/form-data" action="{{ route('editprofile') }}" onsubmit="validateForm(event)">
                @csrf
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="card1-kyc">
                            <div class="d-grid gap-3">
                                  <div class="row">
                                    <div class="col-sm-4 col-lg-2">
                                        <label class="col-form-label text-sm-end">Name</label>
                                    </div>
                                    <div class="col-sm-5 col-lg-6">
                                        <input type="text" name="name_update" value="{{$user->name}}" class="form-control" id="inputmask-2" / readonly>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4 col-lg-2">
                                        <label class="col-form-label text-sm-end">Joining Date</label>
                                    </div>
                                    <div class="col-sm-5 col-lg-6">
                                       
                                        <input type="date" name="j_date" value="{{date('Y-m-d',strtotime($user->created_at))}}" class="form-control" id="inputmask-2" readonly />

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4 col-lg-2">
                                        <label class="col-form-label text-sm-end">Date of Birth</label>
                                    </div>
                                    <div class="col-sm-5 col-lg-6">
                                        <input type="date" name="d_date" value="@if($user->date_of_birth != ''){{ date('d-M-Y',strtotime($user->date_of_birth)) }}@endif" class="form-control" id="inputmask-2" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4 col-lg-2">
                                        <label class="col-form-label text-sm-end">Upi Id/Gpay NO</label>
                                    </div>
                                    <div class="col-sm-5 col-lg-6">
                                        <input type="text" name="upi" value="{{$user->upi}}" class="form-control" id="inputmask-2" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4 col-lg-2">
                                        <label class="col-form-label text-sm-end">Mobile No</label>
                                    </div>
                                    <div class="col-sm-5 col-lg-6">
                                        <input type="text" name="mobile_no" value="{{$user->mobile_no}}" class="form-control" id="inputmask-2" / readonly>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4 col-lg-2">
                                        <label class="col-form-label text-sm-end">Email</label>
                                    </div>
                                    <div class="col-sm-5 col-lg-6">
                                        <input type="text" name="email" value="{{$user->email}}" class="form-control" id="inputmask-2" / readonly>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4 col-lg-2">
                                        <label class="col-form-label text-sm-end">Address</label>
                                    </div>
                                    <div class="col-sm-5 col-lg-6">
                                        <input type="text" name="full_address" value="{{$user->full_address}}" class="form-control" id="inputmask-2" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4 col-lg-2">
                                        <label class="col-form-label text-sm-end">State</label>
                                    </div>
                                    <div class="col-sm-5 col-lg-6">
                                        <input type="text" name="state" value="{{$user->state}}" class="form-control" id="inputmask-2" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4 col-lg-2">
                                        <label class="col-form-label text-sm-end">City</label>
                                    </div>
                                    <div class="col-sm-5 col-lg-6">
                                        <input type="text" name="city" value="{{$user->city}}" class="form-control" id="inputmask-2" />
                                    </div>
                                </div>
                                {{-- <div class="row">
                                    <div class="col-sm-4 col-lg-2">
                                        <label class="col-form-label text-sm-end">Pincode</label>
                                    </div>
                                    <div class="col-sm-5 col-lg-6">
                                        <input type="text" name="district" value="{{$user->district}}" class="form-control" id="inputmask-2" />
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                         <div class="tab-pane fade" id="card1-contact">
                            <div class="d-grid gap-3">
                                <div class="row">
                                    <div class="col-sm-4 col-lg-2">
                                        <label class="col-form-label text-sm-end">Bank A/c No.</label>
                                    </div>
                                    <div class="col-sm-5 col-lg-6">
                                        <input type="number" name="bank_ac" id="bank_ac" value="{{$user->bank_ac}}" class="form-control" id="inputmask-3"/>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4 col-lg-2">
                                        <label class="col-form-label text-sm-end">Confirm Bank A/c No.</label>
                                    </div>
                                    <div class="col-sm-5 col-lg-6">
                                        <input type="number" name="c_bank_ac" id="c_bank_ac" value="{{$user->bank_ac}}" class="form-control" id="inputmask-3"/>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4 col-lg-2">
                                        <label class="col-form-label text-sm-end">Bank Name</label>
                                    </div>
                                    <div class="col-sm-5 col-lg-6">
                                        <input type="text" name="bank_name" value="{{$user->bank_name}}" class="form-control" id="inputmask-1" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4 col-lg-2">
                                        <label class="col-form-label text-sm-end">IFSC Code</label>
                                    </div>
                                    <div class="col-sm-5 col-lg-6">
                                        <input type="text" name="ifsc_code" value="{{$user->ifsc_code}}" class="form-control" id="inputmask-2"/>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4 col-lg-2">
                                        <label class="col-form-label text-sm-end">Mobile No</label>
                                    </div>
                                    <div class="col-sm-5 col-lg-6">
                                        <input type="number" name="mobile_bank" value="{{$user->mobile_no}}" class="form-control" id="inputmask-4" / readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
               
                        <div class="tab-pane fade" id="card1-pass">
                            <div class="d-grid gap-3">
                                <div class="row">
                                    <div class="col-sm-4 col-lg-2">
                                        <label class="col-form-label text-sm-end">Change Password</label>
                                    </div>
                                    <div class="col-sm-5 col-lg-6">
                                        <input type="password" id="password" name="password" value="" class="form-control" id="inputmask-1" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4 col-lg-2">
                                        <label class="col-form-label  text-sm-end">Confirm Password</label>
                                    </div>
                                    
                                    <div class="col-sm-5 col-lg-6">
                                        <input type="password" name="password_confirmation" id="c_password" value="" class="form-control" id="inputmask-1" />
                                    </div>
                                </div>
                            </div>
                        </div>
                       
                    </div>
                    @if(Auth::guard('web')->user()->role == "user")
                    <div class="row">
                        <div class="col-12"><button type="submit" class="btn btn-primary">Submit</button></div>
                    </div>
                    @endif
                </form>
                </div>
            </div>
    </div>
    </div>
</div>
@endsection