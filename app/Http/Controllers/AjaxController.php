<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Category;
use App\NewsType;

class AjaxController extends Controller
{
    public function getLoaiTin($idTheLoai) {
    	$newstype = NewsType::where('idTheLoai', $idTheLoai)->get();
    	foreach ($newstype as $nt) {
    		echo "<option value='".$nt->id."'>".$nt->Ten."</option>";
    	}
    }
}
