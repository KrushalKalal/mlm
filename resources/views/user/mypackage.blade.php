@extends('admin.layout.main')
@section('container')

<div class="page-content" id="pgblock">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Order List</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">My Package</a></li>
                            <li class="breadcrumb-item active">My Package</li>
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
                        <h4 class="card-title">My Package</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive table-card mt-3 mb-1">
                            <table class="table align-middle table-nowrap" id="table">
                                <thead class="table-light">
                                    <tr>
                                        <th>Sr #</th>
                                        <th>Package Name</th>
                                        <th>Category</th>
                                        <th>MRP</th>
                                        <th>Discount Price</th>
                                        <th>Description</th>
                                        <th>Image</th>
                                       
                                    </tr>
                                </thead>
                                <tbody class="list form-check-all">
                                    <?php $i=1; ?>
                                 
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{$package->name}}</td>
                                        <td>{{$package->cate->category}}</td>
                                        <td>{{$package->mrp}}</td>
                                        <td>{{$package->discount_price}}</td>
                                        <td>{{$package->description}}</td>
                                        <td>
                                            @if($package->image)
                                            <img src="{{ url('images/' . $package->image) }}"
                                                alt="About Us Image" height="100px" width="100px" required>
                                            @else
                                                No Image
                                            @endif
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
   <script>
    function openmodel(id, status) {
    var member_id = id;
    var getcode = status;
    var status_id = getcode == 1 ? "Active" : "Deactive";

            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: "btn btn-success",
                    cancelButton: "btn btn-danger"
                },
                buttonsStyling: false
            });

            swalWithBootstrapButtons.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this action!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes, " + status_id + " it!",
                cancelButtonText: "No, cancel!",
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    $.blockUI();

                    var DataSend = {
                        id: id,
                        status: status,
                        _token: '{{ csrf_token() }}'
                    };

                    $.ajax({
                        url: '{{ route("user.activate") }}',
                        type: 'POST',
                        data: DataSend,
                        success: function (response) {
                            $.unblockUI();

                            if (response.success == "true") {
                                swalWithBootstrapButtons.fire({
                                    title: "Success",
                                    text: "User " + status_id + " successfully.",
                                    icon: "success"
                                });
                                setTimeout(function(){
                                        location.reload();
                                },1500);
                            } else {
                                swalWithBootstrapButtons.fire({
                                    title: "Error",
                                    text: response.message || "An error occurred.",
                                    icon: "error"
                                });
                            }
                        },
                        error: function (error) {
                            $.unblockUI();
                            swalWithBootstrapButtons.fire({
                                title: "Error",
                                text: "An error occurred while processing your request.",
                                icon: "error"
                            });
                            console.error(error);
                        }
                    });
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    swalWithBootstrapButtons.fire({
                        title: "Cancelled",
                        text: "No changes were made.",
                        icon: "error"
                    });
                }
            });
        }

    </script>
    @endsection