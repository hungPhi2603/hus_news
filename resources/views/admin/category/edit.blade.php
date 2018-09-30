@extends('layouts.admin')

@section('content')
    <div class="row">
        <!-- Page Header -->
        <div class="col-lg-12">
            <h1 class="page-header">Sửa Thể Loại "{{ $category->Ten }}"</h1>
        </div>
        <!--End Page Header -->
    </div>
    <div class="row">
        <div class="col-lg-6">
            @if(count($errors) > 0)
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

            <form action="admin/category/edit/{{$category->id}}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                    <label>Tên Thể Loại: </label><input class="form-control" type="text" name="name" value="{{$category->Ten}}">
                </div>

                <div class="form-group">
                    <input class="btn btn-primary" type="submit" value="Lưu">
                    <input class="btn btn-danger" type="reset" value="Xóa">
                    <a href="admin/category" class="btn btn-link">Trở lại</a>
                </div>
            </form>
            

            
        </div>
    </div>
@endsection