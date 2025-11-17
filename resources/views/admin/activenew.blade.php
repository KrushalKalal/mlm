@extends('admin.layout.main')
@section('container')

<div class="page-content" id="pgblock">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Order List</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Order List</a></li>
                            <li class="breadcrumb-item active">Order List</li>
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
                        <h4 class="card-title"> User List</h4>
                    </div>
                    
                    <div class="filter-section" style="padding: 10px;">
                        <form action="{{route('orderlistsearch')}}" method="Post">
                            @csrf
                            <div class="row">
                                <!-- Month Selection -->
                                <div class="col-md-5" style="padding-left:20px;">
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
                                <div class="col-md-5" style="padding-left:20px;">
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
                    <div class="col-md-2" style="padding-left:20px;">
                         <a href="{{ route('orderlist.export') }}" class="btn btn-success btn-sm">
                            <i class="fa fa-file-excel"></i> Export to Excel
                        </a>
                    </div>
                     
                    <div class="card-body">
                        <div class="table-responsive table-card mt-3 mb-1">
                            <table class="table align-middle table-nowrap" id="table">
                                <thead class="table-light">
                                    <tr>
                                        <th>Sr #</th>
                                        <th>Joining Date</th>
                                        <!--<th>Payment Receipt</th>-->
                                        <!--<th>Package Name</th>-->
                                        <th>Name</th>
                                        <!--<th>Email</th>-->
                                        <th>Member Id</th>
                                        <!--<th>Sponsor Id</th>-->
                                        <th>Mobile No</th>
                                        <th>Status</th>
                                        
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody class="list form-check-all">
                                    <?php $i=1; ?>
                                    @foreach($order as $data)
                                    <tr>
                                        <?php
                                           if($data->package_id != null)
                                           {
                                               $pack = DB::table('packages')->where('id',$data->package_id)->first();
                                           }
                                        ?>
                                        <td>{{ $i++ }}</td>
                                        <td>{{$data->created_at}}</td>
                                        <!--<td>-->
                                        <!--    @if($data->payment_receipt)-->
                                        <!--    <img src="{{ url('images/' . $data->payment_receipt) }}"-->
                                        <!--        alt="About Us Image" height="100px" width="100px" required>-->
                                        <!--    @else-->
                                        <!--        No Image-->
                                        <!--    @endif-->
                                        <!--</td>-->
                                        <!--<td>@if(isset($pack)){{$pack->name}} @endif</td>-->
                                        <td>{{$data->name}}</td>
                                        <!--<td>{{$data->email}}</td>-->
                                        <td>{{$data->member_id}}</td>
                                        <!--<td>{{$data->sponsor_id}}</td>-->
                                        <td>{{$data->mobile_no}}</td>
                                        <td>
                                            @if($data->status == 1)
                                            <span class="badge badge-primary">Approved</span>
                                            @elseif($data->status == 2)
                                            <span class="badge badge-danger">Rejected</span>
                                            @else
                                            <span class="badge badge-dark">Pending</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($data->status < 1) <button type="submit" class="btn btn-sm btn-danger"
                                                title="Deactive User" onclick="openmodel('{{ $data->id }}','2');">
                                                <i class="fa fa-ban"></i>
                                                </button>

                                                <button type="submit" class="btn btn-sm btn-success" title="Active User"
                                                    onclick="openmodel('{{ $data->id }}','1');">
                                                    <i class="fa fa-check"></i>
                                                </button>
                                            @elseif($data->status == 1)
                                                <button type="submit" class="btn btn-sm btn-danger"
                                                    title="Deactive User" onclick="openmodel('{{ $data->id }}','2');">
                                                    <i class="fa fa-ban"></i>
                                                </button>

                                            @else
                                                <button type="submit" class="btn btn-sm btn-success" title="Active User"
                                                    onclick="openmodel('{{ $data->id }}','1');">
                                                    <i class="fa fa-check"></i>
                                                </button>
                                            @endif

                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <div class="pagination" style="float:right;" >
                                    {{ $order->links('pagination::bootstrap-4') }}
                                </div>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
   <script>
    function openmodel(id, status) {
    var member_id = id;
 //   alert(member_id)
    var getcode = status;
    var status_id = getcode == 1 ? "Active" : "Deactive";

            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: "btn btn-success",
                    cancelButton: "btn btn-danger"
                },
                buttonsStyling: false
            });

            swalWithBootstrapButtons.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this action!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes, " + status_id + " it!",
                cancelButtonText: "No, cancel!",
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    // $.blockUI();

                    var DataSend = {
                        id: id,
                        status: status,
                        _token: '{{ csrf_token() }}'
                    };

                    $.ajax({
                        url: '{{ route("user.activate") }}',
                        type: 'POST',
                        data: DataSend,
                        success: function (response) {
                            // $.unblockUI();

                            if (response.success == "true") {
                                swalWithBootstrapButtons.fire({
                                    title: "Success",
                                    text: "User " + status_id + " successfully.",
                                    icon: "success"
                                });
                                setTimeout(function(){
                                        location.reload();
                                },1500);
                            } else {
                                swalWithBootstrapButtons.fire({
                                    title: "Error",
                                    text: response.message || "An error occurred.",
                                    icon: "error"
                                });
                            }
                        },
                        error: function (error) {
                            // $.unblockUI();
                            swalWithBootstrapButtons.fire({
                                title: "Error",
                                text: "An error occurred while processing your request.",
                                icon: "error"
                            });
                            console.error(error);
                        }
                    });
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    swalWithBootstrapButtons.fire({
                        title: "Cancelled",
                        text: "No changes were made.",
                        icon: "error"
                    });
                }
            });
        }

    </script>
    @endsection