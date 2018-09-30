@extends('layouts.admin')

@section('content')
    <div class="row">
        <!-- Page Header -->
        <div class="col-lg-12">
            <h1 class="page-header">Sửa tin "{{$news->TieuDe}}"</h1>
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

            <form action="admin/news/edit/{{$news->id}}" method="post" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group" style="width: 50%;">
                    <label>Thể Loại: </label>
                    <select class="form-control" name="category" id="category">
                        @foreach($category as $cate)
                            <option
                            <?php if ($news->loaitin->theloai->id == $cate->id): ?>
                                {{"selected"}}
                            <?php endif ?>

                             value="{{$cate->id}}">{{$cate->Ten}}</option>
                        @endforeach
                    </select>    
                </div>

                <div class="form-group" style="width: 50%;">
                    <label>Loại Tin: </label>
                    <select class="form-control" name="newstype" id="newstype">
                        @foreach($newstype as $nt)
                            <option
                            <?php if ($news->loaitin->id == $nt->id): ?>
                                {{"selected"}}
                            <?php endif ?>
                             value="{{$nt->id}}">{{$nt->Ten}}</option>
                        @endforeach
                    </select>    
                </div>

                <div class="form-group">
                    <label>Tiêu Đề: </label>
                    <input class="form-control" type="text" name="title" value="{{$news->TieuDe}}">
                </div>

                <div class="form-group">
                    <label>Tóm tắt: </label>
                    <textarea id="demo" class="form-control ckeditor" rows="3" name="tomtat">
                        {{$news->TomTat}}
                    </textarea> 
                </div>

                <div class="form-group">
                    <label>Nội dung: </label>
                    <textarea id="demo" class="form-control ckeditor" rows="5" name="noidung">
                        {{$news->NoiDung}}
                    </textarea> 

                </div>

                <div class="form-group">
                    <label>Hình ảnh: </label>
                    <img src="upload/tintuc/{{$news->Hinh}}" width="400px">
                    <input type="file" name="hinh" class="form-control" value="{{$news->Hinh}}"> 
                </div>

                <div class="form-group">
                    <label>Hiển thị: </label>
                    <label class="radio-inline">
                        <input type="radio" name="hienthi" value="0" 
                        <?php if ($news->HienThi == 0): ?>
                            {{"checked"}}
                        <?php endif ?>
                        >Không
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="hienthi" value="1"
                        <?php if ($news->HienThi == 1): ?>
                            {{"checked"}}
                        <?php endif ?>
                        >Có
                    </label>
                </div>

                <div class="form-group">
                    <input class="btn btn-primary" type="submit" value="Sửa">
                    <input class="btn btn-danger" type="reset" value="Xóa">
                    <a class="btn btn-link" href="admin/news">Trở lại</a>
                </div>
            </form>
        </div>
    </div>
    <br><br><br><br>


<!-- comment -->
    <div class="row">
     <!-- Page Header -->
        <div class="col-lg-12">
            <h1 class="page-header">Danh sách bình luận</h1>
        </div>
        <!--End Page Header -->
    </div>

    <div class="panel-body">

        <!-- @if(Session::has('success')) -->
            <div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <!-- {{ Session::get('success') }} -->
            </div>
        <!-- @endif -->

        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Tên người dùng</th>
                    <th>Nội Dung</th>
                    <th>Ngày Đăng</th>
                    <th>Action</th>
                </tr>
                </thead>

                <tbody>
                    @foreach($news->comment as $cm)
                    @if($n->NoiBat==1)
                        <tr>
                            <td>{{ $cm->id }}</td>
                            <td>{{ $cm->user->name }}</td>
                            <td>{{ $cm->NoiDung }}</td>
                            <td>{{ $cm->created_at }}</td>
                           
                            <td>
                                
                                <a href="admin/comment/delete/{{$cm->id}}/{{$news->id}}" class="btn btn-danger" OnClick="return confirm('Bạn có chắc muốn xóa?');">Xóa</a>
                                
                            </td>
                        </tr>
                    @endif    
                    @endforeach
                </tbody>
                
            </table>
            
        </div>

    </div>
<br><br>
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