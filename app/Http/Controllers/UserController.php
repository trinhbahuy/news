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

    public function getEdit($id){
        $user = User::find($id);
        return view('pages/sua',['user'=>$user]);
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
        $user->gender = $request['Gender'];
        $user->date = $request['Date'];
        $user->phone = $request['Phone'];
        $user->save();
        return redirect('sua/'. $id);
    }

    public function getSignUp()
    {
        return view('signup');
    }

    public function postSignUp(Request $request)
    {
        $this->validate($request, [
                                    'name' => 'required|alpha',
                                    'email' => 'required|unique:users',
                                    'gender' => 'required',
                                    'date' => 'required',
                                    'phone' => 'required|numeric|unique:users',
                                    'password' => 'required',
                                    'passwordAgain' => 'required|same:password'
                                  ],[
                                        'name.required' => "chưa nhập tên",
                                        'name.alpha' => "Tên không được chứa các kí tự đặc biệt hoặc số",
                                        'email.required' => "chưa nhập email",
                                        'email.unique' => "email đã tồn tại",
                                        'gender.required' => "chưa chọn giới tính",
                                        'date.required' => "chưa nhập ngày sinh",
                                        'phone.required' => "chưa nhập số điện thoại",
                                        'phone.numeric' => "chỉ nhập số 0-9",
                                        'phone.unique' => "số điện thoại đã tồn tại",
                                        'password.required' => "chưa nhập mật khẩu",
                                        'passwordAgain.required' => "hãy nhập lại mật khẩu",
                                        'passwordAgain.same' => "mật khẩu nhập lại không chính xác"
                                    ]);
        $user = new User;
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->gender = $request['gender'];
        $user->date = $request['date'];
        $user->phone = $request['phone'];
        $user->password = bcrypt($request['password']);
        $user->save();
        Auth::attempt(['email' => $request->email, 'password' => $request->password]);
        return redirect('admin/theloai/danhsach');
    }
  // End Auth

}
