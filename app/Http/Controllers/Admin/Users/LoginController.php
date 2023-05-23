<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    //
    public function index() {
        return view('admin.users.login', [
            'title' => 'Đăng nhập hệ thống'
        ]);
    }
    public function store(request $request) {
        
        $this->validate($request, [
            'email' => 'required|email:filter',
        'password' => 'required',
        ],
        [
            'email.required' => 'Bạn chưa nhập email',
            'password.required' => 'bạn chưa nhập mật khẩu',
        ]
    );
        if (Auth::attempt([
            'email' => $request->input('email'),
         'password' => $request->input('password')],
        $request->input('remember')
        
        
        )) {
            return redirect()->route('main');
        }
        Session::flash('error', 'Email hoặc Mật khẩu không chính xác');
        return redirect()->back(); 
    }
}
