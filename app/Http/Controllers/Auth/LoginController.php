<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Requests\AdminRequest\LoginRequest;
use Auth;

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

    //use AuthenticatesUsers;

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
        $this->middleware('guest:admin')->except('logout');
    }
    public function index(){
        return view('admin.login');
    }
    public function login(LoginRequest $request)
    {
        $request['active'] = 1;
         $credentials = $request->only('email', 'password','active');
        if(!empty($data['remember_me'])){
            $is_remember_me = false;
        }else{
            $is_remember_me = true;
        }
        if(Auth::guard('admin')->attempt($credentials,$is_remember_me)){
            return redirect()->route('country.index');
        }else{
            return redirect()->back()->withErrors(['mgs'=>"Đăng nhập thất bại"])->withInput();
        }
    }
    public function logout(){
        auth('admin')->logout();
        return redirect()->route('login');
    }
}
