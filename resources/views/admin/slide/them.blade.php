@extends('layouts.admin')

@section('content')
    <div class="row">
        <!-- Page Header -->
        <div class="col-lg-12">
            <h1 class="page-header">Tạo mới Slide</h1>
        </div>
        <!--End Page Header -->
    </div>
    <div class="row">
        <div class="col-lg-12">

            @if(count($errors)>0)
                <div class="alert alert-danger">
                    @foreach($errors->all() as $err)
                        {{$err}}<br>
                    @endforeach
                </div>
            @endif

            @if(session('thongbao'))
                <div class="alert alert-success">
                    {{session('thongbao')}}
                </div>
            @endif

            @if(session('loi'))
                <div class="alert alert-danger">
                    {{session('loi')}}
                </div>
            @endif

            <form action="admin/slide/them" method="post" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                
                <div class="form-group">
                    <label>Tên: </label><input class="form-control" type="text" name="Ten" placeholder="Nhập tên...">
                </div>

                <div class="form-group">
                    <label>Nội Dung: </label>
                    <textarea id="demo" class="form-control ckeditor" rows="3" name="NoiDung">
                    </textarea> 
                </div>

                <div class="form-group">
                    <label>Hình ảnh: </label>
                    <input type="file" name="Hinh" class="form-control">
                </div>

                <div class="form-group">
                    <label>Link: </label><input class="form-control" type="text" name="link" placeholder="Nhập link...">
                </div>

                <div class="form-group">
                    <input class="btn btn-primary" type="submit" value="Thêm">
                    <input class="btn btn-danger" type="reset" value="Xóa">
                    <a class="btn btn-link" href="admin/slide">Trở Lại</a>
                </div>
            </form>
        </div>
    </div>
@endsection

