@extends('admin.layout.main')
@section('container')

<div class="page-content" id="pgblock">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Wallet</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Wallet</a></li>
                            <li class="breadcrumb-item active">Wallet</li>
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
             <?php
             $us = Auth::user()->member_id;
             
            $mem = DB::table('users')->where('member_id',$us)->first();
                             
             ?>
             <p>Member ID  {{$us}} </p>
             <p>Member Name : {{$mem->name}} </p>
             
             
                <div class="col-xxl-12">
                       <div class="filter-section" style="padding: 10px;">
                    <form action="{{route('ledgersearch')}}" method="Post">
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
                <br>
                    <div class="row">
           
                         <div class="col-xl-6">
                            <div class="card bg-info-subtle" style="background:#ca355f!important;">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="avatar avatar-sm avatar-label-white">
                                            <i class="mdi mdi-webhook mt-1"></i>
                                        </div>
                                        <div class="ms-3">
                                            <p class="text-white mb-1">Total Sales</p>
                                            <h4 class="mb-0 text-white">Rs.{{$credit}}</h4>
                                        </div>
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                        
                       
                       
                        <div class="col-xl-6">
                            <div class="card bg-info-subtle" style="background:#ac1f95!important; ">
                                <div class="card-body">
                                    <a href="{{route('front.profile')}}">
                                    <div class="d-flex">
                                        <div class="avatar avatar-sm avatar-label-white">
                                            <i class="mdi mdi-webhook mt-1"></i>
                                        </div>
                                        <div class="ms-3">
                                            <p class="text-white mb-1">Amount Received</p>
                                             <h4 class="mb-0 text-white">Rs.{{$debit}}</h4>
                                        </div>
                                    </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                      
                    </div>
                </div>
            

            </div>
        <!--<div class="row">-->
        <!--    <div class="col-12">-->
        <!--        <div class="card">-->
        <!--            <div class="card-header">-->
        <!--                <h4 class="card-title"> Ledger List</h4>-->
        <!--            </div>-->
        <!--            <div class="card-body">-->
        <!--                <div class="table-responsive table-card mt-3 mb-1">-->
        <!--                    <table class="table align-middle table-nowrap" id="table">-->
        <!--                        <thead class="table-light">-->
        <!--                            <tr>-->
        <!--                                <th>Sr #</th>-->
        <!--                                <th>Date</th>-->
        <!--                                <th>Remarks</th>-->
        <!--                                <th>Cr</th>-->
        <!--                                <th>Dr</th>-->
        <!--                                <th>Total</th>-->
        <!--                            </tr>-->
        <!--                        </thead>-->
        <!--                        <tbody class="list form-check-all">-->
        <!--                            <?php $i=1; ?>-->
        <!--                            @foreach($data as $row)-->
        <!--                            <tr>-->
        <!--                                <td>{{ $i++ }}</td>-->
        <!--                                <td>{{ date("d-M-y",strtotime($row->created_at))}}</td>-->
        <!--                                <td>{{$row->remarks}}</td>-->
        <!--                                <td>{{$row->Cr}}</td>-->
        <!--                                <td>{{$row->Dr}}</td>-->
        <!--                                <td>{{$row->Total}}</td>-->
        <!--                            </tr>-->
        <!--                            @endforeach-->
        <!--                        </tbody>-->
        <!--                    </table>-->
        <!--                </div>-->
        <!--            </div>-->
        <!--        </div>-->
        <!--    </div>-->
        <!--</div>-->
    </div>
    @endsection