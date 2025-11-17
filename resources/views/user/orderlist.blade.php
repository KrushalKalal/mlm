@extends('admin.layout.main')

@section('container')
<div class="page-content">
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 20px;
      padding: 0;
    }

    .invoice {
    border-top: 1px solid #000; /* Top border */
    border-right: 1px solid #000; /* Right border */
    border-bottom: 0px solid #000; /* Bottom border */
    border-left: 1px solid #000; /* Left border */      padding: 20px;
      max-width: 800px;
      margin: auto;
    }

    .header {
      display: flex;
      justify-content: space-between;
      margin-bottom: 20px;
    }

    .header .company-info,
    .header .customer-info {
      width: 48%;
    }

    .section {
      margin-bottom: 20px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
    }

    table,
    th,
    td {
      border: 1px solid black;
    }

    th,
    td {
      padding: 8px;
      text-align: center;
    }

    .amount-in-words {
      margin-top: 20px;
      font-weight: bold;
    }
    .company-info p {
    margin-bottom: 0;
}
  </style>


  <style>
    .product_images img {
      height: 267px;
      object-fit: cover !important;
      width: 100%;
      max-width: 267px;
    }

    .relative.product_images.overflow-hidden.rounded-t-md.shadow.dark\:shadow-gray-700.mx-3.mt-3 {
      box-shadow: 0 19px 38px rgba(0, 0, 0, 0.30), 0 15px 12px rgba(0, 0, 0, 0.22) !important;
      padding: 27px;
    }

    .slide-inner.absolute.end-0.top-0.w-full.h-full.slide-bg-image.flex.items-center.bg-center\; {
      height: 675px !important;
      width: 100% !important;
      background-size: 100% 100%;
      object-fit: fill !important;
    }

    .swiper-slider-hero {
      height: 550px;
    }

    #tns1-iw {
      margin-bottom: 54px;
    }

    .pt-name a {
      border: 1px solid #a17f7ff5;
      padding: 4px 10px !important;
      font-size: 15px !important;
      margin-left: 14px;
    }

    /*29-10-24*/
    .bg_product {
      background: #f1f1f1;
      padding: 10px 30px 40px 30px;
    }

    .all_div {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 12px;
    }

    .mrp {
      display: flex;
      column-gap: 7px;
    }

    .mrp h5 {
      font-size: 16px !important;
      line-height: 20px;
    }

    .mrp h6 {
      font-size: 13px !important;
      line-height: 20px;
    }


    @media (min-width: 992px) {
      #topnav .navigation-menu {
        display: -webkit-box;
        display: -ms-flexbox;
        display: -webkit-box;
        -ms-flex-wrap: wrap;
        flex-wrap: initial;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        justify-content: center;
      }

    }

    @media (max-width: 991px) {
      .tagline-height {
        top: 0px !important;
      }
    }

    @media (max-width: 767px) {
      .product_images img {
        max-width: 100%;
      }
    }

    .main-content .content {
      margin-top: 35px;
    }

    .main-content .content {
      margin-top: 23px;
    }

    .main-content .content {
      padding: 0;
    }

    .receipt_list {
      justify-content: center;
      display: flex;
    }

    .receipt_list p {
      /*width: 50%;*/
      margin-bottom: 0px;
      display: flex;
      column-gap: 10px;
    }

    .receipt_list p span {
      width: auto;
    }

    tbody.list.form-check-all td {
      text-align: center;
    }

    thead.table-light th {
      text-align: center;
    }

    table#DataTables_Table_0 {
      text-align: center;
    }

    /**/

    .header.mb-4 h1 {
      font-size: 17px;
      /*border: 1px solid #f5f5f5;*/
      padding: 7px 10px;
      width: 100%;
      text-align: center;
      line-height: 20px;
      border-radius: 5px;
    }

    .receipt_list {
      margin-bottom: 10px;
    }

    @media (max-width: 767px) {
      .top_manus p {
        text-align: end;
      }

      .navbar-header {
        height: auto;
        padding: 9px;
      }
    }
  </style>
  <div class="row">
    <div class="col-12">
      <div class="page-title-box d-flex align-items-center justify-content-between">
        <h4 class="mb-sm-0">Sales Receipt</h4>
        <div class="page-title-right">
          <ol class="breadcrumb m-0">
            <li class="breadcrumb-item"><a href="javascript: void(0);">Sales Receipt</a></li>
            <li class="breadcrumb-item active">Sales Receipt</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <div class="row justify-content-center">
    <div class="col-xl-7">
      <div class="card mb-3">
        <div class="card-body" id="pdf-content">
          <div class="container">
            <div class="header mb-4">

              <h1 class="">Sales Receipt</h1>
              <div class="receipt_list">
                <div class="top_manus d-none" style="background:#eee; padding:4px 4px;">
                  <h4 class="fs-16 fw-semibold mb-1 mb-md-2 " style="text-align:center;"><span
                      class="text-primary">{{Auth::user()->name}}({{Auth::user()->member_id}})</span></h4>
                  <p>Mobile Number : {{Auth::user()->mobile_no}} | Sponser ID & Name : {{Auth::user()->sponsor_id}} -
                    {{Auth::user()->name}} | Joining Date : {{date("d-M-Y",strtotime(Auth::user()->created_at))}}</p>
                </div>
                <!--<p><span>Name :</span> <span>{{$order->name}}.</span>-->
                <!--  <p><span >Date :</span> <span>{{$order->created_at}}.</span>-->
                <!--<p><span >Member Id :</span> <span>{{$order->member_id}}.</span>-->
                <!--  <p><span>Mobile No :</span> <span>{{$order->mobile_no}}.</span>-->

              </div>
              <div class="receipt_list">
              </div>
            </div>

            <?php           
                if($order->package_id != null)
                {
                     $pack = DB::table('packages')->where('id',$order->package_id)->first();
                }else{
                     $pack = null;
                }
        
            ?>
            <div class="content">
              <h5>Product Details</h5>

              <div class="invoice" style="padding:0px !important;">
                <div class="header" style="padding:10px !important;">
                  <div class="company-info">
                    <strong>{{$setting->company_name}}</strong>
                   <p>NO138,V.G.RAO NAGAR, EB COLONY GANAPATHY, COIMBATORE -641006</p>
                   <p> Email:myrightshadow@gmail.com</p>
                   <p>Website:myrightshadow.com</p>
                   <p>Mobile:9944550804</p>
                   <p>Customer Care:99 44 55 08 04</p>
                   <p>GST : 33AGRPR4794D4ZU </p>
                  </div>
                  <div class="customer-info">
                    <strong>Customer Details</strong><br>
                    Tax Invoice No: {{Auth::user()->member_id}}<br>
                    Date: {{ date('d-M-Y',strtotime(Auth::user()->created_at)) }}<br>
                    Name: {{Auth::user()->name}}<br>
                    Mobile:  {{Auth::user()->mobile_no}}<br>
                    @if(Auth::user()->full_address != null) 
                    Address:  {{Auth::user()->full_address}}
                    @endif
                    <br>
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
                        <td>@if($pack != null) {{$pack->name}} @endif</td>
                        <td>1</td>
                        <td></td>
                        <td>952.32</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <?php
                        if($pack->mrp != null)
                        {
                            $mrp = $pack->mrp;
                        }else{
                            $mrp = 0;
                        }
                        
                        $gst_percent = 5; 
                    
                        $gst_amount = $mrp * ($gst_percent / 100);
                    
                        // Total Price after adding GST
                        $total_price = $mrp + $gst_amount;
                    ?>
                <div class="section">
                  <table>
                       <tbody>
                           <tr>
                               <td colspan="6" width="60%" style="border-bottom: none;"></td>
                               <td colspan="2" width="16%">SGST 2.5%</td>
                               <td colspan="2" width="26%">23.81</td>
                           </tr>
                           <tr>
                               <td colspan="6" width="60%" style="border: none;"></td>
                               <td colspan="2" width="16%">CGST 2.5%</td>
                               <td colspan="2" width="26%">23.81</td>
                           </tr>
                            <tr>
                               <td colspan="6" width="60%" style="border: none;"></td>
                               <td colspan="2" width="16%">Round off</td>
                               <td colspan="2" width="26%">0.34</td>
                           </tr>
                           <tr>
                               <td colspan="6" width="60%" style="border-top: none;"><b>Amount :</b> One Thousand Only</td>
                               <td colspan="2" width="16%">Total</td>
                               <td colspan="2" width="26%">1000.00</td>
                           </tr>
                       </tbody>
                  </table>
                      

              </div>



              <!--    <div class="table-responsive">-->


              <!--    <table class="  table-bordered" style="width:100%;">-->

              <!--         <thead class="table-light">-->

              <!--             <tr>-->
              <!--                 <th>No</th>-->
              <!--                  <th>Date</th>-->
              <!--                 <th>image</th>-->
              <!--                 <th>Product</th>-->
              <!--                 <th style="width:28%;">Quantity</th>-->
              <!--                 <th>Amount</th>-->
              <!--             </tr>-->
              <!--         </thead>-->

              <!--         <tbody class="list form-check-all">-->
              <!--              <tr>-->
              <!--                  <td>1</td>-->
              <!--                   <td>{{$order->created_at}}</td> -->
              <!--                 <td>-->
              <!--                     @if($pack->image)<br>-->
              <!--                     <img src="{{ url('images/' . $pack->image) }}" alt="About Us Image" height="100px" width="100px" required>-->
              <!--                     @else-->
              <!--                         No Image-->
              <!--                     @endif</td> -->

              <!--                 <td>@if($pack != null) {{$pack->name}} @endif</td>-->
              <!--                 <td>1</td>-->
              <!--                 <td>@if($pack != null) {{$pack->mrp}} @endif</td>-->

              <!--             </tr>-->
              <!-- <tr>-->
              <!--    <td></td>-->
              <!--     <td></td>-->
              <!--     <td></td>-->
              <!--     <td></td>-->
              <!--</tr>-->
              <!--             <tr>-->
              <!--                <td>2</td>-->

              <!--             <td></td>-->
              <!--             <td></td>-->
              <!--                   <td></td>-->
              <!--             <td class="order-bd"> <span>CGST(5%) </span></td>-->
              <!--             <td>{{$gst_amount}}</td>-->


              <!--             </tr>-->
              <!--              <tr>-->

              <!--             <td>3</td>-->
              <!--             <td></td>-->
              <!--             <td></td>-->
              <!--                <td></td>-->
              <!--             <td class="order-bd"><span>SGST%</span></td>-->
              <!--              <td>12</td>-->
              <!--             </tr>-->
              <!--              <tr>-->

              <!--             <td>4</td>-->
              <!--             <td></td>-->
              <!--             <td></td>-->
              <!--              <td></td>-->
              <!--             <td class="order-bd"><span>Total</span></td>-->
              <!--              <td>{{$total_price}}</td>-->
              <!--             </tr>-->
              <!--         </tbody>-->
              <!--     </table> -->

              <!--</div>-->


            </div>

          </div>
        </div>
      </div>
      <div class="card-footer card-footer-bordered">
        <!--<button class="btn btn-primary" id="download-pdf">Download Receipt</button>-->
     </div>
    </div>
    
      <div class="card">
        <div class="card-body" id="pdf-content">
          <div class="container">
            <div class="header mb-4">

              <h1 class="">Sales Receipt</h1>
              <div class="receipt_list">
                <div class="top_manus d-none" style="background:#eee; padding:4px 4px;">
                  <h4 class="fs-16 fw-semibold mb-1 mb-md-2 " style="text-align:center;"><span
                      class="text-primary">{{Auth::user()->name}}({{Auth::user()->member_id}})</span></h4>
                  <p>Mobile Number : {{Auth::user()->mobile_no}} | Sponser ID & Name : {{Auth::user()->sponsor_id}} -
                    {{Auth::user()->name}} | Joining Date : {{date("d-M-Y",strtotime(Auth::user()->created_at))}}</p>
                </div>
                <!--<p><span>Name :</span> <span>{{$order->name}}.</span>-->
                <!--  <p><span >Date :</span> <span>{{$order->created_at}}.</span>-->
                <!--<p><span >Member Id :</span> <span>{{$order->member_id}}.</span>-->
                <!--  <p><span>Mobile No :</span> <span>{{$order->mobile_no}}.</span>-->

              </div>
              <div class="receipt_list">
              </div>
            </div>

            <?php           
                if($order->package_id != null)
                {
                     $pack = DB::table('packages')->where('id',$order->package_id)->first();
                }else{
                     $pack = null;
                }
        
            ?>
            <div class="content">
              <h5>Product Details</h5>

              <div class="invoice" style="padding:0px !important;">
                <div class="header" style="padding:10px !important;">
                  <div class="company-info">
                    <strong>{{$setting->company_name}}</strong>
                   <p>NO138,V.G.RAO NAGAR, EB COLONY GANAPATHY, COIMBATORE -641006</p>
                   <p> Email:myrightshadow@gmail.com</p>
                   <p>Website:myrightshadow.com</p>
                   <p>Mobile:9944550804</p>
                   <p>Customer Care:99 44 55 08 04</p>
                   <p>GST : 33AGRPR4794D4ZU </p>
                  </div>
                  <div class="customer-info">
                    <strong>Customer Details</strong><br>
                    Tax Invoice No: {{Auth::user()->member_id}}<br>
                    Date: {{ date('d-M-Y',strtotime(Auth::user()->created_at)) }}<br>
                    Name: {{Auth::user()->name}}<br>
                    Mobile:  {{Auth::user()->mobile_no}}<br>
                    @if(Auth::user()->full_address != null) 
                    Address:  {{Auth::user()->full_address}}
                    @endif
                    <br>
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
                        <td>@if($pack != null) {{$pack->name}} @endif</td>
                        <td>1</td>
                        <td></td>
                        <td>933</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <?php
                        if($pack->mrp != null)
                        {
                            $mrp = $pack->mrp;
                        }else{
                            $mrp = 0;
                        }
                        
                        $gst_percent = 5; 
                    
                        $gst_amount = $mrp * ($gst_percent / 100);
                    
                        // Total Price after adding GST
                        $total_price = $mrp + $gst_amount;
                    ?>
                <div class="section">
                  <table>
                       <tbody>
                           <tr>
                               <td colspan="6" width="60%" style="border-bottom: none;"></td>
                               <td colspan="2" width="16%">SGST 2.5%</td>
                               <td colspan="2" width="26%">23.33</td>
                           </tr>
                           <tr>
                               <td colspan="6" width="60%" style="border: none;"></td>
                               <td colspan="2" width="16%">CGST 2.5%</td>
                               <td colspan="2" width="26%">23.33</td>
                           </tr>
                            <tr>
                               <td colspan="6" width="60%" style="border: none;"></td>
                               <td colspan="2" width="16%">Round off</td>
                               <td colspan="2" width="26%">0.34</td>
                           </tr>
                           <tr>
                               <td colspan="6" width="60%" style="border-top: none;"><b>Amount :</b> Nine Hundred Eighty Rupees Only</td>
                               <td colspan="2" width="16%">Total</td>
                               <td colspan="2" width="26%">980.00</td>
                           </tr>
                       </tbody>
                  </table>
                      

              </div>



              <!--    <div class="table-responsive">-->


              <!--    <table class="  table-bordered" style="width:100%;">-->

              <!--         <thead class="table-light">-->

              <!--             <tr>-->
              <!--                 <th>No</th>-->
              <!--                  <th>Date</th>-->
              <!--                 <th>image</th>-->
              <!--                 <th>Product</th>-->
              <!--                 <th style="width:28%;">Quantity</th>-->
              <!--                 <th>Amount</th>-->
              <!--             </tr>-->
              <!--         </thead>-->

              <!--         <tbody class="list form-check-all">-->
              <!--              <tr>-->
              <!--                  <td>1</td>-->
              <!--                   <td>{{$order->created_at}}</td> -->
              <!--                 <td>-->
              <!--                     @if($pack->image)<br>-->
              <!--                     <img src="{{ url('images/' . $pack->image) }}" alt="About Us Image" height="100px" width="100px" required>-->
              <!--                     @else-->
              <!--                         No Image-->
              <!--                     @endif</td> -->

              <!--                 <td>@if($pack != null) {{$pack->name}} @endif</td>-->
              <!--                 <td>1</td>-->
              <!--                 <td>@if($pack != null) {{$pack->mrp}} @endif</td>-->

              <!--             </tr>-->
              <!-- <tr>-->
              <!--    <td></td>-->
              <!--     <td></td>-->
              <!--     <td></td>-->
              <!--     <td></td>-->
              <!--</tr>-->
              <!--             <tr>-->
              <!--                <td>2</td>-->

              <!--             <td></td>-->
              <!--             <td></td>-->
              <!--                   <td></td>-->
              <!--             <td class="order-bd"> <span>CGST(5%) </span></td>-->
              <!--             <td>{{$gst_amount}}</td>-->


              <!--             </tr>-->
              <!--              <tr>-->

              <!--             <td>3</td>-->
              <!--             <td></td>-->
              <!--             <td></td>-->
              <!--                <td></td>-->
              <!--             <td class="order-bd"><span>SGST%</span></td>-->
              <!--              <td>12</td>-->
              <!--             </tr>-->
              <!--              <tr>-->

              <!--             <td>4</td>-->
              <!--             <td></td>-->
              <!--             <td></td>-->
              <!--              <td></td>-->
              <!--             <td class="order-bd"><span>Total</span></td>-->
              <!--              <td>{{$total_price}}</td>-->
              <!--             </tr>-->
              <!--         </tbody>-->
              <!--     </table> -->

              <!--</div>-->


            </div>

          </div>
        </div>
      </div>
      <div class="card-footer card-footer-bordered">
        <button class="btn btn-primary" id="download-pdf">Download Receipt</button>
     </div>
    </div>
  </div>
</div>
</div>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <input type="hidden" id="slipno" value="{{ Auth::user()->member_id }}" />
 <script>
        $(document).ready(function () {
            $("#download-pdf").click(function () {
                var slip = "{{ Auth::user()->member_id }}";
                var slipname = slip + '.pdf';
                html2canvas(document.querySelector("#pdf-content")).then(canvas => {
                    let imgData = canvas.toDataURL("image/png");
                    let pdf = new jspdf.jsPDF();
                    let imgWidth = 210; // A4 Size in mm
                    let pageHeight = 297;
                    let imgHeight = (canvas.height * imgWidth) / canvas.width;
                    let position = 10;
                    
                    pdf.addImage(imgData, 'PNG', 10, position, imgWidth - 20, imgHeight);
                    pdf.save(slipname);
                });
            });
        });
    </script>
 
@endsection