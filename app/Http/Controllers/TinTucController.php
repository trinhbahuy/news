<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TinTuc;
use App\TheLoai;
use App\LoaiTin;
class TinTucController extends Controller
{
  public function getList(){
      $tintuc = TinTuc::all();
      return view('admin.tintuc.danhsach',['tintuc' => $tintuc]);
  }

  public function getAdd(){
      $theloai = TheLoai::all();
      $loaitin = LoaiTin::all();
      return view('admin.tintuc.them',['theloai' => $theloai, 'loaitin' => $loaitin]);
  }

  public function postAdd(Request $request){
     $this->validate($request,[
                                    'TieuDe' => 'required|unique:tintuc,TieuDe',
                                    'TomTat' => 'required',
                                    'NoiDung' => 'required'
                                ],[
                                    'TieuDe.required' => 'Không để trống tiêu đề',
                                    'TomTat.required' => 'Không để trống phần tóm tắt',
                                    'NoiDung.required' => 'Không để trống nội dung'
                                ]);
      $tintuc = new TinTuc;
      $tintuc->TieuDe = $request->TieuDe;
      $tintuc->TomTat = $request->TomTat;
      $tintuc->NoiDung = $request->NoiDung;
      $tintuc->TieuDeKhongDau = ChangeTitle($request->TieuDe);
      $tintuc->idLoaiTin = $request->idLoaiTin;
      $tintuc->NoiBat = $request->NoiBat;
      $tintuc->SoLuotXem = 0;
      if($request->hasFile('Hinh')){
          $file = $request->file('Hinh');
          $name = $file->getClientOriginalName();
          $Hinh = str_random(5). "_". $name;
          while (file_exists("tintuc/".$Hinh)) {
              $Hinh = str_random(2). $Hinh;
          }
          $file->move("tintuc",$Hinh);
          $tintuc->Hinh = $Hinh;
      }
      else {
        $Hinh = "";
      }

      $tintuc->save();
  }

  public function getEdit($id){
    $tintuc = TinTuc::find($id);
    $theloai = TheLoai::all();
    $loaitin = LoaiTin::all();
    return view('admin.tintuc.sua',['theloai' => $theloai, 'loaitin' => $loaitin, 'tintuc' => $tintuc]);
  }

  public function postEdit(Request $request, $id){
      $tintuc = TinTuc::find($id);
      $this->validate($request,[
                                    'TieuDe' => 'required|unique:tintuc,TieuDe',
                                    'TomTat' => 'required',
                                    'NoiDung' => 'required'
                                ],[
                                    'TieuDe.required' => 'Không để trống tiêu đề',
                                    'TomTat.required' => 'Không để trống phần tóm tắt',
                                    'NoiDung.required' => 'Không để trống nội dung'
                                ]);
      $tintuc->TieuDe = $request->TieuDe;
      $tintuc->TomTat = $request->TomTat;
      $tintuc->NoiDung = $request->NoiDung;
      $tintuc->TieuDeKhongDau = ChangeTitle($request->TieuDe);
      $tintuc->idLoaiTin = $request->idLoaiTin;
      $tintuc->NoiBat = $request->NoiBat;
      $tintuc->SoLuotXem = 0;
      if($request->hasFile('Hinh')){
          $file = $request->file('Hinh');
          $name = $file->getClientOriginalName();
          $Hinh = str_random(5). "_". $name;
          while (file_exists("tintuc/".$Hinh)) {
              $Hinh = str_random(2). $Hinh;
          }
          $file->move("tintuc",$Hinh);
          $tintuc->Hinh = $Hinh;
      }

      $tintuc->save();
  }

  public function getDelete($id){
      $tintuc = TinTuc::find($id)->delete();
      return redirect('admin/tintuc/danhsach')->with('notice', 'Xóa thành công');
  }
}
