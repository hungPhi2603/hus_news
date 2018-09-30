@extends('layouts.admin')

@section('content')
    <div class="row">
        <!-- Page Header -->
        <div class="col-lg-12">
            <h1 class="page-header">Sửa slide "{{$slide->Ten}}"</h1>
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

            <form action="admin/slide/sua/{{$slide->id}}" method="post" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                
                <div class="form-group">
                    <label>Tên: </label>
                    <input class="form-control" type="text" name="Ten" value="{{$slide->Ten}}">
                </div>

                <div class="form-group">
                    <label>Nội Dung: </label>
                    <textarea id="demo" class="form-control ckeditor" rows="3" name="NoiDung">
                        {{$slide->NoiDung}}
                    </textarea> 
                </div>


                <div class="form-group">
                    <label>Hình ảnh: </label>
                    <img src="upload/slide/{{$slide->Hinh}}" width="400px">
                    <input type="file" name="Hinh" class="form-control" value="{{$slide->Hinh}}">
                </div>

                <div class="form-group">
                    <label>Link: </label>
                    <input class="form-control" type="text" name="link" value="{{$slide->link}}">
                </div>

                <div class="form-group">
                    <input class="btn btn-primary" type="submit" value="Sửa">
                    <input class="btn btn-danger" type="reset" value="Xóa">
                    <a class="btn btn-link" href="admin/slide">Trở lại</a>
                </div>
            </form>
        </div>
    </div>
    <br><br><br><br>



@endsection

