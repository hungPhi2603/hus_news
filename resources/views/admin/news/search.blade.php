@extends('layouts.admin')

@section('content')
	<div class="row">

	    <!-- Page Header -->
	    <div class="col-lg-12">
	        <h1 class="page-header">Kết quả tìm kiếm cho "{{$keyword}}"</h1>
	    </div>
	    <!--End Page Header -->
	    <br><br><br>
	</div>

	<div class="row">
	    <div class="col-md-12">
	        <!-- DATA TABLE -->
	        
	        
	        <div class="table-responsive table-responsive-data2">
	            <table class="table table-data2">
	                <thead>
	                    <tr>
	                        <th>
	                            <h4>id</h4>
	                        </th>
	                        <th>
	                            <h4>Tiêu đề</h4>
	                        </th>
	                        <th>
	                            <h4>tóm tắt</h4>
	                        </th>
	                        <th>
	                            <h4>thể loại</h4>
	                        </th>
	                        <th>
	                            <h4>loại tin</h4>
	                        </th>
	                        <th>
	                            <h4>lượt xem</h4>
	                        </th>
	                        <th>
	                            <h4>Hiển thị</h4>
	                        </th>
	                        <th></th>
	                    </tr>
	                </thead>
	                <tbody>
	                    @foreach($news as $n)
	                        <tr class="tr-shadow">
	                            <td>{{ $n->id }}</td>
	                            <td>{{ $n->TieuDe }}</td>
	                            <td>{{ $n->TomTat }}</td>
	                            <td>{{ $n->loaitin->Ten }}</td>
	                            <td>{{ $n->loaitin->theloai->Ten }}</td>
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
	                                    
	                                    <a href="admin/news/edit/{{$n->id}}" class="item" data-toggle="tooltip" data-placemeu="top" title="Sửa">
	                                        <i class="zmdi zmdi-edit"></i>
	                                    </a>
	                                    <a href="admin/news/delete/{{$n->id}}" class="item" data-toggle="tooltip" data-placemeu="top" title="Xóa" OnClick="return confirm('Bạn có chắc chắn muốn xóa?');">
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

	
	<br><br>
@endsection