@extends('admin.layout.main') 
@section('container')

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">About</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">About Setting</a></li>
                            <!--<li class="breadcrumb-item active">About Setting</li>-->
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
                        <h3 class="card-title">About Setting</h3>
                    </div>
                    <div class="card-body">
                        @if(isset($about))
                        <form method="POST" enctype="multipart/form-data" action="{{ route('about.update', $about->id) }}">
                            @csrf
                            @method('PUT')
                        @else
                        <form method="POST" enctype="multipart/form-data" action="{{ route('store.about') }}">
                            @csrf
                        @endif  
                                <h3>About Part1</h3>
                                <div class="d-grid gap-3">
                                    <div class="row">
                                        <div class="col-sm-4 col-lg-2">
                                            <label class="col-form-label text-sm-end">Image</label>
                                        </div>
                                        <div class="col-sm-5 col-lg-6">
                                            <input type="file" class="form-control" name="image" id="inputmask-4" @if(isset($about->image) && $about->image) @else required @endif>
                                            <div id="image" style="margin-top: 10px;">
                                                @if(isset($about->image) && $about->image)
                                                    <img 
                                                        src="{{ url('images/' . $about->image) }}" 
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
                                            <label class="col-form-label text-sm-end">Title</label>
                                        </div>
                                        <div class="col-sm-5 col-lg-6">
                                            <input type="text" class="form-control" name="title" 
                                                    value="{{ $about->title ?? '' }}" id="inputmask-3" required />
                                        </div>
                                   </div>
                 
                                    <div class="row">
                                        <div class="col-sm-4 col-lg-2">
                                            <label class="col-form-label text-sm-end">Message</label>
                                        </div>
                                        <div class="col-sm-5 col-lg-6">
                                            <textarea class="form-control" name="message" rows="5" required>
                                                {{ $about->message ?? '' }}
                                            </textarea>
                                        </div>
                                   </div>
                                </div>
                                <br>
                                <h3>About Part2</h3>
                                <div class="d-grid gap-3">
                                    <div class="row">
                                        <div class="col-sm-4 col-lg-2">
                                            <label class="col-form-label text-sm-end">Image</label>
                                        </div>
                                        <div class="col-sm-5 col-lg-6">
                                            <input type="file" class="form-control" name="image2" id="inputmask-4" @if(isset($about->image2) && $about->image2) @else required @endif>
                                            <div id="image" style="margin-top: 10px;">
                                                @if(isset($about->image2) && $about->image2)
                                                    <img 
                                                        src="{{ url('images2/' . $about->image2) }}" 
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
                                            <label class="col-form-label text-sm-end">Title</label>
                                        </div>
                                        <div class="col-sm-5 col-lg-6">
                                            <input type="text" class="form-control" name="title2" 
                                                    value="{{ $about->title2 ?? '' }}" id="inputmask-3" required />
                                        </div>
                                   </div>
                 
                                    <div class="row">
                                        <div class="col-sm-4 col-lg-2">
                                            <label class="col-form-label text-sm-end">Message</label>
                                        </div>
                                        <div class="col-sm-5 col-lg-6">
                                            <textarea class="form-control" name="message2" rows="5" required>
                                                {{ $about->message2 ?? '' }}
                                            </textarea>
                                        </div>
                                   </div>
                                </div>
                                <br>
                                <h3>About Part3</h3>
                                <div class="d-grid gap-3">
                                    <div class="row">
                                        <div class="col-sm-4 col-lg-2">
                                            <label class="col-form-label text-sm-end">Image</label>
                                        </div>
                                        <div class="col-sm-5 col-lg-6">
                                            <input type="file" class="form-control" name="image3" id="inputmask-4" @if(isset($about->image3) && $about->image3) @else required @endif>
                                            <div id="image" style="margin-top: 10px;">
                                                @if(isset($about->image3) && $about->image3)
                                                    <img 
                                                        src="{{ url('images3/' . $about->image3) }}" 
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
                                            <label class="col-form-label text-sm-end">Title</label>
                                        </div>
                                        <div class="col-sm-5 col-lg-6">
                                            <input type="text" class="form-control" name="title3" 
                                                    value="{{ $about->title3 ?? '' }}" id="inputmask-3" required />
                                        </div>
                                   </div>
                 
                                    <div class="row">
                                        <div class="col-sm-4 col-lg-2">
                                            <label class="col-form-label text-sm-end">Message</label>
                                        </div>
                                        <div class="col-sm-5 col-lg-6">
                                            <textarea class="form-control" name="message3" rows="5" required>
                                                {{ $about->message3 ?? '' }}
                                            </textarea>
                                        </div>
                                   </div>
                                </div>
                                <br>
                                <h3>About Part4</h3>
                                <div class="d-grid gap-3">
                                    <div class="row">
                                        <div class="col-sm-4 col-lg-2">
                                            <label class="col-form-label text-sm-end">Image</label>
                                        </div>
                                        <div class="col-sm-5 col-lg-6">
                                            <input type="file" class="form-control" name="image4" id="inputmask-4" @if(isset($about->image4) && $about->image4) @else required @endif>
                                            <div id="image" style="margin-top: 10px;">
                                                @if(isset($about->image4) && $about->image4)
                                                    <img 
                                                        src="{{ url('images4/' . $about->image4) }}" 
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
                                            <label class="col-form-label text-sm-end">Title</label>
                                        </div>
                                        <div class="col-sm-5 col-lg-6">
                                            <input type="text" class="form-control" name="title4" 
                                                    value="{{ $about->title4 ?? '' }}" id="inputmask-3" required />
                                        </div>
                                   </div>
                 
                                    <div class="row">
                                        <div class="col-sm-4 col-lg-2">
                                            <label class="col-form-label text-sm-end">Message</label>
                                        </div>
                                        <div class="col-sm-5 col-lg-6">
                                            <textarea class="form-control" name="message4" rows="5" required>
                                                {{ $about->message4 ?? '' }}
                                            </textarea>
                                        </div>
                                   </div>
                                </div>
                                <br>
                                <h3>About Part5</h3>
                                <div class="d-grid gap-3">
                                    <div class="row">
                                        <div class="col-sm-4 col-lg-2">
                                            <label class="col-form-label text-sm-end">Image</label>
                                        </div>
                                        <div class="col-sm-5 col-lg-6">
                                            <input type="file" class="form-control" name="image5" id="inputmask-4" @if(isset($about->image5) && $about->image5) @else required @endif>
                                            <div id="image" style="margin-top: 10px;">
                                                @if(isset($about->image5) && $about->image5)
                                                    <img 
                                                        src="{{ url('images5/' . $about->image5) }}" 
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
                                            <label class="col-form-label text-sm-end">Title</label>
                                        </div>
                                        <div class="col-sm-5 col-lg-6">
                                            <input type="text" class="form-control" name="title5" 
                                                    value="{{ $about->title5 ?? '' }}" id="inputmask-3" required />
                                        </div>
                                   </div>
                 
                                    <div class="row">
                                        <div class="col-sm-4 col-lg-2">
                                            <label class="col-form-label text-sm-end">Message</label>
                                        </div>
                                        <div class="col-sm-5 col-lg-6">
                                            <textarea class="form-control" name="message5" rows="5" required>
                                                {{ $about->message5 ?? '' }}
                                            </textarea>
                                        </div>
                                   </div>
                                </div>
                                <br>
                                <h3>About Part6</h3>
                                <div class="d-grid gap-3">
                                    <div class="row">
                                        <div class="col-sm-4 col-lg-2">
                                            <label class="col-form-label text-sm-end">Image</label>
                                        </div>
                                        <div class="col-sm-5 col-lg-6">
                                            <input type="file" class="form-control" name="image6" id="inputmask-4" @if(isset($about->image6) && $about->image6) @else required @endif>
                                            <div id="image" style="margin-top: 10px;">
                                                @if(isset($about->image6) && $about->image6)
                                                    <img 
                                                        src="{{ url('images6/' . $about->image6) }}" 
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
                                            <label class="col-form-label text-sm-end">Title</label>
                                        </div>
                                        <div class="col-sm-5 col-lg-6">
                                            <input type="text" class="form-control" name="title6" 
                                                    value="{{ $about->title6 ?? '' }}" id="inputmask-3" required />
                                        </div>
                                   </div>
                 
                                    <div class="row">
                                        <div class="col-sm-4 col-lg-2">
                                            <label class="col-form-label text-sm-end">Message</label>
                                        </div>
                                        <div class="col-sm-5 col-lg-6">
                                            <textarea class="form-control" name="message6" rows="5" required>
                                                {{ $about->message6 ?? '' }}
                                            </textarea>
                                        </div>
                                   </div>
                                </div>
                                <br>
                                
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
                        <h4 class="card-title">About Setting</h4>
                    </div>
                    <div class="card-body">
                        <table id="datatable-fixedheader" class="table table-hover table-bordered table-striped dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>image</th>
                                    <th>title</th>
                                    <th>Message</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                    
                            <tbody>
                            @if($abouts != null)
                                <tr>
                                 
                                     <td>
                                        @if(isset($abouts->image))
                                            <img src="{{ url('images/' . $abouts->image) }}" alt="About Us Image" height="50px" width="50px"required>
                                        @else
                                            No Image
                                        @endif
                                    </td>
                                    <td>@if(isset($abouts->title)){{$abouts->title}} @endif</td>
                                   <td>@if(isset($abouts->message)) {{ \Illuminate\Support\Str::words($abouts->message, 10, '...') }} @endif</td>
                                    <td>
                                        <a href="{{ route('about.edit', $abouts->id) }}" class="btn btn-sm btn-primary">
                                            <i class="fa fa-pen"></i>
                                        </a>

                                    </td>
                                </tr>
                            @else
                            <tr><td>No Data Found</td></tr>
                            @endif
                            </tbody>
                        
                        </table>
                  
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection