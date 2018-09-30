<?php

namespace App\Http\Controllers;
use App\NewsType;
use App\Category;
use App\News;
use App\Comment;
use Illuminate\Http\Request;

class NewsController extends Controller
{
   
    public function getList() {
    	$news= News::orderBy('id', 'DESC')->paginate(10);
    	return view('admin.news.list', ['news'=>$news]);
    }

    public function create() {
    	$category= Category::all();
    	$newstype= NewsType::all();
    	return view('admin.news.create', ['category'=>$category, 'newstype'=>$newstype]);
    }

    public function store(Request $request) {
        $this->validate($request, [
            'title'=> 'required|min:3|max:100|unique:News,TieuDe',
            'tomtat'=>'required',
            'newstype'=>'required',
            'noidung'=>'required'
        ], [
            'title.required'=> 'Bạn chưa nhập Tiêu đề',
            'title.min'=>'Tiêu đề phải co độ dài từ 3 đến 100 ký tự',
            'title.max'=>'Tiêu đề phải co độ dài từ 3 đến 100 ký tự',
            'title.unique'=>'Tiêu đề thể loại đã tồn tại',
            'newstype.required'=>'Bạn chưa chọn loại tin',
            'tomtat.required'=>'Bạn chưa nhập tóm tắt',
            'noidung.required'=>'Bạn chưa nhập nội dung'

        ]);

        $news= new News;
        $news->TieuDe= $request->title;
        $news->TieuDeKhongDau= changeTitle($request->title);
        $news->idLoaiTin= $request->newstype;
        $news->TomTat= $request->tomtat;
        $news->NoiDung= $request->noidung;
        $news->HienThi= $request->hienthi;
        if ($request->hasFile('hinh')) {
        	$file= $request->file('hinh');
        	$duoi= $file->getClientOriginalExtension();
        	if ($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg') {
        		return redirect('admin/news/create')->with('loi', 'Sai định dạng ảnh');
        	}
        	$name= $file->getClientOriginalName();
        	$hinh= str_random(4)."_".$name;
        	while (file_exists("upload/tintuc/".$hinh)) {
        		$hinh= str_random(4)."_".$name;
        	}
        	$file->move("upload/tintuc", $hinh);
        	$news->Hinh= $hinh;
        } else {
        	$news->Hinh= "";
        }
        $news->save();
        return redirect('admin/news/create')->with('thongbao', 'Thêm thành công');
    }

    public function edit($id) {
    	$category= Category::all();
    	$newstype= NewsType::all();
        $news= News::find($id);
    	return view('admin.news.edit', ['newstype'=>$newstype, 'category'=> $category, 'news'=>$news]);
    }

    public function update(Request $request, $id) {
        $news= News::find($id);
        // $news->TieuDe= str_random(4);

        // echo $news."<br>";
        // echo $request->title;
        // die();
        $this->validate($request, [
            'title'=> 'required|min:3|max:100|unique:News,TieuDe',
            'tomtat'=>'required',
            'newstype'=>'required',
            'noidung'=>'required'
        ], [
            'title.required'=> 'Bạn chưa nhập tiêu đề',
            'title.min'=>'Tiêu đề phải co độ dài từ 3 đến 100 ký tự',
            'title.max'=>'Tiêu đề phải co độ dài từ 3 đến 100 ký tự',
            'title.unique'=>'Tiêu đề đã tồn tại',
            'newstype.required'=>'Bạn chưa chọn loại tin',
            'tomtat.required'=>'Bạn chưa nhập tóm tắt',
            'noidung.required'=>'Bạn chưa nhập nội dung'

        ]);
        
        $news->TieuDe= $request->title;
        $news->TieuDeKhongDau= changeTitle($request->title);
        $news->idLoaiTin= $request->newstype;
        $news->TomTat= $request->tomtat;
        $news->NoiDung= $request->noidung;
        $news->HienThi= $request->hienthi;
        if ($request->hasFile('hinh')) {
        	$file= $request->file('hinh');
        	$duoi= $file->getClientOriginalExtension();
        	if ($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg') {
        		return redirect('admin/news/create')->with('loi', 'Sai định dạng ảnh');
        	}
        	$name= $file->getClientOriginalName();
        	$hinh= str_random(4)."_".$name;
        	while (file_exists("upload/tintuc/".$hinh)) {
        		$hinh= str_random(4)."_".$name;
        	}
        	$file->move("upload/tintuc", $hinh);
        	// unlink("upload/tintuc/".$news->Hinh);
        	$news->Hinh= $hinh;
        } 
        $news->save();

        return redirect('admin/news/edit/'.$id)->with('thongbao', 'Sửa thành công');
    }

    public function delete($id) {
        $news= News::find($id);
        $news->delete();

        return redirect('admin/news/list');
    }

    function search(Request $request) {
        $keyword= $request->keyword;
        $news= News::where('TieuDe', 'like', "%$keyword%")->orWhere('TomTat', 'like', "%keyword%")->orWhere('NoiDung', 'like', "%keyword%")->get();
        
        return view('admin.news.search', ['news'=>$news, 'keyword'=>$keyword]);
    }
}
