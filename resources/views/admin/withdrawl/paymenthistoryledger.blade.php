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
                    <h4 class="mb-sm-0">Payment History</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <!--<li class="breadcrumb-item"><a href="javascript: void(0);">Order List</a></li>-->
                            <li class="breadcrumb-item active">Payment History</li>
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
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Payment History</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive table-card mt-3 mb-1">
                            <table class="table align-middle table-nowrap" id="">
                                <thead class="table-light">
                                    <tr>
                                        <th>Sr #</th>
                                        <th>Date</th>
                                        <th>Member Id</th>
                                        <th>Remarks</th>
                                        <th>Cr Amount</th>
                                        <th>Dr Amonut</th>
                                        <th>Total</th>
                                     </tr>
                                </thead>
                                <tbody class="list form-check-all">
                                    <?php $i=1; ?>
                                    @foreach($leader as $data)
                                    <tr>
                                         <td>{{ $i++ }}</td>
                                         <td>{{ date("d-M-y",strtotime($data->created_at)) }}</td>
                                        <td>{{$data->member_id}}</td>
                                        <td>{{$data->remarks}}</td>
                                        <td>Rs.{{$data->Cr }}</td>
                                        <td>Rs.{{$data->Dr }}</td>
                                        <td>Rs.{{$data->Total }}</td>
                                     </tr>
                                    @endforeach


                                </tbody>
                            </table>
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