@extends('admin.layout.main') 
@section('container')
<div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">Website Setting</h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Website Setting</a></li>
                                    <li class="breadcrumb-item active">Website Setting</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end page title -->
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header card-header-bordered">
                                <h3 class="card-title">Website Setting</h3>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('store.website') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="d-grid gap-3">
                                        <div class="row">
                                            <div class="col-sm-4 col-lg-2">
                                                <label class="col-form-label text-sm-end">Username</label>
                                            </div>
                                            <div class="col-sm-5 col-lg-6">
                                                <input type="text" class="form-control" name="username" 
                                                    value="{{ $website->username ?? '' }}" id="inputmask-1" required />
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-sm-4 col-lg-2">
                                                <label class="col-form-label text-sm-end">Bank Details</label>
                                            </div>
                                            <div class="col-sm-5 col-lg-6">
                                                <textarea class="form-control" name="bank_details" rows="5" id="bank_details" required>
                                                    {{ $website->bank_details ?? '' }}
                                                </textarea>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4 col-lg-2">
                                                <label class="col-form-label text-sm-end">UPI Details</label>
                                            </div>
                                            <div class="col-sm-5 col-lg-6">
                                                <input type="text" class="form-control" name="upi" 
                                                    value="{{ $website->upi ?? '' }}" id="inputmask-3" required />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4 col-lg-2">
                                                <label class="col-form-label text-sm-end">QR CODE Image</label>
                                            </div>
                                            <div class="col-sm-5 col-lg-6">
                                                <input type="file" class="form-control" name="qr_code" id="inputmask-4" />
                                                <div id="qrCodePreview" style="margin-top: 10px;">
                                                    @if(isset($website->qr_code) && $website->qr_code)
                                                        <img 
                                                            src="{{ url('images/' . $website->qr_code) }}" 
                                                            alt="QR Code" 
                                                            id="qrCodeImage" 
                                                            style="max-width: 200px; height: auto;" 
                                                        />
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4 col-lg-2">
                                                <label class="col-form-label text-sm-end">Company Name</label>
                                            </div>
                                            <div class="col-sm-5 col-lg-6">
                                                <input type="text" class="form-control" name="company_name" 
                                                    value="{{ $website->company_name ?? '' }}" id="inputmask-5" required />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4 col-lg-2">
                                                <label class="col-form-label text-sm-end">Company Phone</label>
                                            </div>
                                            <div class="col-sm-5 col-lg-6">
                                                <input type="number" class="form-control" name="company_phone" 
                                                    value="{{ $website->company_phone ?? '' }}" id="inputmask-6" required />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4 col-lg-2">
                                                <label class="col-form-label text-sm-end">Company Email</label>
                                            </div>
                                            <div class="col-sm-5 col-lg-6">
                                                <input type="text" class="form-control" name="company_email" 
                                                    value="{{ $website->company_email ?? '' }}" id="inputmask-7" required />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4 col-lg-2">
                                                <label class="col-form-label text-sm-end">Company Website Link</label>
                                            </div>
                                            <div class="col-sm-5 col-lg-6">
                                                <input type="text" class="form-control" name="company_website" 
                                                    value="{{ $website->company_website ?? '' }}" id="inputmask-7" required />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4 col-lg-2">
                                                <label class="col-form-label text-sm-end">Logo</label>
                                            </div>
                                            <div class="col-sm-5 col-lg-6">
                                                <input type="file" class="form-control" name="logo" id="inputmask-7" />
                                                <div id="qrCodePreview" style="margin-top: 10px;">
                                                    @if(isset($website->logo) && $website->logo)
                                                        <img 
                                                            src="{{ url('images/' . $website->logo) }}" 
                                                            alt="Logo" 
                                                            id="qrCodeImage" 
                                                            style="max-width: 200px; height: auto;" 
                                                        />
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4 col-lg-2">
                                                <label class="col-form-label text-sm-end">Company Address</label>
                                            </div>
                                            <div class="col-sm-5 col-lg-6">
                                                <input type="text" class="form-control" name="company_address" 
                                                    value="{{ $website->company_address ?? '' }}" id="inputmask-7" required />
                                            </div>
                                        </div>
                                         <div class="row">
                                            <div class="col-sm-4 col-lg-2">
                                                <label class="col-form-label text-sm-end">Banner</label>
                                            </div>
                                            <div class="col-sm-5 col-lg-6">
                                                <input type="file" class="form-control" name="banner" id="inputmask-7" />
                                                <div id="qrCodePreview" style="margin-top: 10px;">
                                                    @if(isset($website->banner) && $website->banner)
                                                        <img 
                                                            src="{{ url('images/' . $website->banner) }}" 
                                                            alt="Logo" 
                                                            id="qrCodeImage" 
                                                            style="max-width: 200px; height: auto;" 
                                                        />
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12"><button type="submit" class="btn btn-primary">Submit</button></div>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->

            </div> <!-- container-fluid -->
        </div>
        
        <!-- CKEditor CDN -->
<script src="https://cdn.ckeditor.com/ckeditor5/35.0.1/classic/ckeditor.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        ClassicEditor
            .create(document.querySelector('#bank_details'))
            .catch(error => {
                console.error(error);
            });
    });
</script>
@endsection