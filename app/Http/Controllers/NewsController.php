<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::orderby('id','desc')->paginate(10); 
        return view('admin.news',compact('news'));
    }
    public function store(Request $request)
    {
        $data = new News();
        $data->news = $request->news;
        $data->date = $request->date;
        $data->status = "Active";
        $data->save();

        return redirect()->route('level.news')->with('success', 'Data Store successfully!');
    }
    public function edit($id)
    {
        $news = News::orderby('id','desc')->paginate(10); 
        $new = News::FindOrFail($id);

        return view('admin.news',compact('news','new'));
    }
    public function update(Request $request,$id)
    {
        $data = News::FindOrFail($id);
        $data->news = $request->news;
        $data->date = $request->date;
        $data->save();

        return redirect()->route('level.news')->with('success', 'Data Update successfully!');
    }
    
    public function destroy($id)
    {
        $news = News::findOrFail($id);
        $news->delete();

        return redirect()->back()->with('message', 'News deleted successfully.');
    }

    public function toggleStatus($id)
    {
        $news = News::findOrFail($id);
        $news->status = $news->status === 'Active' ? 'Inactive' : 'Active';
        $news->save();

        return redirect()->back()->with('message', 'Status updated successfully.');
    }
}
