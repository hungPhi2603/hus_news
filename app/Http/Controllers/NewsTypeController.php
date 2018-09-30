<?php

namespace App\Http\Controllers;
use App\NewsType;
use App\Category;
use Illuminate\Http\Request;

class NewsTypeController extends Controller
{
    

    public function getList() {
    	$newstype= NewsType::paginate(10);
    	return view('admin.newstype.list', ['newstype'=>$newstype]);
    }

    public function create() {
    	$category= Category::all();
    	return view('admin.newstype.create', ['category'=>$category]);
    }

    public function store(Request $request) {
        $this->validate($request, [
            'name'=> 'required|min:2|max:100|unique:NewsType,Ten',
            'category'=>'required'
        ], [
            'name.required'=> 'Bạn chưa nhập tên loại tin',
            'name.min'=>'Tên phải co độ dài từ 3 đến 100 ký tự',
            'name.max'=>'Tên phải co độ dài từ 3 đến 100 ký tự',
            'name.unique'=>'Tên thể loại đã tồn tại',
            'category.required'=>'Bạn chưa chọn thể loại'
        ]);

        $newstype= new NewsType;
        $newstype->Ten= $request->name;
        $newstype->TenKhongDau= changeTitle($request->name);
        $newstype->idTheLoai= $request->category;
        $newstype->save();
        return redirect('admin/newstype/create')->with('thongbao', 'Thêm thành công');
    }

    public function edit($id) {
    	$category= Category::all();
        $newstype= NewsType::find($id);
    	return view('admin.newstype.edit', ['newstype'=>$newstype, 'category'=> $category]);
    }

    public function update(Request $request, $id) {
        $newstype= NewsType::find($id);
        $this->validate($request, [
            'name'=> 'required|min:2|max:100|unique:NewsType,Ten',
            'category'=>'required'
        ], [
            'name.required'=> 'Bạn chưa nhập tên loại tin',
            'name.min'=>'Tên phải co độ dài từ 3 đến 100 ký tự',
            'name.max'=>'Tên phải co độ dài từ 3 đến 100 ký tự',
            'name.unique'=>'Tên thể loại đã tồn tại',
            'category.required'=>'Bạn chưa chọn thể loại'
        ]);
        $newstype->Ten= $request->name;
        $newstype->TenKhongDau= changeTitle($request->name);
        $newstype->idTheLoai= $request->category;
        $newstype->save();

        return redirect('admin/newstype/edit/'.$id)->with('thongbao', 'Sửa thành công');
    }

    public function delete($id) {
        $newstype= NewsType::find($id);
        $newstype->delete();

        return redirect('admin/newstype/list');
    }

    function search(Request $request) {
        $keyword= $request->keyword;
        $newstype= NewsType::where('Ten', 'like', "%$keyword%")->orWhere('TenKhongDau', 'like', "%keyword%")->get();
        
        return view('admin.newstype.search', ['newstype'=>$newstype, 'keyword'=>$keyword]);
    }
}
