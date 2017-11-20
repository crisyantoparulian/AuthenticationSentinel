<?php

namespace App\Http\Controllers;
use App\Http\Requests\ArticleRequest;
use Illuminate\Http\Request;
use App\Article;
use Session;
use File;
use Validator;
use Redirect;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $article = Article::all();
        return view('articles.index')->with('articles',$article);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request)
    {
        $input['title'] = $request->title;
        $input['content'] = $request->content;
        $input['image'] = time().'.'.$request->image->getClientOriginalExtension();
        $request->image->move(public_path('images'), $input['image']);   
        Article::create($input);
        Session::flash("notice","Article success created");
        return redirect()->route("articles.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
{
    $article = Article::find($id);
    $comments = Article::find($id)->comments->sortBy('Comment.created_at');
    return view('articles.show')->with('article', $article)->with('comments', $comments);
}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::find($id);
        return view('articles.edit')->with('article',$article);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validate = Validator::make($request->all(), [
            'content'  => 'required|max:255|min:5',
            'title' => 'required|max:100',
        ]);
        if($validate->fails()) {
    return Redirect::to('articles/'.$id.'/edit')->withErrors($validate)->withInput();
    } else {
        $hasil =Article::find($id);
        $input['title'] = $request->title;
        $input['content'] = $request->content;
        $input['image'] = $hasil->image;
        if($request->image !=null ){
            $request->image->move(public_path('images'), $input['image']);   
        }
        Article::find($id)->update($input);
        Session::flash("notice","Article success update");
        return redirect()->route("articles.show", $id);
    }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hasil =Article::find($id);
        // $image_path = "/images/".$hasil->image;
        // if(File::exists($image_path)) {
        //     File::delete($image_path);
        // }
        if(\File::exists(public_path('images/'.$hasil->image))){
              \File::delete(public_path('images/'.$hasil->image));
            }
        Article::destroy($id);
        Session::flash("notice", "Article success deleted");
        return redirect()->route("articles.index");
    }
}
