@extends("layout.master")
@section("content")
<h3>Edit Article</h3>
{!! Form::model($article, ['route' => ['articles.update', $article->id],'files'=>true, 'method' => 'put', 'class' => 'form-horizontal', 'role' =>'form']) !!}
@include('articles.form')
{!! Form::close() !!}
@stop