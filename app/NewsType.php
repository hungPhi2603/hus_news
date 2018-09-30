<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewsType extends Model
{
    protected $table= "NewsType";

    public function theloai() {
    	return $this->belongsTo('App\Category', 'idTheLoai', 'id');

    }

    public function tintuc() {
    	return $this->hasMany('App\News', 'idLoaiTin', 'id');
    }

    
}
