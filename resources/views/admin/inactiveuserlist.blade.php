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
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">InActive User List</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">InActive User List</a></li>
                                <li class="breadcrumb-item active">InActive User List</li>
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
                     <div class="filter-section" style="padding: 20px;">
                    <form action="{{route('inactiveusersearch')}}" method="Post">
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
                             <div class="col-md-2" style="padding: 20px;">
                                <button type="submit" class="btn btn-primary">Filter</button>
                            </div>
                        </div>
                       
                    </form>
                </div>
                    <div class="card-header">
                        <h4 class="card-title">InActive User List</h4>
                    </div>
                    
                    <div class="col-md-2" style="padding-left:20px;">
                         <a href="{{ route('inactiveuser.export') }}" class="btn btn-success btn-sm">
                            <i class="fa fa-file-excel"></i> Export to Excel
                        </a>
                    </div>
                    
                    <div class="card-body">
                                        <!--************* users *********** -->
                        <div class="table-responsive table-card mt-3 mb-1">
                            <table class="table align-middle table-nowrap" id="">
                            <thead>
                                <tr>
                                    <th>Sr.No</th>
                                    <th>Account</th>
                                    <th>Edit</th>
                                    <th>Member Id</th>
                                    <th>Name</th>
                                    <th>Sponsor Id</th>
                                    <th>Mobile No</th>
                                    <th>Downline</th>
                                    <th>Password</th>
                                    <th>Joining Date</th>
                                    <th>Paid/Unpaid</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=1; ?>
                               @foreach($user as $data)
                                   <?php
                                        $downCount = 0;
                                        $queue = [$data->member_id]; 
                                        
                                        while (!empty($queue)) {
                                            $currentSponsorId = array_shift($queue); 
                                        
                                             $downlines = App\Models\User::where("sponsor_id", $currentSponsorId)->pluck('member_id');
                                        
                                            foreach ($downlines as $downline) {
                                                $queue[] = $downline;
                                                $downCount++;
                                            }
                                        }
                                        
                                         ?>
                                         

                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td> 
                                           <form method="POST" enctype="multipart/form-data" action="{{ route('logincheckuser') }}" target="_blank">
                                            @csrf
                                            <input type="text" name="member_id" class="form-control d-none" value="{{ $data->member_id }}" placeholder="Enter username" aria-label="Username" aria-describedby="basic-addon1">
                                             <input type="password" name="password" class="form-control d-none" value="{{ $data->e_p }}" id="userpassword" placeholder="Enter password" aria-label="Username" aria-describedby="basic-addon1">
                                            <div class="contain">
                                               <img src="{{url('icon/useraccont.png')}}" ><br>
                                                <input style="border: navajowhite; background: transparent; font-weight: 800;" type="submit" value="Account"/>
                                            </div>
                                          </form>
                                       
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.profile', $data->id) }}" >
                                        <div class="contain">
                                                 <img src="{{url('icon/images.jfif')}}">
                                                 <p><b>Profile </b></p>
                                            </div>
                                        <!--<a href="" class="btn btn-sm btn-primary">-->
                                            
                                            
                                        <!--</a>-->
                                        </a>
                                        <!-- <a href="{{ route('package.edit', $data->id) }}" class="btn btn-sm btn-primary">
                                            <i class="fa fa-pen"></i>
                                        </a> --> 

                                        <!-- <form action="{{ route('package.destroy', $data->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this offers?');">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form> -->
                                    </td>
                                    <td>
                                         <div class="contain">
                                                 <img src="{{url('icon/membericon.png')}}">
                                                 <p><b>{{$data->member_id}} </b></p>
                                            </div>
                                    </td>
                                    <td>{{$data->name}}</td>
                                    <td>{{$data->sponsor_id}}</td>
                                    <td>{{$data->mobile_no}}</td>
                                    <td>
                                        @php
                                            $count = App\Models\User::where("sponsor_id", $data->member_id)->count();
                                            $lising = 0;
                                        @endphp
                                        {{ $count ?? 0 }}<br>
                                    </td>
                                    <?php
                                        $ep = DB::table('users_list')->where('member_id',$data->member_id)->first();
                                    ?>
                                    <td>{{$ep->e_p}}</td>
                                    <td>{{ date("d-M-y",strtotime($ep->created_at)) }}</td>
                                    @if($data->status == "1")
                                    <td><span class="badge badge-primary">Approved</span></td>
                                    @elseif($data->status == "2")
                                    <td><span class="badge badge-danger">Rejected</span></td>
                                    @else
                                    <td><span class="badge badge-dark">Pending</span></td>
                                    @endif
                                    <td>
                                                <button type="submit" class="btn btn-sm btn-success" title="Active User"
                                                    onclick="openmodel('{{ $data->id }}','1');">
                                                    <i class="fa fa-check"></i>
                                                </button>
                                    </td>
                                </tr>
                                @endforeach 
                            </tbody>
                        </table>
                          <div class="pagination" style="float:right;" >
                            {{ $user->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                    </div>
                            <!--************* users *********** -->
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