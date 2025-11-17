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
                    <h4 class="mb-sm-0">My Level</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <!--<li class="breadcrumb-item"><a href="javascript: void(0);">Order List</a></li>-->
                            <li class="breadcrumb-item active">My Level</li>
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
                        <h4 class="card-title">My Level Wise Incomes</h4>
                      
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            Member ID :<h5 class="card-title">{{$member}}</h5><br>
                        </div>
                 
                    </div>
                 
                    <div class="">
                    @php
                     $user = App\Models\User::where('member_id',$member)->first();
                    @endphp
                        Member Name :<h5 class="card-title" >{{$user->name}}</h5>

                    </div>
                    
                    <div class="card-body">
                        <div class="table-responsive table-card mt-3 mb-1">
                            <table class="table align-middle table-nowrap" id="">
                                <thead class="table-light">
                                    <tr>
                                        <!--<th>Sr #</th>-->
                                        <th>Level</th>
                                        <th>Members</th>
                                        <th>Total Entry</th>
                                        <th>Income</th>
                                        <th>Total Income</th>
                                        <th>Action</th>
                                     </tr>
                                </thead>
                                <tbody class="list form-check-all">
                                    @php
                                        $sr = 0;
                                        $last = 1;
                                    @endphp
                                       @foreach($levels as $rows)
                                  <tr>
                                        <td>{{ ++$sr }}</td>
                                        <td>
                                            @php
                                                $tit = 3 * $last;
                                                $last = $tit;
                                            @endphp
                                            {{ $tit }}
                                        </td>
                                        <td>
                                            @php
                                                $leve = "Level " . $sr;
                                                $rrequest = $member;
                                                $count = DB::table('membersincome')
                                                            ->where('level_id', 'LIKE', $leve)
                                                               ->where('member_id', 'LIKE',$rrequest)
                                                            ->count(); 
                                            @endphp
                                            {{ $count }}
                                        </td>

                                        <td>{{ $rows->bonus }}</td>
                                        <td>{{ $count * $rows->bonus }}</td>
                                        <td>
                                            <a href="{{ route('levelwaiseincomeget',['id' => Crypt::encrypt($sr),'limit' => Crypt::encrypt($count),'member' => Crypt::encrypt($rrequest)]) }}" class="btn btn-primary">View</a>
                                        </td>
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