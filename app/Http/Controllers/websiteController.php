<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WebsiteSetting;
use App\Models\TermsCondition;

class websiteController extends Controller
{
    public function index()
    {
        $website = WebsiteSetting::first();
        return view('admin.website',compact('website'));
    }

    public function store(Request $request)
    {
        $data = WebsiteSetting::firstOrNew();

        $data->username = $request->username;
        $data->bank_details = $request->bank_details;
        $data->upi = $request->upi;
        
        if ($request->hasFile('qr_code')) {
            $image = $request->file('qr_code');
            $imageName = time() . '_qr.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $data->qr_code = $imageName;
        }
        
        $data->company_name = $request->company_name;
        $data->company_phone = $request->company_phone;
        $data->company_email = $request->company_email;
        $data->company_website = $request->company_website;
        
        if ($request->hasFile('logo')) {
            $image = $request->file('logo');
            $imageName = time() . '_logo.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $data->logo = $imageName;
        }
        
        if ($request->hasFile('banner')) {
            $image = $request->file('banner');
            $imageName = time() . 'banner.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $data->banner = $imageName;
        }
        
        $data->company_address = $request->company_address;
        
        $data->save();
        
        return redirect()->route('website.setting')->with('success', 'Data Store successfully!');
    }
    
      public function tearms()
    {
        
        $website = TermsCondition::first();
        // dd($website);
        return view('admin.tearms',compact('website'));
    }
    
     public function update(Request $request){
        //   dd($request->all());
        $validated = $request->validate([
            'details' => 'required',            
        ]);
        
        $PrivacyPolicy = TermsCondition::first();
        $PrivacyPolicy->details = $request->details;
        $PrivacyPolicy->save();
        return redirect()->route('tearms')->with('success', 'Terms & Condition updated successfully!');
    }
}
