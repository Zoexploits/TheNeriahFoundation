<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Cause;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class AdminCauseController extends Controller
{
    public function index(){

        $causes = Cause::all();
        return view('admin.cause.index', compact('causes'));
    }

    public function create(){
        return view('admin.cause.create');
    }

    public function create_submit(Request $request)
    {
        $request->validate([
            'name' => ['required','unique:causes'],
            'slug' => ['required','alpha_dash', 'unique:causes'],
            'goal'=>['required', 'numeric','min:1'],
            'short_description'=>'required',
            'description'=>'required',
            'featured_photo' => 'required|image|mimes:jpeg,png,jpg,gif',
        ]);

        $obj = new Cause();
        $obj->name = $request->name;
        $obj->slug = $request->slug;
        $obj->goal = $request->goal;
        $obj->raised = 0;
        $obj->short_description = $request->short_description;
        $obj->description = $request->description;
        $obj->featured_photo = $request->featured_photo;
        $final_name = 'featured_photo_'.time().'.'.$request->featured_photo->extension();
        $request->featured_photo->move(public_path('uploads'), $final_name);
        $obj->featured_photo = $final_name;
        $obj->save();

        return redirect()->route('admin_cause_index')->with('success', 'Cause created successfully.');



    }

    public function edit($id)
    {
        $cause = Cause::find($id);
        return view('admin.cause.edit', compact('cause'));
    }

    public function edit_submit(Request $request, $id){

        $request->validate([
            'name' => ['required','unique:causes,name,'.$id],
            'slug' => ['required','alpha_dash', 'unique:causes,slug,'.$id],
            'goal'=>['required', 'numeric','min:1'],
            'short_description'=>'required',
            'description'=>'required',
            // 'featured_photo' => 'required|image|mimes:jpeg,png,jpg,gif',
        ]);

        $cause = Cause::findOrFail($id);


        if ($request->featured_photo != null) {
            $request->validate([
                'featured_photo' => 'image|mimes:jpeg,png,jpg,gif',
            ]);

            unlink(public_path('uploads/'.$cause->featured_photo));


            $final_name = 'cause_featured_photo_'.time().'.'.$request->featured_photo->extension();
            $request->featured_photo->move(public_path('uploads'), $final_name);
            $cause->featured_photo = $final_name;
        }


        $obj = new Cause();
        $obj->name = $request->name;
        $obj->slug = $request->slug;
        $obj->goal = $request->goal;
        $obj->raised = 0;
        $obj->short_description = $request->short_description;
        $obj->description = $request->description;
        // $obj->featured_photo = $request->featured_photo;
        // $final_name = 'featured_photo_'.time().'.'.$request->featured_photo->extension();
        // $request->featured_photo->move(public_path('uploads'), $final_name);
        // $obj->featured_photo = $final_name;
        $obj->update();
        return redirect()->back()->with('success', 'Cause updated successfully.');
    }

    public function delete($id){
        $cause = Cause::findOrFail($id);
        unlink(public_path('uploads/'.$cause->photo));
        $cause->delete();

        return redirect()->back()->with('success', 'Slider deleted successfully.');
    }

}
