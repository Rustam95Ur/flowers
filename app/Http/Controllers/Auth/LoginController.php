<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Clients\Client;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

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
        $this->middleware('guest:client')->except('logout');
    }

    public function guard()
    {
        return Auth::guard('client');
    }

    public function login(Request $request){
        $check_email_exists = Client::where('email', $request->email)->first();
        if(!$check_email_exists) {
            return redirect()->back()->with('error', trans('auth.not_found'));
        }
        $credentials = $request->only('email', 'password');
        if ($this->guard()->attempt($credentials)) {
            return redirect(route('profile'));
        }
        return redirect()->back()->with('error', trans('auth.failed_password'));

    }
}
