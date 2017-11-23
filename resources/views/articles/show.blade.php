@extends("layout.master")
@section("content")
        <div class="bs-component">
                     <div class="panel-heading">
                       <div align="center">  <h1><b>{!! $article->title !!}</b></h1></div>
                        <hr class="style13">
                <div class="row"></div>
                <div class="col-sm-4">
              
              </br>
              <div class="portrait" align="center">
            	<img class="img-responsive" alt="" src="/images/{{ $article->image }}" />
            </div>
        </div>
        <div class="col-sm-4">
            	<p><b>Content : </b>{!! $article->content !!}</p>
            
            	<br/>
                <div align="bottom">
                    {!! Form::open(array('route' => array('articles.destroy', $article->id), 'method' => 'delete')) !!}

{!! link_to(route('articles.index'), "Back", ['class' => 'btn btn-raised btn-info']) !!}

{!! link_to(route('articles.edit', $article->id), 'Edit', ['class'=> 'btn btn-raised btn-warning']) !!}

{!! Form::submit('Delete', array('class' => 'btn btn-raised btn-danger', "onclick" => "return confirm('are you sure?')")) !!}
{!! Form::close() !!}
            </div>
            </div>
            </div>

            	
         
<div>
<div class="col-md-12">
<h3 align="center"><i><u><a href="#" class="add-modal" class="btn btn-default">Add a Comment</a></u></i></h3>
 <ul>
                   
                    
                </br>
                    
</div>
<!-- <div class="col-md-12"> -->

               
           
</br>
<!-- @foreach($comments as $comment)
<div style="padding: 20px">
 <p>{!! $comment->content !!}</p>
&nbsp by :<i>{!! $comment->user !!}</i>
</div>
<hr/>
@endforeach -->
<table class="table table-striped table-bordered table-hover" id="postTable" style="visibility: hidden;">
    <thead>
        {{ csrf_field() }}
    </thead>
  @foreach($comments as $indexKey =>$comment)
  <tr class="item{{$comment->id}}">
    <!-- <td class="col1">{{ $indexKey+1 }} </td> -->
    <td>{{ $comment->content}}
    <br/>
     <b>By :</b> {{$comment->user}}
   </td>
    <td> <button class="delete-modal btn btn-danger" data-id="{{$comment->id}}" data-user="{{$comment->user}}" data-content="{{$comment->content}}">
  <span class="glyphicon glyphicon-trash"></span> 
  Delete</button>
  <button class="edit-modal btn btn-info" data-id="{{$comment->id}}" data-user="{{$comment->user}}" data-content="{{$comment->content}}">
                                        <span class="glyphicon glyphicon-edit"></span> Edit</button>
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
                        <input type="hidden" id="token" value="{{ csrf_token() }}">
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

    <!-- Modal form to edit a form -->
    <div id="editModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-user"></h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" role="form">
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="id">ID:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="id_edit" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="user">User:</label>
                            <div class="col-sm-10">
                             <input type="name" class="form-control" id="user_edit" disabled>
                                <p class="errorUser text-center alert alert-danger hidden"></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="content">Content:</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" id="content_edit" cols="40" rows="5"></textarea>
                                <p class="errorContent text-center alert alert-danger hidden"></p>
                            </div>
                        </div>
                    </form>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary edit" data-dismiss="modal">
                            <span class='glyphicon glyphicon-check'></span> Edit
                        </button>
                        <button type="button" class="btn btn-warning" data-dismiss="modal">
                            <span class='glyphicon glyphicon-remove'></span> Close
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="deleteModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-user"></h4>
                </div>
                <div class="modal-body">
                    <h3 class="text-center">Are you sure you want to delete the following post?</h3>
                    <br />
                    <form class="form-horizontal" role="form">
                        <div class="form-group">
                          <input type="hidden" id="_token" name="_token" value="<?php echo csrf_token(); ?>">
                            <label class="control-label col-sm-2" for="id">ID:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="id_delete" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="user">User:</label>
                            <div class="col-sm-10">
                                <input type="name" class="form-control" id="user_delete" disabled>
                            </div>
                        </div>
                    </form>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger delete" data-dismiss="modal">
                            <span id="" class='glyphicon glyphicon-trash'></span> Delete
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