<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;

class SliderController extends Controller
{
    public function index()
    {
        $sliders= Slider::orderby('id','desc')->paginate(10); 
        return view('admin.slider',compact('sliders'));
    }
    public function store(Request $request)
    {
        $data = new Slider();
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . 'image.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $data->image = $imageName;
        }
        $data->text1 = $request->text1;
        $data->text2 = $request->text2;
        $data->save();

        return redirect()->route('level.slider')->with('success', 'Data Store successfully!');
    }
    public function edit($id)
    {
        $sliders = Slider::orderby('id','desc')->paginate(10); 
        $slider = Slider::FindOrFail($id);

        return view('admin.slider',compact('sliders','slider'));
    }
    public function update(Request $request,$id)
    {
        $data = Slider::FindOrFail($id);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . 'image.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $data->image = $imageName;
        }
        $data->text1 = $request->text1;
        $data->text2 = $request->text2;
        $data->save();

        return redirect()->route('level.slider')->with('success', 'Data Update successfully!');
    }
    
    public function destroy($id)
    {
        $news = Slider::findOrFail($id);
        $news->delete();

        return redirect()->back()->with('message', 'Data deleted successfully.');
    }

}
