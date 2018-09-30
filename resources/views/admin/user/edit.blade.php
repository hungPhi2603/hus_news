@extends('layouts.admin')

@section('content')
    <div class="row">
        <!-- Page Header -->
        <div class="col-lg-12">
            <h1 class="page-header">Sửa người dùng {{ $user->email }}</h1>
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

            <form action="admin/user/edit/{{$user->id}}" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                    <label>Tên người dùng: </label>
                    <input class="form-control" type="text" name="name" value="{{$user->name}}">
                </div>
                <div class="form-group">
                    <div class="form-group">
                        <label>Email: </label>
                        <input class="form-control" type="email" name="email" value="{{$user->email}}" readonly="" />
                    </div>
                </div>
                <div class="form-group">
                    <input type="checkbox" class="" name="changePassword" id="changePassword">
                    <label>Đổi mật khẩu</label>
                    <input type="password" class="form-control password" name="password" aria-describedby="basic-addon1" disabled>
                </div>
                <br>
                <div class="form-group">
                    <label>Nhập lại mật khẩu</label>
                    <input type="password" class="form-control password" name="passwordAgain" aria-describedby="basic-addon1" disabled>
                </div>
                <div class="form-group">
                    <label>Quyền: </label>
                    <label class="radio-inline">
                        <input type="radio" name="quyen" value="0" 
                        <?php if ($user->quyen == 0): ?>
                            {{"checked"}}
                        <?php endif ?>
                        >Thường
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="quyen" 
                        <?php if ($user->quyen == 2): ?>
                            {{"checked"}}
                        <?php endif ?>
                        value="2">Admin
                    </label>
                </div>
                <div class="form-group">
                    <div class="form-group">
                        <label>Ảnh đại diện: </label>
                        <img src="upload/user/{{$user->avatar}}" width="400px">
                        <input type="file" name="hinh" class="form-control" value="{{$user->avatar}}">
                    </div>
                </div>

                <div class="form-group">
                    <input class="btn btn-primary" type="submit" value="Lưu">
                    <input class="btn btn-danger" type="reset" value="Xóa">
                    <a href="admin/user" class="btn btn-link">Trở lại</a>
                </div>
            </form>
            

            
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $("#changePassword").change(function() {
                if ($(this).is(":checked")) {
                    $(".password").removeAttr('disabled');
                } else {
                    $(".password").attr('disabled', '');
                }
            });
        });
    </script>
@endsection