@extends('layouts.page1')

@section('content')
<!-- Page Content -->
<div class="container">
    <div class="row">
    	<ul class="breadcrumb">
		    <li><a href="trangchu">Trang chủ</a></li>
		    <li><a href="trangchu">{{$news->loaitin->theloai->Ten}}</a></li>
		    <li><a href="loaitin/{{$news->loaitin->id}}/{{$news->loaitin->TenKhongDau}}">{{$news->loaitin->Ten}}</a></li>
		    <li class="active">{{$news->TieuDe}}</li>        
		</ul>
        <!-- Blog Post Content Column -->
        <div class="col-lg-9">

            <!-- Blog Post -->

            <!-- Title -->
            <h1>{{$news->TieuDe}}</h1>

            <!-- Author -->
            @if(Auth::user())
                <p class="lead">
                    by <a href="#">{{Auth::user()->name}}</a>
                </p>
            @endif    
            <!-- Preview Image -->
            <img class="img-responsive" src="upload/tintuc/{{$news->Hinh}}" alt="">

            <!-- Date/Time -->
            <p><span class="glyphicon glyphicon-time"></span> {{$news->created_at}}</p>
            <hr>

            <!-- Post Content -->
            <p class="lead">{!!$news->TomTat!!}</p>
            <p>{!!$news->NoiDung!!}</p>

            <hr>

            <!-- Blog Comments -->
            @if(Auth::user())
            <!-- Comments Form -->
	            <div class="well">
	                <h4>Viết bình luận ...<span class="glyphicon glyphicon-pencil"></span></h4>
	                @if(session('thongbao'))
		                
		                    {{session('thongbao')}}
		                
		            @endif
	                <form action="comment/{{$news->id}}" method="post" role="form">
	                	<input type="hidden" name="_token" value="{{csrf_token()}}">
	                    <div class="form-group">
	                        <textarea class="form-control" name="NoiDung" rows="3"></textarea>
	                    </div>
	                    <button type="submit" class="btn btn-primary">Gửi</button>
	                </form>
	            </div>
            @endif
            <hr>

            <!-- Posted Comments -->
            <h3>
            	Bình luận
            </h3>
            <!-- Comment -->
            @foreach($news->comment as $cm)
            @if(Auth::user())
            <div class="media">
                <a class="pull-left" href="#">
                    <img class="media-object" src="upload/user/{{Auth::user()->avatar}}" alt="" width="60px">
                </a>
                <div class="media-body">
                    <h4 class="media-heading">{{$cm->user->name}}
                        <small>{{$cm->created_at}}</small>
                    </h4>
                    {{$cm->NoiDung}}
                </div>
            </div>
            @endif
            @endforeach
            

        </div>

        <!-- Blog Sidebar Widgets Column -->
        <div class="col-md-3">

            <div class="panel panel-default">
                <div class="panel-heading"><b>Tin liên quan</b></div>
                <div class="panel-body">
                	@foreach($lienquan as $lq)
                    <!-- item -->
                    <div class="row" style="margin-top: 10px;">
                        <div class="col-md-5">
                            <a href="tintuc/{{$lq->id}}/{{$lq->TieuDeKhongDau}}">
                                <img class="img-responsive" src="upload/tintuc/{{$lq->Hinh}}" alt="">
                            </a>
                        </div>
                        <div class="col-md-7">
                            <a href="tintuc/{{$lq->id}}/{{$lq->TieuDeKhongDau}}"><b>{{$lq->TieuDe}}</b></a>
                        </div>
                        
                        <div class="break"></div>
                    </div>
                    <!-- end item -->
                    @endforeach
                    
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading"><b>Tin mới nhất</b></div>
                <div class="panel-body">
                	@foreach($moinhat as $mn)
                    <!-- item -->
                    <div class="row" style="margin-top: 10px;">
                        <div class="col-md-5">
                            <a href="tintuc/{{$mn->id}}/{{$mn->TieuDeKhongDau}}">
                                <img class="img-responsive" src="upload/tintuc/{{$mn->Hinh}}" alt="">
                            </a>
                        </div>
                        <div class="col-md-7">
                            <a href="tintuc/{{$mn->id}}/{{$mn->TieuDeKhongDau}}"><b>{{$mn->TieuDe}}</b></a>
                        </div>
                        
                        <div class="break"></div>
                    </div>
                    <!-- end item -->
                    @endforeach
                    
                </div>
            </div>
            
        </div>

    </div>
    <!-- /.row -->
</div>
<!-- end Page Content -->
@endsection