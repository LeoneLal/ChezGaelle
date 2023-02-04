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

        $book= new Book;
        $book->name = $request->name;
        $book->picture_path = $name;
        $book->author = $request->author;
        $book->save();

        return redirect()->route('books.index');
    }

    public function edit($id)
    {
        $book= Book::find($id);
        if( Auth::user()->role == 'Administrateur')
            return view('books.edit')->with('book', $book);
        else
            return redirect()->route('index');
    }

    public function update(Request $request, $id)
    {
        $book= Book::where('id', $id)->first();
        $book->title = $request->get('title');
        $book->body = $request->get('body');
        $book->save();

        return redirect('/admin/books');
    }

    public function destroy($id)
    {
        $book= Book::where('id', $id)->first();
        $book->delete();
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
