<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
Use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('web', ['except'=> ['logout','userLogout']]);
    }
    public function showLoginForm(){
        return view('auth.login');
    }

    public function login(Request $request){
        // Data valid
        $this->validate($request,[
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);
        // Attempt to log in
        if (Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password],$request->get('remember'))) {

        // kalo sukses ke lokasi seharusnya
        return redirect()->intended(route('home'));
        }

        // kalo gagal ntar balik lagi
        return redirect()->back()->withInput($request->only('email', 'remember'))->with('gagal','Maaf Email / Password Anda Salah');

    }

    public function userLogout()
    {
        Auth::guard('web')->logout();
        return redirect('/');
    }

}
