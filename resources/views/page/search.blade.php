@extends('layouts.page1')

@section('content')
<!-- Page Content -->

<div class="container">
    <div class="row">
        @include('layouts.partials_page.menu')

        <?php 
        	function doimau($str, $keyword) {
        		return str_replace($keyword, "<span style='color: red;'><i>$keyword</i></span>", $str);
        	}
         ?>

        <div class="col-md-9 ">
            <div class="panel panel-default">
                <div class="panel-heading" style="background-color:#337ab7; color:white;">
                    <h4><b>Tìm kiếm: {{$keyword}}</b></h4>
                </div>
                @foreach($news as $n)
	                <div class="row-item row">
	                    <div class="col-md-3">

	                        <a href="tintuc/{{$n->id}}/{{$n->TieuDeKhongDau}}">
	                            <br>
	                            <img width="200px" height="200px" class="img-responsive" src="upload/tintuc/{{$n->Hinh}}" alt="">
	                        </a>
	                    </div>

	                    <div class="col-md-9">
	                        <a href="tintuc/{{$n->id}}/{{$n->TieuDeKhongDau}}"><h3>{!! doimau($n->TieuDe, $keyword) !!}</h3></a>
	                        <p>{!! doimau($n->TomTat, $keyword) !!}</p>
	                        <a class="text-link" href="tintuc/{{$n->id}}/{{$n->TieuDeKhongDau}}" style="color: #81b300">View details <span class="glyphicon glyphicon-chevron-right"></span></a>
	                    </div>
	                    <div class="break"></div>
	                </div>
                @endforeach
                
                <div style="text-align: center">
					
				</div>
            </div>
        </div> 

    </div>

</div>
<!-- end Page Content -->

@endsection