@extends("layout.master")
@section("content")
<div class="row">
  <div class="col-sm-3" align="center">
  	<br/>
  	{!! link_to(route("articles.create"), "Create", ["class"=>"button23"]) !!}
  </div>
  <div class="col-sm-8">
  <div class="row">
		<div class="panel panel-success" style="width: 900px">

            <div class="panel-heading">
              <h3 class="panel-title">List Articles </h3>
            </div>
            <br/>
            
            		@include('articles.list')
            	
            <hr class="style8">
        </div>
  </div>
</div>
	

</div>



@stop
