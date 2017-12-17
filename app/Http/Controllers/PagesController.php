<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\TheLoai;
use App\LoaiTin;
use App\TinTuc;
use App\Comment;
use App\Slide;
class PagesController extends Controller
{
    public function __construct()
    {
        $theloai = Theloai::all();
        view()->share('theloai',$theloai);
    }
    public function trangchu()
    {
        $hinh = Slide::all();
        return view('pages.trangchu',['hinh' => $hinh]);
    }

    public function loaitin($id)
    {
        $loaitin = LoaiTin::find($id);
        $tintuc = TinTuc::where('idLoaiTin', $id)->paginate(5);
        return view('pages.loaitin',['loaitin' => $loaitin, 'tintuc' => $tintuc]);
    }

    public function tintuc($id)
    {
        $tintuc = TinTuc::find($id);
        $tinlienquan = TinTuc::where('idLoaiTin', $tintuc->idLoaiTin)->take(4)->get();
        $tinnoibat = TinTuc::where('NoiBat',1)->take(4)->get();
        return view('pages.tintuc',['tintuc' => $tintuc, 'tinnoibat' => $tinnoibat, 'tinlienquan' => $tinlienquan]);
    }

    public function search(Request $request){
        $key = $request['key'];
        $result = TinTuc::where('TieuDe', 'like', "%$key%")->orWhere('TomTat', 'like', "%$key%")->paginate(5);
        return view('pages.search',['result' => $result]);
    }

}
