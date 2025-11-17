@extends('admin.layout.main') 
@section('container')


<style>
    .card.user-area img {
    height: 350px;
    width: 100%;
    object-fit: fill;
}
</style>
<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Company Manage</h4>
                    </div>
                    <div class=></div>
                    <div class="card user-area p-4">
                        <br>
                        <div class ="row">
                                <div class="col-md-4">
                                    <img src="{{ url('ourcompany/Right Shadow (1)_page-0001.jpg') }}" alt="About Us Image" class="img-fluid">
                            
                                </div>
                                   
                                <div class="col-md-4">
                                   <img src="{{ url('ourcompany/Right Shadow (1)_page-0002.jpg') }}" alt="About Us Image" class="img-fluid">
                                </div>
                                <div class="col-md-4">
                                <img src="{{ url('ourcompany/Right Shadow (1)_page-0003.jpg') }}" alt="About Us Image" class="img-fluid">
                            </div>
                        </div>
                        <br>
                        <div class ="row">
                            
                            <div class="col-md-4">
                                <img src="{{ url('ourcompany/Right Shadow (1)_page-0004.jpg') }}" alt="About Us Image" class="img-fluid">
                            </div>
                            <div class="col-md-4">
                                <img src="{{ url('ourcompany/Right Shadow (1)_page-0005.jpg') }}" alt="About Us Image" class="img-fluid">
                            </div>
                            <div class="col-md-4">
                               <img src="{{ url('ourcompany/Right Shadow (1)_page-0006.jpg') }}" alt="About Us Image" class="img-fluid">
                            </div>
                        </div>
                     
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection