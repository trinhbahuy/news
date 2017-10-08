<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TheLoai extends Model
{
    protected $table = "theloai";

    public function loaiTin(){
        return $this->hasMany('App\LoaiTin','idTheLoai','id');
    }

    public function tinTuc(){
        return $this->hasManyThrough('App\TinTuc','App\LoaiTin','idTheLoai','idLoaiTin','id');
    }
}
