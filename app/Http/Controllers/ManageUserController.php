<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
class ManageUserController extends Controller
{
  public function getList(){
      $users = User::all();
      return view('admin/user/danhsach',['users'=>$users]);
  }

  public function getAdd(){
      return view('admin/user/them');
  }

  public function postAdd(Request $request){
      $this->validate($request, 
                        [
                        'Name' => 'required|alpha',
                        'Email' => 'required|email',
                        'Level' => 'required',
                        'Password' => 'required'
                        ],
                        [
                        'Name.required' => 'Vui lòng nhập tên',
                        'Name.alpha' => 'Tên không chứa số và kí tự đặc biệt',
                        'Email.required' => 'Vui lòng nhập email',
                        'Email.email' => 'Địa chỉ email không đúng định dạng',
                        'Level.required' => 'chưa chọn quyền',
                        'Password.required' => 'chưa nhập password'
                        ]);
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

  public function getDelete($id)
  {
      $user = User::find($id);
      $user->delete();
      return redirect('admin/users/danhsach');
  }
}
