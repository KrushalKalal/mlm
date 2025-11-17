@if(Auth::user()->role == "user" && Auth::user()->status == "0")
    <script>
        window.location.href="{{ route('paymentupload') }}";
    </script>
@else

<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>Right Shadow</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Codebucks" name="author" />
     <?php
            $setting = DB::table('website_settings')->first();
        ?>
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ url('images/' . $setting->logo) }}">

    <!-- dark layout js -->
    <script src="{{url('admin/assets/js/pages/layout.js')}}"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">

    <!-- Bootstrap Css -->
    <link href="{{url('admin/assets/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{url('admin/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- simplebar css -->
    <link href="{{url('admin/assets/libs/simplebar/simplebar.min.css')}}" rel="stylesheet">
    <!-- App Css-->
    <link href="{{url('admin/assets/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />

    <link href="{{ url('table/datatables/dataTables.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('table/css/custom.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
    <style>
    .top_manus h4 {
    color: #fff;
}

    .pagination{
    width: 100% !important;
    gap: 10px !important;
    display: flex !important;
    justify-content: flex-start !important;
    align-items: center !important;
    margin: 10px !important;
    padding: 0 !important;
    }
    .paginate_button {
        margin: 0 !important;
        padding: 0 !important;
        width: max-content !important;
        display: flex !important;
        justify-content: center;
        align-items: center;
    }
    
        .dataTables_wrapper .dataTables_paginate .paginate_button.previous, .dataTables_wrapper .dataTables_paginate .paginate_button.next {

        width: 100%;

        }
        .mobile-manus-r {
    display: none;
}
a.dashbord_manus {
    padding-top: 20px!important;
}
  
            @media screen and (max-width: 991px) {
                a.dashbord_manus {
    padding-top: 65px!important;
}
.responsive-mobile {
    display: none;
}
.main_add_area {
    justify-content: start!important;
}
.mobile-manus-r {
    display: block!important;
    padding-top: 55px;
}
.page-title-box.d-flex.align-items-center.justify-content-between {
    padding-bottom: 0;
}
.card-body {
    height: auto;
}
 }    
 
  @media screen and (max-width: 767px) {
 
      #sidebar-btn {
    right: 0!important;
    }
    div#topManus p {
    text-align: end;
}
span.logo-lg img {
    height: 45px!important;
    margin-top: 0px!important;
}
.navbar-header {
     height: auto;
}
  }
  
    </style>
</head>

<body id="blockuipage">

<div id="layout-wrapper">
    @include('admin.layout.header')
    @include('admin.layout.sidebar')

    <div class="main-content">
        @yield('container')
        @include('admin.layout.footer')
    </div>

</div>

<!--<div class="custom-setting bg-primary pe-0 d-flex flex-column rounded-start">-->
<!--    <button type="button" class="btn btn-wide border-0 text-white fs-20 avatar-sm rounded-end-0" id="light-dark-mode">-->
<!--        <i class="mdi mdi-brightness-7 align-middle"></i>-->
<!--        <i class="mdi mdi-white-balance-sunny align-middle"></i>-->
<!--    </button>-->
<!--    <button type="button" class="btn btn-wide border-0 text-white fs-20 avatar-sm" data-toggle="fullscreen">-->
<!--        <i class="mdi mdi-arrow-expand-all align-middle"></i>-->
<!--    </button>-->
<!--    <button type="button" class="btn btn-wide border-0 text-white fs-16 avatar-sm" id="layout-dir-btn">-->
<!--        <span>RTL</span>-->
<!--    </button>-->
<!--</div>-->


<!-- Rightbar Sidebar -->
<div class="offcanvas offcanvas-end" id="offcanvas-rightsidabar">
    <div class="card h-100 rounded-0" data-simplebar="init">
        <div class="card-header bg-light">
            <h6 class="card-title text-uppercase">Activities</h6>
            <div class="card-addon">
                <button class="btn btn-label-danger" data-bs-dismiss="offcanvas">
                    <i class="fa fa-times"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            <div class="">
                <h3 class="card-title">Company summary</h3>
                <div class="border rounded p-2">
                    <p class="text-muted mb-2">Server Load</p>
                    <h4 class="fs-16 mb-2">489</h4>
                    <div class="progress progress-sm" style="height:4px;">
                        <div class="progress-bar bg-success" style="width: 49.4%"></div>
                    </div>
                    <p class="text-muted mb-0 mt-1">49.4% <span>Avg</span></p>
                </div>
                <div class="border rounded p-2">
                    <p class="text-muted mb-2">Members online</p>
                    <h4 class="fs-16 mb-2">3,450</h4>
                    <div class="progress progress-sm" style="height:4px;">
                        <div class="progress-bar bg-danger" style="width: 34.6%"></div>
                    </div>
                    <p class="text-muted mb-0 mt-1">34.6% <span>Avg</span></p>
                </div>
                <div class="border rounded p-2">
                    <p class="text-muted mb-2">Today's revenue</p>
                    <h4 class="fs-16 mb-2">$18,390</h4>
                    <div class="progress progress-sm" style="height:4px;">
                        <div class="progress-bar bg-warning" style="width: 20%"></div>
                    </div>
                    <p class="text-muted mb-0 mt-1">$37,578 <span>Avg</span></p>
                </div>
                <div class="border rounded p-2">
                    <p class="text-muted mb-2">Expected profit</p>
                    <h4 class="fs-16 mb-2">$23,461</h4>
                    <div class="progress progress-sm" style="height:4px;">
                        <div class="progress-bar bg-info" style="width: 60%"></div>
                    </div>
                    <p class="text-muted mb-0 mt-1">$23,461 <span>Avg</span></p>
                </div>
            </div>

            <div class="mt-4">
                <h3 class="card-title">Latest log</h3>
                <div class="timeline">
                    <div class="timeline-item">
                        <div class="timeline-pin"><i class="marker marker-dot text-primary"></i></div>
                        <div class="timeline-content">
                            <div class="d-flex justify-content-between">
                                <p class="mb-0">12 new users registered</p>
                                <span class="text-muted">Just now</span>
                            </div>
                        </div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-pin"><i class="marker marker-dot text-success"></i></div>
                        <div class="timeline-content">
                            <div class="d-flex justify-content-between">
                                <p class="mb-0">System shutdown <span class="badge badge-label-success">pending</span></p>
                                <span class="text-muted">2 mins</span>
                            </div>
                        </div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-pin"><i class="marker marker-dot text-primary"></i></div>
                        <div class="timeline-content">
                            <div class="d-flex justify-content-between">
                                <p class="mb-0">New invoice received</p>
                                <span class="text-muted">3 mins</span>
                            </div>
                        </div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-pin"><i class="marker marker-dot text-danger"></i></div>
                        <div class="timeline-content">
                            <div class="d-flex justify-content-between">
                                <p class="mb-0">New order received <span class="badge badge-label-danger">urgent</span></p>
                                <span class="text-muted">10 mins</span>
                            </div>
                        </div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-pin"><i class="marker marker-dot text-warning"></i></div>
                        <div class="timeline-content">
                            <div class="d-flex justify-content-between">
                                <p class="mb-0">Production server down</p>
                                <span class="text-muted">1 hrs</span>
                            </div>
                        </div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-pin"><i class="marker marker-dot text-info"></i></div>
                        <div class="timeline-content">
                            <div class="d-flex justify-content-between">
                                <p class="mb-0">System error <a href="#">check</a></p>
                                <span class="text-muted">2 hrs</span>
                            </div>
                        </div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-pin"><i class="marker marker-dot text-secondary"></i></div>
                        <div class="timeline-content">
                            <div class="d-flex justify-content-between">
                                <p class="mb-0">DB overloaded 80%</p>
                                <span class="text-muted">5 hrs</span>
                            </div>
                        </div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-pin"><i class="marker marker-dot text-success"></i></div>
                        <div class="timeline-content">
                            <div class="d-flex justify-content-between">
                                <p class="mb-0">Production server up</p>
                                <span class="text-muted">6 hrs</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-4">
                <h3 class="card-title">Upcoming activities</h3>
                <div class="timeline timeline-timed">
                    <div class="timeline-item">
                        <span class="timeline-time">10:00</span>
                        <div class="timeline-pin"><i class="marker marker-circle text-primary"></i></div>
                        <div class="timeline-content">
                            <div>
                                <span>Meeting with</span>
                                <div class="avatar-group ms-2">
                                    <div class="avatar avatar-circle">
                                        <img src="assets/images/users/avatar-1.png" alt="Avatar image" class="avatar-2xs" />
                                    </div>
                                    <div class="avatar avatar-circle">
                                        <img src="assets/images/users/avatar-2.png" alt="Avatar image" class="avatar-2xs" />
                                    </div>
                                    <div class="avatar avatar-circle">
                                        <img src="assets/images/users/avatar-3.png" alt="Avatar image" class="avatar-2xs" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="timeline-item">
                        <span class="timeline-time">12:45</span>
                        <div class="timeline-pin"><i class="marker marker-circle text-warning"></i></div>
                        <div class="timeline-content">
                            <p class="mb-0">Lorem ipsum dolor sit amit,consectetur eiusmdd tempor incididunt ut labore et dolore magna elit enim at minim veniam quis nostrud</p>
                        </div>
                    </div>
                    <div class="timeline-item">
                        <span class="timeline-time">14:00</span>
                        <div class="timeline-pin"><i class="marker marker-circle text-danger"></i></div>
                        <div class="timeline-content">
                            <p class="mb-0">Received a new feedback on <a href="#">GoFinance</a> App product.</p>
                        </div>
                    </div>
                    <div class="timeline-item">
                        <span class="timeline-time">15:20</span>
                        <div class="timeline-pin"><i class="marker marker-circle text-success"></i></div>
                        <div class="timeline-content">
                            <p class="mb-0">Lorem ipsum dolor sit amit,consectetur eiusmdd tempor incididunt ut labore et dolore magna.</p>
                        </div>
                    </div>
                    <div class="timeline-item">
                        <span class="timeline-time">17:00</span>
                        <div class="timeline-pin"><i class="marker marker-circle text-info"></i></div>
                        <div class="timeline-content">
                            <p class="mb-0">Make Deposit <a href="#">USD 700</a> o ESL.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- end card-->
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/list.js/2.3.1/list.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<!-- JAVASCRIPT -->
<script src="{{url('admin/assets/libs/jquery/jquery.min.js')}}"></script>
<script src="{{url('admin/assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{url('admin/assets/libs/metismenu/metisMenu.min.js')}}"></script>
<script src="{{url('admin/assets/libs/simplebar/simplebar.min.js')}}"></script>
<script src="{{url('admin/assets/libs/node-waves/waves.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
<!-- Sweet Alerts js -->
<script src="{{url('admin/assets/libs/sweetalert2/sweetalert2.min.js')}}"></script>

<!-- Sweet alert init js-->
<script src="{{url('admin/assets/js/pages/sweet-alerts.init.js')}}"></script>


<!-- apexcharts -->
<script src="{{url('admin/assets/libs/apexcharts/apexcharts.min.js')}}"></script>

<script src="{{url('admin/assets/js/pages/dashboard.init.js')}}"></script>
<script src="{{url('admin/assets/js/jquery.blockUI.js')}}"></script>

<!-- App js -->
    <script src="{{url('admin/assets/js/app.js')}}"></script>
   <!------------------- Test ---------------------- -->
    <script src="https://myrightshadow.com/public/table/pages/plugins/lord-icon-2.1.0.js"></script>
    <script src="https://myrightshadow.com/public/table/js/plugins.js"></script>
    <script src="https://myrightshadow.com/public/table/datatables/dataTables.min.js"></script>
    <script src="https://myrightshadow.com/public/table/js/tableToExcel.js"></script>
    <script src="https://myrightshadow.com/public/table/js/select2.init.js"></script>
    <script src="https://myrightshadow.com/public/table/css/chosen/chosen.jquery.js"></script>
    <script src="https://myrightshadow.com/public/table/libs/simplebar/simplebar.min.js"></script>
    <script src="https://myrightshadow.com/public/table/libs/node-waves/waves.min.js"></script>
    <script src="https://myrightshadow.com/public/table/libs/feather-icons/feather.min.js"></script>
    <script src="https://myrightshadow.com/public/table/js/pages/plugins/lord-icon-2.1.0.js"></script>
    <script src="https://myrightshadow.com/public/table/js/plugins.js"></script>
    <script src="https://myrightshadow.com/public/table/libs/prismjs/prism.js"></script>
    <script src="https://myrightshadow.com/public/table/libs/list.js/list.min.js"></script>
    <script src="https://myrightshadow.com/public/table/libs/list.pagination.js/list.pagination.min.js"></script>
    <script src="https://myrightshadow.com/public/table/js/pages/listjs.init.js"></script>
    <script src="https://myrightshadow.com/public/table/js/app.js"></script>

    <!-- blockUI -->
    <script src="https://myrightshadow.com/public/admin/urls/libs/block-ui/jquery.blockUI.js"></script>

    <!-- blockUI init -->
    <script src="https://myrightshadow.com/public/admin/assets/js/pages/jquery.blockUI.init.js"></script>

    <script>
        $(document).ready(function() {

            "use strict"; // Start of use strict

            $('#dataTableExample1').DataTable({
                "dom": "<'row'<'col-sm-6'l><'col-sm-6'f>>t<'row'<'col-sm-6'i><'col-sm-6'p>>",
                "lengthMenu": [
                    [6, 25, 50, -1],
                    [6, 25, 50, "All"]
                ],
                "iDisplayLength": 6
            });

            $(".table").DataTable({
                dom: "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>tp",
                "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],
                buttons: [{
                        extend: 'copy',
                        className: 'btn-sm'
                    }, {
                        extend: 'csv',
                        title: 'ExampleFile',
                        className: 'btn-sm'
                    }, {
                        extend: 'excel',
                        title: 'ExampleFile',
                        className: 'btn-sm'
                    }, {
                        extend: 'pdf',
                        title: 'ExampleFile',
                        className: 'btn-sm'
                    }, {
                        extend: 'print',
                        className: 'btn-sm'
                    }]
              });



            // get current URL path and assign 'active' class
            var pathname = window.location.href;
            console.log("Url" + pathname);
            var filename = pathname.substring(pathname.lastIndexOf('/') + 1);
            // alert(filename);
            var active = 'active';
            var collapse = 'nav nav-second-level collapse in';
            $('.nav > li > a[href="' + filename + '"]').parent().addClass('active');
            $('.nav > ul > li > a[href="' + filename + '"]').parent().addClass('active');
            $('li[class="' + active + '"]').parent().addClass('collapse in');
            $('.nav > ul[class="' + collapse + '"]').parent().addClass('active');

        });
    </script>
    <script>
        let button = document.querySelector("#ExcleDownload");

        button.addEventListener("click", e => {
            let table = document.querySelector("#customerTable");
            TableToExcel.convert(table);
        });
        
    function deletedata() {
    const swalConfig = Swal.mixin({
        customClass: {
            confirmButton: "btn btn-success",
            cancelButton: "btn btn-danger"
        },
        buttonsStyling: false
    });

    swalConfig.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this action!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Yes",
        cancelButtonText: "No, cancel!",
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            swalConfig.fire({
                title: "Are you REALLY sure?",
                text: "This action is irreversible!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes!",
                cancelButtonText: "No, cancel!",
                reverseButtons: true
            }).then((finalResult) => {
                if (finalResult.isConfirmed) {
                    const loaderUrl = '{{ url("loder/loading.gif") }}';
                    $("#blockuipage").ajaxStart($.blockUI({
                        message: `<h1><img src="${loaderUrl}" style="height:100px;" /> Just a moment...</h1>`
                    }));

                    $.ajax({
                        url: '{{ route("deletedata") }}',
                        type: 'POST',
                        data: {
                            "_token": "{{ csrf_token() }}",
                        },
                        success: function (response) {
                            $.unblockUI();

                            if (response.success === "true") {
                                swalConfig.fire({
                                    title: "Success",
                                    text: "All data deleted successfully.",
                                    icon: "success"
                                });
                                setTimeout(() => {
                                    location.reload();
                                }, 1500);
                            } else {
                                swalConfig.fire({
                                    title: "Error",
                                    text: response.message || "An error occurred.",
                                    icon: "error"
                                });
                            }
                        },
                        error: function (error) {
                            $.unblockUI();
                            swalConfig.fire({
                                title: "Error",
                                text: "An error occurred while processing your request.",
                                icon: "error"
                            });
                            console.error(error); // Log error during development
                        }
                    });
                } else if (finalResult.dismiss === Swal.DismissReason.cancel) {
                    swalConfig.fire({
                        title: "Cancelled",
                        text: "No changes were made.",
                        icon: "error"
                    });
                }
            });
        } else if (result.dismiss === Swal.DismissReason.cancel) {
            swalConfig.fire({
                title: "Cancelled",
                text: "No changes were made.",
                icon: "error"
            });
        }
    });
}


    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.15.9/dist/sweetalert2.all.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.15.9/dist/sweetalert2.min.css" rel="stylesheet">
<script>
    $(document).ready(function() {
        $('.copy_text').click(function(e) {
            e.preventDefault();
            var copyText = $(this).attr('href');

            document.addEventListener('copy', function(e) {
                e.clipboardData.setData('text/plain', copyText);
                e.preventDefault();
            }, true);

            document.execCommand('copy');
            console.log('copied text : ', copyText);
            Swal.fire({
                title: "Success",
                text: "Referral Copy successfully.",
                icon: "success"
            });
        });
        
        
            $("input[type='number']").on("keydown", function (e) {
        // Block arrow up (38) and arrow down (40)
        if (e.which === 38 || e.which === 40) {
            e.preventDefault();
        }
    });
    });
    function copylink()
    {
             var copyText = $(".copy_text").attr('href');

            document.addEventListener('copy', function(e) {
                e.clipboardData.setData('text/plain', copyText);
                e.preventDefault();
            }, true);

            document.execCommand('copy');
            console.log('copied text : ', copyText);
            Swal.fire({
                title: "Success",
                text: "Referral Copy successfully.",
                icon: "success"
            });
    }

</script>


</body>
</html>
@endif