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
                    <h4 class="mb-sm-0">{{ $level }} </h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">{{ $level }}</a></li>
                            <!--<li class="breadcrumb-item active">Order List</li>-->
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
    @if(Auth::user()->role == "user" || $table == 1)
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{ $level }}</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive table-card mt-3 mb-1">
                            <table class="table align-middle table-nowrap" id="">
                                <thead class="table-light">
                                    <tr>
                                        <th>Sr #</th>
                                        <th>Member Id</th>
                                        <th>Name</th>
                                        <th>Mobile</th>
                                        <th>Sponsor Id</th>
                                        <th>DownLines</th>
                                        <th>DownLines Details</th>
                                     </tr>
                                </thead>
                                <tbody class="list form-check-all">
                                    <?php $i=1; ?>
                                    @foreach($user as $data)
                                    
                                  <?php
                                        $downCount = 0;
                                        $queue = [$data->member_id]; 
                                        
                                        while (!empty($queue)) {
                                            $currentSponsorId = array_shift($queue); 
                                        
                                             $downlines = App\Models\User::where('role','user')
                                                                        ->where(function ($query) use ($currentSponsorId) {
                                                                            $query->where('sponsor_id', $currentSponsorId)
                                                                                  ->orWhere('refer_id', $currentSponsorId);
                                                                        })
                                                                ->pluck('member_id');
                                             
                                        
                                            foreach ($downlines as $downline) {
                                                $queue[] = $downline;
                                                $downCount++;
                                            }
                                        }
                                        
                                         ?>

                                    
                                    <tr>
                                         <td>{{ $i++ }}</td>
                                        <td><div class="contain">
                                                 <img src="{{url('icon/membericon.png')}}">
                                                 <p><b>{{$data->member_id}} </b></p>
                                            </div>
                                        </td>
                                        <td>{{$data->name}}</td>
                                        <td>{{$data->mobile_no}}</td>
                                        <td>{{$data->sponsor_id}}</td>
                                        <td>Total Downline Members : {{$downCount}}</td>
                                        <td>
                                            @if($downCount)
                                                @if($level == "Downline")
                                                <a class="btn btn-success  waves-effect waves-light" href="{{ route('Viewdownlinememberslist', ['id' => $data->member_id]) }}" ><i class="mdi mdi-account-tie-voice"></i> View</a>
                                                @else
                                                <a class="btn btn-success  waves-effect waves-light" href="{{ route('ViewdownlinememberslistDirect', ['id' => $data->member_id]) }}" ><i class="mdi mdi-account-tie-voice"></i> View</a>
                                                @endif
                                            @endif
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
    @else
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{ $level }}</h4>
                    </div>
                    <div class="card-body">
                            @if($levelgei == 0 && Auth::user()->member_id != "SW000")
                            <div class="row">
                                <div class="col-md-12">
                                    <center>
                                        <p><b>U</b></p>
                                        <div class="contain">
                                             <img src="{{url('icon/membericon.png')}}">
                                             <p><b>{{Auth::user()->member_id}} </b></p>
                                        </div>
                                    </center>
                                </div>
                            </div>
                            <hr>
                            @php
                                $ui = 1;
                            @endphp
                                     <div class="row">
                                         @php
                                            $charIndex = 65; // ASCII value of 'A'
                                        @endphp
                                 @foreach($user as $srow)
                                        @if($ui <= 3)
                                        <div class="col-md-4">
                                            <center>
                                                 <p><b>{{ chr($charIndex) }}</b></p>
                                                <div class="contain">
                                                         <img src="{{url('icon/membericon.png')}}">
                                                         <p><b>{{ $srow->name}} </b></p>
                                                         <p><b>({{ $srow->member_id}})</b></p>
                                                         @php
                                                         $rrequest = $srow->member_id;
                                                            $tcont = APP\Models\User::where(function ($query) use ($rrequest) {
                                                                        $query->where('sponsor_id', $rrequest)
                                                                              ->orWhere('refer_id', $rrequest);
                                                                    })
                                                            ->count();
                                                         @endphp
                                                         @if($tcont)
                                                         <a class="btn btn-primary  waves-effect waves-light" href="{{ route('Viewdownlinememberslist', ['id' => $srow->member_id]) }}" >View</a>
                                                         @endif
                                                </div>
                                            </center>
                                        </div>
                                        @php
                                            ++$ui;
                                            ++$charIndex;
                                        @endphp
                                        
                                        @endif
                                @endforeach
                                    </div>
                            @else
                                @php
                                    $i = 1;
                                @endphp
                                <div class="row">
                                 @foreach($user as $srow)
                                 @if($i <= 3)
                                        <div class="col-md-4">
                                            <center>
                                                <div class="contain">
                                                         <img src="{{url('icon/membericon.png')}}">
                                                         @if($srow->status == 0)
                                                         <p style="color:red;"><b>{{ $srow->name}} </b></p>
                                                         <p style="color:red;"><b>({{ $srow->member_id}})</b></p>
                                                              @php
                                                                $member = $srow->member_id;
                                                            $tcont = APP\Models\User::where('role', 'user')
                                                                    ->where(function ($query) use ($member) {
                                                                        $query->where('sponsor_id', $member)
                                                                              ->orWhere('refer_id', $member);
                                                                    })
                                                                    ->count();
                                                         @endphp
                                                         @if($tcont)
                                                         <a class="btn btn-danger waves-effect waves-light" href="{{ route('Viewdownlinememberslist', ['id' => $srow->member_id]) }}">View</a>
                                                         @endif
                                                         @else
                                                         <p><b>{{ $srow->name}} </b></p>
                                                         <p><b>({{ $srow->member_id}})</b></p>
                                                              @php
                                                                $member = $srow->member_id;
                                                            $tcont = APP\Models\User::where('role', 'user')
                                                                    ->where(function ($query) use ($member) {
                                                                        $query->where('sponsor_id', $member)
                                                                              ->orWhere('refer_id', $member);
                                                                    })
                                                                    ->count();
                                                         @endphp
                                                         @if($tcont)
                                                         <a class="btn btn-primary waves-effect waves-light" href="{{ route('Viewdownlinememberslist', ['id' => $srow->member_id]) }}">View</a>
                                                         @endif
                                                         @endif
                                                </div>
                                            </center>
                                        </div>
                                        @php
                                            ++$i;
                                        @endphp
                                        @endif
                                @endforeach
                                    </div>
                            <hr>
                            @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
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