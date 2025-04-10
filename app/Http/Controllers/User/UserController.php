<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Hash;


class UserController extends Controller
{
    public function dashboard()
    {
        return view('user.dashboard');
    }
    public function profile()
    {
        return view('user.profile');
    }
    public function profile_submit(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);

        $user_data = User::find(Auth::guard('web')->user()->id);

        if($request->photo != null){
            $request->validate([
                'photo' => 'image|mimes:jpeg,jpg,png,gif|required|max:10000',
            ]);
            
            if(Auth::guard('web')->user()->photo != null) {
                unlink(public_path('uploads/'.Auth::guard('web')->user()->photo));
            }

            $final_name = time().'.'.$request->photo->extension();
            $request->photo->move(public_path('uploads'),$final_name);
            $user_data->photo = $final_name;

            
        }

        if($request->password != null && $request->password_confirmation != null) {
            $request->validate([
                'password' => 'required',
                'password_confirmation' => 'required|same:password',
            ]);

            $user_data->password = Hash::make($request->password); 
        }


            
            $user_data->name = $request->name;
            $user_data->email = $request->email;
            $user_data->update();

        return redirect()->back()->with('success','Profile updated successfully');
    }
}
