<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('admin.pages.login');
    }

//    public function postLogin(Request $request)
//    {
//        $this->validate($request, [
//            'email' => 'required|email', 'password' => 'required',
//        ]);
//
//        $credentials = $request->only('email', 'password');
//
//        if ($this->auth->attempt($credentials, $request->has('remember'))) {
//            return redirect()->intended($this->redirectPath());
//
//        }
//
//        return redirect($this->loginPath())
//                    ->withInput($request->only('email', 'remember'))
//                    ->withErrors([
//                        'email' => $this->getFailedLoginMessage(),
//                    ]);
//          //redirect again to login view with some errors line 3
//    }

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

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
