@extends("layout.master")
@section("content")
        <div class="bs-component">
          <div class="panel panel-primary">
            <div class="panel-heading">
              <h1>Judul : <b>{!! $article->title !!}</b></h1>
              </br>
              <div class="portrait" align="center">
            	<img class="img-responsive" alt="" src="/images/{{ $article->image }}" />
            </div>
            	<p><b>Content : </b>{!! $article->content !!}</p>
            	<br/>
            	<div align="center">
            		{!! Form::open(array('route' => array('articles.destroy', $article->id), 'method' => 'delete')) !!}

{!! link_to(route('articles.index'), "Back", ['class' => 'btn btn-raised btn-info']) !!}

{!! link_to(route('articles.edit', $article->id), 'Edit', ['class'=> 'btn btn-raised btn-warning']) !!}

{!! Form::submit('Delete', array('class' => 'btn btn-raised btn-danger', "onclick" => "return confirm('are you sure?')")) !!}
{!! Form::close() !!}
            </div>
 
</div>
<div>
<div class="col-md-12">
<h3 align="center"><i><u>Give Comments</u></i></h3>

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
</div>
<!-- <div class="col-md-12"> -->

                <ul>
                    <li><i class="fa fa-file-text-o"></i> All the current Posts</li>
                    <a href="#" class="add-modal"><li>Add a Post</li></a>
                </ul>
           
</br>
<!-- @foreach($comments as $comment)
<div style="padding: 20px">
 <p>{!! $comment->content !!}</p>
&nbsp by :<i>{!! $comment->user !!}</i>
</div>
<hr/>
@endforeach -->
<table class="table table-striped table-bordered table-hover" id="postTable" style="visibility: hidden;">
  @foreach($comments as $indexKey =>$comment)
  <tr class="item{{$comment->id}}">
    <!-- <td class="col1">{{ $indexKey+1 }} </td> -->
    <td>{{ $comment->content}}
    <br/>
     By : {{$comment->user}}
   </td>
    <td> <button class="delete-modal btn btn-danger" data-id="{{$comment->id}}" data-user="{{$comment->user}}" data-content="{{$comment->content}}">
                                        <span class="glyphicon glyphicon-trash"></span> Delete</button>
              </td>
  </tr>
  @endforeach
</table>
</div>
</div>
</div>
<div id="addModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" role="form">
                      <input type="hidden" id="_token" name="_token" value="<?php echo csrf_token(); ?>">
                      {{ Form::hidden('article_id',  $value = $article->id, array('id' => 'id_add')) }}
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="title">User:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="user_add" autofocus>
                                <small>Min: 2, Max: 32, only text</small>
                                <p class="errorUser text-center alert alert-danger hidden"></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="content">Content:</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" id="content_add" cols="40" rows="5"></textarea>
                                <small>Min: 2, Max: 128, only text</small>
                                <p class="errorContent text-center alert alert-danger hidden"></p>
                            </div>
                        </div>
                    </form>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success add" data-dismiss="modal">
                            <span id="" class='glyphicon glyphicon-check'></span> Add
                        </button>
                        <button type="button" class="btn btn-warning" data-dismiss="modal">
                            <span class='glyphicon glyphicon-remove'></span> Close
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop