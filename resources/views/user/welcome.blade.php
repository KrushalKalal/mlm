@extends('admin.layout.main') 

@section('container')
<div class="page-content">
    <style>
        .main-content .content {
    margin-top: 35px;
}
.main-content .content {
    margin-top: 23px;
}
    </style>
    <div class="row justify-content-center">
        <div class="col-xl-5">
            <div class="card">
                <div class="card-body">
                    <div class="container">
                        <div class="header text-center mb-4">
                            <!-- Replace 'logo.png' with your actual logo path -->
                            <img src="{{ url('images/' . $setting->logo) }}" alt="EduCare Logo" style="max-width: 100px;">
                            <h1 class="mt-3">{{$setting->company_name}}</h1>
                            <p>{{$setting->company_address}}<br>
                            Phone: {{$setting->company_phone}} | Email: {{$setting->company_email}}</p>
                        </div>
                        <div class="content">
                            <h2 class="text-center">CONGRATULATIONS!</h2>
                            <p>Mr/Ms. {{$user->name}},<br><br>
                            WELCOME to the growing family of {{$setting->company_name}}!<br><br>
                            You made the right choice. It is our great pleasure to do business with you. Stay with us as our business matures. Rest assured that our officers and staff will be delighted to serve you.<br><br>
                            {{$setting->company_name}} will bring you a healthy life and long-term stable business with an outstanding product, solid framework, and enthusiastic environment.</p>
                            <p><strong>Your Member ID:</strong> {{$user->member_id}}<br>
                            <strong>Your Member password:</strong> {{$user->e_p}}<br>
                            <strong>Your Sponsor ID:</strong> {{$user->sponsor_id}}<br>
                            <strong>Your Up-Line ID:</strong> Company ID<br>
                            <strong>Date of Joining:</strong> {{$user->created_at}}</p>
                        </div>
                        <div class="footer_wlcome text-center mt-4">
                            <p>If you have any questions, please feel free to contact us.<br><br>
                            Thanks and Regards,<br>
                            Customer Service Department<br>
                            {{$setting->company_name}} Team.</p>
                            <p>contact no:{{$setting->company_phone}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>             
</div>
@endsection
