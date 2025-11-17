<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LevelBonus;
use App\Models\Cashback;

class LevelController extends Controller
{
    public function index()
    {
        $cashback = Cashback::first();
        $levels = LevelBonus::whereIn('level', range(1, 10))->get();

        return view('admin.level', compact('levels','cashback'));
    }
    public function store(Request $request)
    {
        
        foreach ($request->bonuses as $levelNumber => $bonus) {
            $level = LevelBonus::where('level', 'Level ' . $levelNumber)->first();
            if ($level) {
                $level->bonus = $bonus;
                $level->save();
            } else {
                LevelBonus::create([
                    'name' => 'Level ' . $levelNumber,
                    'bonus' => $bonus,
                ]);
            }
        }
        
        $cashback = Cashback::first();
        if($cashback != null)
        {
            $cashback->cashback = $request->cashback;
            $cashback->service_tx = $request->service_tx;
            $cashback->tds = $request->tds;
            $cashback->save();
        }else{
            Cashback::create([
                'cashback' => $request->cashback,
                'service_tx' => $request->service_tx,
                'tds' => $request->tds,
            ]);
        }

        return redirect()->back()->with('success', 'Level and bonus updated successfully!');
    }
    
}
