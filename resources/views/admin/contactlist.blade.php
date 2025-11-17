@extends('admin.layout.main') 
@section('container')

    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Contact List</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Contact List</a></li>
                                <li class="breadcrumb-item active">Contact List</li>
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
                        <h4 class="card-title">Contact List</h4>
                    </div>
                      <div class="col-md-2" style="padding-left:20px;">
                         <a href="{{ route('contactlist.export') }}" class="btn btn-success btn-sm">
                            <i class="fa fa-file-excel"></i> Export to Excel
                        </a>
                    </div>
                    <div class="card-body">
                        <table id="datatable-fixedheader" class="table table-hover table-bordered table-striped dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Question</th>
                                    <th>Comment</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            @if($contact->count() > 0)
                            <tbody>
                                <?php $i=1; ?>
                                @foreach($contact as $data)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{$data->name}}</td>
                                    <td>{{$data->email}}</td>
                                    <td>{{$data->question}}</td>
                                    <td>{{$data->comment}}</td>
                                    <td>
                                        <form action="{{ route('contactlist.delete', $data->id) }}" method="POST" style="display:inline;">
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
                            {{ $contact->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection