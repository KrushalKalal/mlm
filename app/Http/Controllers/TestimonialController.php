<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Testimonial;

class TestimonialController extends Controller
{
     public function exportTestimonials()
    {
        // Define the file name
        $fileName = 'testimonials.csv';

        // Fetch testimonials data
        $testimonials = Testimonial::select('id', 'image', 'name', 'designation', 'message')->get();

        // Open a file in memory
        $handle = fopen('php://output', 'w');

        // Set the headers for CSV download
        header('Content-Type: text/csv');
        header("Content-Disposition: attachment; filename=$fileName");

        // Add CSV column headers
        fputcsv($handle, ['ID', 'Image URL', 'Name', 'Designation', 'Message']);

        // Add rows to CSV
        foreach ($testimonials as $testimonial) {
            $imageUrl = $testimonial->image ? url('images/' . $testimonial->image) : 'No Image';

            fputcsv($handle, [
                $testimonial->id,
                $imageUrl,  // Adding image URL
                $testimonial->name,
                $testimonial->designation,
                $testimonial->message,
            ]);
        }

        // Close file handle
        fclose($handle);

        // Prevent Laravel from adding extra output
        exit;
    }
    
    public function index()
    {
        $testimonials = Testimonial::orderby('id','desc')->paginate(10); 
        return view('admin.testimonial',compact('testimonials'));
    }
    public function store(Request $request)
    {
        $data = new Testimonial();
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . 'image.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $data->image = $imageName;
        }
        $data->message = $request->message;
        $data->name = $request->name;
        $data->designation = $request->designation;
        $data->save();

        return redirect()->route('level.testimonial')->with('success', 'Data Store successfully!');
    }
    public function edit($id)
    {
        $testimonials = Testimonial::orderby('id','desc')->paginate(10); 
        $testimonial = Testimonial::FindOrFail($id);

        return view('admin.testimonial',compact('testimonials','testimonial'));
    }
    public function update(Request $request,$id)
    {
        $data = Testimonial::FindOrFail($id);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . 'image.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $data->image = $imageName;
        }
        $data->message = $request->message;
        $data->name = $request->name;
        $data->designation = $request->designation;
        $data->save();

        return redirect()->route('level.testimonial')->with('success', 'Data Update successfully!');
    }
    
    public function destroy($id)
    {
        $news = Testimonial::findOrFail($id);
        $news->delete();

        return redirect()->back()->with('message', 'Data deleted successfully.');
    }
}
