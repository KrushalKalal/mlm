@extends('admin.layout.main') 
@section('container')

<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">News</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">News Setting</a></li>
                            <li class="breadcrumb-item active">News Setting</li>
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
                        <h3 class="card-title">News Setting</h3>
                    </div>
                    <div class="card-body">
                    @if(isset($new))
                    <form method="POST" enctype="multipart/form-data" action="{{ route('news.update', $new->id) }}">
                        @csrf
                        @method('PUT')
                    @else
                    <form method="POST" enctype="multipart/form-data" action="{{ route('store.news') }}">
                        @csrf
                    @endif  
                        <div class="d-grid gap-3">
                            <div class="row">
                                <div class="col-sm-4 col-lg-2">
                                    <label class="col-form-label text-sm-end">News</label>
                                </div>
                                <div class="col-sm-5 col-lg-6">
                                    <textarea class="form-control" name="news" rows="5" required>
                                        {{ $new->news ?? '' }}
                                    </textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4 col-lg-2">
                                        <label class="col-form-label text-sm-end">Date</label>
                                    </div>
                                    <div class="col-sm-5 col-lg-6">
                                        <input type="date" class="form-control" name="date" 
                                            value="{{ isset($new->date) ? $new->date : '' }}" id="inputmask-3" required />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12"><button type="submit" class="btn btn-primary">Submit</button></div>
                                </div>
                            </div>
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
                        <h4 class="card-title">News Setting</h4>
                    </div>
                    <div class="card-body">
                        <table id="datatable-fixedheader" class="table table-hover table-bordered table-striped dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>News</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            @if($news->count() > 0)
                            <tbody>
                                <?php $i=1; ?>
                                @foreach($news as $data)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{$data->news}}</td>
                                    <td>{{$data->date}}</td>
                                    <td>{{$data->status}}</td>
                                    <td>
                                        <form action="{{ route('news.toggleStatus', $data->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="btn btn-sm {{ $data->status === 'Active' ? 'btn-danger' : 'btn-success' }}">
                                                {{ $data->status === 'Active' ? 'Deactivate' : 'Activate' }}
                                            </button>
                                        </form>

                                        <a href="{{ route('news.edit', $data->id) }}" class="btn btn-sm btn-primary">
                                            <i class="fa fa-pen"></i>
                                        </a>

                                        <form action="{{ route('news.destroy', $data->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this news?');">
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