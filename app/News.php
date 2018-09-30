<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table= "News";

    public function loaitin() {
    	return $this->belongsTo('App\NewsType', 'idLoaiTin', 'id');
    }

    public function comment() {
    	return $this->hasMany('App\Comment', 'idTinTuc', 'id');
    }
}
