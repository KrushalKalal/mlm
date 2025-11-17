<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\LevelBonus;
use App\Models\Package;
use App\Models\Cashback;
use App\Models\Wallet;
use App\Models\ledger;
use App\Models\WebsiteSetting;
use App\Models\membersincome;
// use App\Models\LevelBonus;
use Illuminate\Support\Facades\Auth;
use Hash;
use DB;
use Crypt;
class AddUserController extends Controller
{
    public function index()
    {
        $setting = WebsiteSetting::first();
        $package = Package::get();

        return view('admin.adduser', compact('setting', 'package'));
    }
    public function getusers(Request $request)
    {
        $user = DB::table("users_list")->where('member_id', $request->id)->first();
        $setting = WebsiteSetting::first();
        $package = Package::get();
        return view('user.Referrallink', compact('setting', 'user', 'package'));
    }
    public function usersindex()
    {
        $user = Auth::user();
        // dd($user);
        $setting = WebsiteSetting::first();
        $package = Package::get();

        return view('user.adduser', compact('setting', 'package', 'user'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'sponsor_id' => 'required',
            'package_id' => 'required',
            'payment_receipt' => 'required',
            'name' => 'required|string|max:255',
            'email' => 'email|unique:users,email',
            'mobile_no' => 'required|numeric|digits:10|unique:users,mobile_no',

        ]);
        $data = new User();
        $data->sponsor_id = $request->sponsor_id;
        $data->package_id = $request->package_id;
        $data->member_id = 'R' . str_pad(rand(0, 99999), 5, '0', STR_PAD_LEFT);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->mobile_no = $request->mobile_no;
        $data->city = $request->city;
        $data->e_p = $request->password;
        $data->password = Hash::make($request->password);
        $data->status = "0";
        $data->role = "user";

        if ($request->hasFile('payment_receipt')) {
            $image = $request->file('payment_receipt');
            $imageName = time() . 'image.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $data->payment_receipt = $imageName;
        }

        $data->save();

        return redirect()->back()->with('success', 'Data Store successfully!');
    }
    public function userlist()
    {
        $user = User::orderby('id', 'desc')->where('role', 'user')->paginate(10);
        return view('admin.userlist', compact('user'));
    }

    public function exportuserlist()
    {
        // Define the file name
        $fileName = 'Orderlist.csv';

        // Fetch testimonials data
        $testimonials = User::get();

        // Open a file in memory
        $handle = fopen('php://output', 'w');

        // Set the headers for CSV download
        header('Content-Type: text/csv');
        header("Content-Disposition: attachment; filename=$fileName");

        $users = User::select('id', 'member_id', 'name', 'sponsor_id', 'mobile_no', 'e_p', 'created_at', 'status')->get();


        // Add CSV column headers
        fputcsv($handle, ['ID', 'Member ID', 'Name', 'Sponsor ID', 'Mobile No', 'Password', 'Joining Date', 'Status', 'Total IDs']);

        // Add rows to CSV
        foreach ($users as $user) {
            // Calculate the Downline Count (Total IDs)
            $downlineCount = User::where("sponsor_id", $user->member_id)
                ->where("member_id", '!=', $user->member_id)
                ->count();

            fputcsv($handle, [
                $user->id,
                $user->member_id,
                $user->name,
                $user->sponsor_id,
                $user->mobile_no,
                $user->e_p,
                date("d-M-y", strtotime($user->created_at)),
                $user->status == "1" ? "Approved" : ($user->status == "2" ? "Rejected" : "Pending"),
                $downlineCount, // New column for Total IDs
            ]);
        }
        // Close file handle
        fclose($handle);

        // Prevent Laravel from adding extra output
        exit;
    }

    public function exportactiveuser()
    {
        // Define the file name
        $fileName = 'activeuser.csv';

        // Open a file in memory
        $handle = fopen('php://output', 'w');

        // Set the headers for CSV download
        header('Content-Type: text/csv');
        header("Content-Disposition: attachment; filename=$fileName");

        $users = User::where('status', '1')->where('role', 'user')->get();


        // Add CSV column headers
        fputcsv($handle, ['ID', 'Member ID', 'Name', 'Sponsor ID', 'Mobile No', 'Password', 'Joining Date', 'Status', 'Total IDs']);

        // Add rows to CSV
        foreach ($users as $user) {
            // Calculate the Downline Count (Total IDs)
            $downlineCount = User::where("sponsor_id", $user->member_id)
                ->where("member_id", '!=', $user->member_id)
                ->count();

            fputcsv($handle, [
                $user->id,
                $user->member_id,
                $user->name,
                $user->sponsor_id,
                $user->mobile_no,
                $user->e_p,
                date("d-M-y", strtotime($user->created_at)),
                $user->status == "1" ? "Approved" : ($user->status == "2" ? "Rejected" : "Pending"),
                $downlineCount, // New column for Total IDs
            ]);
        }
        // Close file handle
        fclose($handle);

        // Prevent Laravel from adding extra output
        exit;
    }

    public function exportinactiveuser()
    {
        // Define the file name
        $fileName = 'inactiveuser.csv';


        // Open a file in memory
        $handle = fopen('php://output', 'w');

        // Set the headers for CSV download
        header('Content-Type: text/csv');
        header("Content-Disposition: attachment; filename=$fileName");

        $users = User::where('status', '2')->where('role', 'user')->get();


        // Add CSV column headers
        fputcsv($handle, ['ID', 'Member ID', 'Name', 'Sponsor ID', 'Mobile No', 'Password', 'Joining Date', 'Status', 'Total IDs']);

        // Add rows to CSV
        foreach ($users as $user) {
            // Calculate the Downline Count (Total IDs)
            $downlineCount = User::where("sponsor_id", $user->member_id)
                ->where("member_id", '!=', $user->member_id)
                ->count();

            fputcsv($handle, [
                $user->id,
                $user->member_id,
                $user->name,
                $user->sponsor_id,
                $user->mobile_no,
                $user->e_p,
                date("d-M-y", strtotime($user->created_at)),
                $user->status == "1" ? "Approved" : ($user->status == "2" ? "Rejected" : "Pending"),
                $downlineCount, // New column for Total IDs
            ]);
        }
        // Close file handle
        fclose($handle);

        // Prevent Laravel from adding extra output
        exit;
    }

    public function userlistsearch(Request $request)
    {
        // dd($request->all());
        $month = $request->month;
        $year = $request->year;

        // Query to filter users based on month & year of created_at
        $user = User::when($month, function ($query) use ($month) {
            return $query->whereMonth('created_at', $month);
        })->when($year, function ($query) use ($year) {
            return $query->whereYear('created_at', $year);
        })->where('role', 'user')->get();


        // $user = User::orderby('id','desc')->where('role','user')->get(); 
        return view('admin.userlist', compact('user'));
    }

    public function pendinguser()
    {
        $user = User::orderby('id', 'desc')->where('status', '0')->where('role', 'user')->get();
        return view('admin.pendinguserlist', compact('user'));
    }

    public function activeuser()
    {
        $user = User::orderby('id', 'desc')->where('status', '1')->where('role', 'user')->paginate(10);
        return view('admin.activeuserlist', compact('user'));
    }
    public function activeusersearch(Request $request)
    {
        $month = $request->month;
        $year = $request->year;

        // Query to filter users based on month & year of created_at
        $user = User::when($month, function ($query) use ($month) {
            return $query->whereMonth('created_at', $month);
        })
            ->when($year, function ($query) use ($year) {
                return $query->whereYear('created_at', $year);
            })
            ->where('status', '1')->where('role', 'user')->get();

        // $user = User::orderby('id','desc')->where('status','1')->where('role','user')->get(); 
        return view('admin.activeuserlist', compact('user'));
    }


    public function inactiveuser()
    {
        $user = DB::table("users_list")->orderby('id', 'desc')->where('status', '2')->where('role', 'user')->paginate(10);
        return view('admin.inactiveuserlist', compact('user'));
    }
    public function inactiveusersearch(Request $request)
    {

        $month = $request->month;
        $year = $request->year;

        // Query to filter users based on month & year of created_at
        $user = User::when($month, function ($query) use ($month) {
            return $query->whereMonth('created_at', $month);
        })
            ->when($year, function ($query) use ($year) {
                return $query->whereYear('created_at', $year);
            })
            ->where('status', '2')->where('role', 'user')->get();

        return view('admin.inactiveuserlist', compact('user'));
    }

    // public function activates(Request $request)
    // {

    //     $cashback = Cashback::first();

    //     $user = User::findOrFail($request->id);
    //     $user->status = $request->status;
    //     $user->save();
    //     if ($request->status == 1) {
    //         $userlist = User::where("id", $request->id)->first();
    //         $row = User::where("member_id", $userlist->refer_id)->first();

    //         $package = Package::where('id', $user->package_id)->first();

    //         $amount = $package->mrp; // ₹500
    //         $rate = $cashback->cashback; // 15%

    //         $total = ($amount * $rate) / 100;

    //         $lenth = 0;
    //         $i = 0;
    //         $LEVEL = 1;
    //         $LOOPLEVEL = 0;
    //         $getnext = [];

    //         for ($i = 0; $i <= $lenth; $i++) {
    //             if ($lenth == 7) {
    //                 break;
    //             } else if ($i == 0) {
    //                 if ($row) {
    //                     $rs = User::where("member_id", $row->member_id)->first();
    //                     if ($LOOPLEVEL == 0 || $rs->status == 1) {
    //                         ++$LOOPLEVEL;
    //                         $lenote = "Level Income of " . $userlist->member_id . " | Level 1";
    //                         $level = LevelBonus::where("level", "Level 1")->first();
    //                         $bonus = $level->bonus;
    //                         $data = new membersincome();
    //                         $data->member_id = $rs->member_id;
    //                         $data->level_id = "Level 1";
    //                         $data->income = $bonus;
    //                         $data->remarks = $lenote;
    //                         $data->S_id = $rs->sponsor_id;
    //                         $data->R_id = $rs->refer_id;
    //                         $data->u_id = $rs->member_id;
    //                         $data->save();

    //                         $lenote = "Level Income of " . $userlist->member_id . $userlist->name . " RS " . $bonus . "| Level 1";
    //                         $leveltotal = ledger::where("member_id", $userlist->member_id)->sum('Cr');
    //                         $levelamount = $leveltotal ?? 0;
    //                         $ledger = new ledger();
    //                         $ledger->member_id = $user->member_id;
    //                         $ledger->remarks = $lenote;
    //                         $ledger->Dr = "0";
    //                         $ledger->Cr = $bonus;
    //                         $ledger->Total = $levelamount;
    //                         $ledger->save();


    //                         if ($rs->refer_id) {
    //                             $dts = User::where("member_id", $rs->refer_id)->first();
    //                             // if($dts->refer_id != $dts->refer_id)
    //                             // {
    //                             $getnext[] = $rs->refer_id;
    //                             ++$lenth;
    //                             // }
    //                         } else {
    //                             //  return response()->json(['success' => 'true', 'message' => 'User Payment Distibute Done']);   
    //                         }
    //                     } else {
    //                         //    ++$LOOPLEVEL;
    //                         $getnext[] = $rs->refer_id;
    //                     }

    //                 }
    //             } else {
    //                 if ($lenth == 6) {
    //                     $rst = User::where("member_id", $memeber)->first();
    //                 } else if ($lenth != 6 || $valid == "true") {

    //                     //    ---------- Geting loop -------- 
    //                     foreach ($getnext as $key => $value) {
    //                         ++$LEVEL;
    //                         $memeber = $value;
    //                         $rst = User::where("member_id", $memeber)->first();
    //                         if ($rs->status == 1 && $LEVEL < 7) {
    //                             ++$LOOPLEVEL;
    //                             $lgetings = "Level " . $LEVEL . "";
    //                             $levels = DB::select("select * from level_bonuses where level = '" . $lgetings . "'");
    //                             foreach ($levels as $rows) {
    //                                 $bonus = $rows->bonus;
    //                             }

    //                             $lenote = "Level Income of " . $userlist->member_id . $userlist->name . " | " . $lgetings;
    //                             $data = new membersincome();
    //                             $data->member_id = $rst->member_id;
    //                             $data->level_id = $lgetings;
    //                             $data->income = $bonus;
    //                             $data->remarks = $lenote;
    //                             $data->S_id = $rst->sponsor_id;
    //                             $data->R_id = $rst->refer_id;
    //                             $data->u_id = $rst->member_id;
    //                             $data->save();

    //                             $lenote = "Level Income of " . $userlist->member_id . $userlist->name . " RS " . $bonus . " | " . $lgetings;
    //                             $leveltotal = ledger::where("member_id", $rs->member_id)->sum('Cr');
    //                             $levelamount = $leveltotal ?? 0;
    //                             $ledger = new ledger();
    //                             $ledger->member_id = $rst->member_id;
    //                             $ledger->remarks = $lenote;
    //                             $ledger->Dr = "0";
    //                             $ledger->Cr = $bonus;
    //                             $ledger->Total = $levelamount;
    //                             $ledger->save();

    //                             if ($rst->role == "admin") {

    //                             } else {
    //                                 $getnext = [];
    //                                 $getnext[] = $rst->refer_id; // Nayi ID store ka
    //                                 ++$lenth;

    //                             }
    //                         } else {
    //                             ++$lenth;
    //                             $getnext = [];
    //                             $getnext[] = $rst->refer_id; // Nayi ID store ka
    //                         }

    //                     }
    //                     //    ---------- Geting loop -------- 
    //                 }
    //             }

    //         }
    //         // dd($user);
    //         $wallet = new Wallet();
    //         $wallet->member_id = $user->member_id;
    //         $wallet->cashback = $cashback->cashback;
    //         $wallet->total = $total;
    //         $wallet->mrp = $package->mrp;
    //         $wallet->package_id = $user->package_id;
    //         $wallet->save();


    //         $lenote = "Wallet Amount " . $user->member_id . $user->name . " RS " . $total;
    //         $leveltotal = ledger::where("member_id", $user->member_id)->sum('Cr');
    //         $levelamount = $leveltotal ?? 0;
    //         $ledger = new ledger();
    //         $ledger->member_id = $user->member_id;
    //         $ledger->remarks = $lenote;
    //         $ledger->Dr = "0";
    //         $ledger->Cr = $bonus;
    //         $ledger->Total = $levelamount;
    //         $ledger->save();


    //         return response()->json(['success' => 'true', 'message' => 'User Payment Distibute Done']);
    //     } else {
    //         return response()->json(['success' => 'true', 'message' => 'User Deactived']);
    //     }
    // }

    public function activate(Request $request)
    {

        //dd("hear");
        $cashback = Cashback::first();

        if ($request->status == 1) {
            $datageting = $this->getuserrecord($request);
            if ($datageting) {

                $userlistgetdata = DB::table("users_list")->where("id", $request->id)->first();
                $datagetlist = User::where("member_id", $userlistgetdata->member_id)->first();
                $dataget = $datagetlist->id;
                $user = User::findOrFail($dataget);
                $user->status = $request->status;
                $user->created_at = now();
                $user->updated_at = now();
                $user->save();

                $userlist = User::where("id", $dataget)->first();
                $package = Package::where('id', $user->package_id)->first();

                $amount = $package->mrp; // ₹500
                $rate = $cashback->cashback; // 15%
                $total = ($amount * $rate) / 100;

                $currentReferId = $userlist->refer_id;
                $level = 1;
                $maxLevels = 6;
                $adminReceived = false;

                while ($currentReferId && $level <= $maxLevels) {
                    $referrer = User::where("member_id", $currentReferId)->first();

                    if (!$referrer) {
                        break;
                    }

                    if ($referrer->role == "admin" && $adminReceived) {
                        break;
                    }

                    $levelBonus = LevelBonus::where("level", "Level $level")->first();
                    $bonusAmount = $levelBonus->bonus ?? 0;

                    if ($bonusAmount > 0) {
                        // Check if entry already exists for this user and level
                        // $existingIncome = MembersIncome::where('member_id', $referrer->member_id)
                        //     ->where('level_id', "Level $level")
                        //     ->exists();

                        // if (!$existingIncome) {
                        // Members Income Entry
                        $incomeEntry = new MembersIncome();
                        $incomeEntry->member_id = $referrer->member_id;
                        $incomeEntry->level_id = "Level $level";
                        $incomeEntry->income = $bonusAmount;
                        $incomeEntry->remarks = "Level Income from " . $userlist->member_id . " | Level $level";
                        $incomeEntry->S_id = $referrer->sponsor_id;
                        $incomeEntry->R_id = $referrer->refer_id;
                        $incomeEntry->u_id = $referrer->member_id;
                        $incomeEntry->save();

                        // Ledger Entry
                        $ledgerTotal = Ledger::where("member_id", $referrer->member_id)->sum('Cr');
                        $ledgerEntry = new Ledger();
                        $ledgerEntry->member_id = $referrer->member_id;
                        $ledgerEntry->remarks = "Level Income from " . $userlist->member_id . " | Level $level";
                        $ledgerEntry->Dr = "0";
                        $ledgerEntry->Cr = $bonusAmount;
                        $ledgerEntry->Total = $ledgerTotal + $bonusAmount;
                        $ledgerEntry->save();
                        // }

                        if ($referrer->role == "admin") {
                            $adminReceived = true;
                        }
                    }
                    $userle = User::where("member_id", $referrer->refer_id)->first();
                    $currentReferId = $userle->member_id;
                    $level++;
                }

                $existingWallet = Wallet::where('member_id', $user->member_id)->exists();

                if (!$existingWallet) {
                    $wallet = new Wallet();
                    $wallet->member_id = $user->member_id;
                    $wallet->cashback = $cashback->cashback;
                    $wallet->total = $total;
                    $wallet->mrp = $package->mrp;
                    $wallet->package_id = $user->package_id;
                    $wallet->save();
                }

                return response()->json(['success' => 'true', 'message' => 'User Payment Distributed Successfully']);
            } else {
                return response()->json(['success' => 'true', 'message' => 'User Deactivated']);
            }
        } else {
            DB::table("users_list")->where("id", $request->id)->update(["status" => 2]);
            return response()->json(['success' => 'true', 'message' => 'User Deactivated']);
        }

    }



    public function getuserrecord(Request $request)
    {


        $dbl = DB::table('users_list')->where("id", $request->id)->update(['status' => 1]);
        $db = DB::table('users_list')->where("id", $request->id)->first();

        if ($db) {
            // ********** sp ******* 
            if ($db) {
                $status = $db->status;
                if ($status == 1) {
                    $count = DB::table('users')->where('sponsor_id', $db->sponsor_id)->count();
                    if ($count >= 10) {
                        return response()->json(['success' => 'false', 'message' => 'Sponsor Is Not Active']);
                    } else {
                        $count = DB::table('users')->where('role', '!=', 'admin')->count() + 1; // Increment count by 1
                        $insertedId = DB::table('users')->insertGetId([
                            'package_id' => $db->package_id,
                            'member_id' => $db->member_id,
                            'name' => $db->name,
                            'sponsor_id' => $db->sponsor_id,
                            'email' => $db->email,
                            'mobile_no' => $db->mobile_no,
                            'confirm_phone' => $db->confirm_phone,
                            'state' => $db->state,
                            'city' => $db->city,
                            'e_p' => $db->e_p,
                            'password' => $db->password,
                            'status' => "1",
                            'role' => "user",
                            'payment_receipt' => $db->payment_receipt,
                        ]);


                        $lenth = 0;
                        $i = 0;
                        $getnext = [];

                        for ($i = 0; $i <= $lenth; $i++) {
                            if ($i == 0) {
                                $users = DB::table('users')->where('sponsor_id', $db->sponsor_id)
                                    ->where('role', '!=', 'admin')
                                    ->where('id', '!=', $insertedId)
                                    ->count();

                                if ($users >= 3) {
                                    ++$lenth;
                                    $userslenth = DB::table('users')->where('sponsor_id', $db->sponsor_id)->get();
                                    foreach ($userslenth as $row) {
                                        $getnext[] = $row->member_id;
                                    }
                                } else {
                                    $nextLevelUsers = DB::table('users')->where('refer_id', $db->sponsor_id)
                                        ->where('role', '!=', 'admin')
                                        ->count();
                                    if ($nextLevelUsers <= 2 || $nextLevelUsers == 0) {

                                        $dbget = DB::table('users')->where("id", $insertedId)->update(["refer_id" => $db->sponsor_id]);
                                        $users = DB::table('users')->where("id", $insertedId)->first();
                                        $uname = $users->name;
                                        $member = $users->member_id;
                                        $password = $users->e_p;
                                        return response()->json(['success' => 'true', 'message' => 'User Add', 'lenth' => $i, 'name' => $uname, 'meid' => $member, 'pwd' => $password]);
                                    } else {
                                        ++$lenth;
                                        $nextLevelUsers = DB::table('users')->where('refer_id', $db->sponsor_id)->get();
                                        foreach ($nextLevelUsers as $row) {
                                            $getnext[] = $row->member_id;
                                        }
                                    }
                                }
                            } else {
                                foreach ($getnext as $key => $value) {
                                    $users = DB::table('users')->where('sponsor_id', $value)
                                        ->where('role', '!=', 'admin')
                                        ->where('id', "!=", $insertedId)->count();
                                    if ($users >= 3) {
                                        $nextLevelUsers = DB::table('users')->where('sponsor_id', $value)
                                            ->where('role', '!=', 'admin')
                                            ->get();
                                        foreach ($nextLevelUsers as $row) {

                                            $getnext[] = $row->member_id;
                                        }
                                    } else {

                                        $nextLevelUsers = DB::table('users')->where('refer_id', $value)
                                            ->where('role', '!=', 'admin')
                                            ->count();
                                        if ($nextLevelUsers <= 2) {
                                            $dbget = DB::table('users')->where("id", $insertedId)->update(["refer_id" => $value]);
                                            $users = DB::table('users')->where("id", $insertedId)
                                                ->where('role', '!=', 'admin')
                                                ->first();
                                            $uname = $users->name;
                                            $member = $users->member_id;
                                            $password = $users->e_p;
                                            return $db->id;
                                        } else {
                                            $nextLevelUsers = DB::table('users')->where('sponsor_id', $value)->get();
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

    public function deactivate($id)
    {
        $user = User::findOrFail($id);
        $user->status = 2;
        $user->save();

        return redirect()->back()->with('success', 'User deactivated successfully.');
    }

    public function profile($id)
    {
        $user = User::FindOrFail($id);
        // dd($user);
        return view('user.profile', compact('user'));
    }

    public function Viewdownline(Request $request)
    {
        $levelgei = 0;
        $role = Auth::user()->role;
        $member = Auth::user()->member_id;
        $table = 0;
        if ($role != "user") {
            if ($request->id) {
                $user = User::where('role', 'user')
                    ->where(function ($query) use ($request) {
                        $query->where('sponsor_id', $request->id)
                            ->orWhere('refer_id', $request->id);
                    })
                    ->get();

                $level = "Downline";
                $member = $request->id;
                $levelgei = 1;
            } else {
                $rrequest = Auth::user()->member_id;
                $user = User::where('role', 'user')
                    ->where(function ($query) use ($rrequest) {
                        $query->where('sponsor_id', $rrequest)
                            ->orWhere('refer_id', $rrequest);
                    })
                    ->get();

                $level = "Downline";

            }
        } else {
            if ($request->id) {
                $user = User::where('role', 'user')
                    ->where(function ($query) use ($request) {
                        $query->where('sponsor_id', $request->id)
                            ->orWhere('refer_id', $request->id);
                    })
                    ->get();

                $level = "Downline";
                $member = $request->id;
                $levelgei = 1;
            } else {
                $rrequest = Auth::user()->member_id;
                $user = User::where('role', 'user')
                    ->where(function ($query) use ($rrequest) {
                        $query->where('sponsor_id', $rrequest)
                            ->orWhere('refer_id', $rrequest);
                    })
                    ->get();

                $level = "Downline";

            }
        }
        return view('user.Viewdownline', compact('user', 'level', 'levelgei', 'table', 'member'));
    }

    public function DirectUsers(Request $request)
    {
        $id = $request->id;
        if ($id != 0) {
            $urequest = User::where("id", $id)->first();
            $user = membersincome::where('u_id', $urequest->member_id)
                ->distinct('member_id')
                ->get();
        } else {
            $user = membersincome::all();
        }
        $levels = LevelBonus::get();
        return view('admin.Viewdownlinelist', compact('user', 'levels', 'urequest'));
    }

    public function DirectUsersGET(Request $request)
    {
        $levelgei = 0;
        $table = 1;
        $role = Auth::user()->role;
        $member = Auth::user()->member_id;
        if ($role != "user") {
            if ($request->id) {
                $user = User::where('role', 'user')->where('refer_id', $request->id)->get();
                $level = "Direct Users";
                $levelgei = 1;
                $member = $request->id;
            } else {
                $user = User::where('role', 'user')->where('refer_id', Auth::user()->member_id)->get();
                $level = "Direct Users";

            }

        } else {
            if ($request->id) {
                $user = User::where('role', 'user')->where('refer_id', $request->id)->get();
                $level = "Direct Users";
                $levelgei = 1;
                $member = $request->id;
            } else {
                $user = User::where('role', 'user')->where('refer_id', Auth::user()->member_id)->get();
                $level = "Direct Users";

            }
        }
        return view('user.Viewdownline', compact('user', 'level', 'levelgei', 'table', 'member'));
    }

    public function levelwaiseincome(Request $request)
    {
        $user = User::orderby('id', 'desc')->where('role', 'user')->paginate(10);
        // dd($user);
        return view('admin.levelwaiseincomeuserList', compact('user'));
    }

    public function levelwaiseincomesearch(Request $request)
    {


        $month = $request->month;
        $year = $request->year;
        if ($request->search == null) {
            $user = User::when($month, function ($query) use ($month) {
                return $query->whereMonth('created_at', $month);
            })
                ->when($year, function ($query) use ($year) {
                    return $query->whereYear('created_at', $year);
                })

                ->where('role', 'user')->paginate(10);
        } else {

            $search = request()->input('search'); // Get search input
            $user = User::where('role', 'user')
                ->where(function ($query) use ($search) {
                    if ($search) {
                        $query->where('name', 'LIKE', "%{$search}%")
                            ->orWhere('member_id', 'LIKE', "%{$search}%")
                            ->orWhere('mobile_no', 'LIKE', "%{$search}%")
                            ->orWhere('created_at', 'LIKE', "%{$search}%")
                            ->orWhere('sponsor_id', 'LIKE', "%{$search}%");
                    }
                })
                ->paginate(10);

        }



        return view('admin.levelwaiseincomeuserList', compact('user'));
    }

    public function exportlevelwaiseincome()
    {
        // Define the file name
        $fileName = 'levelwaiseincome.csv';

        // Open a file in memory
        $handle = fopen('php://output', 'w');

        // Set the headers for CSV download
        header('Content-Type: text/csv');
        header("Content-Disposition: attachment; filename=$fileName");

        $users = User::where('role', 'user')->get();

        // Add CSV column headers
        fputcsv($handle, ['ID', 'Member ID', 'Name', 'Sponsor ID', 'Mobile No', 'Password', 'Joining Date', 'Status', 'Total IDs']);

        // Add rows to CSV
        foreach ($users as $user) {
            // Calculate the Downline Count (Total IDs)
            $downlineCount = User::where("sponsor_id", $user->member_id)
                ->where("member_id", '!=', $user->member_id)
                ->count();

            fputcsv($handle, [
                $user->id,
                $user->member_id,
                $user->name,
                $user->sponsor_id,
                $user->mobile_no,
                $user->e_p,
                date("d-M-y", strtotime($user->created_at)),
                $user->status == "1" ? "Approved" : ($user->status == "2" ? "Rejected" : "Pending"),
                $downlineCount, // New column for Total IDs
            ]);
        }
        // Close file handle
        fclose($handle);

        // Prevent Laravel from adding extra output
        exit;
    }


    public function levelwaiseincomedata(Request $request)
    {
        $member = Crypt::decrypt($request->id);
        $user = membersincome::where('u_id', $member)->get();
        $levels = LevelBonus::get();
        return view('admin.levelwaiseincomeList', compact('user', 'levels', 'member'));
    }

    public function levelwaiseincomeget(Request $request)
    {
        $level = "Level " . Crypt::decrypt($request->id);
        // dd($level)
        $limit = Crypt::decrypt($request->limit);
        $user = membersincome::where('level_id', 'LIKE', $level)
            ->where('u_id', 'LIKE', Crypt::decrypt($request->member))
            ->distinct('member_id')
            ->take($limit)
            ->get();

        // dd("1");
        return view('admin.levelwaiseincome', compact('user'));
    }
    public function product(Request $request)
    {
        $product = Package::with('cate')->orderby('id', 'desc')->get();
        //  dd("1");
        return view('user.product', compact('product'));
    }

    public function cashbacklist(Request $request)
    {
        $role = Auth::user()->role;
        if ($role == "user") {
            $user = Wallet::where("member_id", Auth::user()->member_id)->get();
        } else {
            $user = Wallet::paginate(10);
        }
        return view('admin.cashbacklist', compact('user'));
    }
    public function cashbacklistsearch(Request $request)
    {
        $role = Auth::user()->role;

        if ($role == "user") {

            $user = Wallet::where("member_id", Auth::user()->member_id)->get();
        } else {
            $month = $request->month;
            $year = $request->year;

            $user = Wallet::when($month, function ($query) use ($month) {
                return $query->whereMonth('created_at', $month);
            })
                ->when($year, function ($query) use ($year) {
                    return $query->whereYear('created_at', $year);
                })

                ->paginate(10);
            // $user = Wallet::all();
        }
        return view('admin.cashbacklist', compact('user'));
    }

}
