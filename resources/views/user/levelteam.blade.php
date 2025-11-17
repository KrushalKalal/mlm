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
                        <h4 class="card-title">My Level Wise Income</h4>
                    </div>
                     <div class="filter-section" style="padding: 10px;">
                        <form action="{{route('LevelTeamincomesearch')}}" method="Post">
                            @csrf
                            <div class="row" style="padding:13px;">
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
                                 <div class="col-md-2 pt-3" >
                                    <button type="submit" class="btn btn-primary">Filter</button>
                                </div>
                            </div>
                           
                        </form>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive table-card mt-3 mb-1">
                            <table class="table align-middle table-nowrap" id="">
                                <thead class="table-light">
                                    <tr>
                                        <!--<th>Sr #</th>-->
                                        <th>Sr No.</th>
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
                                                $member = Auth::user()->member_id;
                                                $leve = "Level " . $sr;
                                                 $count = DB::table('membersincome')
                                                ->where('level_id', 'LIKE', $leve)
                                                ->Where('u_id', 'LIKE', Auth::user()->member_id)
                                                 ->count();
                                            @endphp
                                            {{ $count }}
                                        </td>

                                        <td>{{ $rows->bonus }}</td>
                                        <td>{{ $count * $rows->bonus }}</td>
                                        <td>
                                            <a href="{{ route('levelwaiseincomeget',['id' => Crypt::encrypt($sr),'limit' => Crypt::encrypt($count),'member' => Crypt::encrypt($member)]) }}" class="btn btn-primary">View</a>
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