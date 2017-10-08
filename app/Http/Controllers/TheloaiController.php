<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\TheLoai;

class TheloaiController extends Controller
{
    public function getList(){
        $theloai = TheLoai::all();
        return view('admin.theloai.danhsach',['theloai' => $theloai]);
    }

    public function getAdd(){
        return view('admin.theloai.them');
    }

    public function postAdd(Request $request){
        $this->validate($request,
                        [
                            'Name' => 'required|unique:theloai,Ten|min:3|max:100'
                        ],
                        [
                            'Name.required' => 'Bạn chưa nhập thể loại',
                            'Name.unique' => 'Thể loại đã tồn tại',
                            'Name.min' => 'Số kí tự tối thiểu là 3',
                            'Name.max' => 'Số kí tự tối đa là 100'
                        ]);
        $theloai = new TheLoai;
        $theloai->Ten = $request->Name;
        $theloai->TenKhongDau = ChangeTitle($request->Name);
        $theloai->save();

        return redirect('admin/theloai/them')->with('notice', 'Thêm thành công');
    }

    public function getEdit($id){
      $theloai = TheLoai::find($id);
        return view('admin.theloai.sua',['theloai'=>$theloai]);
    }

    public function postEdit(Request $request, $id){
        $theloai = TheLoai::find($id);
        $this->validate($request,
                        [
                            'Name' => 'required|unique:theloai,Ten|min:3|max:100'
                        ],
                        [
                            'Name.required' => 'Bạn chưa nhập thể loại',
                            'Name.unique' => 'Thể loại đã tồn tại',
                            'Name.min' => 'Số kí tự tối thiểu là 3',
                            'Name.max' => 'Số kí tự tối đa là 100'
                        ]);
        $theloai->Ten = $request->Name;
        $theloai->TenKhongDau = ChangeTitle($request->Name);
        $theloai->save();

        return redirect('admin/theloai/sua/'.$id)->with('notice', 'Sửa thành công');
    }

    public function getDelete($id){
        $theloai = TheLoai::find($id)->delete();
        return redirect('admin/theloai/danhsach')->with('notice', 'Xóa thành công');
    }
}
