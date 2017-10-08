<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LoaiTin;
use App\TheLoai;
class LoaiTinController extends Controller
{
  public function getList(){
      $loaitin = LoaiTin::all();
      return view('admin.loaitin.danhsach',['loaitin' => $loaitin]);
  }

  public function getAdd(){
      $theloai = TheLoai::all();
      return view('admin.loaitin.them',['theloai' => $theloai]);
  }

  public function postAdd(Request $request){
      $this->validate($request,
                      [
                          'Name' => 'required|unique:loaitin,Ten|min:3|max:100',
                          'theloai' => 'required'
                      ],
                      [
                          'Name.required' => 'Bạn chưa nhập thể loại',
                          'Name.unique' => 'Loại tin đã tồn tại',
                          'Name.min' => 'Số kí tự tối thiểu là 3',
                          'Name.max' => 'Số kí tự tối đa là 100'
                      ]);
      $loaitin = new LoaiTin;
      $loaitin->Ten = $request->Name;
      $loaitin->idTheLoai = $request->theloai;
      $loaitin->TenKhongDau = ChangeTitle($request->Name);
      $loaitin->save();

      return redirect('admin/loaitin/them')->with('notice', 'Thêm thành công');
  }

  public function getEdit($id){
      $theloai = TheLoai::all();
      $loaitin = LoaiTin::find($id);
      return view('admin.loaitin.sua',['theloai' => $theloai, 'loaitin' => $loaitin]);
  }

  public function postEdit($id, Request $request){
    $loaitin = LoaiTin::find($id);
    $this->validate($request,
                    [
                        'Name' => 'required|unique:theloai,Ten|min:3|max:100',
                        'theloai' => 'required'
                    ],
                    [
                        'Name.required' => 'Bạn chưa nhập thể loại',
                        'Name.unique' => 'Loại tin đã tồn tại',
                        'Name.min' => 'Số kí tự tối thiểu là 3',
                        'Name.max' => 'Số kí tự tối đa là 100'
                    ]);
    $loaitin->Ten = $request->Name;
    $loaitin->idTheLoai = $request->theloai;
    $loaitin->TenKhongDau = ChangeTitle($request->Name);
    $loaitin->save();

    return redirect('admin/loaitin/sua/'.$id)->with('notice', 'Sửa thành công');
  }

  public function getDelete($id){
      $loaitin = LoaiTin::find($id)->delete();
      return redirect('admin/loaitin/danhsach')->with('notice', 'Xóa thành công');
  }
}
