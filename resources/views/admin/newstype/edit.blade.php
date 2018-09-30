@extends('layouts.admin')

@section('content')
    <div class="row">
        <!-- Page Header -->
        <div class="col-lg-12">
            <h1 class="page-header">Sửa Loại Tin "{{ $newstype->Ten }}"</h1>
        </div>
        <!--End Page Header -->
    </div>
    <div class="row">
        <div class="col-lg-3">
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

            <form action="admin/newstype/edit/{{$newstype->id}}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group">
                    <label>Thể Loại: </label>
                    <select class="form-control" name="category">
                        @foreach($category as $cate)
                            <option 
                            <?php if ($newstype->idTheLoai== $cate->id): ?>
                                {{"selected"}}
                            <?php endif ?>
                            value="{{$cate->id}}">{{$cate->Ten}}</option>
                        @endforeach
                        
                    </select>    
                </div>

                <div class="form-group">
                    <label>Tên Loại Tin: </label><input class="form-control" type="text" name="name" value="{{$newstype->Ten}}">
                </div>

                <div class="form-group">
                    <input class="btn btn-primary" type="submit" value="Lưu">
                    <input class="btn btn-danger" type="reset" value="Xóa">
                    <a href="admin/newstype" class="btn btn-link">Trở lại</a>
                </div>
            </form>
            

            
        </div>
    </div>
@endsection