<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\About;

class AboutController extends Controller
{
    public function index()
    {
        $abouts = About::first(); 
        return view('admin.about',compact('abouts'));
    }
    public function store(Request $request)
    {
        $abouts = About::first(); 
        if($abouts != null)
        {
             $data = About::first(); 
        }else{
             $data = new About();
        }
       
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . 'image.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $data->image = $imageName;
        }
        $data->message = $request->message;
        $data->title = $request->title;
        
        if ($request->hasFile('image2')) {
            $image = $request->file('image2');
            $imageName = time() . 'image2.' . $image->getClientOriginalExtension();
            $image->move(public_path('images2'), $imageName);
            $data->image2 = $imageName;
        }
        $data->message2 = $request->message2;
        $data->title2 = $request->title2;
        
        if ($request->hasFile('image3')) {
            $image = $request->file('image3');
            $imageName = time() . 'image3.' . $image->getClientOriginalExtension();
            $image->move(public_path('images3'), $imageName);
            $data->image3 = $imageName;
        }
        $data->message3 = $request->message3;
        $data->title3 = $request->title3;
        
        if ($request->hasFile('image4')) {
            $image = $request->file('image4');
            $imageName = time() . 'image4.' . $image->getClientOriginalExtension();
            $image->move(public_path('images4'), $imageName);
            $data->image4 = $imageName;
        }
        $data->message4 = $request->message4;
        $data->title4 = $request->title4;
        
        if ($request->hasFile('image5')) {
            $image = $request->file('image5');
            $imageName = time() . 'image5.' . $image->getClientOriginalExtension();
            $image->move(public_path('images5'), $imageName);
            $data->image5 = $imageName;
        }
        $data->message5 = $request->message5;
        $data->title5 = $request->title5;
        
        if ($request->hasFile('image6')) {
            $image = $request->file('image6');
            $imageName = time() . 'image6.' . $image->getClientOriginalExtension();
            $image->move(public_path('images6'), $imageName);
            $data->image6 = $imageName;
        }
        $data->message6 = $request->message6;
        $data->title6 = $request->title6;
        $data->save();

        return redirect()->route('level.about')->with('success', 'Data Store successfully!');
    }
    public function edit($id)
    {
        $abouts = About::first();  
        $about = About::FindOrFail($id);

        return view('admin.about',compact('abouts','about'));
    }
    public function update(Request $request,$id)
    {
        $data = About::FindOrFail($id);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . 'image.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $data->image = $imageName;
        }
        $data->message = $request->message;
        $data->title = $request->title;
        
        if ($request->hasFile('image2')) {
            $image = $request->file('image2');
            $imageName = time() . 'image2.' . $image->getClientOriginalExtension();
            $image->move(public_path('images2'), $imageName);
            $data->image2 = $imageName;
        }
        $data->message2 = $request->message2;
        $data->title2 = $request->title2;
        
        if ($request->hasFile('image3')) {
            $image = $request->file('image3');
            $imageName = time() . 'image3.' . $image->getClientOriginalExtension();
            $image->move(public_path('images3'), $imageName);
            $data->image3 = $imageName;
        }
        $data->message3 = $request->message3;
        $data->title3 = $request->title3;
        
        if ($request->hasFile('image4')) {
            $image = $request->file('image4');
            $imageName = time() . 'image4.' . $image->getClientOriginalExtension();
            $image->move(public_path('images4'), $imageName);
            $data->image4 = $imageName;
        }
        $data->message4 = $request->message4;
        $data->title4 = $request->title4;
        
        if ($request->hasFile('image5')) {
            $image = $request->file('image5');
            $imageName = time() . 'image5.' . $image->getClientOriginalExtension();
            $image->move(public_path('images5'), $imageName);
            $data->image5 = $imageName;
        }
        $data->message5 = $request->message5;
        $data->title5 = $request->title5;
        
        if ($request->hasFile('image6')) {
            $image = $request->file('image6');
            $imageName = time() . 'image6.' . $image->getClientOriginalExtension();
            $image->move(public_path('images6'), $imageName);
            $data->image6 = $imageName;
        }
        $data->message6 = $request->message6;
        $data->title6 = $request->title6;
        $data->save();

        return redirect()->route('level.about')->with('success', 'Data Update successfully!');
    }
    
    public function destroy($id)
    {
        $news = About::findOrFail($id);
        $news->delete();

        return redirect()->back()->with('message', 'Data deleted successfully.');
    }
}
