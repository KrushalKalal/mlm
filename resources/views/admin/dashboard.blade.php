@extends('admin.layout.main') 
@section('container') 

<style>

.d_area .top_manus p {
    margin-bottom: 0;
    color: #fff;
}
h4.mb-0 {
    color: #fff;
}
.top_manus h4 {
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
.card-body {
    padding: 17px 8px;
    height:85px;
}
.ms-3 {
    margin-left: 1rem!important;
    width: 100%;
}
a.btn.btn-sm.btn-primary.copy_text {
    padding: 8px 10px;
}
.avatar.avatar-sm.avatar-label-info {
    background: #fff!important;
}
.avatar.avatar-sm.avatar-label-success {
    background: #fff!important;
}
.avatar-label-success {
    color: #4e7adf!important;
}
.avatar.avatar-sm.avatar-label-success {
    background: #fff!important;
        width: 100%;
    max-width: 36px;
    height: 36px;
}
.avatar.avatar-sm.avatar-label-info {
    background: #fff!important;
    width: 100%;
    max-width: 36px;
    height: 36px;
}
p.text-success.mb-1 {
    color: #fff!important;
    font-size: 14px;
    font-weight:bold;
}
p.text-info.mb-1 {
    color: #fff!important;
    font-size: 14px;
    font-weight:bold;
}
</style>
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
                                href="{{ parse_url(url()->current(), PHP_URL_SCHEME) . '://' . parse_url(url()->current(), PHP_URL_HOST) }}/public/adduser/{{$ids}}">
                                <i class="fa fa-clipboard"></i> Copy
                                Referral
                                URL</a>
                        </div>
                    </div>
                </div>
            </div>
      
            <!--    end row -->

            <div class="row">
                <div class="col-xxl-12">
                    <div class="row responsive-mobile">
                        <!-- <div class="col-xl-6">-->
                        <!--<div class="card bg-info-subtle" style="background: url('assets/images/dashboard/dashboard-shape-3.png'); background-repeat: no-repeat; background-position: bottom center; ">                               -->

                        <!--    </div>-->
                        <!--</div>-->
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
                        <!-- <div class="col-xl-6">-->
                        <!--<div class="card bg-info-subtle" style="background: url('assets/images/dashboard/dashboard-shape-3.png'); background-repeat: no-repeat; background-position: bottom center; ">                               -->

                        <!--    </div>-->
                        <!--</div>-->
                           <div class="col-xl-8 col-sm-12 ">                    
                            <div class="card-body">
                                <div class="main_add_area">
                                    <div style="padding: 0px;">
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
                        

                        </div>

                       <!-- <div class="col-xl-4">
                            <div class="card bg-info-subtle" style="background:#f4385b!important">                       
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="avatar avatar-sm avatar-label-info">
                                            <i class="mdi mdi-buffer mt-1"></i>
                                        </div>
                                        <div class="ms-3">
                                            <p class="text-info mb-1">Today's Activated Members</p>
                                            <h4 class="mb-0">{{$todayactive}}</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        
                        <div class="col-xl-4">
                            <div class="card bg-success-subtle" style="background:#17d7e2!important ">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="avatar avatar-sm avatar-label-success">
                                            <i class="mdi mdi-cash-usd-outline mt-1"></i>
                                        </div>
                                        <div class="ms-3">
                                            <p class="text-success mb-1">Today's Joined Members</p>
                                            <h4 class="mb-0">{{$newjoin}}</h4>
                                        </div>
                                    </div>
                                 </div>
                            </div>
                        </div>
                        -->
                    </div>
                    <!-- end row -->
                    <div class="row">
                         <div class="col-xl-3">
                            <div class="card bg-info-subtle" style="background:#ac1f95!important;">
                                <div class="card-body">
                                    <a href="{{route('userlist')}}">
                                    <div class="d-flex">
                                        <div class="avatar avatar-sm avatar-label-info">
                                            <i class="mdi mdi-webhook mt-1"></i>
                                        </div>
                                        <div class="ms-3">
                                            <p class="text-info mb-1">Total Users</p>
                                            <h4 class="mb-0">{{$user}}</h4>
                                        </div>
                                    </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3">
                            <div class="card bg-info-subtle" style="background:#138b57!important;  ">
                                
                                <div class="card-body">
                                       <a href="{{route('active.user')}}">
                                    <div class="d-flex">
                                         <div class="avatar avatar-sm avatar-label-info">
                                            <i class="mdi mdi-buffer mt-1"></i>
                                        </div>
                                        <div class="ms-3">
                                            <p class="text-info mb-1">Active Members</p>
                                            <h4 class="mb-0">{{$approval}}</h4>
                                        </div>
                                    </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3">
                            <div class="card bg-success-subtle" style="background:#c578a0!important">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="avatar avatar-sm avatar-label-success">
                                            <i class="mdi mdi-cash-usd-outline mt-1"></i>
                                        </div>
                                        <div class="ms-3">
                                            <p class="text-success mb-1">InActive Members</p>
                                            <h4 class="mb-0">{{$reject}}</h4>
                                        </div>
                                    </div>
                                 </div>
                            </div>
                        </div>
                        <div class="col-xl-3">
                            <div class="card bg-success-subtle" style="background:#4e890c!important;">
                                <div class="card-body">
                                     <a href="{{route('orderlist')}}">
                                    <div class="d-flex">
                                        <div class="avatar avatar-sm avatar-label-success">
                                            <i class="mdi mdi-cash-usd-outline mt-1"></i>
                                        </div>
                                        <div class="ms-3">
                                            <p class="text-success mb-1">Pending For Activation</p>
                                            <h4 class="mb-0">{{$pending}}</h4>
                                        </div>
                                    </div>
                                    </a>
                                 </div>
                            </div>
                        </div>
                        <div class="col-xl-3">
                            <div class="card bg-info-subtle" style="background:#e68536!important">
                                <div class="card-body">
                                    <a href="{{route('paymentlist')}}">
                                    <div class="d-flex">
                                        <div class="avatar avatar-sm avatar-label-info">
                                            <i class="mdi mdi-webhook mt-1"></i>
                                        </div>
                                        <div class="ms-3">
                                            <p class="text-info mb-1">Total Amount Withdrawal</p>
                                           <?php
                                            $datacount = 0;
                                            ?>
                                        
                                            <?php
                                                $count = \App\Models\membersincome::where("member_id",Auth::user()->member_id)->sum("income");
                                                $datacount += $count; 
                                            ?>
                                        
                                            <h4 class="mb-0">Rs. {{ $datacount }}</h4>

                                            
                                        </div>
                                    </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                         <div class="col-xl-3">
                              <div class="card bg-success-subtle" style="background:#ca355f!important;"> 
                              <div class="card-body">
                                   <a href="{{route('withdrawl')}}">
                                    <div class="d-flex">
                                        <div class="avatar avatar-sm avatar-label-success">
                                            <i class="mdi mdi-webhook mt-1"></i>
                                        </div>
                                        <div class="ms-3">
                                            <p class="text-success mb-1">Pending Amount withdrawal</p>
                                             <?php
                                            $datasum = 0;
                                            ?>
                                             @foreach($users as $data)
                                            <?php
                                             $count = DB::table("payamount")->where("member_id", $data->id)->where("R_id", Auth::user()->member_id)->sum("amount");
                                              $datasum += $count; // Fixed: Use += instead of =+
                                            ?>
                                            @endforeach
                                            <h4 class="mb-0">Rs. {{$datasum}}</h4>
                                            
                                        </div>
                                    </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        
                         <div class="col-xl-3">
                            <div class="card bg-info-subtle" style="background:#2b0b77!important">
                                <div class="card-body">
                                    <a href="{{route('levelwaiseincome')}}">
                                    <div class="d-flex">
                                        <div class="avatar avatar-sm avatar-label-info">
                                            <i class="mdi mdi-webhook mt-1"></i>
                                        </div>
                                        <div class="ms-3">
                                            <p class="text-info mb-1">Total Amount</p>
                                           <?php
                                            $sum = 0;
                                            ?>
                                             @foreach($users as $data)
                                            <?php
                                             $count = DB::table("packages")->where('id',$data->package_id)->first();
                                            //  dd($count);
                                             $sum += $count->mrp; // Fixed: Use += instead of =+
                                            ?>
                                            @endforeach
                                                @php
                                                $t = $datacount * 25/100;
                                                $c = $datacount - $t;
                                            @endphp
                                            <h4 class="mb-0">Rs. {{ $c }}</h4>

                                            
                                        </div>
                                    </div>
                                    </a>
                                
                                </div>
                            </div>
                        </div>
                         <div class="col-xl-3">
                              <div class="card bg-success-subtle" style="background:#ff6682!important;"> 
                              <div class="card-body">
                                   <a href="{{route('cashbacklist')}}">
                                    <div class="d-flex">
                                        <div class="avatar avatar-sm avatar-label-success">
                                            <i class="mdi mdi-webhook mt-1"></i>
                                        </div>
                                        <div class="ms-3">
                                            <p class="text-success mb-1">Total Cashback Amount</p>
                                      
                                            <h4 class="mb-0">Rs. {{$cashback}}</h4>
                                            
                                        </div>
                                    </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        
                         <div class="col-xl-3">
                            <div class="card bg-info-subtle" style="background:#1a1512!important">
                                <div class="card-body">
                                    <a href="{{route('contactlist')}}">
                                    <div class="d-flex">
                                        <div class="avatar avatar-sm avatar-label-info">
                                            <i class="mdi mdi-webhook mt-1"></i>
                                        </div>
                                        <div class="ms-3">
                                            <p class="text-info mb-1">Contact Inquery</p>
                                        </div>
                                    </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                         <div class="col-xl-3">
                              <div class="card bg-success-subtle" style="background:#cc8038!important;"> 
                              <div class="card-body">
                                   <a href="{{route('admin.support')}}">
                                    <div class="d-flex">
                                        <div class="avatar avatar-sm avatar-label-success">
                                            <i class="mdi mdi-webhook mt-1"></i>
                                        </div>
                                        <div class="ms-3">
                                            <p class="text-success mb-1">Customer Care</p>
                                        </div>
                                    </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        
                         <div class="col-xl-3">
                            <div class="card bg-info-subtle" style="background:#9b1456!important">
                                <div class="card-body">
                                    <a href="{{route('package')}}">
                                    <div class="d-flex">
                                        <div class="avatar avatar-sm avatar-label-info">
                                            <i class="mdi mdi-webhook mt-1"></i>
                                        </div>
                                        <div class="ms-3">
                                            <p class="text-info mb-1">Product Management</p>
                                        </div>
                                    </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                         <div class="col-xl-3">
                              <div class="card bg-success-subtle" style="background:#8e1b30!important;"> 
                              <div class="card-body">
                                <a href="{{route('adduser')}}">
                                    <div class="d-flex">
                                        <div class="avatar avatar-sm avatar-label-success">
                                            <i class="mdi mdi-webhook mt-1"></i>
                                        </div>
                                        <div class="ms-3">
                                            <p class="text-success mb-1">Add User</p>
                                        </div>
                                    </div>
                                </a>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
             <!-- end row -->
        </div>
    </div>
@endsection