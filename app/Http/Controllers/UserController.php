<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Userlist;
use App\Models\Package;
use App\Models\Checkout;
use App\Models\Wallet;
use App\Models\membersincome;
use App\Models\WebsiteSetting;
use App\Models\About;
use App\Models\LevelBonus;
use Illuminate\Support\Facades\Auth;
use Hash;
use DB;
use Carbon;
class UserController extends Controller
{
    public function dashboard() 
    {
        $user = Auth::guard('web')->user();
       
        $wallet = Wallet::where('member_id', $user->member_id)->sum('total');
        $levelincome = membersincome::where('member_id', $user->member_id)->sum('income');
        
        
        $levelIncomeAfterDeduction = $levelincome - ($levelincome * 0.25);
        $income = $levelIncomeAfterDeduction;
        
        
        $totalincome = $income;
        $directteam = User::where('refer_id',$user->member_id)->count();
        $totalteam = User::where('refer_id',$user->member_id)->count();
        $directteamlevel = User::where('refer_id',$user->member_id)->get();
            $downCount = 0;
        foreach($directteamlevel as $data)
        {
               if($data->member_id != $user->member_id || $data->member_id != "Admin")
               {
                   
            $queue = [$data->member_id];
            
            while (!empty($queue)) {
                $currentSponsorId = array_shift($queue); 
                $downlines = User::where("refer_id", $currentSponsorId)->pluck('member_id');
            
                foreach ($downlines as $downline) {
                    $queue[] = $downline;
                    $downCount++;
                }
            }   
            //   echo $data->member_id."<br>";
               }
               
        }
        // exit;
        return view ('user.dashboard',compact('wallet','directteam','downCount','totalteam','levelincome','totalincome','user'));
    }

    public function profile()
    {
        $user = Auth::guard('web')->user();
        return view('user.profile',compact('user'));
    }
    public function company()
    {
        $abouts = About::first(); 
        $product = Package::orderby('id','desc')->get();
        return view('user.company',compact('abouts','product'));
    }
    
     public function logincheck(Request $request)
    {
        $credentials = [
            'member_id' => $request->member_id,
            'password' => $request->password
        ];
        
        $user = DB::table('users_list')->where('member_id',$request->member_id)->first();
        
        if($user == null)
        {
            return redirect()->back()->withErrors(['error' => 'Member id Not Found']);
        }
        
        $data = [
            'member_id' => $user->member_id,
            'password' => $request->password,
        ];

        if(Auth::guard('web')->attempt($data)) {
            $user = Auth::guard('web')->user();
            if ($user->role == 'user') {
                return redirect()->route('front.dashboard'); 
            } else {
                Auth::guard('web')->logout();
                return redirect()->back()->withErrors(['error' => 'Invalid role']);
            }
        }
        return redirect()->back()->withErrors(['error' => 'Somthing Are Wrong']);
    }

    
    public function editprofile(Request $request)
    {
     
        $data = Auth::guard('web')->user();
        
        $data->name = $request->name_update;
        $data->date_of_birth = $request->date_of_birth;
        $data->mobile_no = $request->mobile_no;
        $data->email = $request->email;
        $data->state = $request->state;
        $data->upi = $request->upi;
        $data->city = $request->city;
        $data->mobile_bank = $request->mobile_bank;
        $data->full_address = $request->full_address;
        $data->bank_name = $request->bank_name;
        $data->ifsc_code = $request->ifsc_code;
        $data->bank_ac = $request->bank_ac;
        if($request->password != null && $request->password == $request->password_confirmation)
        {
            $data->password = Hash::make($request->password);
            $data->e_p = $request->password;
        }
        $data->save();
        return redirect()->back()->with('success','user Data Updated Successfully');
    }

    public function login()
    {
        return view ('user.login');
    }
    
     public function welcome()
    {
         $setting = WebsiteSetting::first();
          $user = Auth::guard('web')->user();
        return view ('user.welcome',compact('setting','user'));
    }


    public function orderlist()
    {
        $data = Auth::guard('web')->user();
        $setting = WebsiteSetting::first();
        $order = User::where('member_id',$data->member_id)->orderby('id','desc')->first(); 
        return view ('user.orderlist',compact('order','setting'));
    }
    
     public function directteam()
    {
         $user = Auth::guard('web')->user();
    
         $order = User::where('refer_id',$user->member_id)->paginate(10);
         
        return view ('user.directteam',compact('order','user'));
    }
      public function DirectTeamsearch(Request $request)
    {
        // dd($request->all());
        $user = Auth::guard('web')->user();
        
          $month = $request->month;
        $year = $request->year;

        // Query to filter users based on month & year of created_at
        $order = User::when($month, function ($query) use ($month) {
                return $query->whereMonth('created_at', $month);
            })
            ->when($year, function ($query) use ($year) {
                return $query->whereYear('created_at', $year);
            })
            ->where('role','user')->paginate(10);
            
        // $user = User::orderby('id','desc')->where('role','user')->get(); 
         return view ('user.directteam',compact('order','user'));
    }

       public function levelteam()
        {
            $setting = WebsiteSetting::first();
            $authUser = Auth::user();
        
            // $levels = [];
            // $currentLevelUsers = User::where('refer_id', $authUser->member_id)->get();
            // $sr = 0;
        
            // for ($level = 1;$level <= 6 && $currentLevelUsers->isNotEmpty(); $level++) {
            //     $usersData = $currentLevelUsers->map(function ($user) use (&$sr, $level) {
            //         $package = $user->package_id ? DB::table('packages')->find($user->package_id) : null;
            //         $income = membersincome::where('member_id', $user->member_id)
            //             ->where('level_id', 'LIKE', "Level $level")
            //             ->first();
        
            //         return [
            //             'sr' => ++$sr,
            //             'member_id' => $user->member_id,
            //             'name' => $user->name,
            //             'sponsor_id' => $user->sponsor_id,
            //             'joining_date' => $user->created_at->format('d-M-y'),
            //             'package_amount' => $package->mrp ?? null,
            //             'status' => $user->status,
            //             'has_income' => $income !== null,
            //         ];
            //     });
        
            //     // Add all users for this level, even if no income
            //     $levels["Level $level"] = $usersData;
        
            //     // Proceed to the next level
            //     $currentLevelUsers = User::whereIn('refer_id', $currentLevelUsers->pluck('member_id'))->get();
            // }
            
            $user = membersincome::where('U_id',$authUser->member_id)->get();
        
          $levels = LevelBonus::paginate(10);
            return view('user.levelteamdts', compact('setting','levels','user'));
        }
        
         public function LevelTeamsearch(Request $request)
        {
            $setting = WebsiteSetting::first();
            $authUser = Auth::user();
                
            $month = $request->month;
            $year = $request->year;
    
            // Query to filter users based on month & year of created_at
            $levels = LevelBonus::when($month, function ($query) use ($month) {
               
                return $query->whereMonth('created_at', $month);
            })
            ->when($year, function ($query) use ($year) {
                //  dd($year);
                return $query->whereYear('created_at', $year);
            })
            ->paginate(10);
            
            //  dd($user);
             $user = membersincome::where('U_id',$authUser->member_id)->get();
    
            return view('user.levelteamdts', compact('setting','levels','user'));
        }


       public function levelteamincome()
        {
            $setting = WebsiteSetting::first();
            $authUser = Auth::user();
        
            // $levels = [];
            // $currentLevelUsers = User::where('refer_id', $authUser->member_id)->get();
            // $sr = 0;
        
            // for ($level = 1;$level <= 6 && $currentLevelUsers->isNotEmpty(); $level++) {
            //     $usersData = $currentLevelUsers->map(function ($user) use (&$sr, $level) {
            //         $package = $user->package_id ? DB::table('packages')->find($user->package_id) : null;
            //         $income = membersincome::where('member_id', $user->member_id)
            //             ->where('level_id', 'LIKE', "Level $level")
            //             ->first();
        
            //         return [
            //             'sr' => ++$sr,
            //             'member_id' => $user->member_id,
            //             'name' => $user->name,
            //             'sponsor_id' => $user->sponsor_id,
            //             'joining_date' => $user->created_at->format('d-M-y'),
            //             'package_amount' => $package->mrp ?? null,
            //             'status' => $user->status,
            //             'has_income' => $income !== null,
            //         ];
            //     });
        
            //     // Add all users for this level, even if no income
            //     $levels["Level $level"] = $usersData;
        
            //     // Proceed to the next level
            //     $currentLevelUsers = User::whereIn('refer_id', $currentLevelUsers->pluck('member_id'))->get();
            // }
            
            $user = membersincome::where('u_id',$authUser->member_id)->get();
        
          $levels = LevelBonus::paginate(10);
            return view('user.levelteam', compact('setting','levels','user'));
        }
        
         public function LevelTeamincomesearch(Request $request)
        {
             $setting = WebsiteSetting::first();
            $authUser = Auth::user();
            
            $month = $request->month;
            $year = $request->year;
    
            // Query to filter users based on month & year of created_at
            $levels = LevelBonus::when($month, function ($query) use ($month) {
               
                return $query->whereMonth('created_at', $month);
            })
            ->when($year, function ($query) use ($year) {
                //  dd($year);
                return $query->whereYear('created_at', $year);
            })
            ->paginate(10);
            // dd($levels);

             $user = membersincome::where('u_id',$authUser->member_id)->get();
        
            return view('user.levelteam', compact('setting','levels','user'));
        }

    public function tree()
    {
         $setting = WebsiteSetting::first();
          $user = Auth::guard('web')->user();
        return view ('user.tree',compact('setting','user'));
    }

    public function complateteam()
    {
         $setting = WebsiteSetting::first();
          $user = Auth::guard('web')->user();
        return view ('user.complateteam',compact('setting','user'));
    }
    
    public function mypackage()
    {
        $user = Auth::guard('web')->user();
        $package = Package::where('id',$user->package_id)->first();
        //  dd($package);
      
        return view ('user.mypackage',compact('package','user'));
    }
    
     public function income()
    {
        $user = Auth::guard('web')->user();
        $levelincome = membersincome::where('member_id', $user->member_id)->paginate(10);
      //  dd($user->member_id);
      
        return view ('user.income',compact('levelincome','user'));
    }
    
    public function incomesearch(Request $request)
    {
         $user = Auth::guard('web')->user();

        $month = $request->month;
        $year = $request->year;

        // Query to filter users based on month & year of created_at
        $levelincome = membersincome::when($month, function ($query) use ($month) {
           
            return $query->whereMonth('created_at', $month);
        })
        ->when($year, function ($query) use ($year) {
            //  dd($year);
            return $query->whereYear('created_at', $year);
        })
        ->where('member_id', $user->member_id)->paginate(10);
        

        return view ('user.income',compact('levelincome','user'));
    }

    
     public function logout()
    {
        $user = Auth::guard('web')->user();
        Auth::guard('web')->logout();
        return redirect()->route('front.login');
    }


}
