
{!! Form::open(['route' => 'comments.store', 'class' => 'form-horizontal', 'role' => 'form']) !!}

<div class="form-group" style="width: 900px">
<!-- {!! Form::label('article_id', 'Title', array('class' => 'col-lg-3 control-label')) !!} -->


<div class="col-lg-9">
<!-- {!! Form::text('article_id', $value = $article->id, array('class'=> 'form-control', 'readonly')) !!} -->
{{ Form::hidden('article_id',  $value = $article->id, array('id' => 'article_id')) }}
</div>
<div class="clear"></div>
</div>
<div class="form-group">
{!! Form::label('content', 'Your Comment', array('class' => 'col-lg-3 control-label')) !!}
<div class="col-lg-9">

{!! Form::textarea('content', null, array('class' => 'form-control', 'rows' => 10, 'autofocus' => 'true')) !!}

{!! $errors->first('content') !!}
</div>
<div class="clear"></div>
</div>
<div class="form-group">
{!! Form::label('user', 'Your Name', array('class' => 'col-lg-3 control-label')) !!}
<div class="col-lg-9">
{!! Form::text('user', null, array('class' => 'form-control','type'=>'email'))!!}
{!! $errors->first('user') !!}
</div>
<div class="clear"></div>
</div>
<div class="form-group">
<div class="col-lg-3"></div>
<div class="col-lg-9">
{!! Form::submit('Submit', array('class' => 'btn btn-primary'))
!!}
</div>
<div class="clear"></div>
</div>
{!! Form::close() !!}