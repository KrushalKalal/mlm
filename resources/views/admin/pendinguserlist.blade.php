@extends('admin.layout.main') 
@section('container')

    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Pending User List</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Pending User List</a></li>
                                <li class="breadcrumb-item active">Pending User List</li>
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
                        <h4 class="card-title">Pending User List</h4>
                    </div>
                    <div class="card-body">
                        <table id="datatable-fixedheader" class="table table-hover table-bordered table-striped dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Sponsor Id</th>
                                    <th>Sponsor Name</th>
                                    <th>Member Id</th>
                                    <th>Joining Date</th>
                                    <th>Date Of Birth</th>
                                    <th>Mobile No</th>
                                    <th>State</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            @if($user->count() > 0)
                            <tbody>
                                <?php $i=1; ?>
                                @foreach($user as $data)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{$data->name}}</td>
                                    <td>{{$data->email}}</td>
                                    <td>{{$data->sponsor_id}}</td>
                                    <td>{{$data->sponsor_name}}</td>
                                    <td>{{$data->member_id}}</td>
                                    <td>{{$data->joining_date}}</td>
                                    <td>{{$data->date_of_birth}}</td>
                                    <td>{{$data->mobile_no}}</td>
                                    <td>{{$data->state}}</td>
                                    <td>
                                        <a href="{{ route('admin.profile', $data->id) }}" class="btn btn-sm btn-primary">
                                            <i class="fa fa-eye"></i>
                                        </a>

                                        @if($data->is_active)
                                            <form action="{{ route('user.deactivate', $data->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="btn btn-sm btn-warning" onclick="return confirm('Are you sure you want to deactivate this user?');">
                                                    <i class="fa fa-ban"></i> Deactivate
                                                </button>
                                            </form>
                                        @else
                                            <form action="{{ route('user.activate', $data->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="btn btn-sm btn-success" onclick="return confirm('Are you sure you want to activate this user?');">
                                                    <i class="fa fa-check"></i> Activate
                                                </button>
                                            </form>
                                        @endif

                                        <!-- <a href="{{ route('package.edit', $data->id) }}" class="btn btn-sm btn-primary">
                                            <i class="fa fa-pen"></i>
                                        </a> -->

                                        <!-- <form action="{{ route('package.destroy', $data->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this offers?');">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form> -->
                                    </td>
                                </tr>
                                @endforeach 
                            </tbody>
                            @else
                                <tr><td>No Data Found</td></tr>
                            @endif
                        </table>
                        <div class="pagination" style="float:right;" >
                            {{ $user->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection