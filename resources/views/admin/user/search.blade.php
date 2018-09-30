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
	                            <h4>Tên</h4>
	                        </th>
	                        <th>
	                            <h4>Email</h4>
	                        </th>
	                        <th>
	                            <h4>Quyền</h4>
	                        </th>
	                        <th></th>
	                    </tr>
	                </thead>
	                <tbody>
	                    @foreach($user as $u)
	                        <tr class="tr-shadow">
	                            <td>{{ $u->id }}</td>
	                            <td>{{ $u->name }}</td>
	                            <td>{{ $u->email }}</td>
	                            <td>
	                                @if($u->quyen==2)
	                                    {{"Admin"}}
	                                @else
	                                    {{"User"}}    
	                                @endif
	                            </td>
	                            <td>
	                                <div class="table-data-feature">
	                                    
	                                    <a href="admin/user/edit/{{$u->id}}" class="item" data-toggle="tooltip" data-placement="top" title="Sửa">
	                                        <i class="zmdi zmdi-edit"></i>
	                                    </a>
	                                    <a href="admin/user/delete/{{$u->id}}" class="item" data-toggle="tooltip" data-placement="top" title="Xóa" OnClick="return confirm('Bạn có chắc chắn muốn xóa?');">
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