@extends('admin.layout.main') 
@section('container')

<div class="page-content">
    <style>
       .form-control {
    margin-bottom: 15px;
    padding: 10px;
}
label.col-form-label.text-sm-end {
    padding: 16px 0px 0px 0px;
}
.company-info p {
    margin-bottom: 0;
}
    </style>
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
                    <form method="POST" enctype="multipart/form-data" action="{{ route('support.update', $new->id) }}">
                        @csrf
                        @method('PUT')
                    @else
                    <form method="POST" enctype="multipart/form-data" action="{{ route('store.support') }}">
                        @csrf
                    @endif  
                        <div class="d-grid gap-3">
                            <div class="row">
                         <div class="col-lg-8">     
                                <!--<div class="row">-->
                                <!--    <div class="col-sm-4 col-lg-2">-->
                                <!--        <label class="col-form-label text-sm-end">Title</label>-->
                                <!--    </div>-->
                                <!--    <div class="col-sm-5 col-lg-6">-->
                                <!--        <input type="text" class="form-control" name="title" -->
                                <!--            value="{{ isset($new->title) ? $new->title : '' }}" id="inputmask-3"  />-->
                                <!--    </div>-->
                                <!--</div>-->
                                <br>
                                <div class="row">
                                    <div class="col-sm-2 col-lg-2">
                                        <label class="col-form-label text-sm-end">Subject</label>
                                    </div>
                                    <div class="col-sm-8 col-lg-8">
                                        <textarea type="text" class="form-control" name="subject" 
                                            value="{{ isset($new->subject) ? $new->subject : '' }}" style="height: 122px;" id="inputmask-3" required />{{ isset($new->subject) ? $new->subject : '' }}</textarea>
                                    </div>
                                </div>
                                <br>
                                <!--<div class="row">-->
                                <!--    <div class="col-sm-4 col-lg-2">-->
                                <!--        <label class="col-form-label text-sm-end">Question</label>-->
                                <!--    </div>-->
                                <!--    <div class="col-sm-5 col-lg-6">-->
                                <!--        <input type="text" class="form-control" name="question" -->
                                <!--            value="{{ isset($new->question) ? $new->question : '' }}" id="inputmask-3" required />-->
                                <!--    </div>-->
                                <!--</div>-->
                                </div>
                         <div class="col-lg-4">
                             <h4>RIGHT SHADOW </h4>
                              <div class="company-info">
                               <p>NO138,V.G.RAO NAGAR, EB COLONY GANAPATHY, COIMBATORE -641006</p>
                               <p> Email:myrightshadow@gmail.com</p>
                               <p>Website:myrightshadow.COM</p>
                               <p>Mobile:9944550804</p>
                               <p>Customer Care:99 44 55 08 04</p>
                               <p>GST : 33AGRPR4794D4ZU </p>
                              </div>
                             </div>
                                <!-- <div class="col-sm-4 col-lg-2">
                                    <label class="col-form-label text-sm-end">title</label>
                                </div>
                                <div class="col-sm-5 col-lg-6">
                                    <textarea class="form-control" name="news" rows="5" required>
                                        {{ $new->news ?? '' }}
                                    </textarea>
                                    </div>
                                </div> -->
                               
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
                        <h4 class="card-title">Support</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">

                        <table id="datatable-fixedheader" class="table table-hover table-bordered table-striped dt-responsive " style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <!--<th>Title</th>-->
                                    <th>Subject</th>
                                    <!--<th>Question</th>-->
                                    <th>Answer</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=1; ?>
                                @foreach($news as $data)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <!--<td>{{$data->title}}</td>-->
                                    <td>{{$data->subject}}</td>
                                    <!--<td>{{$data->question}}</td>-->
                                    <td>{{$data->answer}}</td>
                                    <td>
                                        <a href="{{ route('support.edit', $data->id) }}" class="btn btn-sm btn-primary">
                                            <i class="fa fa-pen"></i>
                                        </a>
                                        <form action="{{ route('support.destroy', $data->id) }}" method="POST" style="display:inline;">
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
                        </table>
                    
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection