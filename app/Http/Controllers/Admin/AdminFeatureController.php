<?php

namespace App\Http\Controllers\Admin;

use App\Models\Slider;
use App\Models\Feature;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminFeatureController extends Controller
{
    public function index()
    {
        $features = Feature::all();
        return view('admin.feature.index', compact('features'));
    }

    public function create()
    {
        return view('admin.feature.create');
    }

    public function create_submit(Request $request)
    {
        $request->validate([
            'heading' => 'required',
            'text' => 'required',
            'icon' => 'required',
        ]);

        $feature = new Feature();
        $feature->heading = $request->heading;
        $feature->text = $request->text;
        $feature->icon = $request->icon;


        $feature->save();


        return redirect()->route('admin_feature_index')->with('success', 'Feature created successfully.');
    }

    public function edit($id)
    {
        $slider = Slider::find($id);
        return view('admin.slider.edit', compact('slider'));
    }

    public function edit_submit(Request $request, $id){

        $request->validate([
            'heading' => 'required',
            'text' => 'required',
            'icon' => 'required',
        ]);

        $slider = Slider::findOrFail($id);


        if ($request->photo != null) {
            $request->validate([
                'photo' => 'image|mimes:jpeg,png,jpg,gif',
            ]);

            unlink(public_path('uploads/'.$slider->photo));


            $final_name = time().'.'.$request->photo->extension();
            $request->photo->move(public_path('uploads'), $final_name);
            $slider->photo = $final_name;
        }


        $slider->heading = $request->heading;
        $slider->text = $request->text;
        $slider->button_text = $request->button_text;
        $slider->button_link = $request->button_link;
        $slider->update();
        return redirect()->back()->with('success', 'Slider updated successfully.');
    }

    public function delete($id){
        $slider = Slider::findOrFail($id);
        unlink(public_path('uploads/'.$slider->photo));
        $slider->delete();

        return redirect()->back()->with('success', 'Slider deleted successfully.');
    }
}
