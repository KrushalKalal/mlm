<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Package;
use App\Models\Contact;
use App\Models\Checkout;
use App\Models\Slider;
use App\Models\User;
use App\Models\Userlist;
use App\Models\About;
use App\Models\Testimonial;
use App\Models\TermsCondition;
use App\Models\WebsiteSetting;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use DB;

class FrontController extends Controller
{
    public function home()
    {
        $abouts = About::first();
        $sliders = Slider::first();
        $testimonial = Testimonial::orderby('id', 'desc')->get();
        $product = Package::with('cate')->orderby('id', 'desc')->get();
        $setting = DB::table('website_settings')->first();
        return view('home.home', compact('product', 'sliders', 'testimonial', 'abouts', 'setting'));
    }

    public function terms()
    {
        $tearms = TermsCondition::first();
        return view('home.terms', compact('tearms'));
    }
    public function about()
    {
        $product = Package::with('cate')->orderby('id', 'desc')->get();
        $abouts = About::first();
        return view('home.about', compact('product', 'abouts'));
    }

    public function product()
    {
        $product = Package::with('cate')->orderby('id', 'desc')->get();
        return view('home.product', compact('product'));
    }

    public function productdetails($id)
    {
        $product = Package::with('cate')->where('id', $id)->first();
        $setting = WebsiteSetting::first();
        return view('home.productview', compact('product', 'setting'));
    }

    public function checksponsor(Request $request)
    {
        if ($request->sponsor_id) {
            $users = User::where('member_id', $request->sponsor_id)->first();
        } else {
            $users = 0;
        }

        if ($users) {
            $usersname = $users->name;
            $status = $users->status;
            if ($status == 1) {
                $count = User::where('sponsor_id', $request->sponsor_id)->count();
                if ($count >= 10) {
                    return response()->json(['success' => 'false', 'message' => 'Sponsor Is Not Active']);
                } else {
                    return response()->json(['success' => 'true', 'users' => $usersname, 'message' => 'Get Users']);
                    ;
                }
            } else {
                return response()->json(['success' => 'false', 'message' => 'Sponsor Number Is Not Active']);
                ;
            }
        } else {
            return response()->json(['success' => 'false', 'message' => 'Users Not Found']);
            ;
        }
    }

    public function contact()
    {
        $setting = WebsiteSetting::first();
        $product = Package::with('cate')->orderby('id', 'desc')->get();
        return view('home.contact', compact('product', 'setting'));
    }

    public function contactstore(Request $request)
    {
        $data = new Contact();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->question = $request->question;
        $data->comment = $request->comment;
        $data->save();

        return redirect()->route('contact')->with('success', "Your Message Sent Successfully");
    }


    public function checkout(Request $request)
    {
        // Basic manual validation
        if ($request->mobile_no != $request->confirm_phone) {
            return response()->json(['success' => 'false', 'message' => 'Check Mobile Number']);
        } else if ($request->mobile_no == null) {
            return response()->json(['success' => 'false', 'message' => 'Check Mobile Number']);
        } else if ($request->sponsor_id == null) {
            return response()->json(['success' => 'false', 'message' => 'Sponsor Not Found']);
        } else if ($request->password == null) {
            return response()->json(['success' => 'false', 'message' => 'Password is required']);
        } else if ($request->name == null) {
            return response()->json(['success' => 'false', 'message' => 'Please Enter User Name']);
        } else if ($request->password_confirmation != $request->password) {
            return response()->json(['success' => 'false', 'message' => 'Check Password']);
        }

        // Direction mandatory
        if (!$request->direction || !in_array($request->direction, ['left', 'right'])) {
            return response()->json(['success' => 'false', 'message' => 'Please select direction (left/right)']);
        }

        // Find sponsor in users_list by member_id
        $db = DB::table('users_list')->where('member_id', $request->sponsor_id)->first();

        if (!$db) {
            return response()->json(['success' => 'false', 'message' => 'Sponsor Not Found !!!']);
        }

        // Sponsor found – check active
        if ($db->status != 1) {
            return response()->json(['success' => 'false', 'message' => 'Sponsor Number Is Not Active']);
        }

        // (OPTIONAL) You had this 10 users check – keep or remove as you wish
        $count = DB::table('users_list')->where('sponsor_id', $request->sponsor_id)->count();
        if ($count >= 10) {
            // if you really want this cap; if not, just remove this block
            return response()->json(['success' => 'false', 'message' => 'Sponsor Is Not Active']);
        }

        // Generate new member_id (same as your logic)
        $totalUsers = DB::table('users_list')->where('role', '!=', 'admin')->count() + 1;
        $newMemberId = 'SW' . str_pad($totalUsers, 3, '0', STR_PAD_LEFT);

        // Handle payment_receipt name if provided
        $imageName = null;
        if ($request->hasFile('payment_receipt')) {
            $image = $request->file('payment_receipt');
            $imageName = time() . 'image.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
        }

        // Insert user
        $insertedId = DB::table('users_list')->insertGetId([
            'package_id' => $request->package_id,
            'member_id' => $newMemberId,
            'name' => $request->name,
            'sponsor_id' => $request->sponsor_id,
            'refer_id' => $request->sponsor_id,       // parent in tree
            'direction' => $request->direction,        // left / right
            'email' => $request->email,
            'mobile_no' => $request->mobile_no,
            'confirm_phone' => $request->confirm_phone,
            'state' => $request->state,
            'city' => $request->city,
            'e_p' => $request->password,
            'password' => Hash::make($request->password),
            'status' => "0",
            'role' => "user",
            'payment_receipt' => $imageName,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Fetch inserted user to get data for popup
        $user = DB::table('users_list')->where('id', $insertedId)->first();

        return response()->json([
            'success' => 'true',
            'message' => 'User Add',
            'name' => $user->name,
            'meid' => $user->member_id,
            'pwd' => $user->e_p,
        ]);
    }

    public function joinnow()
    {
        $product = Package::with('cate')->orderby('id', 'desc')->get();
        return view('home.joinnow', compact('product'));
    }
}
