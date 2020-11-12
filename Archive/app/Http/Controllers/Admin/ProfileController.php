<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use Session;
use Auth;
use Hash;

class ProfileController extends Controller
{
    public function index()
    {
    	$data = User::find(Auth::user()->id);
    	return view('admin.profile', ['data' => $data]);
    }

    public function updateProfile(Request $request, $id)
    {
    	$data = User::find($id);

        $data->update( $request->except( ['photo'] ));

        if($request->hasFile('photo')){
            if (file_exists(public_path().'/image/'.$data['photo'])) {
                \File::delete(public_path().'/image/'.$data['photo']);
            }
            $photoName = 'profile.'.$request->photo->extension();
            $request->photo->move(public_path('image'), $photoName);
            $data->update( ['photo' => $photoName] );
        }

        Session::flash('alert', ['Update Success', 'Update Profile Successfuly', 'success']);
        return back();
    }

    public function updatePassword(Request $request, $id)
    {
    	$data = User::find($id);

    	if($request->password != $request->password_confirmation){
    		Session::flash('alert', ['Confirmation Error', 'Confirmation Password Not Match', 'error']);
    		return back();
    	}

	    $password = Hash::make($request->password);

	    $data->update(['password' => $password]);

	    Session::flash('alert', ['Update Success', 'Update Password Successfuly', 'success']);
        return back();
    }
}
