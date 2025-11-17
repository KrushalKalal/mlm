@extends('admin.layout.main') 
@section('container')

    <style>
 
        .contain img {
    height: 44px;
    width: 44px;
    object-fit: cover;
}
            .contain p {
    color: #343a40;
margin-bottom:0px;}
.table>thead {
    text-align: center;
}
tbody, td, tfoot, th, thead, tr {
    text-align: center;
}



 
</style>
    <div class="page-content">
    
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">All User</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">All User</a></li>
                                <li class="breadcrumb-item active">All User</li>
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
                                <h4 class="card-title">All User</h4>
                                    <!--<div class="row">-->
                                    <!--    <div class="col-md-3">-->
                                    <!--    </div>-->
                                    <!--    <div class="col-md-3">-->
                                    <!--        <input type="date" name="startdate" class="form-control"/>-->
                                    <!--    </div>-->
                                    <!--    <div class="col-md-3">-->
                                    <!--        <input type="date" name="enddate" class="form-control"/>-->
                                    <!--    </div>-->
                                    <!--    <div class="col-md-3">-->
                                    <!--        <button class="btn btn-primary"><i class="fa fa-filter"></i></button>-->
                                    <!--    </div>-->
                                    <!--</div>-->
                    </div>
                      <div class="col-md-2" style="padding: 20px;">
                         <a href="{{ route('levelwaiseincome.export') }}" class="btn btn-success btn-sm">
                            <i class="fa fa-file-excel"></i> Export to Excel
                        </a>
                    </div>
                    
                   <div class="card-body">
                       
                       
                    
                         <div class="filter-section" style="padding: 10px;">
                    <form action="{{route('levelwaiseincomesearch')}}" method="Post">
                        @csrf
                        <div class="row">
                            <!-- Month Selection -->
                            <div class="col-md-5">
                                <label for="month">Select Month</label>
                                <select class="form-control" id="month" name="month">
                                    <option value="">-- Select Month --</option>
                                    @foreach(range(1, 12) as $m)
                                        <option value="{{ $m }}" {{ request('month') == $m ? 'selected' : '' }}>
                                            {{ date('F', mktime(0, 0, 0, $m, 1)) }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Year Selection -->
                            <div class="col-md-5">
                                <label for="year">Select Year</label>
                                <select class="form-control" id="year" name="year">
                                    <option value="">-- Select Year --</option>
                                    @foreach(range(date('Y'), date('Y') - 10) as $y)
                                        <option value="{{ $y }}" {{ request('year') == $y ? 'selected' : '' }}>
                                            {{ $y }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                             <div class="col-md-2" >
                                <button type="submit" class="btn btn-primary">Filter</button>
                            </div>
                        </div>
                       
                    </form>
                    
                    <form action="{{route('levelwaiseincomesearch')}}" method="Post">
                        @csrf
                        <div class="row">
                            <!-- Month Selection -->
                            <div class="col-md-3">
                                <label for="month">Search </label>
                                <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                            </div>

                             <div class="col-md-2" >
                                <button type="submit" class="btn btn-primary">Filter</button>
                            </div>
                        </div>
                       
                    </form>
                </div>
                    <div class="table-responsive table-card mt-3 mb-1">
                            <table class="table align-middle table-nowrap" >
                            <thead>
                                <tr>
                                    <th>Sr.No</th>
                                     <th>Levels</th>
                                    <th>Member Id</th>
                                    <th>Name</th>
                                    <th>Sponsor Id</th>
                                    <th>Mobile No</th>
                                    <th>Downline</th>
                                    <th>Password</th>
                                    <th>Joining Date</th>
                                    <th>Paid/Unpaid</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=1; ?>
                                @foreach($user as $data)
                                @if($data->status == 1)
                                   <?php
                                        $downCount = 0;
                                        $queue = [$data->member_id]; 
                                        
                                        while (!empty($queue)) {
                                            $currentSponsorId = array_shift($queue); 
                                        
                                             $downlines = App\Models\User::where("sponsor_id", $currentSponsorId)->pluck('member_id');
                                        
                                            foreach ($downlines as $downline) {
                                                $queue[] = $downline;
                                                $downCount++;
                                            }
                                        }
                                        
                                         ?>

                                <tr>
                                    <td>{{ $i++ }}</td>
                                     <td>
                                        <a class="btn btn-primary" href="{{ route('levelwaiseincomedatausers',['id' => Crypt::encrypt($data->member_id)]) }}">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                    </td>


                                    <td>
                                         <div class="contain">
                                                 <img src="{{url('icon/membericon.png')}}">
                                                 <p><b>{{$data->member_id}} </b></p>
                                            </div>
                                    </td>
                                    <td>{{$data->name}}</td>
                                    <td>{{$data->sponsor_id}}</td>
                                    <td>{{$data->mobile_no}}</td>
                                    <td>
                                        @php
                                            $count = App\Models\User::where("sponsor_id", $data->member_id)->where("member_id",'!=',$data->member_id)->count();
                                            $lising = 0;
                                        @endphp
                                       {{ $count ?? 0 }}<br>
                                        <!--Downline Members :{{ $downCount - $count ?? 0 }}-->
                                    </td>
                                    <td>{{$data->e_p}}</td>
                                    <td>{{ date("d-M-y",strtotime($data->created_at)) }}</td>
                                    @if($data->status == "1")
                                    <td><span class="badge badge-primary">Approved</span></td>
                                    @elseif($data->status == "2")
                                    <td><span class="badge badge-danger">Rejected</span></td>
                                    @else
                                    <td><span class="badge badge-dark">Pending</span></td>
                                    @endif
                                    
                                </tr>
                                    @endif
                                @endforeach 
                            </tbody>
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
</div>

<div class="d-none">
    @foreach($user as $data)
    <div class="card">
        <div class="card-body" id="pdf_content_{{ $data->id }}">
            <div class="container">
                <div class="header mb-4">
                    <h1>Sales Receipt</h1>
                </div>

                @php
                    $pack = DB::table('packages')->where('id', $order->package_id ?? null)->first();
                    $setting = DB::table('website_settings')->first();
                @endphp

                <div class="content">
                    <h5>Product Details</h5>
                    <div class="invoice">
                        <div class="header" style="padding:10px;">
                            <div class="company-info">
                                <strong>{{ $setting->company_name }}</strong><br>
                                {{ $setting->company_address }}<br>
                                Email: {{ $setting->company_email }}<br>
                                Website: {{ $setting->company_website }}<br>
                                Mobile: {{ $setting->company_phone }}<br>
                                Customer Care: <br>
                                GST:
                            </div>
                            <div class="customer-info">
                                <strong>Customer Details</strong><br>
                                Tax Invoice: {{ $data->member_id }}<br>
                                Date: {{ now()->format('d-m-Y') }}<br>
                                Name: {{ $data->name }}<br>
                                Mobile: {{ $data->mobile_no }}<br>
                                GST:
                            </div>
                        </div>

                        <div class="section">
                            <table>
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Description</th>
                                        <th>Qty</th>
                                        <th>HSN</th>
                                        <th>Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>{{ $pack->name ?? 'N/A' }}</td>
                                        <td>1</td>
                                        <td></td>
                                        <td>933</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        @php
                            $mrp = $pack->mrp ?? 0;
                            $gst_percent = 5; 
                            $gst_amount = $mrp * ($gst_percent / 100);
                            $total_price = $mrp + $gst_amount;
                        @endphp

                        <div class="section">
                            <table>
                                <tbody>
                                    <tr>
                                        <td colspan="6" width="60%"></td>
                                        <td colspan="2" width="20%">SGST 2.5%</td>
                                        <td colspan="2" width="20%">23.50</td>
                                    </tr>
                                    <tr>
                                        <td colspan="6" width="60%"></td>
                                        <td colspan="2" width="20%">CGST 2.5%</td>
                                        <td colspan="2" width="20%">23.50</td>
                                    </tr>
                                    <tr>
                                        <td colspan="6" width="60%"><b>Amount:</b> Nine Hundred Eighty Rupees Only</td>
                                        <td colspan="2" width="20%">Total</td>
                                        <td colspan="2" width="20%">980.00</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>  
    @endforeach
</div>





@endsection
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <script>
    function downloadpdf(id) 
    {
        var member_id = id;
        let element = document.getElementById("pdf_content_" + member_id);
        html2canvas(element, { scale: 2, useCORS: true, allowTaint: true })
            .then(canvas => {
                let imgData = canvas.toDataURL("image/png");
                let pdf = new jspdf.jsPDF('p', 'mm', 'a4');
                let imgWidth = 210;
                let pageHeight = 297;
                let imgHeight = (canvas.height * imgWidth) / canvas.width;
                let heightLeft = imgHeight;
                let position = 10;

                pdf.addImage(imgData, 'PNG', 10, position, imgWidth - 20, imgHeight);
                heightLeft -= pageHeight;

                while (heightLeft > 0) {
                    position = heightLeft - imgHeight;
                    pdf.addPage();
                    pdf.addImage(imgData, 'PNG', 10, position, imgWidth - 20, imgHeight);
                    heightLeft -= pageHeight;
                }

                pdf.save(member_id + "_download.pdf");
            })
            .catch(error => {
                console.error("PDF Generation Failed", error);
            });
    }

    
    function loginnewusers(id)
    {
        var user_id = id;
     //   alert("hi");
     var url = '{{ url("loder/loading.gif") }}';
        $("#blockuipage").ajaxStart($.blockUI({message: '<h1><img src="' + url +'" style="height:100px;" /> Just a moment...</h1>' }));
        
          $.ajax({
        type: "POST",
        url: '{{ route("loginajax") }}',
        data: {
            sponsor_id: user_id,
            _token: '{{ csrf_token() }}'
        },
        success: function(response) {
            if (response.success == "true") {
          
            } else {
            
            }
        },
        error: function(error) {
            console.error("Error occurred:", error);
        }
    });
    }
</script>

