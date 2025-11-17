@extends('admin.layout.main')
@section('container')

<div class="page-content" id="pgblock">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Total Income</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Total Income</a></li>
                            <li class="breadcrumb-item active">Total Income</li>
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
                        <h4 class="card-title">Total Income</h4>
                    </div>
                        <div class="filter-section" style="padding: 20px;">
                    <form action="{{route('incomesearch')}}" method="Post">
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
                    <div class="card-body">
                        <div class="table-responsive table-card mt-3 mb-1">
                            <table class="table align-middle table-nowrap" id="table">
                                <thead class="table-light">
                                    <tr>
                                        <th>Sr #</th>
                                        <th>Amount</th>
                                        <th>Level</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody class="list form-check-all">
                                    <?php $i=1; ?>
                                    @foreach($levelincome as $data)
                                    <?php
                                   
                                        $cashback = DB::table('wallets')->where('member_id',$data->member_id)->first();
                                        
                                    ?>
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>Rs{{$data->income}}</td>
                                        <td>{{$data->remarks}}</td>
                                        <td>{{ date("d-M-Y",strtotime($data->created_at))}}</td>
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
    @endsection