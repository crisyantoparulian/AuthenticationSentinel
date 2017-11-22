<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Redirect;
use Session;
use Response;
use View;
use App\Comment;
use Validator;
use App\Article;

class CommentsController extends Controller
{
	protected $rules =
    [
        'user' => 'required|min:2|max:32|email',
        'content' => 'required|min:2|max:128'
    ];
    public function store(Request $request)
	{
		$validator = Validator::make(Input::all(), $this->rules);
        if ($validator->fails()) {
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        } else {
		$comment = new Comment();
		$comment->article_id = $request->article_id;
		$comment->content = $request->content;
		$comment->user = $request->user;
		$comment->save();
		return response()->json($comment);
	}
	
}
	public function destroy($id){
		$comment = Comment::findOrFail($id);
        $comment->delete();
        return response()->json($comment);
	}

	public function index()
	{
		return view('welcome');
	}

}

