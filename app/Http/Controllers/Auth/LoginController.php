<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
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
    protected $redirectTo = '/home';

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
        $input = $request->all();

        unset($input['_token']);

        $user = User::where($input)->first();
        if($user && $user->level == 1){
            auth()->loginUsingId($user->id);
            return redirect()->intended('/admin');
        }elseif($user && $user->level == 2){
            auth()->loginUsingId($user->id);
            return redirect()->intended('/produk');
        }else{
            return redirect()->back()->with('error', 'Email / Password salah!')->withInput($input);
        }
    }

    public function logout(Request $request)
    {
        auth()->logout();
        return redirect('/login')->with('info', 'Logout berhasil! Silahkan login kembali.');
    }
}
