<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::all();
        if( Auth::user()->role == 'Administrateur')
            return view('articles.index')->with('articles', $articles);
        else
            return redirect()->route('index');
    }

    public function create()
    {
        $articles = Article::all();
        if( Auth::user()->role == 'Administrateur')
            return view('articles.create')->with('articles', $articles);
        else
            return redirect()->route('index');
    }

    public function store(Request $request)
    {
        $request->validate(['file' => 'required|mimes:png,jpg,svg']);
        
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

    public function show($id)
    {
        $article = Article::find($id);
        if( Auth::user()->role == 'Administrateur')
            return view('articles.show')->with('article', $article);
        else
            return redirect()->route('index');
    }

    public function edit($id)
    {
        $article = Article::find($id);
        if( Auth::user()->role == 'Administrateur')
            return view('articles.edit')->with('article', $article);
        else
            return redirect()->route('index');
    }

    public function update(Request $request, $id)
    {
        $article = Article::where('id', $id)->first();
        $article->title = $request->get('title');
        $article->body = $request->get('body');
        $article->save();

        return redirect('/admin/articles');
    }

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
