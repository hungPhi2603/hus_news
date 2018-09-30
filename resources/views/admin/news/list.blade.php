@extends('layouts.admin')

@section('content')
    <div class="row">

        <!-- Page Header -->
        <div class="col-lg-12">
            <h1 class="page-header">Danh sách Tin Tức</h1>
        </div>
        <!--End Page Header -->
        <br><br><br>
    </div>

   
    <div class="row">
        <div class="col-md-12">
            <!-- DATA TABLE -->
            
            <div class="table-data__tool">
                
                <div class="table-data__tool-right">
                    <a href="admin/news/create" class="au-btn au-btn-icon au-btn--green au-btn--small">
                        <i class="zmdi zmdi-plus"></i>Thêm
                    </a>
                    
                </div>
            </div>
            <div class="table-responsive table-responsive-data2">
                <table class="table table-data2" id="myTable">
                    <thead>
                        <tr>
                            <th><h4>Id</h4></th>
                            <th><h4>Tiêu đề</h4></th>
                            <th><h4>Tóm tắt</h4></th>
                            <th><h4>Thể loại</h4></th>
                            <th><h4>Loại Tin</h4></th>
                            <th><h4>Lượt Xem</h4></th>
                            <th><h4>Hiển thị</h4></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($news as $n)
                            <tr class="tr-shadow">
                                <td>{{ $n->id }}</td>
                                <td>
                                    <p>{{ $n->TieuDe }}</p>
                                    <img width="100px" src="upload/tintuc/{{$n->Hinh}}">
                                </td>
                                <td>{{ $n->TomTat }}</td>
                                <td>{{ $n->loaitin->theloai->Ten }}</td>
                                <td>{{ $n->loaitin->Ten }}</td>
                                <td>{{ $n->SoLuotXem }}</td>
                                <td>
                                    @if($n->HienThi==0)
                                        {{'Không'}}
                                    @else
                                        {{'Có'}}
                                    @endif
                                </td>
                                <td>
                                    <div class="table-data-feature">
                                        
                                        <a href="admin/news/edit/{{$n->id}}" class="item" data-toggle="tooltip" data-placement="top" title="Sửa">
                                            <i class="zmdi zmdi-edit"></i>
                                        </a>
                                        <a href="admin/newss/delete/{{$n->id}}" class="item" data-toggle="tooltip" data-placement="top" title="Xóa" OnClick="return confirm('Are you sure?');">
                                            <i class="zmdi zmdi-delete"></i>
                                        </a>
                                        
                                    </div>
                                </td>
                            </tr>
                            <tr class="spacer"></tr>
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

    
    {!! $news->links() !!}
    <br><br>
@endsection