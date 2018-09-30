@extends('layouts.admin')

@section('content')
    <div class="row">
        <!-- Page Header -->
        <div class="col-lg-12">
            <h1 class="page-header">Tạo mới Tin Tức</h1>
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

            <form action="admin/news/create" method="post" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group" style="width: 50%">
                    <label>Thể Loại: </label>
                    <select class="form-control" name="category" id="category">
                        @foreach($category as $cate)
                            <option value="{{$cate->id}}">{{$cate->Ten}}</option>
                        @endforeach
                    </select>    
                </div>

                <div class="form-group" style="width: 50%">
                    <label>Loại Tin: </label>
                    <select class="form-control" name="newstype" id="newstype">
                        @foreach($newstype as $nt)
                            <option value="{{$nt->id}}">{{$nt->Ten}}</option>
                        @endforeach
                    </select>    
                </div>

                <div class="form-group">
                    <label>Tiêu Đề: </label><input class="form-control" type="text" name="title" placeholder="Nhập tên...">
                </div>

                <div class="form-group">
                    <label>Tóm tắt: </label>
                    <textarea id="demo" class="form-control ckeditor" rows="3" name="tomtat">
                    </textarea> 
                </div>

                <div class="form-group">
                    <label>Nội dung: </label>
                    <textarea id="demo" class="form-control ckeditor" rows="5" name="noidung">
                    </textarea> 
                </div>

                <div class="form-group">
                    <label>Hình ảnh: </label>
                    <input type="file" name="hinh" class="form-control"> 
                </div>

                <div class="form-group">
                    <label>Hiển thị: </label>
                    <label class="radio-inline">
                        <input type="radio" name="hienthi" value="0" checked="">Không
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="hienthi" value="1">Có
                    </label>
                </div>

                <div class="form-group">
                    <input class="btn btn-primary" type="submit" value="Thêm">
                    <input class="btn btn-danger" type="reset" value="Xóa">
                    <a class="btn btn-link" href="admin/news">Trở Lại</a>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $("#category").change(function() {
                var idTheLoai= $(this).val();
                $.get("admin/ajax/loaitin/"+idTheLoai, function(data) {
                    $("#newstype").html(data);
                });

            });
        });
    </script>
@endsection