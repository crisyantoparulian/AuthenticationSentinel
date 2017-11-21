<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Redirect;
use Session;
use App\Comment;
use App\Article;

class CommentsController extends Controller
{
	protected $rules =
    [
        'title' => 'required|min:2|max:32|regex:/^[a-z ,.\'-]+$/i',
        'content' => 'required|min:2|max:128|regex:/^[a-z ,.\'-]+$/i'
    ];
    public function store(Request $request)
	{
	
		$comment = new Comment();
		$comment->article_id = $request->article_id;
		$comment->content = $request->content;
		$comment->user = $request->user;
		$comment->save();
		return response()->json($comment);
	
}

	public function index()
	{
		return view('welcome');
	}

}

