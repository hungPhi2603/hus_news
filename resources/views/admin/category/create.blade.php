@extends('layouts.admin')

@section('content')
    <div class="row">
        <!-- Page Header -->
        <div class="col-lg-12">
            <h1 class="page-header">Tạo mới thể loại</h1>
        </div>
        <!--End Page Header -->
    </div>
    <div class="row">
        <div class="col-lg-3">

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

            <form action="admin/category/create" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                    <label>Tên thể loại: </label><input class="form-control" type="text" name="name" placeholder="Nhập tên...">
                    
                </div>
                <div class="form-group">
                    <input class="btn btn-primary" type="submit" value="Thêm">
                    <a class="btn btn-link" href="admin/category">Trở lại</a>
                </div>
            </form>
        </div>
    </div>
@endsection