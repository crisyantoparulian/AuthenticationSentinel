@extends("layout.master")
@section("content")
<div class="panel panel-success">

            <div class="panel-heading">
              <h3 class="panel-title">Create Articles </h3>

            </div>
{!! Form::open(['route' => 'articles.store', 'class' => 'form-
horizontal', 'role' => 'form']) !!}
<div class="panel panel-body">
@include('articles.form')
</div>
{!! Form::close() !!}
@stop