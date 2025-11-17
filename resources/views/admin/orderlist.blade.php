@extends('admin.layout.main')

@section('container')
<div class="page-content">
  <style>
    <style>body {
      font-family: Arial, sans-serif;
      margin: 20px;
      padding: 0;
    }

    .invoice {
      border: 1px solid #000;
      padding: 20px;
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
    .company-info p {
    margin-bottom: 0;
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
        <h4 class="mb-sm-0">Sales Receipt 1</h4>
        <div class="page-title-right">
          <ol class="breadcrumb m-0">
            <li class="breadcrumb-item"><a href="javascript: void(0);">Sales Receipt 1</a></li>
            <li class="breadcrumb-item active">Sales Receipt1</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <div class="row justify-content-center">
    <div class="col-xl-7">
      <div class="card">
        <div class="card-body mb-3" id="pdf-content">
          <div class="container">
            <div class="header mb-4">

              <h1 class="">Sales Receipt</h1>
              <div class="receipt_list">
        
              </div>
              <div class="receipt_list">
              </div>
            </div>

            <?php
                $pack = DB::table('packages')->where('id',$user->package_id)->first();
            ?>
            <div class="content">
              <h5>Product Details</h5>

              <div class="invoice" style="padding:0px !important;">
                <div class="header" style="padding:10px !important;">
                  <div class="company-info">
                    <strong>{{$setting->company_name}}</strong><br>
                   <p>NO138,V.G.RAO NAGAR, EB COLONY GANAPATHY, COIMBATORE -641006</p>
                   <p> Email:myrightshadow@gmail.com</p>
                   <p>Website:myrightshadow.COM</p>
                   <p>Mobile:9944550804</p>
                   <p>Customer Care:99 44 55 08 04</p>
                   <p>GST:33AGRPR4794D4ZU </p>
                  </div>
                  <div class="customer-info">
                    <strong>Customer Details</strong><br>
                    Tax Invoice No: {{$user->member_id}}<br>
                    Date:{{ date('d-M-Y',strtotime(Auth::user()->created_at)) }} <br>
                    Name: {{$user->name}}<br>
                    Mobile:  {{$user->mobile_no}}<br>
                    
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
                    $mrp = $pack->mrp;
                    $gst_percent = 5; 
                     $gst_amount = $mrp * ($gst_percent / 100);
                     $total_price = $mrp + $gst_amount;
                ?>
                <div class="section">
                  <table>
                       <tbody>
                           <tr>
                               <td colspan="6" width="60%" style="border-bottom: none;"></td>
                               <td colspan="2" width="20%">SGST 2.5%</td>
                               <td colspan="2" width="20%">23.33</td>
                           </tr>
                           <tr>
                               <td colspan="6" width="60%" style="border: none;"></td>
                               <td colspan="2" width="20%">CGST 2.5%</td>
                               <td colspan="2" width="20%">23.33</td>
                           </tr>
                            <tr>
                               <td colspan="6" width="60%" style="border: none;"></td>
                               <td colspan="2" width="20%">Round off</td>
                               <td colspan="2" width="20%">0.34</td>
                           </tr>
                           <tr>
                               <td colspan="6" width="60%" style="border-top: none;"><b>Amount :</b> Nine Hundred Eighty Rupees Only</td>
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
              <div class="card-body" id="pdf-content">
          <div class="container">
            <div class="header mb-4">

              <h1 class="">Sales Receipt</h1>
              <div class="receipt_list">
        
              </div>
              <div class="receipt_list">
              </div>
            </div>

            <?php
                $pack = DB::table('packages')->where('id',$user->package_id)->first();
            ?>
            <div class="content">
              <h5>Product Details</h5>

              <div class="invoice" style="padding:0px !important;">
                <div class="header" style="padding:10px !important;">
                  <div class="company-info">
                    <strong>{{$setting->company_name}}</strong><br>
                   <p>NO138,V.G.RAO NAGAR, EB COLONY GANAPATHY, COIMBATORE -641006</p>
                   <p> Email:myrightshadow@gmail.com</p>
                   <p>Website:myrightshadow.COM</p>
                   <p>Mobile:9944550804</p>
                   <p>Customer Care:99 44 55 08 04</p>
                   <p>GST:33AGRPR4794D4ZU </p>
                  </div>
                  <div class="customer-info">
                    <strong>Customer Details</strong><br>
                    Tax Invoice No: {{$user->member_id}}<br>
                    Date:{{ date('d-M-Y',strtotime(Auth::user()->created_at)) }} <br>
                    Name: {{$user->name}}<br>
                    Mobile:  {{$user->mobile_no}}<br>
                    
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
                    $mrp = $pack->mrp;
                    $gst_percent = 5; 
                     $gst_amount = $mrp * ($gst_percent / 100);
                     $total_price = $mrp + $gst_amount;
                ?>
                <div class="section">
                  <table>
                       <tbody>
                           <tr>
                               <td colspan="6" width="60%" style="border-bottom: none;"></td>
                               <td colspan="2" width="20%">SGST 2.5%</td>
                               <td colspan="2" width="20%">23.33</td>
                           </tr>
                           <tr>
                               <td colspan="6" width="60%" style="border: none;"></td>
                               <td colspan="2" width="20%">CGST 2.5%</td>
                               <td colspan="2" width="20%">23.33</td>
                           </tr>
                            <tr>
                               <td colspan="6" width="60%" style="border: none;"></td>
                               <td colspan="2" width="20%">Round off</td>
                               <td colspan="2" width="20%">0.34</td>
                           </tr>
                           <tr>
                               <td colspan="6" width="60%" style="border-top: none;"><b>Amount :</b> Nine Hundred Eighty Rupees Only</td>
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

      <div class="card-footer card-footer-bordered">
        <button class="btn btn-primary" id="download-pdf">Download Receipt</button>
     </div>
    </div>
  </div>
</div>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
 <script>
        $(document).ready(function () {
            $("#download-pdf").click(function () {
                html2canvas(document.querySelector("#pdf-content")).then(canvas => {
                    let imgData = canvas.toDataURL("image/png");
                    let pdf = new jspdf.jsPDF();
                    let imgWidth = 210; // A4 Size in mm
                    let pageHeight = 297;
                    let imgHeight = (canvas.height * imgWidth) / canvas.width;
                    let position = 10;
                    
                    pdf.addImage(imgData, 'PNG', 10, position, imgWidth - 20, imgHeight);
                    pdf.save("download.pdf");
                });
            });
        });
    </script>
    
 
@endsection