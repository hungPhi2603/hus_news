@extends('layouts.admin')

@section('content')
    <div class="row">

        <!-- Page Header -->
        <div class="col-lg-12">
            <h1 class="page-header">Danh sách Thể Loại</h1>
        </div>
        <br><br><br>
        <!--End Page Header -->
    </div>
    
    <div class="row">
        <div class="col-md-12">
            <!-- DATA TABLE -->
            
            <div class="table-data__tool">
                
                <div class="table-data__tool-right">
                    <a href="admin/category/create" class="au-btn au-btn-icon au-btn--green au-btn--small">
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
                                <h4>Tên Không Dấu</h4>
                            </th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($category as $cate)
                            <tr class="tr-shadow">
                                <td>
                                    {{$cate->id}}
                                </td>
                                <td>{{$cate->Ten}}</td>
                                <td>{{$cate->TenKhongDau}}</td>
                                <td>
                                    <div class="table-data-feature">
                                        
                                        <a href="admin/category/edit/{{$cate->id}}" class="item" data-toggle="tooltip" data-placement="top" title="Sửa">
                                            <i class="zmdi zmdi-edit"></i>
                                        </a>
                                        <a href="admin/category/delete/{{$cate->id}}" class="item" data-toggle="tooltip" data-placement="top" title="Xóa" OnClick="return confirm('Bạn có chắc chắn muốn xóa?');">
                                            <i class="zmdi zmdi-delete"></i>
                                        </a>
                                        
                                    </div>
                                </td>
                            </tr>
                            <tr class="spacer"></tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- END DATA TABLE -->
        </div>
    </div>

    {!! $category->links() !!}
@endsection