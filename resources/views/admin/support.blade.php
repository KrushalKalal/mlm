@extends('admin.layout.main') 
@section('container')

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Support</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Support</a></li>
                            <li class="breadcrumb-item active">Support</li>
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
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header card-header-bordered">
                        <h3 class="card-title">Support</h3>
                    </div>
                    <div class="card-body">
                        @if(isset($new))
                        <form method="POST" enctype="multipart/form-data" action="{{ route('admin.support.update', $new->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="d-grid gap-3">
                                <div class="col-sm-4 col-lg-2">
                                    <label class="col-form-label text-sm-end">Answer</label>
                                </div>
                                <div class="col-sm-5 col-lg-6">
                                    <textarea class="form-control" name="answer" rows="5" required>
                                        {{ $new->answer ?? '' }}
                                    </textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12"><button type="submit" class="btn btn-primary">Submit</button></div>
                            </div>
                        @endif  
                   
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Support</h4>
                    </div>
                      <div class="col-md-2" style="padding-left:20px;">
                         <a href="{{ route('support.export') }}" class="btn btn-success btn-sm">
                            <i class="fa fa-file-excel"></i> Export to Excel
                        </a>
                    </div>
                    <div class="card-body">
                        <table id="datatable-fixedheader" class="table table-hover table-bordered table-striped dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Member id</th>
                                    <th>Member Name</th>
                                    <th>Phone No</th>
                                    <th>Email</th>
                                    <!--<th>Title</th>-->
                                    <th>Subject</th>
                                    <!--<th>Question</th>-->
                                    <th>Answer</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            @if($news->count() > 0)
                            <tbody>
                                <?php $i=1; ?>
                                @foreach($news as $data)
                                <tr>
                                    <?php
                                        $mem = DB::table('users')->where('member_id',$data->member_id)->first();
                                    ?>
                                    <td>{{ $i++ }}</td>
                                    <td>@if($mem != null) {{$mem->member_id}} @endif</td>
                                    <td>@if($mem != null) {{$mem->name}} @endif</td>
                                    <td>@if($mem != null) {{$mem->mobile_no}} @endif</td>
                                    <td>@if($mem != null) {{$mem->email}} @endif</td>
                                    <!--<td>{{$data->title}}</td>-->
                                    <td>{{$data->subject}}</td>
                                    <!--<td>{{$data->question}}</td>-->
                                    <td>{{$data->answer}}</td>
                                    <td class="edit-btn">
                                        <a href="{{ route('admin.support.edit', $data->id) }}" class="btn btn-sm btn-primary">
                                            <i class="fa fa-pen"></i>
                                        </a>
                                        <form action="{{ route('admin.support.destroy', $data->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this?');">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach 
                            </tbody>
                            @else
                                <tr><td>No Data Found</td></tr>
                            @endif
                        </table>
                        <div class="pagination" style="float:right;" >
                            {{ $news->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection