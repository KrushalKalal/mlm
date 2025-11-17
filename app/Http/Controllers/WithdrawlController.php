<?php

namespace App\Http\Controllers;

use App\Models\Withdrawal;
use App\Models\User;
use App\Models\ledger;
use App\Models\payoutamount;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Log;
use Auth;
class WithdrawlController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $data = withdrawl::all();
        $auth = Auth::guard('web')->user();
        if($auth->role == "admin")
        {
            $users = User::whereNot('name','Right Shadow Admin')->paginate(10); 
            //  dd($users);
        }else{
             $users = User::where('member_id',$auth->member_id)->paginate(10);
        }
       
        return view("admin.withdrawl.index",compact('users','auth'));
    }
    
       public function exportwithdrawl()
    {
        // Define the file name
        $fileName = 'withdrawl.csv';

        // Open a file in memory
        $handle = fopen('php://output', 'w');

        // Set the headers for CSV download
        header('Content-Type: text/csv');
        header("Content-Disposition: attachment; filename=$fileName");

        $users = User::whereNot('name','Right Shadow Admin')->get();

        // Add CSV column headers
        fputcsv($handle, ['ID', 'Member ID', 'Name', 'Sponsor ID', 'Total Cashback', 'Total Level Income', 'Add', 'Less' ,'Total Earning', 'Service tax','TDS','Net Payable Amount' ,'Payment Done','Pending Amount']);
        
       
        // Add rows to CSV
        foreach ($users as $user) {
         
        $intotal = DB::table('wallets')->where("member_id", $user->member_id)->sum("total");
        $intotals = $intotal ?? 0;
  
        $datasum = membersincome::where("member_id", $user->member_id)->sum("income");
        $datasumget =  $datasum ?? 0;
                                             
        $addamount = DB::table('payoutamount')->where('Type','LIKE','Add')->where("member_id", $user->member_id)->sum("amount");
        
         $lessamount = DB::table('payoutamount')->where('Type','LIKE','Less')->where("member_id", $user->member_id)->sum("amount");
         
        if($datasumget > $intotals)
        {
            $totalearn =  $datasumget - $intotals + $addamount - $lessamount;
        }
        else
        {
            $totalearn =  0 + $addamount - $lessamount;
        }
        
        if($totalearn != 0)
        {
            $servicetax = $totalearn*10/100;
        }
        else
        {
            $servicetax = 0;
        }
        if($servicetax != 0)
        {
            $tds = $totalearn*5/100;
        }
        else
        {
            $tds = 0;
        }
        
        $pending =  $totalearn - $servicetax - $tds;
        
        $paydatasum = DB::table("payamount")->where("member_id", $user->id)->where("R_id", Auth::user()->member_id)->sum("amount");
        $paydatasumget = $paydatasum ?? 0;
        
        $pendingamount = $pending - $paydatasumget;

            fputcsv($handle, [
                $user->id,
                $user->member_id,
                $user->name,
                $user->sponsor_id,
                $intotals,
                $datasumget,
                $addamount,
                $lessamount,
                $totalearn,
                $servicetax,
                $tds,
                $pending,
                $paydatasumget,
                $pendingamount, // New column for Total IDs
            ]);
        }
        // Close file handle
        fclose($handle);

        // Prevent Laravel from adding extra output
        exit;
    }
    /**
     * Show the form for creating a new resource.
     */
    public function paymentlist()
    {
         $auth = Auth::guard('web')->user();
        if($auth->role == "admin")
        {
                    $members = DB::table('payamount')->pluck("member_id")->toArray();
             
        
                   $users = User::whereNot('name','Right Shadow Admin')->whereIn("id", $members)->paginate(10);

        }else{
             $users = User::where('member_id',$auth->member_id)->paginate(10);
        }
       
        return view("admin.withdrawl.paymenthistory",compact('users','auth'));
    }
    
    public function Payoutreports(Request $request)
    {
         $auth = Auth::guard('web')->user();
         $start = $request->month ?? 0;
         $end = $request->month ?? 0;
        if($auth->role == "admin")
        {
                   $members = DB::table('payamount')->pluck("member_id")->toArray();
          
            $users = User::whereNot('name','Right Shadow Admin')->paginate(10);

        }else{
             $users = User::where('member_id',$auth->member_id)->paginate(10);
        }
       
        return view("admin.withdrawl.Payoutreports",compact('users','auth','start','end'));
    }
    
    public function exportpaymentlist()
    {
        // Define the file name
        $fileName = 'paymentlist.csv';

        // Open a file in memory
        $handle = fopen('php://output', 'w');

        // Set the headers for CSV download
        header('Content-Type: text/csv');
        header("Content-Disposition: attachment; filename=$fileName");

        $users = User::get();

        // Add CSV column headers
        fputcsv($handle, ['ID', 'Name','Mobile', 'Sponsor ID', 'Payment Done', 'Pending Amount']);
        
       
        // Add rows to CSV
        foreach ($users as $data) {
         
        $intotal = DB::table("wallets")->where("member_id", $data->member_id)->sum("total");
           $intotals = $intotal ?? 0;

            $datasum = membersincome::where("member_id", $data->member_id)->sum('income');
            $datasumget =  $datasum ?? 0;

        $addamount = DB::table('payoutamount')->where('Type','LIKE','Add')->where("member_id", $data->member_id)->sum("amount");

        $lessamount = DB::table('payoutamount')->where('Type','LIKE','Less')->where("member_id", $data->member_id)->sum("amount");

            if($datasumget > $intotals)
            {
                $totalearn =  $datasumget - $intotals + $addamount - $lessamount;
            }
            else
            {
                $totalearn =  0 + $addamount - $lessamount;
            }

        if($totalearn != 0)
        {
            $servicetax = $totalearn*10/100;
        }
        else
        {
            $servicetax = 0;
        }

        if($servicetax != 0)
        {
            $tds = $totalearn*5/100;
        }
        else
        {
            $tds = 0;
        }

        $pending =  $totalearn - $servicetax - $tds;
        
        $paydatasum = DB::table("payamount")->where("member_id", $data->id)->where("R_id", Auth::user()->member_id)->sum("amount");
        $paydatasumget = $paydatasum ?? 0;
        
        $pendingamount = $pending - $paydatasumget;

            fputcsv($handle, [
                $data->id,
                $data->name,
                $data->mobile_no,
                $data->sponsor_id,
                $paydatasumget,
                $pendingamount,
            ]);
        }
        // Close file handle
        fclose($handle);

        // Prevent Laravel from adding extra output
        exit;
    }
    
    public function paymenthistory(Request $request)
    {
        $leader = ledger::where('member_id',$request->id)->get();
          $users = User::where('member_id',$request->id)->get();
        return view("admin.withdrawl.paymenthistoryledger",compact('users','leader'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(withdrawl $withdrawl)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(withdrawl $withdrawl)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, withdrawl $withdrawl)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function payout(Request $request)
    {
        $payment = (int)$request->Payment;
    
        try {
            $totalAmount = $payment;
            $paymentData = DB::table('payamount')->insert([
                'amount' => $totalAmount,
                'member_id' => $request->userid,
                'R_id' => Auth::user()->member_id,
            ]);
    
            $totalMessage = "Total: $totalAmount";
    
            $user = User::find($request->userid);
    
            $ledgerNote = "Payment done by admin RS $totalAmount";
    
            $lastLedger = ledger::where('member_id', $user->member_id)->orderBy('id', 'DESC')->first();
            $currentTotal = $lastLedger ? $lastLedger->Total : 0;
    
            $ledger = new ledger();
            $ledger->member_id = $user->member_id;
            $ledger->remarks = $ledgerNote;
            $ledger->Dr = 0;
            $ledger->Cr = $payment;
            $ledger->Total = $currentTotal - $payment;
            $ledger->save();
    
            return response()->json(['success' => true, 'message' => 'User Payment Done','status' => '201']);
        } catch (\Exception $e) {
            Log::error('Payout error: ' . $e->getMessage());
            return response()->json(['success' => false, 'message' => 'Something went wrong!','status' => '200']);
        }
    }
    public function otherpayout(Request $request)
    {
        $payment = $request->Payment;
        $remarks = $request->remarks;
        $type = $request->type;
    
        try {
            $totalAmount = $payment;
            $user = User::find($request->userid);
            $paymentData = DB::table('payoutamount')->insert([
                'amount' => $totalAmount,
                'member_id' => $user->member_id,
                'remarks' => $remarks,
                'type' => $type,
            ]);
    
            $totalMessage = "Total: $totalAmount";
    
    
            $ledgerNote = "Payment by Admin RS $totalAmount <br>".$remarks;
    
            $lastLedger = ledger::where('member_id', $user->member_id)->orderBy('id', 'DESC')->first();
            $currentTotal = $lastLedger ? $lastLedger->Total : 0;
    
            $ledger = new ledger();
            $ledger->member_id = $user->member_id;
            $ledger->remarks = $ledgerNote;
            $ledger->Dr = 0;
            $ledger->Cr = $payment;
            $ledger->Total = $currentTotal + $payment;
            $ledger->save();
    
            return response()->json(['success' => true, 'message' => 'User Payment Done','status' => '201']);
        } catch (\Exception $e) {
            Log::error('Payout error: ' . $e->getMessage());
            return response()->json(['success' => false, 'message' => 'Something went wrong!','status' => '200']);
        }
    }
  
}
