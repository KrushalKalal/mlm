@extends('admin.layout.main') 
@section('container')

<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0"> Category</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);"> Category</a></li>
                            <li class="breadcrumb-item active"> Category</li>
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
                        <h3 class="card-title"> Category</h3>
                    </div>
                    <div class="card-body">
                    @if(isset($category))
                    <form method="POST" enctype="multipart/form-data" action="{{ route('category.update', $category->id) }}">
                        @csrf
                        @method('PUT')
                    @else
                    <form method="POST" enctype="multipart/form-data" action="{{ route('store.category') }}">
                        @csrf
                    @endif  
                            <div class="d-grid gap-3">
                                <div class="row">
                                    <div class="col-sm-4 col-lg-2">
                                        <label class="col-form-label text-sm-end">Category</label>
                                    </div>
                                    <div class="col-sm-5 col-lg-6">
                                        <input type="text" class="form-control" name="category" value="{{ $category->category ?? '' }}" id="inputmask-4" required>
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
                        <h4 class="card-title">Category Setting</h4>
                    </div>
                    <div class="card-body">
                        <table id="datatable-fixedheader" class="table table-hover table-bordered table-striped dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Category</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            @if($categories->count() > 0)
                            <tbody>
                                <?php $i=1; ?>
                                @foreach($categories as $data)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{$data->category}}</td>
                                    <td>

                                        <a href="{{ route('category.edit', $data->id) }}" class="btn btn-sm btn-primary">
                                            <i class="fa fa-pen"></i>
                                        </a>

                                        <form action="{{ route('category.destroy', $data->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this offers?');">
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
                            {{ $categories->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection