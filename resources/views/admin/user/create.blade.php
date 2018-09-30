@extends('layouts.admin')

@section('content')
    <div class="row">
        <!-- Page Header -->
        <div class="col-lg-12">
            <h1 class="page-header">Thêm mới Người Dùng</h1>
        </div>
        <!--End Page Header -->
    </div>
    <div class="row">
        <div class="col-lg-6">

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

            <form action="admin/user/create" method="post" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                    <label>Tên người dùng: </label>
                    <input class="form-control" type="text" name="name">
                </div>
                <div class="form-group">
                    <label>Email: </label>
                    <input class="form-control" type="email" name="email">
                </div>
                <div class="form-group">
                    <label>Mật khẩu: </label>
                    <input class="form-control" type="password" name="password">
                </div>
                <div class="form-group">
                    <label>Nhập lại password: </label>
                    <input class="form-control" type="password" name="passwordAgain">
                </div>
                <div class="form-group">
                    <label>Quyền: </label>
                    <label class="radio-inline">
                        <input type="radio" name="quyen" value="0" checked="">Thường
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="quyen" value="2">Admin
                    </label>
                </div>
                <div class="form-group">
                    <label>Ảnh đại diện: </label>
                    <input type="file" name="hinh" class="form-control"> 
                </div>
                
                <div class="form-group">
                    <input class="btn btn-primary" type="submit" value="Thêm">
                    <a class="btn btn-link" href="admin/user">Trở lại</a>
                </div>
            </form>
        </div>
    </div>
@endsection