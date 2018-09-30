<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table= "Category";

    public function loaitin() {
    	return $this->hasMany('App\NewsType','idTheLoai', 'id');
    }

    public function tintuc() {
    	return $this->hasManyThrough('App\News', 'App\NewsType', 'idTheLoai', 'idLoaiTin', 'id');
    }
}
