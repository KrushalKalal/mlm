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
                    <h4 class="mb-sm-0">My Level Wise Team</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <!--<li class="breadcrumb-item"><a href="javascript: void(0);">Order List</a></li>-->
                            <li class="breadcrumb-item active">My Level Wise Team</li>
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
                        <h4 class="card-title">My Level Wise Income</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive table-card mt-3 mb-1">
                            <table class="table align-middle table-nowrap" id="">
                                <thead class="table-light">
                                    <tr>
                                        <!--<th>Sr #</th>-->
                                        <th>Member Id</th>
                                        <th>Member Name</th>
                                        <th>Amount</th>
                                        <th>Level</th>
                                        <!--<th>Level No</th>-->
                                        <th>Date</th>
                                     </tr>
                                </thead>
                                <tbody class="list form-check-all">
                                    <?php $i=1; ?>
                                    @foreach($user as $data)
                                        <?php
                                            $memberId = str_replace(['Level Income from ', ' | ' . $data->level_id], '', $data->remarks);
    
                                            $users = DB::table('users')->where('member_id', $memberId)->first();

                                        ?>
                                   
                                    <tr>
                                        <!--<td>{{ $i++ }}</td>-->
                                         <td><div class="contain">
                                                 <img src="{{url('icon/membericon.png')}}">
                                                 <p><b>{{$users->member_id}} </b></p>
                                            </div>
                                        </td>
                                        <td>{{$users->name}}</td>
                                        <td>Rs.{{$data->income}}</td>
                                        <td>{{$data->remarks}}</td>
                                        <!--<td>{{$data->level_id}}</td>-->
                                        <td>{{ date("d-M-y",strtotime($data->created_at)) }}</td>
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
    
   <script>
    function openmodel(id, status) {
    var member_id = id;
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
                    $.blockUI();

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
                            $.unblockUI();

                            if (response.success == "true") {
                                swalWithBootstrapButtons.fire({
                                    title: "Success",
                                    text: "User " + status_id + " successfully.",
                                    icon: "success"
                                });
                            } else {
                                swalWithBootstrapButtons.fire({
                                    title: "Error",
                                    text: response.message || "An error occurred.",
                                    icon: "error"
                                });
                            }
                        },
                        error: function (error) {
                            $.unblockUI();
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