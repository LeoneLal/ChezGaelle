<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        if( Auth::user()->role == 'Administrateur')
            return view('books.index')->with('books', $books);
        else
            return redirect()->route('index');
    }

    public function create()
    {
        if( Auth::user()->role == 'Administrateur')
            return view('books.create');
        else
            return redirect()->route('index');
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required']);
        $request->validate(['author' => 'required']);
        $request->validate(['file' => 'required|mimes:png,jpg,svg']);
        
        $name = $request->file('file')->getClientOriginalName();
        $request->file->move(public_path('images/books'), $name);

        $article = new Book;
        $article->name = $request->name;
        $article->picture_path = $name;
        $article->author = $request->author;
        $article->save();

        return redirect()->route('books.index');
    }

    public function edit($id)
    {
        $article = Book::find($id);
        if( Auth::user()->role == 'Administrateur')
            return view('books.edit')->with('article', $article);
        else
            return redirect()->route('index');
    }

    public function update(Request $request, $id)
    {
        $article = Book::where('id', $id)->first();
        $article->title = $request->get('title');
        $article->body = $request->get('body');
        $article->save();

        return redirect('/admin/books');
    }

    public function destroy($id)
    {
        $article = Book::where('id', $id)->first();
        $article->delete();
        return redirect('/admin/books');
    }

    public function books()
    {
        $lastBooks = Book::orderBy('id', 'DESC')->limit(3)->get();
        $count = Book::count();
        $books = Book::orderBy('id')->limit($count-3)->get();
        return view('books.books')->with(['books'=> $books, 'lastBooks' => $lastBooks]);
    }

}
