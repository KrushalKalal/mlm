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
        // dd("hear");
        if ($request->mobile_no != $request->confirm_phone) {
            return response()->json(['success' => 'false', 'message' => 'Check Mobile Number']);
            ;
        } else if ($request->mobile_no == null) {
            return response()->json(['success' => 'false', 'message' => 'Check Mobile Number']);
            ;
        } else if ($request->sponsor_id == null) {
            return response()->json(['success' => 'false', 'message' => 'Sponsor Not Found']);
            ;
        } else if ($request->password == null) {
            return response()->json(['success' => 'false', 'message' => 'Sponsor Not Found']);
            ;
        } else if ($request->name == null) {
            return response()->json(['success' => 'false', 'message' => 'Please Enter User Name']);
            ;
        } else if ($request->password_confirmation != $request->password) {
            return response()->json(['success' => 'false', 'message' => 'Check Password']);
            ;
        } else {

            $db = db::table("users_list")->where("member_id", $request->sponsor_id)->first();
            if ($db) {
                // ********** sp ******* 
                if ($db) {
                    $status = $db->status;
                    if ($status == 1) {
                        $count = db::table("users_list")->where('sponsor_id', $request->sponsor_id)->count();
                        if ($count >= 10) {
                            return response()->json(['success' => 'false', 'message' => 'Sponsor Is Not Active']);
                        } else {
                            $count = db::table("users_list")->where('role', '!=', 'admin')->count() + 1; // Increment count by 1
                            $new = 'SW' . str_pad($count, 3, '0', STR_PAD_LEFT);                            //   ******************* LIST ************* 
                            $insertedId = db::table("users_list")->insertGetId([
                                'package_id' => $request->package_id,
                                'member_id' => $new,
                                'name' => $request->name,
                                'sponsor_id' => $request->sponsor_id,
                                'email' => $request->email,
                                'mobile_no' => $request->mobile_no,
                                'confirm_phone' => $request->confirm_phone,
                                'state' => $request->state,
                                'city' => $request->city,
                                'e_p' => $request->password,
                                'password' => Hash::make($request->password),
                                'status' => "0",
                                'role' => "user",
                                'payment_receipt' => $request->hasFile('payment_receipt') ? time() . 'image.' . $request->file('payment_receipt')->getClientOriginalExtension() : null,
                                'created_at' => now(),
                                'updated_at' => now(),
                            ]);

                            // Move the uploaded file if exists
                            if ($request->hasFile('payment_receipt')) {
                                $image = $request->file('payment_receipt');
                                $imageName = time() . 'image.' . $image->getClientOriginalExtension();
                                $image->move(public_path('images'), $imageName);
                            }

                            $lenth = 0;
                            $i = 0;
                            $getnext = [];

                            for ($i = 0; $i <= $lenth; $i++) {
                                if ($i == 0) {
                                    $users = db::table("users_list")->where('sponsor_id', $request->sponsor_id)
                                        ->where('role', '!=', 'admin')
                                        ->where('id', '!=', $insertedId)
                                        ->count();

                                    if ($users >= 3) {
                                        ++$lenth;
                                        $userslenth = db::table("users_list")->where('sponsor_id', $request->sponsor_id)->get();
                                        foreach ($userslenth as $row) {
                                            $getnext[] = $row->member_id;
                                        }
                                    } else {
                                        $nextLevelUsers = db::table("users_list")->where('refer_id', $request->sponsor_id)
                                            ->where('role', '!=', 'admin')
                                            ->count();
                                        if ($nextLevelUsers <= 2 || $nextLevelUsers == 0) {

                                            $dbget = db::table("users_list")->where("id", $insertedId)->update(["refer_id" => $request->sponsor_id]);
                                            $users = db::table("users_list")->where("id", $insertedId)->first();
                                            $uname = $users->name;
                                            $member = $users->member_id;
                                            $password = $users->e_p;
                                            return response()->json(['success' => 'true', 'message' => 'User Add', 'lenth' => $i, 'name' => $uname, 'meid' => $member, 'pwd' => $password]);
                                        } else {
                                            ++$lenth;
                                            $nextLevelUsers = db::table("users_list")->where('refer_id', $request->sponsor_id)->get();
                                            foreach ($nextLevelUsers as $row) {
                                                $getnext[] = $row->member_id;
                                            }
                                        }
                                    }
                                } else {
                                    foreach ($getnext as $key => $value) {
                                        $users = db::table("users_list")->where('sponsor_id', $value)
                                            ->where('role', '!=', 'admin')
                                            ->where('id', "!=", $insertedId)->count();
                                        if ($users >= 3) {
                                            $nextLevelUsers = db::table("users_list")->where('sponsor_id', $value)
                                                ->where('role', '!=', 'admin')
                                                ->get();
                                            foreach ($nextLevelUsers as $row) {

                                                $getnext[] = $row->member_id;
                                            }
                                        } else {

                                            $nextLevelUsers = db::table("users_list")->where('refer_id', $value)
                                                ->where('role', '!=', 'admin')
                                                ->count();
                                            if ($nextLevelUsers <= 2) {
                                                $dbget = db::table("users_list")->where("id", $insertedId)->update(["refer_id" => $value]);
                                                $users = db::table("users_list")->where("id", $insertedId)
                                                    ->where('role', '!=', 'admin')
                                                    ->first();
                                                $uname = $users->name;
                                                $member = $users->member_id;
                                                $password = $users->e_p;
                                                return response()->json(['success' => 'true', 'message' => 'User Add', 'lenth' => $i, 'name' => $uname, 'meid' => $member, 'pwd' => $password]);
                                            } else {
                                                $nextLevelUsers = db::table("users_list")->where('sponsor_id', $value)->get();
                                                foreach ($nextLevelUsers as $row) {

                                                    $getnext[] = $row->member_id;
                                                }
                                            }

                                        }
                                    }
                                }
                            }
                            //   ******************* LIST ************* 
                        }
                    } else {
                        return response()->json(['success' => 'false', 'message' => 'Sponsor Number Is Not Active']);
                        ;
                    }
                }
                // ********** sp ******* 


            } else {
                return response()->json(['success' => 'false', 'message' => 'Sponsor Not Found !!!']);
                ;
            }
        }
    }

    public function joinnow()
    {
        $product = Package::with('cate')->orderby('id', 'desc')->get();
        return view('home.joinnow', compact('product'));
    }
}
