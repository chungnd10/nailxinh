<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
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
    protected $redirectTo = '/admin/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function validateLogin(Request $request)
    {
        $this->validate($request,
            [
                'email' => 'required|string',
                'password' => 'required|string'
            ],
            [
                'email.required' => 'Vui lòng nhập email',
                'password.required' => 'Vui lòng nhập mật khẩu',
            ]
        );
    }

    public function postLogin(Request $request)
    {
        $this->validate($request,
            [
                'email' => 'required',
                'password' => 'required'
            ],
            [
                'email.required' => 'Vui lòng nhập email',
                'password.required' => 'Vui lòng nhập mật khẩu',
            ]
        );

        $status_active = config('contants.operation_status_active');
        $credentials = ['email' => $request->email, 'password' => $request->password];

        if (Auth::attempt($credentials)){
            $user = User::where('email', $request->email)->first();
        }

        if (Auth::attempt($credentials) && $user->operation_status_id == $status_active) {
            return redirect()->route('admin.index')->with('toast_success', 'Xin chào '.Auth::user()->full_name);
        } else {
            return back()->with('danger', 'Tài khoản hoặc mật khẩu không đúng');
        }
    }
}
