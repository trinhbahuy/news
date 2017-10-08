<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

  
    public function getLogin(){
        return view('login');
    }

    public function postLogin(Request $request){
        $this->validate($request,[
                                    'email' => 'required',
                                    'password' => 'required'
                                ],[
                                    'email.required' => 'chưa nhập email',
                                    'password.required' => 'chưa nhập mật khẩu'
                                ]);
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            return redirect('admin/theloai/danhsach');
        }
        else {
          return redirect('login')->with('notice', 'đăng nhập thất bại');
        }
    }

    public function logout(){
        Auth::logout();
        return redirect('trangchu');
    }
}
