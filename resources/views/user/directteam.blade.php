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
                    <h4 class="mb-sm-0">Direct Team</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Direct Team</a></li>
                            <li class="breadcrumb-item active">Direct Team</li>
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
                        <h4 class="card-title"> Direct Team</h4>
                    </div>
                    <div class="filter-section" style="padding: 10px;">
                    <form action="{{route('DirectTeamsearch')}}" method="Post">
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
                            <table class="table align-middle table-nowrap" id="table">
                                <thead class="table-light">
                                    <tr>
                                        <th>Sr #</th>
                                        <th>Member Id</th>
                                        <th>Name</th>
                                        <th>Sponsor Id</th>
                                        <th>Mobile No</th>
                                        <th>Date Of joining</th>
                                        <th>Packge Amount</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody class="list form-check-all">
                                    <?php $i=1; ?>
                                    @foreach($order->where('status','>',0) as $data)
                                    <tr>
                                        <?php
                                           if($data->package_id != null)
                                           {
                                               $pack = DB::table('packages')->where('id',$data->package_id)->first();
                                           }
                                        ?>
                                        <td>{{ $i++ }}</td>
                                         <td><div class="contain">
                                                 <img src="{{url('icon/membericon.png')}}">
                                                 <p><b>{{$data->member_id}} </b></p>
                                            </div>
                                        </td>
                                        <td>{{$data->name}}</td>
                                        <td>{{ $data->sponsor_id }}</td>
                                        <td>{{ $data->confirm_phone }}</td>
                                         <?php
                                        $ep = DB::table('users_list')->where('member_id',$data->member_id)->first();
                                    ?>
                                        <td>{{ date("d-M-Y",strtotime($ep->created_at))}}</td>
                                        <td>Rs.{{$pack->mrp}}</td>
                                        <td>
                                            @if($data->status == 1)
                                            <span class="badge badge-primary">Approved</span>
                                            @elseif($data->status == 2)
                                            <span class="badge badge-danger">Rejected</span>
                                            @else
                                            <span class="badge badge-dark">Pending</span>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                             <div class="pagination" style="float:right;" >
                            {{ $order->links('pagination::bootstrap-4') }}
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection