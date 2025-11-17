@extends('admin.layout.main')
@section('container')
        <style>
 
        .contain img {
    height: 44px;
    width: 44px;
    object-fit: cover;
}
            .contain p {
    color: #343a40;
margin-bottom:0px;}
.table>thead {
    text-align: center;
}
tbody, td, tfoot, th, thead, tr {
    text-align: center;
}
        </style>
<div class="page-content" id="pgblock">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Payout Report</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <!--<li class="breadcrumb-item"><a href="javascript: void(0);">Order List</a></li>-->
                            <li class="breadcrumb-item active">Payout Report</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
    </div>

    <div class="container-fluid">
                 <div class="row">
         
                <div class="col-xxl-12">
                       <div class="filter-section" style="padding: 10px;">
                    <form action="{{route('Payoutsearch')}}" method="Post">
                        @csrf
                        <div class="row">
                            <!-- Month Selection -->
                            <div class="col-md-5">
                                <label for="month">Select Month</label>
                                <select class="form-control" id="month" name="month">
                                    <option value="">-- Select Month --</option>
                                    @foreach(range(1, 12) as $m)
                                        <option value="{{ $m }}" {{ request('month') == $m ? 'selected' : '' }}>
                                            {{ date('F', mktime(0, 0, 0, $m, 1)) }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Year Selection -->
                            <div class="col-md-5">
                                <label for="year">Select Year</label>
                                <select class="form-control" id="year" name="year">
                                    <option value="">-- Select Year --</option>
                                    @foreach(range(date('Y'), date('Y') - 10) as $y)
                                        <option value="{{ $y }}" {{ request('year') == $y ? 'selected' : '' }}>
                                            {{ $y }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                             <div class="col-md-2" >
                                <button type="submit" class="btn btn-primary">Filter</button>
                            </div>
                        </div>
                       
                    </form>
                </div>
                </div>
            

            </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Payout Report</h4>
                    </div>
                        <div class="col-md-2">
                         <a href="{{ route('payment.export') }}" class="btn btn-success btn-sm">
                            <i class="fa fa-file-excel"></i> Export to Excel
                        </a>
                    </div>
                     <div class="card-body">
                        <div class="table-responsive table-card mt-3 mb-1">
                            <table class="table align-middle table-nowrap" id="">
                                <thead class="table-light">
                                    <tr>
                                        <th>Sr #</th>
                                        <th>Member Id</th>
                                        <th>Name</th>
                                         <th>UPI/Gpay</th>
                                        <th>Mobile</th>
                                        <!--<th>Sponsor Id</th>-->
                                        <!--<th>Total Cashback</th>-->
                                        <!--  <th>Add</th>-->
                                        <!--<th>Less</th>-->
                                        <!--<th>Total Level Income</th>-->
                                        <!--<th>Service Charges</th>-->
                                        <!--<th>TDS</th>-->
                                        <th>Final Level Income</th>
                                        <th>Total Earning</th>
                                        <th>Net Payable Amount</th>
                                        <!--<th>Payment Done</th>-->
                                        <th>Pending Amount</th>
                                        @if($auth->role == "admin")
                                        <th>Action</th>
                                        @endif
                                     </tr>
                                </thead>
                                <tbody class="list form-check-all">
                                    <?php $i=1; ?>
                                    @foreach($users as $data)
                                    @if($data->member_id != "SW000")
                                    <tr>
                                         <td>{{ $i++ }}</td>
                                        <td>
                                        <div class="contain">
                                                 <img src="{{url('icon/membericon.png')}}">
                                                 <p><b>{{$data->member_id}} </b></p>
                                            </div>
                                        </td>
                                        <td>{{$data->name}}</td>
                                        <td>
                                            {{$data->upi}}
                                        </td>
                                        <td>{{$data->mobile_no }}</td>
                                                @php
                                                  $intotal = DB::table("wallets")
                                                   ->when($start && $end, function ($query) use ($start, $end) {
                                                                return $query->whereBetween('created_at', [$start, $end]);
                                                            })
                                                   ->where("member_id", $data->member_id)->sum("total");
                                                   $intotals = $intotal ?? 0;
                                                   
                                                   
                                                 $addamount = DB::table('payoutamount')->where('Type','LIKE','Add')
                                                 ->when($start && $end, function ($query) use ($start, $end) {
                                                                    return $query->whereBetween('created_at', [$start, $end]);
                                                                })
                                                 ->where("member_id", $data->member_id)->sum("amount");
                                                 
                                                 
                                                 
                                                 
                                                 $lessamount = DB::table('payoutamount')->where('Type','LIKE','Less')
                                                                         ->when($start && $end, function ($query) use ($start, $end) {
                                                                    return $query->whereBetween('created_at', [$start, $end]);
                                                                })
                                                 ->where("member_id", $data->member_id)->sum("amount");
                                                 
                                                 
                                                 
                                                       $datasum = \App\Models\membersincome::where("member_id", $data->member_id)
                                                                                   ->when($start && $end, function ($query) use ($start, $end) {
                                                                    return $query->whereBetween('created_at', [$start, $end]);
                                                                })
                                                       ->sum("income");
                                                    $datasumget =  $datasum ?? 0;
                                                    
                                                    
                        
                                                 $datataxamount = DB::table('cashbacks')
                                                                            ->when($start && $end, function ($query) use ($start, $end) {
                                                                    return $query->whereBetween('created_at', [$start, $end]);
                                                                })
                                                 ->first();
                                                if($datasumget != 0)
                                                {
                                                    $servicetax = $datasumget*$datataxamount->service_tx/100;
                                                }
                                                else
                                                {
                                                    $servicetax = 0;
                                                }
                                             if($servicetax != 0)
                                                {
                                                    $tds = $datasumget*$datataxamount->tds/100;
                                                }
                                                else
                                                {
                                                    $tds = 0;
                                                }
                                            @endphp
                                        <td>
                                            @php
                                                $finaltotalearn =  $datasumget - ($servicetax + $tds);
                                            @endphp
                                                {{ $finaltotalearn }}
                                        </td>
                                        <td>
                                                @php
                                                    if($datasumget > $intotals)
                                                    {
                                                        $totalearn =  $datasumget - $servicetax - $tds;
                                                    }
                                                    else
                                                    {
                                                        $totalearn =  0;
                                                    }
                                                @endphp
                                                {{ $intotals  }}
                                        </td>
                                        <td>
                                            @php
                                                if($finaltotalearn > $intotals)
                                                {
                                                    $pending =  $finaltotalearn - $intotals;
                                                }
                                                else
                                                {
                                                    $pending =  $intotals;
                                                }
                                            @endphp
                                                  {{ $pending }}
                                        </td>
                                                 @php
                                                   $paydatasum = DB::table("payamount")->where("member_id", $data->id)->where("R_id", Auth::user()->member_id)->
                                                       when($start, function ($query) use ($start) {
                                                            return $query->whereMonth('created_at', $start);
                                                        })
                                                        ->when($end, function ($query) use ($end) {
                                                            return $query->whereYear('created_at', $end);
                                                        })
                                                   ->sum("amount");
                                                   $paydatasumget = $paydatasum ?? 0;
                                                @endphp
                                         <td>
                                            @php
                                                $pendingamount = $pending - $paydatasumget;
                                               
                                            @endphp
                                            {{ $pendingamount  }}
                                        </td>
                                        <td>
                                            @if($pendingamount > 0)
                                            <button class="btn btn-sm btn-primary" onclick="openmodel({{ $data->id }},{{ $pendingamount }})"><i class="fas fa-pencil-ruler"></i> Pay</button>
                                            @endif
                                        </td>
                                     
                                    </tr>
                                            @endif
                                    @endforeach


                                </tbody>
                            </table>
                             <div class="pagination" style="float:right;" >
                            {{ $users->links('pagination::bootstrap-4') }}
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
         <!-- Modal 3 -->
                <div class="modal fade" id="modal3" data-bs-backdrop="static" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header" style="background: #38c66c;color: #fff;padding:7px !important;">
                                <h5 class="modal-title" id="modal3Label" style="color: #fff;">Pay Now</h5>
                                    <i class="mdi mdi-close" data-bs-dismiss="modal" aria-label="Close"></i>
                            </div>
                            <form method="POST" enctype="multipart/form-data" id="sposeridsys">
                                @csrf
                                <div class="modal-body">
                                        <h4 class="p"></h4>
                                        <h4 class="Total"></h4>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <lable>Enter Amount</lable>
                                                <input name="Payment" type="number" id="Payment_uploading" style=" width: 100%; " class="ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-100 dark:border-gray-800 focus:ring-0" placeholder="Payment" >          
                                            </div>
                                        </div>
                                      <input name="userid" id="userid" class="d-none" placeholder="Payment" required>
                                      <input id="targetamount" class="d-none" placeholder="Payment" required>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-primary btnis" id="submit">Pay Now</button>
                                </div>
                            </form>
                            
                        </div>
                    </div>
                </div>
         <!-- addamount -->
                <div class="modal fade" id="addamountmodal" data-bs-backdrop="static" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header" style="background: #38c66c;color: #fff;padding:7px !important;">
                                <h5 class="modal-title" id="modal3Label" style="color: #fff;">Add Pay Now</h5>
                                    <i class="mdi mdi-close mdi-close_add" data-bs-dismiss="modal" aria-label="Close"></i>
                            </div>
                            <form method="POST" enctype="multipart/form-data" id="addsys">
                                @csrf
                                <div class="modal-body">
                             <!--           <h4 class="p"></h4>
                             -->           <h4 class="Total"></h4>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <lable>Enter Amount</lable>
                                                <input name="Payment" type="number" id="Payment_uploading" style=" width: 100%; " class="ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-100 dark:border-gray-800 focus:ring-0" placeholder="Payment" >          
                                            </div>
                                            <div class="col-md-12">
                                                <lable>Enter Remarks</lable><br>
                                                <textarea name="remarks" id="remarks" style="width: 100%;" class="ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-100 dark:border-gray-800 focus:ring-0" placeholder="Enter Remarks" ></textarea>
                                            </div>
                                        </div>
                                      <input name="userid" id="useridadd" class="d-none" placeholder="Payment" required>
                                      <input name="type" id="type" class="d-none" value="Add"  placeholder="Payment" required>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-primary" id="submit">Add Now</button>
                                </div>
                            </form>
                            
                        </div>
                    </div>
                </div>
         <!-- lessamount -->
                <div class="modal fade" id="lessamountmodal" data-bs-backdrop="static" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header" style="background: #38c66c;color: #fff;padding:7px !important;">
                                <h5 class="modal-title" id="modal3Label" style="color: #fff;">Less Pay Now</h5>
                                    <i class="mdi mdi-close mdi-close_less" data-bs-dismiss="modal" aria-label="Close"></i>
                            </div>
                            <form method="POST" enctype="multipart/form-data" id="lesssys">
                                @csrf
                                <div class="modal-body">
                                        <!--<h4 class="p"></h4>-->
                                        <!--<h4 class="Total"></h4>-->
                                        <div class="row">
                                          <div class="col-md-12">
                                                <lable>Enter Amount</lable>
                                                <input name="Payment" type="number" id="Payment_uploading" style=" width: 100%; " class="ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-100 dark:border-gray-800 focus:ring-0" placeholder="Payment" >          
                                            </div>
                                            <div class="col-md-12">
                                                <lable>Enter Remarks</lable><br>
                                                <textarea name="remarks" id="remarks" style="width: 100%;" class="ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-100 dark:border-gray-800 focus:ring-0" placeholder="Enter Remarks" ></textarea>
                                            </div>
                                        </div>
                                      <input name="userid" id="useridless" class="d-none" placeholder="Payment" required>
                                      <input name="type" id="type" class="d-none" value="Less" placeholder="Payment" required>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-primary " id="submit">Less Amount</button>
                                </div>
                            </form>
                            
                        </div>
                    </div>
                </div>
 <input type="submit"  data-bs-toggle="modal" data-bs-target="#modal3" id="btnquery" class="d-none">
 <input type="submit"  data-bs-toggle="modal" data-bs-target="#lessamountmodal" id="lessamount" class="d-none">
 <input type="submit"  data-bs-toggle="modal" data-bs-target="#addamountmodal" id="addamount" class="d-none">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://malsup.github.io/jquery.blockUI.js"></script>
     <script src="{{ url('admin/assets/js/pages/jquery.blockUI.init.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-oRM4UZXoWYeimV7egcAmQT4NYxN+t+UkGBUl85cHiOVu4nvvM+8NXSt75d/h8kOYHdu/nQ61u+fnrQu4WfPJWQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.blockUI/2.70/jquery.blockUI.min.js" integrity="sha512-eYSzo+20ajZMRsjxB6L7eyqo5kuXuS2+wEbbOkpaur+sA2shQameiJiWEzCIDwJqaB0a4a6tCuEvCOBHUg3Skg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.blockUI/2.70/jquery.blockUI.js" integrity="sha512-QSb5le+VXUEVEQbfljCv8vPnfSbVoBF/iE+c6MqDDqvmzqnr4KL04qdQMCm0fJvC3gCWMpoYhmvKBFqm1Z4c9A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
   <script>
  $(document).ready(function() {
         
      $('#sposeridsys').submit(function(event) {
            event.preventDefault(); 
            $("#submit").val("Please Wait..");
            
               var url = '{{ url("loder/loading.gif") }}';
               
            //   $("#blockuipage").ajaxStart($.blockUI({message: '<h1><img src="' + url +'" style="height:100px;" /> Just a moment...</h1>' }));
                var formData = $(this).serialize(); 
                    $.ajax({
                    type: 'POST',
                    url: '{{ route("payout") }}',
                    data: formData,
                    success: function (response) {
                        // ----- Geting Data ----------- 
                        //   $("#blockuipage").ajaxStop($.unblockUI());
                           $(".mdi-close").click();
                         if (response.status == "201") {
                                Swal.fire({
                                    title: "Success",
                                    text: "Payment successfully.",
                                    icon: "success"
                                });
                            setTimeout(myGreeting,5000);
                        } else {
                              Swal.fire({
                                    title: "Error",
                                    text: response.message || "An error occurred.",
                                    icon: "error"
                                });
                        }
                        // ----- Geting Data ----------- 
                    }
                });
        });
     
      $('#addsys').submit(function(event) {
            event.preventDefault(); 
            $("#submit").val("Please Wait..");
               var url = '{{ url("loder/loading.gif") }}';
            //   alert(url);
            //   $("#blockuipage").ajaxStart($.blockUI({message: '<h1><img src="' + url +'" style="height:100px;" /> Just a moment...</h1>' }));
                var formData = $(this).serialize(); 
                    $.ajax({
                    type: 'POST',
                    url: '{{ route("otherpayout") }}',
                    data: formData,
                    success: function (response) {
                        // ----- Geting Data ----------- 
                        //   $("#blockuipage").ajaxStop($.unblockUI());
                           $(".mdi-close_add").click();
                         if (response.status == "201") {
                                Swal.fire({
                                    title: "Success",
                                    text: "Payment Add successfully.",
                                    icon: "success"
                                });
                            setTimeout(myGreeting,5000);
                        } else {
                              Swal.fire({
                                    title: "Error",
                                    text: response.message || "An error occurred.",
                                    icon: "error"
                                });
                        }
                        // ----- Geting Data ----------- 
                    }
                });
        });
      $('#lesssys').submit(function(event) {
            event.preventDefault(); 
            $("#submit").val("Please Wait..");
               var url = '{{ url("loder/loading.gif") }}';
            //   $("#blockuipage").ajaxStart($.blockUI({message: '<h1><img src="' + url +'" style="height:100px;" /> Just a moment...</h1>' }));
                var formData = $(this).serialize(); 
                    $.ajax({
                    type: 'POST',
                    url: '{{ route("otherpayout") }}',
                    data: formData,
                    success: function (response) {
                        // ----- Geting Data ----------- 
                        //   $("#blockuipage").ajaxStop($.unblockUI());
                           $(".mdi-close_less").click();
                         if (response.status == "201") {
                                Swal.fire({
                                    title: "Success",
                                    text: "Done.",
                                    icon: "success"
                                });
                            setTimeout(myGreeting,5000);
                        } else {
                              Swal.fire({
                                    title: "Error",
                                    text: response.message || "An error occurred.",
                                    icon: "error"
                                });
                        }
                        // ----- Geting Data ----------- 
                    }
                });
        });
    });
  $(document).ready(function() {
         
         $('#AddPayment').on("change", function(event) {
            var tamount = parseFloat($("#targetamount").val()) || 0;
            var total = parseFloat($(this).val()) || 0; 
            var getting = tamount + total; 
            $(".p").text("Pending Amount: " + tamount + " Total Amount: " + getting);
        });
        
        $('#LessPayment').on("change", function(event) {
            var tamount = parseFloat($("#targetamount").val()) || 0;
            var total = parseFloat($("#AddPayment").val()) || 0;
            var lessa = parseFloat($(this).val()) || 0; 
            var getting = tamount + total - lessa; 
            $(".p").text("Pending Amount: " + tamount + " Total Amount: " + getting);
        });

    });
    
    function myGreeting()
    {
         location.reload();
    }
         function openmodel(id,amount) {
            var member_id = id;
            var targetamount = amount;
            $(".p").text("Pending Amount :" + targetamount);
            $("#targetamount").val(targetamount);
            $("#userid").val(member_id);
            $("#Payment_uploading").attr("max", targetamount);
            $("#btnquery").click();
            }
    
         function addamount(id) {
                var member_id = id;
                $("#useridadd").val(member_id);
                $("#addamount").click();
            }
    
         function lessamount(id) {
            var member_id = id;
            $("#useridless").val(member_id);
            $("#lessamount").click();
            }
    
    </script>
    @endsection