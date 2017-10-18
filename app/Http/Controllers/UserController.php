<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
class UserController extends Controller
{
// Authentication
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
  // End Auth
    public function getList(){
        $users = User::all();
        return view('admin/user/danhsach',['users'=>$users]);
    }

    public function getAdd(){
        return view('admin/user/them');
    }

    public function postAdd(Request $request){
        $user = new User;
        $user->name = $request['Name'];
        $user->email = $request['Email'];
        $user->level = $request['Level'];
        $user->password = bcrypt($request['Password']);
        $user->save();
        return redirect('admin/users/danhsach');
    }
    public function getEdit($id){
        $user = User::find($id);
        return view('admin/user/sua',['user'=>$user]);
    }
    public function postEdit($id, Request $request){
        $this->validate($request, [
                                    'Name'=>'required',
                                    'Email'=>'required',
                                  ],[
                                      'Name.required' => 'Chưa nhập tên',
                                      'Email.required' => 'Chưa nhập Email'
                                    ]);
        $user = User::find($id);
        $user->name = $request['Name'];
        $user->email = $request['Email'];
        $user->level = $request['Level'];
        $user->save();
        return redirect('admin/users/sua/'. $id);
    }
}
