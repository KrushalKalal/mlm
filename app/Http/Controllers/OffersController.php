<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Offer;

class OffersController extends Controller
{
    public function index()
    {
        $offers= Offer::orderby('id','desc')->paginate(10); 
        return view('admin.offer',compact('offers'));
    }
    public function store(Request $request)
    {
        $data = new Offer();
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . 'image.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $data->image = $imageName;
        }
        $data->status = "Active";
        $data->save();

        return redirect()->route('level.offer')->with('success', 'Data Store successfully!');
    }
    public function edit($id)
    {
        $offers = Offer::orderby('id','desc')->paginate(10); 
        $offer = Offer::FindOrFail($id);

        return view('admin.offer',compact('offers','offer'));
    }
    public function update(Request $request,$id)
    {
        $data = Offer::FindOrFail($id);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . 'image.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $data->image = $imageName;
        }
        $data->save();

        return redirect()->route('level.offer')->with('success', 'Data Update successfully!');
    }
    
    public function destroy($id)
    {
        $news = Offer::findOrFail($id);
        $news->delete();

        return redirect()->back()->with('message', 'Data deleted successfully.');
    }

    public function toggleStatus($id)
    {
        $news = Offer::findOrFail($id);
        $news->status = $news->status === 'Active' ? 'Inactive' : 'Active';
        $news->save();

        return redirect()->back()->with('message', 'Status updated successfully.');
    }
}
