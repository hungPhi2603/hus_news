<div class="col-md-3 ">
        	
    <ul class="list-group" id="menu">
        <li href="#" class="list-group-item menu1" style="background-color: #78b43d; color: white; border-color: 
        #78b43d;">
        	Danh mục
        </li>
        @foreach($category as $cate)
	        @if(count($cate->loaitin) > 0)
		        <li href="#" class="list-group-item menu1">
		        	{{$cate->Ten}}
		        </li>
		        <ul>
		        	@foreach($cate->loaitin as $nt)
			    		<li class="list-group-item">
			    			<a href="loaitin/{{$nt->id}}/{{$nt->TenKhongDau}}">{{$nt->Ten}}</a>
			    		</li>
		    		@endforeach
		        </ul>
	        @endif
        @endforeach
    </ul>
    
</div>