<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\TheLoai;
use App\LoaiTin;
use App\TinTuc;
use App\Comment;
class PagesController extends Controller
{
    public function __construct(){
        $theloai = Theloai::all();
        view()->share('theloai',$theloai);
    }
    public function trangchu(){
        return view('pages.trangchu');
  }

    public function loaitin($id){
        $loaitin = LoaiTin::find($id);
        $tintuc = TinTuc::where('idLoaiTin', $id)->paginate(5);
        return view('pages.loaitin',['loaitin' => $loaitin, 'tintuc' => $tintuc]);
    }

    public function tintuc($id){
        $tintuc = TinTuc::find($id);
        $tinlienquan = TinTuc::where('idLoaiTin', $tintuc->idLoaiTin)->take(4)->get();
        $tinnoibat = TinTuc::where('NoiBat',1)->take(4)->get();
        return view('pages.tintuc',['tintuc' => $tintuc, 'tinnoibat' => $tinnoibat, 'tinlienquan' => $tinlienquan]);
    }

    public function getComment($id){

        $user = Auth::user()->name;

        echo " <div class='media'>
            <a class='pull-left' href='#'>
                <img class='media-object' src='http://placehold.it/64x64' alt=''>
            </a>
            <div class='media-body'>
                <h4 class='media-heading'>". $user ."
                    <small></small>
                </h4>" ;
}

    public function postComment($id, Request $request){
        $comment = new Comment;
        $comment->idTinTuc = $id;
        $comment->idUser = Auth::user()->id;
        $comment->NoiDung = $request['nd'];
        $comment->save();
    }
}
