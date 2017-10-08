<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TinTuc;
use App\TheLoai;
use App\LoaiTin;

class Ajax extends Controller
{
    public function ajax($idTheLoai){
        $loaitin = LoaiTin::where('idTheLoai', $idTheLoai)->get();
        foreach ($loaitin as $lt) {
            echo "<option value='" .$lt->id. "'>" .$lt->Ten. "</option>";
        }
    }

}
