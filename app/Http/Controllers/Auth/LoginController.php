<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
       $request->validate([
          'email' => 'required|exists:users,email',
          'password' => 'required'
       ]);
 
       $userData = User::where('email', $request->email)
       ->where('state', 1)
       ->whereIn('role_id', [1, 2])
       ->exists();
       if ($userData) {
          if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'state' => 1])) {
             return redirect()->route('home');
          } else {
             return back()->with('failed', 'Usuario o contraseña incorrectos. Si el problema persiste contacte al adminstrador.');
          }
       }else{
          return back()->with('failed', 'Usuario o contraseña incorrectos. Si el problema persiste contacte al adminstrador.');
       }
    }


    public function showLogin(){
       return view('/auth/login');
    }
}
