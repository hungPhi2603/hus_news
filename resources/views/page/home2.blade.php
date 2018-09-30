@extends('layouts.page1')

@section('content')
<div class="container">

	<!-- slider -->
	@include('layouts.partials_page.slide')
    <!-- end slide -->

    <div class="space20"></div>


    <div class="row main-left">
        @include('layouts.partials_page.menu')

        <div class="col-md-9">
            <div class="panel panel-default">            
            	<div class="panel-heading" style="background-color: #78b43d;color:white;" >
            		<h2 style="margin-top:0px; margin-bottom:0px;">Tin Tức</h2>
            	</div>

            	<div class="panel-body">
            		<!-- item -->
            		@foreach($category as $cate)
            			@if(count($cate->loaitin) > 0)
						    <div class="row-item row">
			                	<h3>
			                		<a>{{$cate->Ten}}</a> | 
			                		@foreach($cate->loaitin as $nt)	
			                			<small><a href="loaitin/{{$nt->id}}/{{$nt->TenKhongDau}}"><i>{{$nt->Ten}}</i></a>/</small>
			                		@endforeach
			                	</h3>

			                	<?php 
			                	$data= $cate->tintuc->where('HienThi', 1)->sortByDesc('created_at')->take(5);
			                	$tin1= $data->shift();

			                	 ?>


			                	<div class="col-md-8 border-right">
			                		<div class="col-md-5">
				                        <a href="tintuc/{{$tin1['id']}}/{{$tin1['TieuDeKhongDau']}}">
				                            <img class="img-responsive" src="upload/tintuc/{{$tin1['Hinh']}}" alt="">
				                        </a>
				                    </div>

				                    <div class="col-md-7">
				                        <a href="tintuc/{{$tin1['id']}}/{{$tin1['TieuDeKhongDau']}}"><h3>{{$tin1['TieuDe']}}</h3></a>
				                        <p>{!!$tin1['TomTat']!!}</p>
				                        <a class="text-link text-right" href="tintuc/{{$tin1['id']}}/{{$tin1['TieuDeKhongDau']}}" style="color: #81b300">View details<span class="glyphicon glyphicon-chevron-right"></span></a>
									</div>

			                	</div>
			                    

								<div class="col-md-4">
									@foreach($data->all() as $tintuc)
										<a href="tintuc/{{$tintuc['id']}}/{{$tintuc['TieuDeKhongDau']}}">
											<h4>
												<span class="glyphicon glyphicon-list-alt"></span>
												{{$tintuc['TieuDe']}}
											</h4>
										</a>
									@endforeach
									
								</div>
								
								<div class="break"></div>
			                </div>
			            @endif    
	                @endforeach
	                <!-- end item -->
	                
				</div>
            </div>
    	</div>
    </div>
    <!-- /.row -->
</div>
@endsection