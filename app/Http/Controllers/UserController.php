<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function dashboard() {
    	return view('admin.dashboard');
    }

    public function getList() {
        $user= User::paginate(10);
        return view('admin/user/list', ['user'=> $user]);
    }

    public function create() {
        return view('admin/user/create');
    }

    public function store(Request $request) {
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

        $user= new User;
        $user->name= $request->name;
        $user->email= $request->email;
        $user->password= bcrypt($request->password);
        $user->quyen= $request->quyen;
        if ($request->hasFile('hinh')) {
            $file= $request->file('hinh');
            $duoi= $file->getClientOriginalExtension();
            if ($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg') {
                return redirect('admin/user/create')->with('loi', 'Sai định dạng ảnh');
            }
            $name= $file->getClientOriginalName();
            $hinh= str_random(4)."_".$name;
            while (file_exists("upload/user/".$hinh)) {
                $hinh= str_random(4)."_".$name;
            }
            $file->move("upload/user", $hinh);
            $user->avatar= $hinh;
        }
        $user->save();
        return redirect('admin/user/create')->with('thongbao', 'Tạo thành công');
    }

    public function edit($id) {
        $user= User::find($id);
        return view('admin/user/edit', ['user'=>$user]);
    }

    public function update(Request $request, $id) {
        $user= User::find($id);
        $this->validate($request, [
            'name'=> 'required|min:3'
        ], [
            'name.required'=>'Bạn chưa nhập tên người dùng',
            'name.min'=>'Tên người dùng có ít nhất 3 ký tự',
        ]);

        
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
       
        $user->quyen= $request->quyen;
        
        if ($request->hasFile('hinh')) {
            $file= $request->file('hinh');
            $duoi= $file->getClientOriginalExtension();
            if ($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg') {
                return redirect('admin/user/create')->with('loi', 'Sai định dạng ảnh');
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
        return redirect('admin/user/edit/'.$id)->with('thongbao', 'Sửa thành công');
    }

    public function delete($id) {
        $news= User::find($id);
        $news->delete();

        return redirect('admin/user/list');
    }

    public function getLoginAdmin() {
    	return view('admin.login');
    }

    public function postLoginAdmin(Request $request) {
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
    		return redirect('admin/');
    	} else {
    		return redirect('admin/login')->with('thongbao', 'Đăng nhập không thành công');
    	}
    	
    }

    public function getLogoutAdmin() {
    	Auth::logout();
    	return redirect('admin/login');
    }

    function search(Request $request) {
        $keyword= $request->keyword;
        $user= User::where('name', 'like', "%$keyword%")->orWhere('email', 'like', "%$keyword%")->get();
        return view('admin.user.search', ['user'=>$user, 'keyword'=>$keyword]);
    }
}