<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Support;
use Illuminate\Support\Facades\Auth;
use DB;

class SupportController extends Controller
{
    public function support()
    {
        $news = Support::orderby('id','desc')->paginate(10); 
        return view('admin.support',compact('news'));
    }
    
         public function exportsupport()
    {
        // Define the file name
        $fileName = 'exportsupport.csv';

        // Fetch testimonials data
        $testimonials = Support::get();

        // Open a file in memory
        $handle = fopen('php://output', 'w');

        // Set the headers for CSV download
        header('Content-Type: text/csv');
        header("Content-Disposition: attachment; filename=$fileName");

        // Add CSV column headers
        fputcsv($handle, ['ID', 'Member id','Member Name', 'Phone No', 'Email','Title','Subject','Question','Answer']);

        // Add rows to CSV
        foreach ($testimonials as $data) {
            $mem = DB::table('users')->where('member_id',$data->member_id)->first();   
            
            fputcsv($handle, [
                $data->id,
                $mem->member_id,
                $mem->name,
                $mem->mobile_no,
                $mem->email,
                $data->title,
                $data->subject,
                $data->question,
                $data->answer,
            ]);
        }

        // Close file handle
        fclose($handle);

        // Prevent Laravel from adding extra output
        exit;
    }

    public function usersupport()
    {  
        $user = Auth::guard('web')->user();
        // dd($user);
        $news = Support::where('member_id',$user->member_id)->orderby('id','desc')->paginate(10); 
        
        return view('user.support',compact('news'));

    }

    public function store(Request $request)
    {
        $user = Auth::guard('web')->user();

        $data = new Support();
        $data->member_id = $user->member_id;
        $data->title = $request->title;
        $data->subject = $request->subject;
        $data->question = $request->question;
        $data->answer = $request->answer;
        $data->status = "Active";
        $data->save();

        return redirect()->route('user.support')->with('success', 'Data Store successfully!');
    }

    public function edit($id)
    {
        $user = Auth::guard('web')->user();
        $news = Support::orderby('id','desc')->paginate(10); 
        $new = Support::FindOrFail($id);
        if($user->role == "admin")
        {
            return view('admin.support',compact('news','new'));
        }
        return view('user.support',compact('news','new'));
    }
    public function update(Request $request,$id)
    {
        $user = Auth::guard('web')->user();
        // dd($user);
    
        if($user->role == "admin")
        {
            $data = Support::FindOrFail($id);
            $data->answer = $request->answer;
            $data->save();
            return redirect()->route('admin.support')->with('success', 'Data Store successfully!'); 
        }else{
            $data = Support::FindOrFail($id);
            $data->title = $request->title;
            $data->subject = $request->subject;
            $data->question = $request->question;
            $data->answer = $request->answer;
            $data->save();
            return redirect()->route('user.support')->with('success', 'Data Update successfully!');
        }
        
    }
    
    public function destroy($id)
    {
        $news = Support::findOrFail($id);
        $news->delete();
        
        return redirect()->back()->with('message', 'News deleted successfully.');
    }
}
