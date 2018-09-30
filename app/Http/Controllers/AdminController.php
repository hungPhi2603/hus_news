<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\NewsType;
use App\News;
use App\User;

class AdminController extends Controller
{
    public function index() {
    	return view('admin.dashboard');
    }

    function search(Request $request) {
        $keyword= $request->keyword;
        $category= Category::where('Ten', 'like', "%$keyword%")->take(10)->paginate(6);
        $user= User::where('name', 'like', "%$keyword%")->orWhere('email', 'like', "%$keyword%")->paginate(3);
        
        return view('admin.user.search', ['user'=>$user, 'keyword'=>$keyword]);
    }
}
