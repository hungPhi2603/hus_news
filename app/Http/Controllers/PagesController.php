<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\NewsType;
use App\News;
use App\User;
use App\Slide;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{

	public function __construct() {
        $category= Category::all();
		$slide= Slide::all();
        $lastest= News::orderBy('id', 'DESC')->take(1)->get();
        view()->share('category', $category);
        view()->share('slide', $slide);
		view()->share('lastest', $lastest);

		if (Auth::check()) {
			view()->share('user', Auth::user());
		}

	}

    public function home() {
    	return view('page.home2');
    }

    public function contact() {
    	return view('page.contact');
    }

    public function aboutUs() {
        
        return view('page.about');
    }

    public function newstype($id) {
    	$newstype= NewsType::find($id);
    	$news= News::where('idLoaiTin', $id)->paginate(5);
    	return view('page.newstype', ['newstype'=> $newstype, 'news'=> $news]);
    }

    public function news($id) {
    	$news= News::find($id);
    	$moinhat= News::orderBy('id', 'DESC')->take(4)->get();
    	$lienquan= News::where('idLoaiTin', $news->idLoaiTin)->take(4)->get();
    	return view('page.news', ['news'=>$news, 'moinhat'=>$moinhat, 'lienquan'=>$lienquan]);
    }

    public function getLogin() {
    	return view('page.login');
    }

    public function postLogin(Request $request) {
    	$this->validate($request, [
    		'email'=>'required',
    		'password'=>'required|min:3|max:32'
    	], [
    		'email.required'=>'Bạn chưa nhập email',
    		'password.required'=>'Bạn chưa nhập password',
    		'password.min'=>'Password không được nhỏ hơn 3 ký tự',
    		'password.max'=>'Password không được lớn hơn 32 ký tự'
    	]);
    	if (Auth::attempt(['email'=>$request->email, 'password'=>$request->password])) {
    		return redirect('trangchu');
    	} else {
    		return redirect('dangnhap')->with('thongbao', 'Đăng nhập không thành công');
    	}
    	
    }

    public function logout() {
    	Auth::logout();
    	return redirect('trangchu');
    }

    public function getUser() {
        if (Auth::check()) {
            return view('page.user');
        } else {
            return redirect('dangnhap');
        }
    }

    public function postUser(Request $request) {
        $this->validate($request, [
            'name'=> 'required|min:3'
        ], [
            'name.required'=>'Bạn chưa nhập tên người dùng',
            'name.min'=>'Tên người dùng có ít nhất 3 ký tự',
        ]);

        $user= Auth::user();
        $user->name= $request->name;
        
        if ($request->changePassword == "on") {
            $this->validate($request, [
                'password'=>'required|min:3|max:32',
                'passwordAgain'=>'required|same:password'
            ], [
                'password.required'=>'Bạn chưa nhập mật khẩu',
                'password.min'=>'Mật khẩu phải có ít nhất 3 ký tự',
                'password.max'=>'Mật khẩu có tối đa 32 ký tự',
                'passwordAgain.required'=>'Bạn chưa nhập lại mật khẩu',
                'passwordAgain.same'=>'Mật khẩu nhập lại không khớp'
            ]);
            $user->password= bcrypt($request->password);
        }

        if ($request->hasFile('hinh')) {
            $file= $request->file('hinh');
            $duoi= $file->getClientOriginalExtension();
            if ($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg') {
                return redirect('page/user')->with('loi', 'Sai định dạng ảnh');
            }
            $name= $file->getClientOriginalName();
            $hinh= str_random(4)."_".$name;
            while (file_exists("upload/user/".$hinh)) {
                $hinh= str_random(4)."_".$name;
            }
            $file->move("upload/user", $hinh);
            // unlink("upload/tintuc/".$user->avatar);
            $user->avatar= $hinh;
        }
        $user->save();
        return redirect('nguoidung')->with('thongbao', 'Sửa thành công');
    }	

    public function getRegister() {
        if (!Auth::check()) {
            return view('page.register');
        } else {
            return $this->logout();
            
        }
        
    }

    public function postRegister(Request $request) {
        $user= new User;
        $this->validate($request, [
            'name'=> 'required|min:3',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|min:3|max:32',
            'passwordAgain'=>'required|same:password'
        ], [
            'name.required'=>'Bạn chưa nhập tên người dùng',
            'name.min'=>'Tên người dùng có ít nhất 3 ký tự',
            'email.required'=>'Bạn chưa nhập email',
            'email.email'=>'Bạn chưa nhập đúng định dạng email',
            'email.unique'=>'Email đã tồn tại',
            'password.required'=>'Bạn chưa nhập mật khẩu',
            'password.min'=>'Mật khẩu phải có ít nhất 3 ký tự',
            'password.max'=>'Mật khẩu có tối đa 32 ký tự',
            'passwordAgain.required'=>'Bạn chưa nhập lại mật khẩu',
            'passwordAgain.same'=>'Mật khẩu nhập lại không khớp'
        ]);

        if ($request->hasFile('hinh')) {
            $file= $request->file('hinh');
            $duoi= $file->getClientOriginalExtension();
            if ($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg') {
                return redirect('page/register')->with('loi', 'Sai định dạng ảnh');
            }
            $name= $file->getClientOriginalName();
            $hinh= str_random(4)."_".$name;
            while (file_exists("upload/user/".$hinh)) {
                $hinh= str_random(4)."_".$name;
            }
            $file->move("upload/user", $hinh);
            $user->avatar= $hinh;
        }


        $user->name= $request->name;
        $user->email= $request->email;
        $user->password= bcrypt($request->password);
        $user->quyen= 0;
        $user->save();
        return redirect('dangky')->with('thongbao', 'Đăng ký thành công');
    }

    function search(Request $request) {
        $keyword= $request->keyword;
        $news= News::where('TieuDe', 'like', "%$keyword%")->orWhere('TomTat', 'like', "%$keyword%")->orWhere('NoiDung', 'like', "%$keyword%")->get();
        return view('page.search', ['news'=>$news, 'keyword'=>$keyword]);
    }
}
