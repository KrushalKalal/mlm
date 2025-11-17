@extends('admin.layout.main') 
@section('container')

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Slider</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Slider Setting</a></li>
                            <li class="breadcrumb-item active">Slider Setting</li>
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
                        <h3 class="card-title">Slider Setting</h3>
                    </div>
                    <div class="card-body">
                        @if(isset($slider))
                        <form method="POST" enctype="multipart/form-data" action="{{ route('slider.update', $slider->id) }}">
                            @csrf
                            @method('PUT')
                        @else
                        <form method="POST" enctype="multipart/form-data" action="{{ route('store.slider') }}">
                            @csrf
                        @endif  
                            <div class="d-grid gap-3">
                                <div class="row">
                            
                                
                                    <div class="col-sm-4 col-lg-2">
                                        <label class="col-form-label text-sm-end">Image</label>
                                    </div>
                                    <div class="col-sm-5 col-lg-6">
                                        <input type="file" class="form-control" name="image" id="inputmask-4" @if(isset($slider->image) && $slider->image) @else required @endif>
                                        <div id="image" style="margin-top: 10px;">
                                            @if(isset($slider->image) && $slider->image)
                                                <img 
                                                    src="{{ url('images/' . $slider->image) }}" 
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
                                        <label class="col-form-label text-sm-end">text1</label>
                                    </div>
                                    <div class="col-sm-5 col-lg-6">
                                        <input type="text" class="form-control" name="text1" 
                                            value="{{ $slider->text1 ?? '' }}" id="inputmask-3" />
                                    </div>
                                </div>
                                 <div class="row">
                                    <div class="col-sm-4 col-lg-2">
                                        <label class="col-form-label text-sm-end">text2</label>
                                    </div>
                                    <div class="col-sm-5 col-lg-6">
                                        <input type="text" class="form-control" name="text2" 
                                                value="{{ $slider->text2 ?? '' }}" id="inputmask-3" />
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
            <div class="col-12 right">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Offer Setting</h4>
                    </div>
                    <div class="card-body">
                        <table id="datatable-fixedheader" class="table table-hover table-bordered table-striped dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>image</th>
                                    <th>Text1</th>
                                    <th>Text2</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            @if($sliders->count() > 0)
                            <tbody>
                                <?php $i=1; ?>
                                @foreach($sliders as $data)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                     <td>
                                        @if($data->image)
                                            <img src="{{ url('images/' . $data->image) }}" alt="About Us Image" height="50px" width="50px"required>
                                        @else
                                            No Image
                                        @endif
                                    </td>
                                    <td>{{$data->text1}}</td>
                                    <td>{{$data->text2}}</td>
                                    <td>
                                        <a href="{{ route('slider.edit', $data->id) }}" class="btn btn-sm btn-primary">
                                            <i class="fa fa-pen"></i>
                                        </a>

                                        <form action="{{ route('slider.destroy', $data->id) }}" method="POST" style="display:inline;">
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
                            {{ $sliders->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection