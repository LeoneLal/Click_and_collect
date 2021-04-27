<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::all();
        if( \Auth::user()->role == 'Administrateur')
            return view('articles.index')->with('articles', $articles);
        else
            return redirect()->route('index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $articles = Article::all();
        if( \Auth::user()->role == 'Administrateur')
            return view('articles.create')->with('articles', $articles);
        else
            return redirect()->route('index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(['file' => 'required|mimes:png,jpg,svg|max:2048']);
        
        $name = $request->file('file')->getClientOriginalName();
        $request->file->move(public_path('images/articles'), $name);

        $article = new Article;
        $article->title = $request->title;
        $article->body = $request->body;
        $article->picture_path = $name;
        $article->author = $request->author;
        $article->save();

        return redirect()->route('articles.index');
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
        if( \Auth::user()->role == 'Administrateur')
            return view('articles.show')->with('article', $article);
        else
            return redirect()->route('index');
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
        if( \Auth::user()->role == 'Administrateur')
            return view('articles.edit')->with('article', $article);
        else
            return redirect()->route('index');
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
        $article = Article::where('id', $id)->first();
        $article->title = $request->get('title');
        $article->body = $request->get('body');
        $article->save();

        return redirect('/admin/articles');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::where('id', $id)->first();
        $article->delete();
        return redirect('/admin/articles');
    }

    public function news()
    {
        $articles = Article::orderBy('id', 'DESC')->get();
        return view('articles.news')->with('articles', $articles);
    }

    public function details($id)
    {
        $article = Article::find($id);
        return view('articles.details')->with('article', $article);
    }
}
