<?php

namespace App\Http\Controllers;
use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index() {
        return view('admin.category.list');
    }

    public function getList() {
    	$category= Category::paginate(10);
    	return view('admin.category.list', ['category'=>$category]);
    }

    public function create() {
    	return view('admin.category.create');
    }

    public function store(Request $request) {
        $this->validate($request, [
            'name'=> 'required|min:2|max:100|unique:Category,Ten'
        ], [
            'name.required'=> 'Bạn chưa nhập tên thể loại',
            'name.min'=>'Tên phải co độ dài từ 3 đến 100 ký tự',
            'name.max'=>'Tên phải co độ dài từ 3 đến 100 ký tự',
            'name.unique'=>'Tên thể loại đã tồn tại'
        ]);

        $category= new Category;
        $category->Ten= $request->name;
        $category->TenKhongDau= changeTitle($request->name);
        $category->save();
        return redirect('admin/category/create')->with('thongbao', 'Thêm thành công');
    }

    public function edit($id) {
        $category= Category::find($id);
    	return view('admin.category.edit', ['category'=>$category]);
    }

    public function update(Request $request, $id) {
        $category= Category::find($id);
        $this->validate($request, [
            'name'=>'required|unique:Category,Ten|min:3|max:100'
        ], [
            'name.required'=>'Bạn chưa nhập tên thể loại',
            'name.unique'=>'Tên thể loại đã tồn tại',
            'name.min'=>'Tên thể loại phải dài từ 3 đến 100 ký tự',
            'name.max'=>'Tên thể loại phải dài từ 3 đến 100 ký tự'
        ]);
        $category->Ten= $request->name;
        $category->TenKhongDau= changeTitle($request->name);
        $category->save();

        return redirect('admin/category/edit/'.$id)->with('thongbao', 'Sửa thành công');
    }

    public function delete($id) {
        $category= Category::find($id);
        $category->delete();

        return redirect('admin/category/list');
    }

    function search(Request $request) {
        $keyword= $request->keyword;
        $category= Category::where('Ten', 'like', "%$keyword%")->orWhere('TenKhongDau', 'like', "%keyword%")->get();
        
        return view('admin.category.search', ['category'=>$category, 'keyword'=>$keyword]);
    }

}
