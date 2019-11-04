<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('admin.pages.login');
    }

    public function checkLogin(Request $request)
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

        if (Auth::attempt(
            [
                'email' => $request->email,
                'password' => $request->password

            ])
        ) {
            $notify = array(
                'message' => 'Xin chào '.Auth::user()->full_name,
                'alert-type' => 'success'
            );
            return redirect()->route('admin.index')->with($notify);
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
