@extends('admin.layout.main') 
@section('container')

<div class="page-content">
    <style>
 thead.admin_product tr th {
    width: 15%!important;
    text-align: center;
}
table.table-bordered.dataTable tbody th, table.table-bordered.dataTable tbody td {
    text-align: center;
}
    </style>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Testimonial</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Testimonial Setting</a></li>
                            <li class="breadcrumb-item active">Testimonial Setting</li>
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
                        <h3 class="card-title">Testimonial Setting</h3>
                    </div>
                    <div class="card-body">
                        @if(isset($testimonial))
                        <form method="POST" enctype="multipart/form-data" action="{{ route('testimonial.update', $testimonial->id) }}">
                            @csrf
                            @method('PUT')
                        @else
                        <form method="POST" enctype="multipart/form-data" action="{{ route('store.testimonial') }}">
                            @csrf
                        @endif  
                            <div class="d-grid gap-3">
                                <div class="row">
                                    <div class="col-sm-4 col-lg-2">
                                        <label class="col-form-label text-sm-end">Image</label>
                                    </div>
                                    <div class="col-sm-5 col-lg-6">
                                        <input type="file" class="form-control" name="image" id="inputmask-4" @if(isset($testimonial->image) && $testimonial->image) @else required @endif>
                                        <div id="image" style="margin-top: 10px;">
                                            @if(isset($testimonial->image) && $testimonial->image)
                                                <img 
                                                    src="{{ url('images/' . $testimonial->image) }}" 
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
                                        <label class="col-form-label text-sm-end">Name</label>
                                    </div>
                                    <div class="col-sm-5 col-lg-6">
                                        <input type="text" class="form-control" name="name" 
                                                value="{{ $testimonial->name ?? '' }}" id="inputmask-3" required />
                                    </div>
                               </div>
                                 <div class="row">
                                    <div class="col-sm-4 col-lg-2">
                                        <label class="col-form-label text-sm-end">Designation</label>
                                    </div>
                                    <div class="col-sm-5 col-lg-6">
                                        <input type="text" class="form-control" name="designation" 
                                            value="{{ $testimonial->designation ?? '' }}" id="inputmask-3" required />
                                    </div>
                                </div>
                               <div class="row">
                                    <div class="col-sm-4 col-lg-2">
                                        <label class="col-form-label text-sm-end">Message</label>
                                    </div>
                                    <div class="col-sm-5 col-lg-6">
                                        <textarea class="form-control" name="message" rows="5" required>
                                            {{ $testimonial->message ?? '' }}
                                        </textarea>
                                    </div>
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
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 ">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Testimonial</h4>
                    </div>
                    <div class="card-body">
                        <a href="{{ route('testimonial.export') }}" class="btn btn-success btn-sm">
                            <i class="fa fa-file-excel"></i> Export to Excel
                        </a>
                        <table id="datatable-fixedheader" class="table table-hover  table-bordered table-striped dt-responsive " style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead class="admin_product">
                                <tr>
                                    <th>ID</th>
                                    <th>image</th>
                                    <th>Name</th>
                                    <th>Designation</th>
                                    <th>Message</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            @if($testimonials->count() > 0)
                            <tbody>
                                <?php $i=1; ?>
                                @foreach($testimonials as $data)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                     <td>
                                        @if($data->image)
                                            <img src="{{ url('images/' . $data->image) }}" alt="About Us Image" height="50px" width="50px"required>
                                        @else
                                            No Image
                                        @endif
                                    </td>
                                    <td>{{$data->name}}</td>
                                    <td>{{$data->designation}}</td>
                                    <td class="message"><p>{{$data->message}}</p></td>
                                    <td>
                                        <a href="{{ route('testimonial.edit', $data->id) }}" class="btn btn-sm btn-primary">
                                            <i class="fa fa-pen"></i>
                                        </a>

                                        <form action="{{ route('testimonial.destroy', $data->id) }}" method="POST" style="display:inline;">
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
                            {{ $testimonials->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection