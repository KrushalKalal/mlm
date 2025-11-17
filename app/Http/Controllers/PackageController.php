<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Package;
use App\Models\User;
use App\Models\WebsiteSetting;

class PackageController extends Controller
{
    public function category()
    {
        $categories = Category::orderby('id','desc')->paginate(10);
        return view('admin.package.category',compact('categories'));
    }

    public function categorystore(Request $request)
    {
        $data = new Category();
        $data->category = $request->category;
        $data->save();

        return redirect()->route('category')->with('success', 'Data Store successfully!');
    }

    public function categoryedit($id)
    {
        $categories = Category::orderby('id','desc')->paginate(10);
        $category = Category::FindOrFail($id);
        return view('admin.package.category',compact('category','categories'));
    }


    public function viewreceipt(Request $request)
    {
        $id = $request->id;
        $user = User::where('id',$id)->first();
        $setting = WebsiteSetting::first();
        return view('admin.orderlist',compact('user','setting'));
    }

    public function categoryupdate(Request $request,$id)
    {
        $data = Category::FindOrFail($id);
        $data->category = $request->category;
        $data->save();

        return redirect()->route('category')->with('success', 'Data Update successfully!');
    }
    
    public function categorydestroy($id)
    {
        $news = Category::findOrFail($id);
        $news->delete();
        return redirect()->back()->with('message', 'Data deleted successfully.');
    }
  
    public function package()
    {
        $categories = Category::all();
        $packages = Package::orderby('id','desc')->with('cate')->paginate(10);
        return view('admin.package.package',compact('packages','categories'));
    }

    public function packagestore(Request $request)
    {
        $data = new Package();
        // $data->category = $request->category;
        $data->name = $request->name;
        $data->mrp = $request->mrp;
        $data->discount_price = $request->discount_price;
        $data->distribute_price = $request->distribute_price;
        $data->description = $request->description;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . 'image.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $data->image = $imageName;
        }
        $data->save();

        return redirect()->route('package')->with('success', 'Data Store successfully!');
    }

    public function packageedit($id)
    {   
        $categories = Category::all();
        $packages = Package::orderby('id','desc')->with('cate')->paginate(10);
        $package = Package::FindOrFail($id);
        return view('admin.package.package',compact('package','packages','categories'));
    }

    public function packageupdate(Request $request,$id)
    {
        $data = Package::FindOrFail($id);
        // $data->category = $request->category;
        $data->name = $request->name;
        $data->mrp = $request->mrp;
        $data->discount_price = $request->discount_price;
        $data->distribute_price = $request->distribute_price;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . 'image.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $data->image = $imageName;
        }
        $data->description = $request->description;
        $data->save();

        return redirect()->route('package')->with('success', 'Data Update successfully!');
    }
    
    public function packagedestroy($id)
    {
        $news = Package::findOrFail($id);
        $news->delete();

        return redirect()->back()->with('message', 'Data deleted successfully.');
    }
}
