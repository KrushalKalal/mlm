@extends('admin.layout.main') 
@section('container')
<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
<style>
.cke_notification_warning{
    display: none;
}

menu, ol, ul {
    list-style: disc!important;
}
</style>
<div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">Terms & Condition</h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Terms & Condition</a></li>
                                    <li class="breadcrumb-item active">Terms & Condition</li>
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
                                <h3 class="card-title">Terms & Condition</h3>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('store.tearms') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="d-grid gap-3">
                                       
                                        <div class="row">
                                            <div class="col-sm-2 col-lg-2">
                                                <label class="col-form-label text-sm-end">Details</label>
                                            </div>
                                            <div class="col-sm-7 col-lg-6">
                                              
                                                 <textarea name="details" id="details">{{$website->details}}</textarea>   
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
        
        <script>
    CKEDITOR.replace('details');    
</script>
@endsection