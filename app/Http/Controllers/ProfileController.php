<?php

namespace App\Http\Controllers;
use Auth;
use Alert;
use App\User;
use Illuminate\Http\Request;
use Hash;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	$user = User::where('user_id', Auth::user()->user_id)->first();

    	return view('app.user.app_dash.profile', compact('user'));
    }

    public function update(Request $request)
    {

    	$user = User::where('user_id', Auth::user()->user_id)->first();
    	$user->name = $request->name;
    	$user->email = $request->email;
    	$user->phone_number = $request->phone_number;
    	$user->address = $request->address;

    	$user->update();

    	alert()->success('Profile Sukses diupdate', 'Success');
    	return redirect('user/profile');
    }
}
