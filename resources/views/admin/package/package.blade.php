@extends('admin.layout.main') 
@section('container')

<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Product Manage</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Product Manage</a></li>
                            <!--<li class="breadcrumb-item active">Package Category</li>-->
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
                        <h3 class="card-title">Product Manage</h3>
                    </div>
                    <div class="card-body">
                        @if(isset($package))
                        <form method="POST" enctype="multipart/form-data" action="{{ route('package.update', $package->id) }}">
                            @csrf
                            @method('PUT')
                        @else
                        <form method="POST" enctype="multipart/form-data" action="{{ route('store.package') }}">
                            @csrf
                        @endif  
                        <div class="d-grid gap-3">
                            <!--<div class="row">-->
                                <!--<div class="col-sm-4 col-lg-2">-->
                                <!--    <label class="col-form-label text-sm-end">category</label>-->
                                <!--</div>-->
                                <!--<div class="col-sm-5 col-lg-6">-->
                                <!--    <select id="inputState" name="category" class="form-select">-->
                                <!--        <option selected="selected" disabled>Choose...</option>-->
                                <!--        @foreach($categories as $cate)-->
                                <!--            <option value="{{ $cate->id }}" {{ isset($package->category) && $package->category == $cate->id ? 'selected' : '' }}>{{ $cate->category }}</option>-->
                                <!--        @endforeach-->
                                <!--    </select>-->
                                <!--</div>-->
                            <!--</div>-->
                            
                            <div class="row">
                                <div class="col-sm-4 col-lg-2">
                                    <label class="col-form-label text-sm-end">Name</label>
                                </div>
                                <div class="col-sm-5 col-lg-6">
                                <input type="text" class="form-control" name="name" 
                                value="{{ $package->name ?? '' }}" id="inputmask-3" required />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4 col-lg-2">
                                    <label class="col-form-label text-sm-end">MRP</label>
                                </div>
                                <div class="col-sm-5 col-lg-6">
                                    <input type="number" class="form-control" name="mrp" 
                                        value="{{ $package->mrp ?? '' }}" id="inputmask-3" required />
                                </div>
                            </div>
                            <!--<div class="row">-->
                            <!--    <div class="col-sm-4 col-lg-2">-->
                            <!--        <label class="col-form-label text-sm-end">Discount Price</label>-->
                            <!--    </div>-->
                            <!--    <div class="col-sm-5 col-lg-6">-->
                            <!--        <input type="number" class="form-control" name="discount_price" -->
                            <!--            value="{{ $package->discount_price ?? '' }}" id="inputmask-3" required />-->
                            <!--    </div>-->
                            <!--</div>-->
                            <!--<div class="row">-->
                            <!--    <div class="col-sm-4 col-lg-2">-->
                            <!--        <label class="col-form-label text-sm-end">Distribute Price</label>-->
                            <!--    </div>-->
                            <!--    <div class="col-sm-5 col-lg-6">-->
                            <!--        <input type="number" class="form-control" name="distribute_price" -->
                            <!--            value="{{ $package->distribute_price ?? '' }}" id="inputmask-3" required />-->
                            <!--    </div>-->
                            <!--</div>-->
                            <div class="row">
                                <div class="col-sm-4 col-lg-2">
                                    <label class="col-form-label text-sm-end">Image</label>
                                </div>
                                <div class="col-sm-5 col-lg-6">
                                    <input type="file" class="form-control" name="image" id="inputmask-4">
                                    <div id="image" style="margin-top: 10px;">
                                        @if(isset($package->image) && $package->image)
                                            <img 
                                                src="{{ url('images/' . $package->image) }}" 
                                                alt="QR Code" 
                                                id="qrCodeImage" 
                                                style="max-width: 200px; height: auto;" 
                                            />
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4 col-lg-2">
                                    <label class="col-form-label text-sm-end">Description</label>
                                </div>
                                <div class="col-sm-5 col-lg-6">
                                    <textarea class="form-control" name="description" rows="5" required>
                                        {{ $package->description ?? '' }}
                                    </textarea>
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
                        <h4 class="card-title">Product Manage</h4>
                    </div>
                    <div class="card-body">
                        <table id="datatable-fixedheader" class="table table-hover table-bordered table-striped dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Action</th>
                                    <th>Image</th>
                                    <!--<th>Category</th>-->
                                    <th>Name</th>
                                    <th>MRP</th>
                                    <!--<th>Discount Price</th>-->
                                    <!--<th>Distribute Price</th>-->
                                    <!--<th>Description</th>-->
                                    
                                </tr>
                            </thead>
                            @if($packages->count() > 0)
                            <tbody>
                                <?php $i=1; ?>
                                @foreach($packages as $data)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                     <td>

                                        <a href="{{ route('package.edit', $data->id) }}" class="btn btn-sm btn-primary">
                                            <i class="fa fa-pen"></i>
                                        </a>

                                        <form action="{{ route('package.destroy', $data->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this offers?');">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                    <td>
                                        @if($data->image)
                                            <img src="{{ url('images/' . $data->image) }}" alt="About Us Image" height="100px" width="100px"required>
                                        @else
                                            No Image
                                        @endif
                                    </td>
                                   
                                    <td>{{$data->name}}</td>
                                    <td>{{$data->mrp}}</td>
                                    <!--<td>{{$data->discount_price}}</td>-->
                                    <!--<td>{{$data->distribute_price}}</td>-->
                                    <!--<td>{{$data->description}}</td>-->
                                </tr>
                                @endforeach 
                            </tbody>
                            @else
                                <tr><td>No Data Found</td></tr>
                            @endif
                        </table>
                        <div class="pagination" style="float:right;" >
                            {{ $packages->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection