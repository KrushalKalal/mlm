<?php

namespace App\Http\Controllers;

use App\Models\ledger;
use App\Models\membersincome;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
class LedgerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = ledger::where("member_id",Auth::user()->member_id)->get();
        $credit = membersincome::where('member_id', Auth::user()->member_id)->sum('income');
         $debit = ledger::where("member_id",Auth::user()->member_id)->sum('Dr');
         $total = ledger::where("member_id",Auth::user()->member_id)->sum('Total');
        return view("user.ledger",compact('data','debit','credit','total'));
    }
    
    
      public function ledgersearch(Request $request)
    {
         $data = ledger::where("member_id",Auth::user()->member_id)->get();
          $month = $request->month;
        $year = $request->year;

        // Query to filter users based on month & year of created_at
        $credit = membersincome::when($month, function ($query) use ($month) {
                return $query->whereMonth('created_at', $month);
            })
            ->when($year, function ($query) use ($year) {
                return $query->whereYear('created_at', $year);
            })
            ->where("R_id",Auth::user()->member_id)->sum('income');
            
        $total = ledger::when($month, function ($query) use ($month) {
                return $query->whereMonth('created_at', $month);
            })
            ->when($year, function ($query) use ($year) {
                return $query->whereYear('created_at', $year);
            })
        ->where("member_id",Auth::user()->member_id)->sum('Total');
            
        $debit = ledger::when($month, function ($query) use ($month) {
            return $query->whereMonth('created_at', $month);
        })
        ->when($year, function ($query) use ($year) {
            return $query->whereYear('created_at', $year);
        })
        ->where("member_id",Auth::user()->member_id)->sum('Dr');
            

        return view("user.ledger",compact('data','debit','credit','total'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function show(ledger $ledger)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ledger $ledger)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ledger $ledger)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ledger $ledger)
    {
        //
    }
}
