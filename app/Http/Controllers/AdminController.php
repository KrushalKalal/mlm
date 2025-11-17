<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Contact;
use App\Models\Cashback;
use App\Models\User;
use App\Models\Wallet;
use App\Models\membersincome;
use App\Models\Checkout;
use DB;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function dashboard()
    {
        $users = User::where('status','1')->where('role','user')->get();
        // dd($users);
        $today = Carbon::today();
        
        $cashback = Wallet::sum('total');
        
        $todayactive = User::where('status', "1")->where('role','user')->whereDate('created_at', $today)->count();
        $newjoin = User::whereDate('created_at', $today)->where('role','user')->count();
        $user = User::where('role','user')->count();
        
        $approval = User::where('status',"1")->where('role','user')->count();
        $pending = User::where('status',"0")->where('role','user')->count();
        $reject = User::where('status',"2")->where('role','user')->count();
        
        // $reject = User::where('status',"2")->count();
        return view ('admin.dashboard',compact('users','user','pending','reject','approval','newjoin','todayactive','cashback'));
    }

    public function contactlist()
    {
        $contact = Contact::orderby('id','desc')->paginate(10); 
        return view ('admin.contactlist',compact('contact'));
    }
    
      public function exportcontactlist()
    {
        // Define the file name
        $fileName = 'contactlist.csv';

        // Fetch testimonials data
        $testimonials = Contact::get();

        // Open a file in memory
        $handle = fopen('php://output', 'w');

        // Set the headers for CSV download
        header('Content-Type: text/csv');
        header("Content-Disposition: attachment; filename=$fileName");

        // Add CSV column headers
        fputcsv($handle, ['ID', 'Name', 'Email', 'Question','Comment']);

        // Add rows to CSV
        foreach ($testimonials as $testimonial) {
                                            
            fputcsv($handle, [
                $testimonial->id,
                $testimonial->name,
                $testimonial->email,
                $testimonial->question,
                $testimonial->comment,
            ]);
        }

        // Close file handle
        fclose($handle);

        // Prevent Laravel from adding extra output
        exit;
    }

    public function orderlist()
    {
        $order = DB::table("users_list")->orderby('id','desc')->where('status','0')->paginate(10); 
        return view ('admin.activenew',compact('order'));
    }
    
     public function exportorderlist()
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

        // Add CSV column headers
        fputcsv($handle, ['ID', 'Joining Date', 'Name', 'Member Id', 'Mobile No','Status']);

        // Add rows to CSV
        foreach ($testimonials as $testimonial) {
    
            if($testimonial->status == 1)
            {
                $status = "Approved";
            }elseif($testimonial->status == 2)
            {
                $status = "Rejected";
            }else
            {
                $status = "Pending";
            }
                                            
            fputcsv($handle, [
                $testimonial->id,
                $testimonial->created_at,
                $testimonial->name,
                $testimonial->member_id,
                $testimonial->mobile_no,
                $status
            ]);
        }

        // Close file handle
        fclose($handle);

        // Prevent Laravel from adding extra output
        exit;
    }
    
     public function orderlistsearch(Request $request)
    {
        // dd($request->all());
          $month = $request->month;
        $year = $request->year;

    // Query to filter users based on month & year of created_at
    $order = User::when($month, function ($query) use ($month) {
                return $query->whereMonth('created_at', $month);
            })
            ->when($year, function ($query) use ($year) {
                return $query->whereYear('created_at', $year);
            })
            ->orderby('id','desc')->where('status','0')->get();
            
        // $user = User::orderby('id','desc')->where('role','user')->get(); 
        return view ('admin.activenew',compact('order'));
    }


    public function login()
    {
        return view ('admin.login');
    }
    
    
    public function logincheck(Request $request)
    {
        if (Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::guard('web')->user();
            
            if ($user->role == 'admin') {
                return redirect()->route('admin.dashboard'); 
            } else {
                Auth::guard('web')->logout();
                return redirect()->route('login')->withErrors(['error' => 'Invalid role']);
            }
        }
        
        return redirect()->back()->withErrors(['error' => 'Something went wrong']);
    }


    public function contactdelete($id)
    {
        $news = Contact::findOrFail($id);
        $news->delete();

        return redirect()->back()->with('success', 'News deleted successfully.');
    }

     public function orderdelete($id)
    {
        $news = User::findOrFail($id);
        $news->delete();

        return redirect()->back()->with('success', 'News deleted successfully.');
    }
    
     public function logout()
    {
        $user = Auth::guard('web')->user();
        Auth::guard('web')->logout();
        return redirect()->route('admin.login');
    }
    
   public function deletedata(Request $request)
    {
        $auth = Auth::user()->role;
        if ($auth == "admin") {
            User::where("role", "user")->delete();
            membersincome::query()->truncate();
            Wallet::query()->truncate();
            DB::table("payamount")->truncate(); 
            return response()->json(['success' => 'true', 'message' => 'User Payment Distribute Done']);
        } else {
            return response()->json(['success' => 'false', 'message' => 'Allowed Only Admin Side']);
        }
    }

}
