
<style>
    span.logo-lg img {
    height: 74px;
    margin-top: 19px;
}
.logo .logo-sm img {
    height: 54px;
}
.sidebar-collpsed .navbar-logo-box {
    padding: 0px;
}
.sidebar-left {
    background: #0a5d02;
}
/*new-css-start-saidbar*/
#sidebar-menu ul li a i {
    color: #fff!important;
}
#sidebar-menu ul li a {
    color: #fff;
}
#sidebar-menu ul li:hover a {
    color: #fff;
}
.navbar-logo-box {
    background: #0a5d02;
}
.navbar-header {
    background: #0a5d02;
}
div#topManus p {
    color: #fff;
    margin-bottom:0px!important;
}
/*end*/
</style>

<div class="sidebar-left">
    <div data-simplebar class="h-100">
        <div id="sidebar-menu">
            <?php
                $user = Auth::guard('web')->user();    
            ?>
            <ul class="left-menu list-unstyled" id="side-menu">
                @if($user->role == "user")
                    <li>
                        <a href="{{route('front.dashboard')}}" class="dashbord_manus">
                            <i class="fas fa-desktop"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('front.welcome')}}" class="">
                            <i class="fas fa-desktop"></i>
                            <span>Welcome Letter</span>
                        </a>
                    </li>
                    
                    <li>
                        <a href="{{route('front.profile')}}" class="">
                            <i class="fas fa-desktop"></i>
                            <span>Profile</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('front.company')}}" class="">
                            <i class="fas fa-desktop"></i>
                            <span>Our Company</span>
                        </a>
                    </li>
                        <li><a href="{{route('user.product')}}"><i class="fa fa-th-list"></i> <span>Product</span></a></li>
                    <li>
                        <a href="{{route('user.orderlist')}}" class="">
                            <i class="fas fa-desktop"></i>
                            <span>Receipt</span>
                        </a>
                    </li>
                    
                    <li><a href="{{route('user.adduser')}}" target="_blank"><i class="fa fa-th-list"></i> <span>Add User</span></a></li>
                     
                    <li>
                        <a href="javascript: void(0);" class="has-arrow ">
                            <i class="fa fa-shapes"></i>
                            <span>Team Details</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="{{route('direct_team')}}"><i class="mdi mdi-checkbox-blank-circle align-middle"></i> Direct Team</a></li>
                            <li><a href="{{route('levet.team')}}"><i class="mdi mdi-checkbox-blank-circle align-middle"></i> Team Member</a></li>
                            <!--<li><a href="{{route('user.tree')}}"><i class="mdi mdi-checkbox-blank-circle align-middle"></i> Tree View</a></li>-->
                            <!--<li><a href="{{route('user.completeteam')}}"><i class="mdi mdi-checkbox-blank-circle align-middle"></i>My Complete Team</a></li>-->
                        </ul>
                    </li>
                    <!--<li>-->
                    <!--    <a href="{{route('front.package')}}" class="">-->
                    <!--        <i class="fas fa-desktop"></i>-->
                    <!--        <span>My Package</span>-->
                    <!--    </a>-->
                    <!--</li>-->
                    
                    <!--<li>-->
                    <!--    <a href="{{route('user.withdrawl')}}" class="">-->
                    <!--        <i class="fas fa-pencil-ruler"></i>-->
                    <!--        <span>Withdrawl & Income</span>-->
                    <!--    </a>-->
                    <!--</li>-->
                        <li>
                        <a href="javascript: void(0);" class="has-arrow ">
                            <i class="fa fa-shapes"></i>
                            <span>Payment</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="{{route('user.income')}}"><i class="mdi mdi-checkbox-blank-circle align-middle"></i>Total Income</a></li>
                            <li><a href="{{route('levet.teamincome')}}"><i class="mdi mdi-checkbox-blank-circle align-middle"></i>Level Income</a></li>
                            <!--<li><a href="{{route('user.tree')}}"><i class="mdi mdi-checkbox-blank-circle align-middle"></i> Tree View</a></li>-->
                            <!--<li><a href="{{route('user.completeteam')}}"><i class="mdi mdi-checkbox-blank-circle align-middle"></i>My Complete Team</a></li>-->
                        </ul>
                    </li>
                     <li><a href="{{route('cashbacklist')}}"><i class="fa fa-th-list"></i> <span>Cashback</span></a></li>
                     
                    <li>
                        <a href="{{route('user.ledger')}}" class="">
                            <i class="fas fa-pencil-ruler"></i>
                            <span>My Wallet</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('user.support')}}" class="">
                            <i class="fas fa-desktop"></i>
                            <span>Custmore Care</span>
                        </a>
                    </li>
                    <!--<li>-->
                    <!--    <a href="#" class="">-->
                    <!--        <i class="fas fa-pencil-ruler"></i>-->
                    <!--        <span>My Wallet</span>-->
                    <!--    </a>-->
                    <!--</li>-->
                     <li>
                        <a href="{{route('user.logout')}}" class="">
                            <i class="fas fa-pencil-ruler"></i>
                            <span>Logout</span>
                        </a>
                    </li>
                @else
                <li>
                    <a href="{{route('admin.dashboard')}}" class="">
                        <i class="fas fa-desktop"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li><a href="{{route('tearms')}}"><i class="fa fa-th-list"></i> <span>Terms & Conditions</span></a></li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow ">
                        <i class="fa fa-palette"></i>
                        <span>Setting</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('level.setting')}}"><i class="mdi mdi-checkbox-blank-circle align-middle"></i>Level Setting</a></li>
                        <li><a href="{{route('website.setting')}}"><i class="mdi mdi-checkbox-blank-circle align-middle"></i> Website Setting</a></li>
                        <!--<li><a href="{{route('level.news')}}"><i class="mdi mdi-checkbox-blank-circle align-middle"></i> Letest News</a></li>-->
                        <!--<li><a href="{{route('level.offer')}}"><i class="mdi mdi-checkbox-blank-circle align-middle"></i> Letest Offers</a></li>-->
                        <li><a href="{{route('level.slider')}}"><i class="mdi mdi-checkbox-blank-circle align-middle"></i> Slider</a></li>
                        <li><a href="{{route('level.testimonial')}}"><i class="mdi mdi-checkbox-blank-circle align-middle"></i> Testimonial</a></li>
                        <li><a href="{{route('level.about')}}"><i class="mdi mdi-checkbox-blank-circle align-middle"></i> About</a></li>
                    </ul>
                </li>
                 <li>
                    <a href="{{route('package')}}" class="has-arrow">
                        <i class="fa fa-icons"></i>
                        <span>Our Company</span>
                    </a>
                    <!--<ul class="sub-menu" aria-expanded="false">-->
                    <!--    <li><a href="{{route('category')}}"><i class="mdi mdi-checkbox-blank-circle align-middle"></i> Product Category</a></li>-->
                    <!--    <li><a href="{{route('package')}}"><i class="mdi mdi-checkbox-blank-circle align-middle"></i> Add Product</a></li>-->
                    <!--</ul>-->
                </li>
                <li><a href="{{route('adduser')}}" target="_blank"><i class="fa fa-th-list"></i> <span>Add User</span></a></li>
                <li><a href="{{route('orderlist')}}"><i class="fa fa-th-list"></i> <span>Id Activate</span></a></li>
               
                <!--
                <li>
                    <a href="javascript: void(0);" class="has-arrow ">
                        <i class="fa fa-window-restore"></i>
                        <span>E-Pin Manage</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="ui-card-base.html"><i class="mdi mdi-checkbox-blank-circle align-middle"></i> Request E-Pin</a></li>
                        <li><a href="ui-card-draggable.html"><i class="mdi mdi-checkbox-blank-circle align-middle"></i> Create E-Pin</a></li>
                        <li><a href="ui-card-tab.html"><i class="mdi mdi-checkbox-blank-circle align-middle"></i> Delete E-Pin</a></li>
                        <li><a href="ui-card-tool.html"><i class="mdi mdi-checkbox-blank-circle align-middle"></i> Transfer E-Pin</a></li>
                        <li><a href="ui-card-tool.html"><i class="mdi mdi-checkbox-blank-circle align-middle"></i>E-Pin History</a></li>
                    </ul>
                </li>
            -->
                <li>
                    <a href="javascript: void(0);" class="has-arrow ">
                        <i class="fa fa-shapes"></i>
                        <span>User Details</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('userlist')}}"><i class="mdi mdi-checkbox-blank-circle align-middle"></i> All User</a></li>
                        <li><a href="{{route('inactive.user')}}"><i class="mdi mdi-checkbox-blank-circle align-middle"></i> InActive User</a></li>
                        <li><a href="{{route('active.user')}}"><i class="mdi mdi-checkbox-blank-circle align-middle"></i> Active User</a></li>
                          <li><a href="{{route('Viewdownline')}}"><i class="mdi mdi-checkbox-blank-circle"></i> View Downline(Tree View)</a></li>
                        <!--<li><a href="{{route('DirectUsers')}}"><i class="mdi mdi-checkbox-blank-circle"></i> Direct Users</a></li>-->
                        
                       
                    </ul>
                </li>

                <!--<li>-->
                <!--    <a href="javascript: void(0);" class="has-arrow "><i class="fa fa-chart-pie align-middle"></i> <span>Users Downline</span></a>-->
                <!--    <ul class="sub-menu" aria-expanded="false">-->
                      
                <!--    </ul>-->
                <!--</li>-->
               

                <!--<li>-->
                <!--    <a href="#!" class="has-arrow"><i class="fa fa-fill-drip"></i> <span>Members Income</span></a>-->
                    
                <!--    <ul class="sub-menu" aria-expanded="false">-->
                     
                <!--            <li><a href="{{ route('levelwaiseincome') }}"><i class="mdi mdi-checkbox-blank-circle align-middle"></i>Level Income</a></li>-->
                <!--     </ul>-->
                <!--</li>-->
                    <li><a href="{{route('levelwaiseincome')}}"><i class="fa fa-fill-drip"></i> <span>Level Income</span></a></li>
                <li><a href="{{route('cashbacklist')}}"><i class="fa fa-th-list"></i> <span>Cashback Master</span></a></li>

                <!--<li>-->
                <!--    <a href="#!" class="has-arrow"><i class="fa fa-pencil-ruler"></i> <span>Withdrawl</span></a>-->
                <!--    <ul class="sub-menu" aria-expanded="false">-->
                <!--        <li><a href="form-basic-editors.html"><i class="mdi mdi-checkbox-blank-circle align-middle"></i> Complate Withdrawls</a></li>-->
                <!--        <li><a href="form-bubble-editors.html"><i class="mdi mdi-checkbox-blank-circle align-middle"></i> Pending Withdrawls</a></li>-->
                <!--        <li><a href="form-complex-editors.html"><i class="mdi mdi-checkbox-blank-circle align-middle"></i>Rejected Withdrawls</a></li>-->
                <!--    </ul>-->
                <!--</li>-->
                
                <li>
                    <a href="javascript: void(0);" class="has-arrow ">
                        <i class="fa fa-shapes"></i>
                        <span>Reports</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('withdrawl')}}"><i class="fas fa-pencil-ruler"></i> Payout income</a></li>
                        <li><a href="{{route('paymentlist')}}"><i class="fas fa-pencil-ruler"></i> Paid List</a></li>
                        <li><a href="{{route('Payoutreports')}}"><i class="fas fa-pencil-ruler"></i> Payout Reports</a></li>
                    </ul>
                </li>
                 
                 <li><a href="{{route('contactlist')}}"><i class="fa fa-th-list"></i> <span>Contact Inquiry</span></a></li>
                <li><a href="{{route('admin.support')}}"><i class="fa fa-th-list"></i> <span>Customer Care</span></a></li>
             
                 <li>
                        <a onclick="deletedata();" class="">
                            <i class="fas fa-pencil-ruler"></i>
                            <span>Clear Data</span>
                        </a>
                    </li>
                <li>
                    <a href="{{route('admin.logout')}}" class="">
                        <i class="fas fa-pencil-ruler"></i>
                        <span>Logout</span>
                    </a>
                </li>
               @endif
            </ul>
        </div>
    </div>
</div>