<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
class AdminLoginController extends Controller
{
    public function __construct(){
        $this->middleware('guest:admin', ['except' =>['logout']]);
    }

    public function showLoginForm(){
        return view('auth.admin-login');
    }

    public function login(Request $request){
        // Data valid
        $this->validate($request,[
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);
        // Attempt to log in
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password],$request->get('remember'))) {
        // kalo sukses ke lokasi seharusnya
        return redirect()->intended(route('admin.dashboard'));
        }

        // kalo gagal ntar balik lagi
        return redirect()->back()->withInput($request->only('email', 'remember'))->with('gagal','Maaf Email / Password Anda Salah');

    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/admin');
    }
}
