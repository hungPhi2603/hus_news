@extends('layouts.admin')

@section('content')
<!-- Page Content -->
<div class="row">

        <!-- Page Header -->
        <div class="col-lg-12">
            <h1 class="page-header">Danh sách slide</h1>
        </div>
        <!--End Page Header -->
        <br><br><br>
    </div>
    
    <div class="row">
        <div class="col-md-12">
            <!-- DATA TABLE -->
            
            <div class="table-data__tool">
                
                <div class="table-data__tool-right">
                    <a href="admin/slide/them" class="au-btn au-btn-icon au-btn--green au-btn--small">
                        <i class="zmdi zmdi-plus"></i>Thêm
                    </a>
                    
                </div>
            </div>
            <div class="table-responsive table-responsive-data2">
                <table class="table table-data2" id="myTable">
                    <thead>
                        <tr>
                            <th>
                                <h4>id</h4>
                            </th>
                            <th>
                                <h4>Tên</h4>
                            </th>
                            <th>
                                <h4>Nội dung</h4>
                            </th>
                            <th>
                                <h4>hình</h4>
                            </th>
                            <th>
                                <h4>link</h4>
                            </th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($slide as $s)
                            <tr class="tr-shadow">
                                <td>{{ $s->id }}</td>
                                <td>{{ $s->Ten }}</td>
                                <td>{{ $s->NoiDung }}</td>
                                <td>
                                	<img src="upload/slide/{{$s->Hinh}}">
                                </td>
                                <td>{{ $s->link }}</td>
                                
                                <td>
                                    <div class="table-data-feature">
                                        
                                        <a href="admin/slide/sua/{{$s->id}}" class="item" data-toggle="tooltip" data-placement="top" title="Sửa">
                                            <i class="zmdi zmdi-edit"></i>
                                        </a>
                                        <a href="admin/slide/xoa/{{$s->id}}" class="item" data-toggle="tooltip" data-placement="top" title="Xóa" OnClick="return confirm('Bạn có chắc chắn muốn xóa?');">
                                            <i class="zmdi zmdi-delete"></i>
                                        </a>
                                        
                                    </div>
                                </td>
                            </tr>
                            <tr class="spacer"></tr>
                            <tr class="spacer"></tr>
                            <tr class="spacer"></tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- END DATA TABLE -->
        </div>
    </div>
        <!-- /#page-wrapper -->
@endsection