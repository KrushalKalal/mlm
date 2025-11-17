@extends('admin.layout.main') 
@section('container') 

<style>
.sidebar-left {
    background: #022f5d;
}
.navbar-header {
    background: #022f5d;
}
.navbar-logo-box {
    background: #022f5d;
}
.card-body {
    padding: 17px 8px;
    height: 85px;
}
.d_area p {
    margin-bottom: 0;
    color: #fff;
}
.d_area h4 {
    color: #fff;
}
.top_manus h4 {
    color: #fff;
}
h4.mb-0 {
    color: #fff;
}
.d-flex {
    display: -webkit-box!important;
    display: -ms-flexbox!important;
    display: flex!important;
    align-items: center;
}
.d_area .avatar.avatar-sm.avatar-label-info {
    width: 100%;
    max-width: 54px;
    height: 54px;
    border-radius: 50%;
}
.ms-3.link-area {
    justify-content: end;
    display: flex;
    width: 100%;
    height: 54px;
    max-width: 54px;
    border-radius: 50%;
}
.ms-3.link-area a {
    border-radius: 50%;
    height: 54px;
    width: 100%;
    font-size: 28px;
    line-height: 41px;
    padding:9px;
}
.main_add_area {
    align-items: center;
    display: flex;
    justify-content: space-between;
        width: 100%;

}
.d_area {
    align-items: center;
    display: flex;
    width: 100%;
    column-gap:13px;
}

/*end*/
    .avatar.avatar-sm.avatar-label-info {
    background: #fff!important;
}
.avatar.avatar-sm.avatar-label-success {
    background: #fff!important;
}
.avatar-label-success {
    color: #4e7adf!important;
}
p.text-success.mb-1 {
    color: #fff!important;
    font-size: 14px;
    font-weight:bold;
}
p.text-info.mb-1 {
    color: #fff!important;
    font-size: 19px;
    font-weight: bold;
    line-height: 22px;
}</style>
    <div class="page-content">
        <div class="container-fluid">
                  <div class="row">
                <div class="col-md-6">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div>
                    </div>
                </div>
           
                
                <div class="col-md-6 d-none">
                    <div class="page-title-box d-flex align-items-center justify-content-end">
                        <div class="page-title-right">
                            <?php
                                $ids = Auth::user()->member_id;
                            ?>
                            <a class="btn btn-sm btn-primary copy_text" data-toggle="tooltip" title="Copy to Clipboard"
                                href="{{ parse_url(url()->current(), PHP_URL_SCHEME) . '://' . parse_url(url()->current(), PHP_URL_HOST) }}/rightshadow/public/adduser/{{$ids}}">
                                <i class="fa fa-clipboard"></i> Copy
                                Referral
                                URL</a>

                        </div>
                    </div>
                </div>
            </div>
      
            <div class="row responsive-mobile">
                <div class="col-xl-4 col-sm-12">
                            <div class="card bg-info-subtle" onclick="copylink();" style="background:#102260!important">                       
                                <div class="card-body">
                                    <div class="main_add_area">
                   
                        <div class="d_area">
                             <div class="avatar avatar-sm avatar-label-info"  style="padding: 10px;">
                                           <i class="fa fa-user" aria-hidden="true"></i>
                                           
                             </div>
                            <?php
                               $currentHour = date('H');  
                               
                                if ($currentHour >= 5 && $currentHour < 12) {
                                    $greeting = "Good Morning";
                                } elseif ($currentHour >= 12 && $currentHour < 17) {
                                    $greeting = "Good Afternoon";
                                } else {
                                    $greeting = "Good Evening";
                                }
                        
                            
                            ?>
                            <div class="top_manus">
                                <h4>Send Link</h4>
                            </div>
                        </div>
                          <div class="ms-3 link-area">
                                <a class="btn btn-sm btn-primary copy_text" data-toggle="tooltip" title="Copy to Clipboard"
                                    href="{{ parse_url(url()->current(), PHP_URL_SCHEME) . '://' . parse_url(url()->current(), PHP_URL_HOST) }}/public/adduser/{{$ids}}">
                                   <i class="fa fa-link" aria-hidden="true"></i> </a>
                        </div>
                      
                    </div>
               
            </div>
           </div>
           </div>
            <div class="col-xl-8 col-sm-12 responsive-mobile">                    
                            <div class="card-body">
                                <div class="main_add_area">
                                    <div style="padding: 10px;">
                                    </div>
                                     
                                    <div class="top_manus">
                                        <p style="margin-top: -52px; font-weight: bold;">
                                            Date : {{ \Carbon\Carbon::now()->format('d M Y') }}
                                        </p>
                                        <?php
                                            $setting = DB::table('website_settings')->first();
                                        ?>
                                        <img src="{{ url('images/' . $setting->logo) }}" alt="Avatar image" width="100" height="80" />
                                        
                                        <!-- Display Current Date -->
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
           </div>
            <div class="row mobile-manus-r">
                            <div class="col-xl-8 col-sm-12">                    
                            <div class="card-body">
                                <div class="main_add_area">
                                    <div style="padding: 10px;">
                                    </div>
                                     
                                    <div class="top_manus">
                                        <p style="margin-top: -52px; font-weight: bold;">
                                            Date : {{ \Carbon\Carbon::now()->format('d M Y') }}
                                        </p>
                                        <?php
                                            $setting = DB::table('website_settings')->first();
                                        ?>
                                        <img src="{{ url('images/' . $setting->logo) }}" alt="Avatar image" width="100" height="80" />
                                        
                                        <!-- Display Current Date -->
                                       
                                    </div>
                                </div>
                            </div>
                        </div>

                <div class="col-xl-4 col-sm-12">
                            <div class="card bg-info-subtle" style="background:#102260!important">                       
                                <div class="card-body">
                                    <div class="main_add_area">
                   
                        <div class="d_area">
                             <div class="avatar avatar-sm avatar-label-info"  style="padding: 10px;">
                                           <i class="fa fa-user" aria-hidden="true"></i>
                                           
                             </div>
                            <?php
                               $currentHour = date('H');  
                               
                                if ($currentHour >= 5 && $currentHour < 12) {
                                    $greeting = "Good Morning";
                                } elseif ($currentHour >= 12 && $currentHour < 17) {
                                    $greeting = "Good Afternoon";
                                } else {
                                    $greeting = "Good Evening";
                                }
                        
                            
                            ?>
                            <div class="top_manus">
                                <h4>Send Link</h4>
                            </div>
                        </div>
                          <div class="ms-3 link-area">
                                <a class="btn btn-sm btn-primary copy_text" data-toggle="tooltip" title="Copy to Clipboard"
                                    href="{{ parse_url(url()->current(), PHP_URL_SCHEME) . '://' . parse_url(url()->current(), PHP_URL_HOST) }}/public/adduser/{{$ids}}">
                                   <i class="fa fa-link" aria-hidden="true"></i> </a>
                        </div>
                      
                    </div>
               
            </div>
           </div>
           </div>
           </div>
            <div class="row">
                <div class="col-xxl-12">
                    <div class="row">
                         <div class="col-xl-4">
                            <div class="card bg-info-subtle" style="background:#f4385b!important">
                                <div class="card-body">
                                    <a href="{{route('direct_team')}}">
                                    <div class="d-flex">
                                        <div class="avatar avatar-sm avatar-label-info">
                                            <i class="mdi mdi-webhook mt-1"></i>
                                        </div>
                                        <div class="ms-3">
                                            <p class="text-info mb-1">Direct ID</p>
                                            <h4 class="mb-0">{{$directteam}}</h4>
                                        </div>
                                    </div>
                                   </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="card bg-info-subtle" style="background:#17d7e2!important ">
                                <div class="card-body">
                                    <a href="{{route('levet.team')}}">
                                    <div class="d-flex">
                                        <div class="avatar avatar-sm avatar-label-info">
                                            <i class="mdi mdi-webhook mt-1"></i>
                                        </div>
                                        <div class="ms-3">
                                            <p class="text-info mb-1">Indirect ID</p>
                                            <h4 class="mb-0">{{ $downCount }}</h4>
                                        </div>
                                    </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="card bg-info-subtle" style="background:#ac1f95!important; ">
                                <div class="card-body">
                                     <a href="{{route('levet.team')}}">
                                    <div class="d-flex">
                                        <div class="avatar avatar-sm avatar-label-info">
                                            <i class="mdi mdi-webhook mt-1"></i>
                                        </div>
                                        <div class="ms-3">
                                            <p class="text-info mb-1">Total Id</p>
                                            <h4 class="mb-0">{{$downCount + $totalteam}}</h4>
                                        </div>
                                    </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="card bg-info-subtle" style="background: #e68536!important ">
                                <div class="card-body">
                                    <a href="{{route('user.income')}}">
                                    <div class="d-flex">
                                        <div class="avatar avatar-sm avatar-label-info">
                                            <i class="mdi mdi-webhook mt-1"></i>
                                        </div>
                                        <div class="ms-3">
                                            <p class="text-info mb-1">Level Income</p>
                                            <h4 class="mb-0">Rs.{{$levelincome}}</h4>
                                        </div>
                                    </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                         <div class="col-xl-4">
                            <div class="card bg-info-subtle" style="background:#6135ca!important ">
                                <div class="card-body">
                                    <a href="{{route('user.ledger')}}">
                                    <div class="d-flex">
                                        <div class="avatar avatar-sm avatar-label-info">
                                            <i class="mdi mdi-webhook mt-1"></i>
                                        </div>
                                        <div class="ms-3">
                                            <p class="text-info mb-1">Total Income</p>
                                            <h4 class="mb-0">Rs.{{$totalincome}}</h4>
                                        </div>
                                    </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                         <div class="col-xl-4">
                            <div class="card bg-info-subtle" style="background:#ca355f!important;">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="avatar avatar-sm avatar-label-info">
                                            <i class="mdi mdi-webhook mt-1"></i>
                                        </div>
                                        <div class="ms-3">
                                            <p class="text-info mb-1">Cashback</p>
                                            <h4 class="mb-0">Rs.{{$wallet}}</h4>
                                        </div>
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                         
                       
                       
                        <div class="col-xl-3">
                            <div class="card bg-info-subtle" style="background:#ac1f95!important; ">
                                <div class="card-body">
                                    <a href="{{route('front.profile')}}">
                                    <div class="d-flex">
                                        <div class="avatar avatar-sm avatar-label-info">
                                            <i class="mdi mdi-webhook mt-1"></i>
                                        </div>
                                        <div class="ms-3">
                                            <p class="text-info mb-1">Profile</p>
                                        </div>
                                    </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                         <div class="col-xl-3">
                            <div class="card bg-info-subtle" style="background:#031429!important;">
                                <div class="card-body">
                                    <a href="{{route('user.product')}}">
                                    <div class="d-flex">
                                        <div class="avatar avatar-sm avatar-label-info">
                                            <i class="mdi mdi-webhook mt-1"></i>
                                        </div>
                                        <div class="ms-3">
                                            <p class="text-info mb-1">Product</p>
                                        </div>
                                    </div>
                                    </a>
                                   
                                </div>
                            </div>
                        </div>
                         <div class="col-xl-3">
                            <div class="card bg-info-subtle" style="background: #16ce2d!important ">
                                <div class="card-body">
                                    <a href="{{route('user.orderlist')}}">
                                    <div class="d-flex">
                                        <div class="avatar avatar-sm avatar-label-info">
                                            <i class="mdi mdi-webhook mt-1"></i>
                                        </div>
                                        <div class="ms-3">
                                            <p class="text-info mb-1">Receipt</p>
                                        </div>
                                    </div> 
                                   </a>
                                </div>
                            </div>
                        </div>
                       
                        <div class="col-xl-3">
                            <div class="card bg-info-subtle" style="background:#35cac2!important ">
                                <div class="card-body">
                                    <a href="{{route('user.adduser')}}">
                                    <div class="d-flex">
                                        <div class="avatar avatar-sm avatar-label-info">
                                            <i class="mdi mdi-webhook mt-1"></i>
                                        </div>
                                        <div class="ms-3">
                                            <p class="text-info mb-1">Add User</p>
                                        </div>
                                    </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
@endsection